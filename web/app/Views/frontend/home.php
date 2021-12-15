<?= $this->extend('frontend/layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="<?= base_url("assets/front/img/icon.png") ?>" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Mulai Belajar</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Rambu Peringatan - Rambu Larangan - Rambu Perintah - Rambu Petunjuk</p>
    </div>
</header>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="tentang">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tentang</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row text-center fs-5">
            <!-- Portfolio Item 1-->
            TrafficPixel Merupakan aplikasi untuk memprediksi arti dari gambar rambu-rambu lalu lintas yang ada di jalan raya. Perlu diketahui bahwa masih banyak masyarakat indonesia terutama di kalangan remaja yang baru pertama kali membawa kendaraan belum mengetahui tentang arti dari rambu lalu lintas yang ada di jalan raya. Arti dari rambu lalu lintas penting untuk diketahui untuk menjaga ketertiban jalan dan mencegah kecelakaan. Oleh karena itu kami membuat aplikasi ini untuk mempermudah masyarakat mencari arti dari rambu lalu lintas.
        </div>
    </div>
</section>
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="tim">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">Tim</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <img src="<?= base_url("assets/front/img/tim/ibnu.jpg") ?>" alt="" class="img-fluid rounded border-0 shadow-2">
                <p class="h4 mt-3">Ibnu Rizqia Ramadan</p>
                <p class="lead">Seorang mahasiswa dari kampus STMIK Bandung yang sedang belajar menjadi seorang Fullstack developer</p>
            </div>
            <div class="col-lg-4 me-auto">
                <img src="<?= base_url("assets/front/img/tim/vian.jpg") ?>" alt="" class="img-fluid rounded border-0 shadow-2">
                <p class="h4 mt-3">Nanda Vian N.</p>
                <p class="lead">Mahasiswa ITS yang sedang belajar di bidang Machine Learning</p>
            </div>
        </div>
        <!-- About Section Button-->
        <!-- <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                <i class="fas fa-download me-2"></i>
                Free Download!
            </a>
        </div> -->
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js'); ?>
<script src="<?= base_url("assets/front/js/scripts.js") ?>" defer></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js" defer></script>
<?= $this->endSection() ?>