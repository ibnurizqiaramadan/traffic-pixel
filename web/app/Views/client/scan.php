<?= $this->extend('client/layouts/app'); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-6 col-md-6 col-sm-12">
        <video id="video" width="100%" autoplay class="border rounded"></video>

    </div>
    <div class="col-sm-6 d-none">
        <canvas id="canvas" width="400" height="300" class="border rounded"></canvas>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12">
        <div id="hasilPredict">
            <!-- <p>Hasil : Stop</p> -->
        </div>
        <button class="btn btn-success" id="btnAmbilFoto">Ambil</button>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/camera.js') ?>" defer></script>
<?= $this->endSection() ?>