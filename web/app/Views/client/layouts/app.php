<!--
    =========================================================
    * Material Dashboard 2 - v3.0.0
    =========================================================
    
    * Product Page: https://www.creative-tim.com/product/material-dashboard
    * Copyright 2021 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://www.creative-tim.com/license)
    * Coded by Creative Tim
    
    =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?= $this->include('client/layouts/header'); ?>

<body class="g-sidenav-show  bg-gray-200">

    <?= $this->include('client/layouts/sidebar'); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->

        <?= $this->include('client/layouts/nav'); ?>

        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <!-- <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        hello
                    </div>
                </div>
            </div> -->

            <?= $this->renderSection('content'); ?>

        </div>

        <?= $this->include('client/layouts/footer'); ?>

    </main>
</body>

</html>