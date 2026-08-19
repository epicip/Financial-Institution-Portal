<?php if ($this->session->flashdata('sErrMSG') != '') { ?>
    <div class="alert alert-<?= html_escape($this->session->flashdata('sErrMSGType')) ?> alert-wth-icon alert-dismissible fade show" role="alert">
        <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>
        <?= html_escape($this->session->flashdata('sErrMSG')) ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
    </div>
<?php } ?>