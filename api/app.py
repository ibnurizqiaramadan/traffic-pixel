from uuid import uuid4
from flask import Flask, render_template, request
from keras.models import load_model
from keras.preprocessing import image
import os
from flask import Flask, flash, request, redirect, url_for
from werkzeug.utils import secure_filename
import json
import pandas as pd
import numpy as np

UPLOAD_FOLDER = os.getcwd() + "\images"

app = Flask(__name__)

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
    print(path)
    i = image.load_img(path, target_size=(32, 32))
    i = image.img_to_array(i)/255.0
    x = np.expand_dims(i, axis=0)
    hasil = model.predict(x)
    return hasil


@app.route("/submit", methods=['GET', 'POST'])
def get_hours():
    if request.method == 'POST':
        img = request.files['my_image']

        # img_path = "/" + img.filename
        filename = make_unique(img.filename)
        img.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
        img_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        p = predict_image(img_path)
        os.remove(img_path)
        # p = np.asarray(p)
        # print(p)

        arrayOri = p[0]

        arrayCopy = np.sort(p[0])[::-1]

        print(arrayOri)
        print(arrayCopy)

        tampungIndex = []

        print(np.argmax(p[0]))

        if arrayOri[np.argmax(p[0])] != 1:
            for x in range(5):
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
        print(json_object)
        return json_object


if __name__ == '__main__':
    # app.debug = True
    app.run(debug=True)
