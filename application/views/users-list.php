<?php include_once 'inc/header.php' ?>
<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
        <?php include_once 'inc/left-sidebar.php' ?>
        <div class="app-content-wrapper pt-5 pb-5 px-5">
            <div class="container-fluid px-0">
                <div class="portal-hero">
                  
                    <h2 class="fw-semibold fs-7 mb-2">User</h2>
                    <p class="mb-0">Manage portal logins and how often reminder emails are sent.</p>
                </div>

                <div class="card shadow-custom rounded-custom mb-0 eachfinancial-ins">
                    <div class="card-body p-6">
                        <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-2">
                            <div>
                                <h5 class="portal-section-title mb-2">Administrations</h5>
                                <p class="text-muted mb-0">Each financial institution can have multiple logins.</p>
                            </div>
                            <button type="button" class="btn btn-portal d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                <svg class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                                Add User
                            </button>
                        </div>

                        <div class="d-flex flex-column gap-3 mt-5">
                            <div class="portal-user-card">
                                <span class="portal-avatar">JB</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Joel Becker</h6>
                                    <span class="text-muted">joel.becker@epicip.com</span>
                                </div>
                                <span class="portal-status-badge is-active">Active</span>
                                <div class="portal-user-actions">
                                    <button type="button" class="btn btn-sm btn-outline-portal portal-edit-btn" data-bs-toggle="modal" data-bs-target="#editUserModal" data-name="Joel Becker" data-email="joel.becker@epicip.com" data-status="active">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                            <path d="M10 11v6M14 11v6" />
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                        </svg>
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="portal-user-card">
                                <span class="portal-avatar">HC</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Helen Carter</h6>
                                    <span class="text-muted">helen.carter@epicip.com</span>
                                </div>
                                <span class="portal-status-badge is-active">Active</span>
                                <div class="portal-user-actions">
                                    <button type="button" class="btn btn-sm btn-outline-portal portal-edit-btn" data-bs-toggle="modal" data-bs-target="#editUserModal" data-name="Helen Carter" data-email="helen.carter@epicip.com" data-status="active">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                            <path d="M10 11v6M14 11v6" />
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                        </svg>
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="portal-user-card">
                                <span class="portal-avatar">DS</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">David Singh</h6>
                                    <span class="text-muted">david.singh@epicip.com</span>
                                </div>
                                <span class="portal-status-badge is-inactive">Inactive</span>
                                <div class="portal-user-actions">
                                    <button type="button" class="btn btn-sm btn-outline-portal portal-edit-btn" data-bs-toggle="modal" data-bs-target="#editUserModal" data-name="David Singh" data-email="david.singh@epicip.com" data-status="inactive">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                            <path d="M10 11v6M14 11v6" />
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                        </svg>
                                        Remove
                                    </button>
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

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content portal-modal">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <p class="text-muted mb-0">Create a new portal login for this financial institution.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label" for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Full name" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="userEmail">Email Address</label>
                        <input type="email" class="form-control" id="userEmail" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label" for="userStatus">Status</label>
                        <select class="form-select" id="userStatus" name="status" required>
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-portal">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content portal-modal">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                     <p class="text-muted mb-0">Update this portal login details.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" action="javascript:void(0);">
                <div class="modal-body">
                   
                    <div class="mb-4">
                        <label class="form-label" for="editUserName">Name</label>
                        <input type="text" class="form-control" id="editUserName" name="name" placeholder="Full name" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="editUserEmail">Email Address</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label" for="editUserStatus">Status</label>
                        <select class="form-select" id="editUserStatus" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-portal">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'inc/footer.php' ?>
