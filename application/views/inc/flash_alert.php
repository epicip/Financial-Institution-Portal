<?php if ($this->session->flashdata('sErrMSG') != '') { ?>
    <div class="alert alert-<?= html_escape($this->session->flashdata('sErrMSGType')) ?> page-alert">
        <button type="button" class="close"><span>x</span></button>
        <?= html_escape($this->session->flashdata('sErrMSG')) ?>
    </div>
<?php } ?>

