<?php include_once 'inc/header.php' ?>

<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">

        <?php include_once 'inc/left-sidebar.php' ?>

        <div class="app-content-wrapper pt-5 pb-5 px-5">
            <div class="container-fluid px-0">

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="mb-5  border-bottom pb-3">
                            <h5 class="portal-section-title mb-1">Pending Cases list</h5>
                            <p class="text-muted mb-0">Deceased personal details supplied for asset and liability search.</p>
                        </div>
                        <table id="casesTable" class="table align-middle portal-table mb-0 w-100">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium">Title</th>
                                    <th class="fw-medium">Forename</th>
                                    <th class="fw-medium">Middle Names</th>
                                    <th class="fw-medium">Surname</th>
                                    <th class="fw-medium">Alias</th>
                                    <th class="fw-medium">Date of Birth</th>
                                    <th class="fw-medium">Last known address</th>
                                    <th class="fw-medium">Previous Address</th>
                                    <th class="fw-medium">National Insurance Number</th>
                                    <th class="fw-medium">Further Details</th>
                                    <th class="fw-medium text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cases)) { ?>
                                    <?php foreach ($cases as $case) { ?>
                                        <tr>
                                            <td><?= $case->title ?></td>
                                            <td><?= $case->forename ?></td>
                                            <td><?= $case->middlename ?></td>
                                            <td><?= $case->surname ?></td>
                                            <td><?= $case->alias ?></td>
                                            <td><?= date('d M Y', strtotime($case->dob)) ?></td>
                                            <td><?= $case->deceased_address ?></td>
                                            <td><?= $case->address_history ?></td>
                                            <td><?= $case->ni_number ?></td>

                                            <td class="text-nowrap">
                                                <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
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
                                                    <button type="button" class="btn-case btn-case-none">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <path d="M15 9l-6 6M9 9l6 6" />
                                                        </svg>
                                                        No Records
                                                    </button>
                                                    <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
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
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="10" class="text-center">No cases found for this user</td>
                                    </tr>
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