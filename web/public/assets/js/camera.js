var video = document.getElementById('video');
var videoWidth, videoHeight

// Get access to the camera!
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    // console.log(navigator.mediaDevices.getUserMedia());
    navigator.mediaDevices.getUserMedia({
        video: {
            facingMode: 'environment'
        }
    }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
        // alert(video.videoHeight)
    });
}

// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
// var video = document.getElementById('video');

video.addEventListener( "loadedmetadata", function (e) {
    videoWidth = this.videoWidth,
    videoHeight = this.videoHeight;
    // alert(videoHeight + "x" + videoHeight);

    $(canvas).attr("width", videoWidth)
    $(canvas).attr("height", videoHeight)
}, false );

function dataURLtoFile(dataurl, filename) {

    var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, {
        type: mime
    });
}

function saveBase64AsFile(base64, fileName) {
    var link = document.createElement("a");

    document.body.appendChild(link); // for Firefox

    link.setAttribute("href", base64);
    link.setAttribute("download", fileName);
    link.click();
}

function predict() {
    context.drawImage(video, 0, 0, videoWidth, videoHeight);

    var blobBin = atob(canvas.toDataURL('image/png').split(',')[1]);
    var array = [];
    for(var i = 0; i < blobBin.length; i++) {
        array.push(blobBin.charCodeAt(i));
    }
    var file=new Blob([new Uint8Array(array)], {type: 'image/png'});

    var formdata = new FormData();
    formdata.append("imagePredict", file);

    $.ajax({
        url: "https://predict-traffic.inh.pw/predict",
        type: "POST",
		data: formdata,
		processData: !1,
		contentType: !1,
		dataType: "JSON",
		beforeSend: function () {
            // 
		},
		complete: function () {
			// 
		},
		success: function (e) {
            let html = ''
			// console.log(e);
            e.forEach(predict => {
                console.log(predict);
                html += `
                    <p class="fs-4">Hasil : ${predict.arti} (${predict.confident})</p>
                `
            })
            $(`#hasilPredict`).html(html)
		},
    })
}

setInterval(() => {
    // predict()
}, 1000);

$("#btnAmbilFoto").click(e => {
    predict()
})

// setInterval(() => {
//     // context.drawImage(video, 0, 0, 255, 255);
//     // saveBase64AsFile(canvas.toDataURL('image/png'), "asd.png")
//     // console.log(dataURLtoFile(canvas.toDataURL('image/png'), 'asd.png'));
// }, 1000);