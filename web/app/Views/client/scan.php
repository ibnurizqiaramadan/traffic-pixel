<?= $this->extend('client/layouts/app'); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-6 col-sm-12 mb-xl-0 mb-12">
        <video id="video" width="400" autoplay class="border rounded"></video>

    </div>
    <div class="col-sm-6">
        <canvas id="canvas" width="400" height="300" class="border rounded"></canvas>
    </div>
    <div class="col-12">
        <div id="hasilPredict">
            <!-- <p>Hasil : Stop</p> -->
        </div>
    </div>
    <button class="btn btn-success" id="btnAmbilFoto">Ambil</button>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/camera.js') ?>" defer></script>
<?= $this->endSection() ?>