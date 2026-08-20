<?php include_once 'inc/header.php' ?>
<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
        <?php include_once 'inc/left-sidebar.php' ?>
        <div class="app-content-wrapper pt-13 pb-13 px-5">
            <div class="container-fluid">

                <div class="card shadow-custom rounded-custom mb-6 eachfinancial-ins">
                    <div class="card-body p-6">
                        <h5 class="portal-section-title mb-2">Change Password</h5>
                        <p class="text-muted mb-5">Each financial institution can have multiple logins.</p>

                        <div class="d-flex flex-column gap-3 mb-6">
                            <div class="portal-user-card">
                                <span class="portal-avatar">JB</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Joel Becker</h6>
                                    <span class="text-muted">joel.becker@epicip.com</span>
                                </div>
                                <div class="portal-password-wrap">
                                    <input type="password" class="form-control portal-password-input" value="EpicPass1" readonly aria-label="Password">
                                    <button type="button" class="portal-password-toggle" aria-label="Show password">
                                        <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94" />
                                            <path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19" />
                                            <path d="M14.12 14.12a3 3 0 1 1-4.24-4.24" />
                                            <line x1="1" y1="1" x2="23" y2="23" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        <path d="M10 11v6M14 11v6" />
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                    </svg>
                                    Remove
                                </button>
                            </div>
                            <div class="portal-user-card">
                                <span class="portal-avatar">HC</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Helen Carter</h6>
                                    <span class="text-muted">helen.carter@epicip.com</span>
                                </div>
                                <div class="portal-password-wrap">
                                    <input type="password" class="form-control portal-password-input" value="HelenPass2" readonly aria-label="Password">
                                    <button type="button" class="portal-password-toggle" aria-label="Show password">
                                        <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94" />
                                            <path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19" />
                                            <path d="M14.12 14.12a3 3 0 1 1-4.24-4.24" />
                                            <line x1="1" y1="1" x2="23" y2="23" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        <path d="M10 11v6M14 11v6" />
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                    </svg>
                                    Remove
                                </button>
                            </div>
                            <div class="portal-user-card">
                                <span class="portal-avatar">DS</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">David Singh</h6>
                                    <span class="text-muted">david.singh@epicip.com</span>
                                </div>
                                <div class="portal-password-wrap">
                                    <input type="password" class="form-control portal-password-input" value="DavidPass3" readonly aria-label="Password">
                                    <button type="button" class="portal-password-toggle" aria-label="Show password">
                                        <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94" />
                                            <path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19" />
                                            <path d="M14.12 14.12a3 3 0 1 1-4.24-4.24" />
                                            <line x1="1" y1="1" x2="23" y2="23" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
<?php include_once 'inc/footer.php' ?>