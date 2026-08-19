
    <?php include_once 'inc/header.php' ?>
    <div class="app-main">
        <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
            <?php include_once 'inc/left-sidebar.php' ?>
            <div class="app-content-wrapper pt-13 pb-13 px-5">
                <div class="container-fluid">
                    <div class="portal-hero">
                        <span class="portal-hero-kicker">Account</span>
                        <h2 class="fw-semibold fs-7 mb-2">User Settings</h2>
                        <p class="mb-0">Manage portal logins and how often reminder emails are sent.</p>
                    </div>

                    <div class="card shadow-custom rounded-custom mb-6 eachfinancial-ins">
                        <div class="card-body p-6">
                            <h5 class="portal-section-title mb-2">Administrations</h5>
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
                                            <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                            <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94"/><path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19"/><path d="M14.12 14.12a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
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
                                            <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                            <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94"/><path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19"/><path d="M14.12 14.12a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
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
                                            <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                            <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94"/><path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19"/><path d="M14.12 14.12a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <h6 class="fw-semibold mb-4">Add user</h6>
                            <div class="row g-4 align-items-end">
                                <div class="col-md-4">
                                    <label class="form-label" for="userName">Name</label>
                                    <input type="text" class="form-control" id="userName" placeholder="Full name">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="userEmail">Email Address</label>
                                    <input type="email" class="form-control" id="userEmail" placeholder="name@example.com">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="userPassword">Password</label>
                                    <div class="portal-password-wrap w-100">
                                        <input type="password" class="form-control portal-password-input" id="userPassword" placeholder="********">
                                        <button type="button" class="portal-password-toggle" aria-label="Show password">
                                            <svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                            <svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94"/><path d="M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.83 21.83 0 0 1-2.16 3.19"/><path d="M14.12 14.12a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-portal w-100">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-custom rounded-custom">
                        <div class="card-body p-6">
                            <h5 class="portal-section-title mb-2">Reminder emails</h5>
                            <p class="text-muted mb-5">Reminders are sent to all users from search@legalads.co.uk with a link to the portal login page.</p>

                            <div class="mb-5">
                                <label class="form-label d-block mb-3">How often should reminders be sent?</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <label class="portal-choice" for="reminderWeekly">
                                        <input class="form-check-input me-2" type="radio" name="reminderFrequency" id="reminderWeekly" checked>
                                        Weekly
                                    </label>
                                    <label class="portal-choice" for="reminderTwoWeekly">
                                        <input class="form-check-input me-2" type="radio" name="reminderFrequency" id="reminderTwoWeekly">
                                        Two weekly
                                    </label>
                                    <label class="portal-choice" for="reminderMonthly">
                                        <input class="form-check-input me-2" type="radio" name="reminderFrequency" id="reminderMonthly">
                                        Monthly
                                    </label>
                                    <label class="portal-choice" for="reminderQuarterly">
                                        <input class="form-check-input me-2" type="radio" name="reminderFrequency" id="reminderQuarterly">
                                        Quarterly
                                    </label>
                                </div>
                            </div>

                            <div class="portal-email-preview mb-5">
                                <div class="portal-detail-label">Email preview</div>
                                <p class="mb-1 fw-semibold">From: search@legalads.co.uk</p>
                                <p class="mb-1">Just a reminder that there are X cases in the portal pending your review.</p>
                                <p class="mb-0"><a href="login.html">Portal login page</a></p>
                            </div>

                            <button type="button" class="btn btn-portal">Save settings</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="app-footer mt-auto py-3 text-center">
                <div class="container">
                    <span class="text-muted">Copyright © <span id="footer-year"></span> EPIC Investment Partners</span>
                </div>
            </footer>
            <div class="app-backdrop"></div>
        </div>
    </div>
<?php include_once 'inc/footer.php' ?>