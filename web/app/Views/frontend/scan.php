<?= $this->extend('frontend/layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="container pt-5">
    <div class="row pt-5 mt-5 justify-content-center">
        <div class="col-12">
            <div id="cameraSource" class="row justify-content-center">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <video id="video" width="100%" autoplay class="border-0 shadow-2 rounded"></video>
                </div>
            </div>
        </div>
        <div id="canvasSource" class="col-xl-6 col-md-8 col-sm-12 d-none">
            <canvas id="canvas" width="400" height="300" class="border-0 shadow-2 rounded" style="width: 100%"></canvas>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8 col-sm-12 mt-4">
                    <button class="btn btn-xl mb-5 btn-success w-100 border-0 shadow-2" id="btnAmbilFoto">Ambil</button>
                    <button class="btn btn-xl mb-5 btn-success w-100 border-0 shadow-2 d-none" id="btnPrediksi">Prediksi</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script> -->
<script src="<?= base_url('assets/js/module/cropper.js') . "?" . time() ?> " defer></script>
<script src="<?= base_url('assets/js/camera.js') . "?" . time() ?> " defer></script>
<script src="<?= base_url('assets/js/scan.js') . "?" . time() ?> " defer></script>
<?= $this->endSection() ?>