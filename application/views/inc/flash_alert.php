<?php if ($this->session->flashdata('sErrMSG') != '') { ?>
    <div class="alert alert-<?= html_escape($this->session->flashdata('sErrMSGType')) ?> alert-dismissible fade show page-alert" role="alert">
        <?= html_escape($this->session->flashdata('sErrMSG')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
