<!--   Core JS Files   -->
<script src="<?= base_url() ?>/assets/client/assets/js/core/popper.min.js" defer></script>
<script src="<?= base_url() ?>/assets/client/assets/js/core/bootstrap.min.js" defer></script>
<script src="<?= base_url() ?>/assets/client/assets/js/plugins/perfect-scrollbar.min.js" defer></script>
<script src="<?= base_url() ?>/assets/client/assets/js/plugins/smooth-scrollbar.min.js" defer></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js" defer></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url() ?>/assets/client/assets/js/material-dashboard.min.js?v=3.0.0" defer></script>

<div id="customJsNa">
    <?= $this->renderSection('js'); ?>
</div>