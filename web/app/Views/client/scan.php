<?= $this->extend('client/layouts/app'); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-6 col-md-6 col-sm-12">
        <video id="video" width="100%" autoplay class="border rounded"></video>

    </div>
    <div class="col-xl-6 col-md-6 col-sm-12 d-none">
        <canvas id="canvas" width="400" height="300" class="border rounded" style="width: 100%"></canvas>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12">
        <button class="btn btn-success w-100" id="btnAmbilFoto">Ambil</button>
        <div id="hasilPredict">
            <!-- <p>Hasil : Stop</p> -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/camera.js') . "?" . time() ?> " defer></script>
<?= $this->endSection() ?>