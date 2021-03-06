<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="<?= base_url() ?>/assets/front/img/icon.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main" style="height: auto">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white <?= ($menu ?? '') == "dashboard" ? 'active bg-primary' : '' ?>" href="<?= base_url(MEMBER_PATH) ?>/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dasbor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="./pages/tables.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Belajar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= ($menu ?? '') == "scan" ? 'active bg-primary' : '' ?>" href="<?= base_url(MEMBER_PATH) ?>/scan">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">photo_camera</i>
                    </div>
                    <span class="nav-link-text ms-1">Pindai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="./pages/virtual-reality.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">quiz</i>
                    </div>
                    <span class="nav-link-text ms-1">Kuis</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="./pages/rtl.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
        </ul>
    </div>
</aside>