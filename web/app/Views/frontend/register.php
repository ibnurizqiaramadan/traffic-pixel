<?= $this->include('frontend/layouts/header'); ?>

<style>
    body {
        background: #2C3E50
    }
</style>

<main class="container flex">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white shadow" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 pb-0">

                                <h2 class="fw-bold mb-2 text-uppercase">Daftar</h2>
                                <p class="text-white mb-5">Masukan Email dan Kata Sandi!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Email" />
                                    <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Kata Sandi" />
                                    <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                                </div>

                                <!-- <p class="small mb-4 pb-lg-2"><a class="text-white" href="#!">Lupa Kata Sandi?</a></p> -->

                                <button class="btn btn-outline-light btn-lg px-5 mt-4 pb-lg-2" type="submit">Daftar</button>

                            </div>

                            <div>
                                <p class="mb-0">Sudah punya akun? <a href="<?= base_url("login") ?>" class="text-white-50 fw-bold">Login</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>