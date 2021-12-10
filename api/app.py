from uuid import uuid4
from keras.models import load_model
from keras.preprocessing import image
import os
from flask import Flask, flash, request, redirect, url_for
from werkzeug.utils import secure_filename
from flask_cors import CORS, cross_origin
import json
import pandas as pd
import numpy as np
import cv2

UPLOAD_FOLDER = os.getcwd() + "\images"

app = Flask(__name__)
CORS(app, resources={r"/submit": {"origins": "*"}})

model = load_model('../ML/Model/model_final.h5')

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER


@app.route("/", methods=['GET', 'POST'])
def index():
    print(labels)
    return "hello"


def make_unique(string):
    ident = uuid4().__str__()
    return f"{ident}-{string}"


def label_text(file):
    # Defining list for saving label in order from 0 to 42
    label_list = []

    # Reading 'csv' file and getting image's labels
    r = pd.read_csv(file)
    # Going through all names
    for name in r['SignName']:
        # Adding from every row second column with name of the label
        label_list.append(name)

    # Returning resulted list with labels
    return label_list


labels = label_text('../ML/Dataset/label_names.csv')


def predict_image(path):
    # print(path)
    i = image.load_img(path, target_size=(32, 32))
    i = image.img_to_array(i)/255.0
    x = np.expand_dims(i, axis=0)
    hasil = model.predict(x)
    return hasil


def findBoundingBox1(img_path):
    image = cv2.imread(img_path)
    original = image.copy()

    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    thresh = cv2.threshold(
        gray, 0, 255, cv2.THRESH_BINARY_INV + cv2.THRESH_OTSU)[1]
    cnts = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

    cnts = cnts[0] if len(cnts) == 2 else cnts[1]
    ROI_number = 0
    print(cnts)
    aaa = np.argmax(cnts[0])
    print(aaa)
    # return
    for c in cnts:
        # return
        x, y, w, h = cv2.boundingRect(c)
        cv2.rectangle(image, (x, y), (x + w, y + h), (36, 255, 12), 2)
        ROI = original[y:y+h, x:x+w]
        cv2.imwrite('ROI_{}.png'.format(ROI_number), ROI)
        ROI_number += 1

    # cv2.imshow('image', image)
    # cv2.waitKey()


def findBoundingBox2(img_path, filename):
    image = cv2.imread(img_path)
    # original = image.copy()
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    thresh = cv2.threshold(
        gray, 0, 255, cv2.THRESH_BINARY_INV + cv2.THRESH_OTSU)[1]

    # Find contours, obtain bounding box, extract and save ROI
    cnts = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    cnts = cnts[0] if len(cnts) == 2 else cnts[1]

    # Find object with the biggest bounding box
    mx = (0, 0, 0, 0)      # biggest bounding box so far
    mx_area = 0
    for cont in cnts:
        x, y, w, h = cv2.boundingRect(cont)
        area = w*h
        if area > mx_area:
            mx = x, y, w, h
            mx_area = area
    x, y, w, h = mx

    roi = image[y:y+h, x:x+w]
    cv2.imwrite(f"images/{filename}", roi)
    return f"images/{filename}"


@app.route("/submit", methods=['POST'])
def get_hours():
    if request.method == 'POST':
        img = request.files['imagePredict']

        # img_path = "/" + img.filename
        filename = make_unique(img.filename)
        img.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
        img_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        findBoundingBox2(img_path, filename)
        p = predict_image(img_path)
        os.remove(img_path)

        arrayOri = p[0]

        arrayCopy = np.sort(p[0])[::-1]

        print(arrayOri)
        print(arrayCopy)

        tampungIndex = []

        print(np.argmax(p[0]))

        if arrayOri[np.argmax(p[0])] != 1:
            for x in range(3):
                for i in arrayCopy:
                    if arrayCopy[x] == i:
                        result = np.where(p[0] == i)
                        tampungIndex.append({
                            "index": result[0][0],
                            "confident": str(i)
                        })
        else:
            tampungIndex.append({
                "index": np.argmax(p[0]),
                "confident": "1"
            })

        print(tampungIndex)

        hasil = []

        for item_ in tampungIndex:
            print(item_)
            if float(item_["confident"]) != 0.0:
                hasil.append({
                    "arti": labels[item_['index']],
                    "confident": item_['confident']
                })
        json_object = json.dumps(hasil, indent=4)
        return json_object


if __name__ == '__main__':
    # app.debug = True
    # app.run(debug=True)
    app.run(host="0.0.0.0", port=8080, debug=True)
