<script>
// From error-logger.blade.php
window.__ERROR_SERVICE__ = {
    enabled: <?= (ERROR_SERVICE_ENABLED || ERROR_SERVICE_FRONTEND_ENABLED) ? 'true' : 'false' ?>,
    endpoint: "<?= site_url('client-error') ?>"
};
</script>

<script src="<?= base_url('dist/js/error-logger.js') ?>" defer></script>