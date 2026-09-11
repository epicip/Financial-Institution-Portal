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

                <?php if (!empty($pending_cases)) { ?>
                    <div class="portal-hero d-flex align-items-center justify-content-between flex-wrap gap-4">
                        <div>
                            <!-- <span class="portal-hero-kicker">Asset search portal</span> -->
                            <h2 class="fw-semibold fs-7 mb-2">Pending Cases </h2>
                            <p class="mb-0">Review pending Court of Protection and Asset & Liability cases and confirm whether records are held.</p>
                        </div>
                        <div class="portal-hero-badge"><?= !empty($pending_cases) ? count($pending_cases) : 0 ?> awaiting review</div>
                    </div>
                <?php } ?>

                <div class="row g-3 row-cols-xxl-3 row-cols-lg-3 row-cols-md-2 row-cols-1 mb-5">
                    <div class="col">
                        <div class="card shadow-custom rounded-custom">
                            <div class="card-body p-3 position-relative">
                                <div class="btn-icon bg-label-primary rounded-pill btn-lg mb-3">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.9508 10.5399C7.5008 10.5399 4.58984 11.1037 4.58984 13.2794C4.58984 15.4561 7.5196 16 10.9508 16C14.4008 16 17.3117 15.4362 17.3117 13.2605C17.3117 11.0839 14.382 10.5399 10.9508 10.5399Z" fill="currentColor" />
                                        <path opacity="0.4" d="M10.9476 8.46703C13.2837 8.46703 15.1569 6.58307 15.1569 4.23351C15.1569 1.88306 13.2837 0 10.9476 0C8.61146 0 6.73828 1.88306 6.73828 4.23351C6.73828 6.58307 8.61146 8.46703 10.9476 8.46703Z" fill="currentColor" />
                                        <path opacity="0.4" d="M20.0886 5.21926C20.693 2.84179 18.9209 0.706573 16.6645 0.706573C16.4192 0.706573 16.1846 0.73359 15.9554 0.779519C15.9249 0.786723 15.8909 0.802032 15.873 0.829049C15.8524 0.86327 15.8676 0.909199 15.89 0.938917C16.5678 1.89531 16.9573 3.05973 16.9573 4.3097C16.9573 5.50744 16.6001 6.62413 15.9733 7.5508C15.9088 7.64626 15.9661 7.77504 16.0798 7.79485C16.2374 7.82277 16.3986 7.83718 16.5634 7.84168C18.2064 7.88491 19.6811 6.82135 20.0886 5.21926Z" fill="currentColor" />
                                        <path d="M21.8094 10.8169C21.5086 10.1721 20.7824 9.72996 19.6783 9.51292C19.1572 9.38504 17.747 9.20493 16.4352 9.22925C16.4155 9.23195 16.4048 9.24546 16.403 9.25446C16.4003 9.26707 16.4057 9.28868 16.4316 9.30219C17.0378 9.60388 19.3811 10.916 19.0865 13.6834C19.074 13.8032 19.1698 13.9067 19.2888 13.8887C19.8655 13.8059 21.3492 13.4853 21.8094 12.4866C22.0637 11.9588 22.0637 11.3456 21.8094 10.8169Z" fill="currentColor" />
                                        <path opacity="0.4" d="M6.04508 0.779793C5.81675 0.732964 5.58126 0.706848 5.33592 0.706848C3.0795 0.706848 1.3075 2.84207 1.91279 5.21953C2.31931 6.82162 3.79403 7.88518 5.4371 7.84195C5.60185 7.83745 5.76392 7.82214 5.92062 7.79513C6.03433 7.77531 6.09164 7.64653 6.02717 7.55107C5.40039 6.6235 5.04312 5.50771 5.04312 4.30997C5.04312 3.0591 5.43352 1.89468 6.11134 0.939192C6.13283 0.909473 6.14894 0.863545 6.12745 0.829324C6.10954 0.801407 6.07641 0.786998 6.04508 0.779793Z" fill="currentColor" />
                                        <path d="M2.32156 9.51267C1.21752 9.7297 0.492248 10.1719 0.191392 10.8167C-0.0637974 11.3453 -0.0637974 11.9586 0.191392 12.4872C0.651629 13.485 2.13531 13.8065 2.71195 13.8885C2.83104 13.9065 2.92595 13.8038 2.91342 13.6831C2.61883 10.9166 4.9621 9.60453 5.56918 9.30284C5.59425 9.28843 5.59962 9.26772 5.59694 9.25421C5.59515 9.2452 5.5853 9.2317 5.5656 9.22989C4.25294 9.20468 2.84358 9.38479 2.32156 9.51267Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <span class="fz-12px fw-medium d-block">Pending Cases</span>
                                <h3 class="h6 fs-9 mb-0"><?= sprintf('%02d', !empty($pending_cases) ? count($pending_cases) : 0) ?></h3>

                                <div class="position-absolute top-9 end-3 p-1">
                                    <img src="assets/img/icons/dashboard/chart-up.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-custom rounded-custom">
                            <div class="card-body p-3 position-relative">
                                <div class="btn-icon bg-label-warning rounded-pill btn-lg mb-3">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.3721 16.7442H0.627907C0.284651 16.7442 0 16.4595 0 16.1162C0 15.773 0.284651 15.4883 0.627907 15.4883H17.3721C17.7153 15.4883 18 15.773 18 16.1162C18 16.4595 17.7153 16.7442 17.3721 16.7442Z" fill="currentColor" />
                                        <path d="M7.11719 1.67442V16.7442H10.8846V1.67442C10.8846 0.753488 10.5079 0 9.37765 0H8.62416C7.49393 0 7.11719 0.753488 7.11719 1.67442Z" fill="currentColor" />
                                        <path opacity="0.4" d="M1.46484 6.6977V16.7442H4.81368V6.6977C4.81368 5.77677 4.4788 5.02328 3.47415 5.02328H2.80438C1.79973 5.02328 1.46484 5.77677 1.46484 6.6977Z" fill="currentColor" />
                                        <path opacity="0.4" d="M13.1875 10.8838V16.7442H16.5363V10.8838C16.5363 9.96284 16.2015 9.20935 15.1968 9.20935H14.527C13.5224 9.20935 13.1875 9.96284 13.1875 10.8838Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <span class="fz-12px fw-medium d-block">All Cases</span>
                                <h3 class="h6 fs-9 mb-0"><?= sprintf('%02d', !empty($all_cases) ? count($all_cases) : 0) ?></h3>

                                <div class="position-absolute top-9 end-3 p-1">
                                    <img src="assets/img/icons/dashboard/chart-up.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-custom rounded-custom">
                            <div class="card-body p-3 position-relative">
                                <div class="btn-icon bg-label-success rounded-pill btn-lg mb-3">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M4.88256 14.9003C5.62898 14.9003 6.2405 15.5118 6.2405 16.2672C6.2405 17.0137 5.62898 17.6252 4.88256 17.6252C4.12715 17.6252 3.51562 17.0137 3.51562 16.2672C3.51562 15.5118 4.12715 14.9003 4.88256 14.9003ZM14.9997 14.9003C15.7461 14.9003 16.3576 15.5118 16.3576 16.2672C16.3576 17.0137 15.7461 17.6252 14.9997 17.6252C14.2443 17.6252 13.6327 17.0137 13.6327 16.2672C13.6327 15.5118 14.2443 14.9003 14.9997 14.9003Z" fill="currentColor" />
                                        <path d="M0.792051 0.0074916L2.93688 0.331239C3.24264 0.386097 3.46747 0.637001 3.49444 0.942763L3.66531 2.95719C3.69229 3.24587 3.92611 3.4617 4.21388 3.4617H16.3589C16.9075 3.4617 17.2672 3.65055 17.6269 4.06423C17.9867 4.47791 18.0496 5.07145 17.9687 5.61013L17.1143 11.5095C16.9525 12.6435 15.9812 13.479 14.8391 13.479H5.02775C3.83168 13.479 2.84245 12.5617 2.74353 11.3755L1.91617 1.57227L0.558233 1.33845C0.198513 1.2755 -0.0532905 0.924777 0.0096604 0.565057C0.0726113 0.196344 0.423338 -0.0464664 0.792051 0.0074916ZM13.4002 6.78821H10.9092C10.5315 6.78821 10.2347 7.08498 10.2347 7.46268C10.2347 7.83139 10.5315 8.13716 10.9092 8.13716H13.4002C13.7779 8.13716 14.0747 7.83139 14.0747 7.46268C14.0747 7.08498 13.7779 6.78821 13.4002 6.78821Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <span class="fz-12px fw-medium d-block">Users</span>
                                <h3 class="h6 fs-9 mb-0"><?= sprintf('%02d', !empty($users) ? count($users) : 0) ?></h3>

                                <div class="position-absolute top-9 end-3 p-1">
                                    <img src="assets/img/icons/dashboard/chart-down.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="case-list-heading mb-5">
                            <div>
                                <h5 class="portal-section-title mb-1">Pending Case list</h5>
                                <p class="text-muted mb-0">Personal details supplied for asset and liability search.</p>
                            </div>
                            <div class="case-type-legend" aria-label="Order type colour legend">
                                <span class="case-type-legend-label">Order Type:</span>
                                <span class="case-type-legend-item case-type-protection">
                                    <span class="case-type-legend-dot" aria-hidden="true"></span>
                                    Court of Protection
                                </span>
                                <span class="case-type-legend-item case-type-estate">
                                    <span class="case-type-legend-dot" aria-hidden="true"></span>
                                    Asset &amp; Liability
                                </span>
                            </div>
                        </div>
                        <table id="casesTable" class="table align-middle portal-table mb-0 w-100">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium">Title</th>
                                    <th class="fw-medium">Forename</th>
                                    <th class="fw-medium">Middle Names</th>
                                    <th class="fw-medium">Surname</th>
                                    <th class="fw-medium">Date of Birth</th>
                                    <th class="fw-medium">Last known address</th>
                                    <th class="fw-medium">Further Details</th>
                                    <th class="fw-medium text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pending_cases)) { ?>
                                    <?php foreach ($pending_cases as $case) { ?>
                                        <?php
                                        $services = explode(',', $case->services ?? '');
                                        $is_protection_order = in_array('51', $services, true);
                                        $case_type_class = $is_protection_order ? 'case-type-protection' : 'case-type-estate';
                                        ?>

                                        <tr class="<?= $case_type_class; ?>">
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

                                            <td class="text-nowrap">
                                                <div class="portal-actions">
                                                    <button type="button" class="btn-case btn-case-none" onclick="noMatchFound('<?= html_escape($case->log_id ?? '') ?>')">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <path d="M15 9l-6 6M9 9l6 6" />
                                                        </svg>
                                                        No Records
                                                    </button>
                                                    <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal" onclick="matchFound('<?= html_escape($case->log_id ?? '') ?>')">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <path d="M8 12l3 3 5-6" />
                                                        </svg>
                                                        Records Found
                                                    </button>
                                                </div>
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
</div>

<?php include_once 'inc/footer.php' ?>