<?php include_once 'inc/header.php' ?>

<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">

        <?php include_once 'inc/left-sidebar.php' ?>

        <div class="app-content-wrapper pt-5 pb-5 px-5">
            <div class="container-fluid px-0">

                <?php if ($this->session->flashdata('sErrMSG') != '') { ?>
                    <div class="alert alert-<?= html_escape($this->session->flashdata('sErrMSGType')) ?> alert-dismissible fade show page-alert" role="alert">
                        <?= html_escape($this->session->flashdata('sErrMSG')) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="mb-5 border-bottom pb-3">
                            <h5 class="portal-section-title mb-1">All Cases List</h5>
                            <p class="text-muted mb-0">Personal details supplied for asset and liability search.</p>
                        </div>
                        <table id="casesTable" class="table align-middle portal-table mb-0 w-100">
                            <thead class="table-light">
                                <tr style="border-left: 5px solid #F6F6F9;">
                                    <th class="fw-medium">Title</th>
                                    <th class="fw-medium">Forename</th>
                                    <th class="fw-medium">Middle Names</th>
                                    <th class="fw-medium">Surname</th>
                                    <th class="fw-medium">Date of Birth</th>
                                    <th class="fw-medium">Last known address</th>
                                    <th class="fw-medium">Further Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cases)) { ?>
                                    <?php foreach ($cases as $case) { ?>
                                        <?php
                                        $services = explode(',', $case->services ?? '');
                                        $color = in_array('51', $services, true) ? '#64c3d1' : '#9785c2';
                                        ?>

                                        <tr style="border-left: 5px solid <?= $color; ?>;">
                                            <td><?= $case->title ?></td>
                                            <td><?= $case->forename ?></td>
                                            <td><?= $case->middlename ?></td>
                                            <td><?= $case->surname ?></td>
                                            <td><?= date('d M Y', strtotime($case->dob)) ?></td>
                                            <td><?= $case->deceased_address ?></td>

                                            <td class="text-nowrap">
                                                <a href="<?= base_url('case-details/' . $case->caseId) ?>" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                        <polyline points="15 3 21 3 21 9" />
                                                        <line x1="10" y1="14" x2="21" y2="3" />
                                                    </svg>
                                                    Details
                                                </a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'inc/copyright.php' ?>
    </div>
    <?php include_once 'inc/footer.php' ?>