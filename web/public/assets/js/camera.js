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

function ambilFoto() {
    $("#cameraSource").addClass('d-none')
    $("#canvasSource").removeClass('d-none')
    $("#btnAmbilFoto").addClass('d-none')
    $("#btnPrediksi").removeClass('d-none')
    context.drawImage(video, 0, 0, videoWidth, videoHeight);
    cropper.start(document.getElementById('canvas'), 1)
    cropper.showImage(document.getElementById('canvas').toDataURL('image/png'))
    cropper.startCropping()
}

function prediksiFoto() {
    var blobBin = atob(cropper.getCroppedImageSrc().split(',')[1]);
    cropper.restore()
    var array = [];
    for(var i = 0; i < blobBin.length; i++) {
        array.push(blobBin.charCodeAt(i));
    }
    var file=new Blob([new Uint8Array(array)], {type: 'image/png'});

    var formdata = new FormData();
    formdata.append("imagePredict", file);


    $.ajax({
        url: "https://predict-traffic.inh.pw/predict",
        // url: "http://localhost:6901/predict",
        type: "POST",
		data: formdata,
		processData: !1,
		contentType: !1,
		dataType: "JSON",
		beforeSend: function () {
            $("#btnAmbilFoto").append(' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
            $("#btnAmbilFoto").attr("disabled", !0)
		},
		complete: function () {
			$("#btnAmbilFoto").find("span").remove()
            $("#btnAmbilFoto").removeAttr("disabled")
		},
		success: function (e) {
            let html = `
                <img src="data:image/png;base64,${e.image}" class="img-fluid rounded shadow-2 mb-3 w-100">
            `
            html += 'Hasil Predisksi : '
			// console.log(e);
            e.result.forEach(predict => {
                html += `
                    <p class="m-1 align-left"> - ${predict.arti} (${predict.confident})</p>
                `
            })
            msgSweetSuccess(html, {timer: 900000}).then(msg => {
                $("#cameraSource").removeClass('d-none')
                $("#canvasSource").addClass('d-none')
                $("#btnAmbilFoto").removeClass('d-none')
                $("#btnPrediksi").addClass('d-none')
            })
            $(`#hasilPredict`).html(html)
		},
        error: function (error) {
            // console.log(error)
            msgSweetError(error.statusText, {timer: 900000, title: "API Error"})
        }
    })
}

$("#btnAmbilFoto").click(e => {
    ambilFoto()
})

$("#btnPrediksi").click(e => {
    prediksiFoto()
})