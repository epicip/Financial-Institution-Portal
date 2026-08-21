<?php include_once 'inc/header.php' ?>

<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">

        <?php include_once 'inc/left-sidebar.php' ?>

        <div class="app-content-wrapper pt-13 pb-13 px-5">
            <div class="container-fluid">

                <?php if ($this->session->flashdata('sErrMSG') != '') { ?>
                    <div class="alert alert-<?= html_escape($this->session->flashdata('sErrMSGType')) ?> alert-dismissible fade show page-alert" role="alert">
                        <?= html_escape($this->session->flashdata('sErrMSG')) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="portal-hero d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div class="d-flex align-items-center gap-4">
                        <span class="portal-avatar portal-avatar-lg"></span>
                        <div>
                            <span class="portal-hero-kicker">Further details</span>
                            <h2 class="fw-semibold fs-7 mb-2"><?= $data->title ?> <?= $data->forename ?> <?= $data->middle ?> <?= $data->surname ?></h2>
                            <p class="mb-0">Deceased personal details and asset &amp; liability search.</p>
                        </div>
                    </div>
                    <div class="portal-actions">
                        <button type="button" class="btn btn-outline-light">No Records</button>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">Records Found</button>
                    </div>
                </div>

                <div class="card shadow-custom rounded-custom mb-6">
                    <div class="card-body p-6">
                        <h5 class="portal-section-title mb-5">Deceased Personal Details <span class="portal-section-note">(Establish identity of deceased)</span></h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedForename">Forename <span class="text-danger">*</span></label>
                                <input class="form-control portal-readonly" id="deceasedForename" type="text" value="James" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedMiddle">Middle Name</label>
                                <input class="form-control portal-readonly" id="deceasedMiddle" type="text" value="Edward" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedSurname">Surname <span class="text-danger">*</span></label>
                                <input class="form-control portal-readonly" id="deceasedSurname" type="text" value="Whitaker" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedTitle">Title</label>
                                <input class="form-control portal-readonly" id="deceasedTitle" type="text" value="Mr" readonly>
                            </div>
                            <div class="col-12">
                                <label class="portal-form-label">Alias (Please state if “also known as” or “previously known as”.)</label>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <input class="form-control portal-readonly" type="text" value="Mr" aria-label="Alias title" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control portal-readonly" type="text" value="Jim" aria-label="Alias forename" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control portal-readonly" type="text" value="" placeholder="Middle Names" aria-label="Alias middle names" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control portal-readonly" type="text" value="Whitaker" aria-label="Alias surname" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedDob">Date of Birth <span class="text-danger">*</span></label>
                                <input class="form-control portal-readonly" id="deceasedDob" type="text" value="12 March 1948" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedDod">Date of Death <span class="text-danger">*</span></label>
                                <input class="form-control portal-readonly" id="deceasedDod" type="text" value="03 February 2026" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedGender">Gender</label>
                                <input class="form-control portal-readonly" id="deceasedGender" type="text" value="Male" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedMarital">Marital Status</label>
                                <input class="form-control portal-readonly" id="deceasedMarital" type="text" value="Widowed" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedOccupation">Occupation</label>
                                <input class="form-control portal-readonly" id="deceasedOccupation" type="text" value="Retired engineer" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedPob">Place of Birth</label>
                                <input class="form-control portal-readonly" id="deceasedPob" type="text" value="York, England" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedPod">Place of Death</label>
                                <input class="form-control portal-readonly" id="deceasedPod" type="text" value="Leeds General Infirmary" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedPostcode">Deceased Address Postcode <span class="text-danger">*</span></label>
                                <input class="form-control portal-readonly" id="deceasedPostcode" type="text" value="LS2 8HD" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedAddress">Deceased Address <span class="text-danger">*</span></label>
                                <textarea class="form-control portal-readonly" id="deceasedAddress" rows="3" readonly>14 Church Lane, Leeds, LS2 8HD</textarea>
                                <div class="portal-helper">If there is more than one address please include a connective, such as previously of, formerly of etc.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="deceasedPrevious">Previous Address</label>
                                <textarea class="form-control portal-readonly" id="deceasedPrevious" rows="3" readonly>9 Albert Street, York, YO1 6JT</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <h5 class="portal-section-title mb-5">Asset &amp; Liability Search</h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="portal-form-label" for="assetNi">National Insurance (“NI”) Number</label>
                                <input class="form-control portal-readonly" id="assetNi" type="text" value="QQ 12 34 56 C" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="portal-form-label" for="assetOccupation">Previous Occupations</label>
                                <input class="form-control portal-readonly" id="assetOccupation" type="text" value="Retired engineer, previously British Rail" readonly>
                            </div>
                            <div class="col-12">
                                <label class="portal-form-label" for="assetHistory">Address History (list all known previous addresses) <span class="text-danger">*</span></label>
                                <textarea class="form-control portal-readonly" id="assetHistory" rows="4" readonly>14 Church Lane, Leeds, LS2 8HD
previously of 9 Albert Street, York, YO1 6JT</textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="portal-file-row">
                                    <span class="portal-form-label mb-0">Letter of Authority <span class="text-danger">*</span></span>
                                    <a class="portal-file-link" href="#" target="_blank" rel="noopener">Show Uploaded File</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portal-file-row">
                                    <span class="portal-form-label mb-0">Death Certificate <span class="text-danger">*</span></span>
                                    <a class="portal-file-link" href="#" target="_blank" rel="noopener">Show Uploaded File</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'inc/copyright.php' ?>
    </div>
</div>

<?php include_once 'inc/footer.php' ?>