<?= $this->extend('client/layouts/app'); ?>

<?= $this->section('content') ?>
<video id="video" width="480" height="480" autoplay></video>
<canvas id="canvas" width="480" height="480"></canvas>

<script>
    alert("Asd");
    var video = document.getElementById('video');

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
        });
    }

    // Elements for taking the snapshot
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('video');

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

    setInterval(() => {
        context.drawImage(video, 0, 0, 480, 480);
        // saveBase64AsFile(canvas.toDataURL('image/png'), "asd.png")
        // console.log(dataURLtoFile(canvas.toDataURL('image/png'), 'asd.png'));
    }, 1000);
</script>

<?= $this->endSection() ?>