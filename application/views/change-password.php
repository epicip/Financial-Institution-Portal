<?php include_once 'inc/header.php' ?>
<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
        <?php include_once 'inc/left-sidebar.php' ?>
        <div class="auth-wrapper auth-basic p-5  d-flex align-items-center justify-content-center">
             <div class="container-fluid px-0">

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="mb-5  border-bottom pb-3">
                            <h5 class="portal-section-title mb-1">Set Your New Password</h5>
                            <p class="text-muted mb-0">Create a new strong password for your account.</p>
                        </div>
                       <?php if ($this->session->flashdata('sErrMSG') != '') { ?>
                            <div class="alert alert-<?= html_escape($this->session->flashdata('sErrMSGType')) ?> alert-dismissible fade show page-alert" role="alert">
                                <?= html_escape($this->session->flashdata('sErrMSG')) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                        <form novalidate method="post" action="<?= base_url('users/change_password_process') ?>">
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="old_password" placeholder="**********" id="old_password">
                                    <span class="input-group-text password-toggle">
                                        <span class="close-eye password-eye">
                                            <svg width="22" height="10" viewBox="0 0 22 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 1C21 1 17 7 11 7C5 7 1 1 1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M14 6.5L15.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M19 4L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M1 6L3 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M8 6.5L6.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <span class="open-eye password-eye d-none">
                                            <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.544 7.04498C20.848 7.4713 21 7.68447 21 8C21 8.31553 20.848 8.52869 20.544 8.95501C19.1779 10.8706 15.6892 15 11 15C6.31078 15 2.8221 10.8706 1.45604 8.95502C1.15201 8.5287 1 8.31553 1 8C1 7.68447 1.15201 7.47131 1.45604 7.04499C2.8221 5.12944 6.31078 1 11 1C15.6892 1 19.1779 5.12944 20.544 7.04498Z" stroke="currentColor" stroke-width="1.5"></path>
                                                <path d="M14 8C14 6.34315 12.6569 5 11 5C9.34315 5 8 6.34315 8 8C8 9.65685 9.34315 11 11 11C12.6569 11 14 9.65685 14 8Z" stroke="currentColor" stroke-width="1.5"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="new_password" placeholder="**********" id="new_password">
                                    <span class="input-group-text password-toggle">
                                        <span class="close-eye password-eye">
                                            <svg width="22" height="10" viewBox="0 0 22 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 1C21 1 17 7 11 7C5 7 1 1 1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M14 6.5L15.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M19 4L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M1 6L3 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M8 6.5L6.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <span class="open-eye password-eye d-none">
                                            <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.544 7.04498C20.848 7.4713 21 7.68447 21 8C21 8.31553 20.848 8.52869 20.544 8.95501C19.1779 10.8706 15.6892 15 11 15C6.31078 15 2.8221 10.8706 1.45604 8.95502C1.15201 8.5287 1 8.31553 1 8C1 7.68447 1.15201 7.47131 1.45604 7.04499C2.8221 5.12944 6.31078 1 11 1C15.6892 1 19.1779 5.12944 20.544 7.04498Z" stroke="currentColor" stroke-width="1.5"></path>
                                                <path d="M14 8C14 6.34315 12.6569 5 11 5C9.34315 5 8 6.34315 8 8C8 9.65685 9.34315 11 11 11C12.6569 11 14 9.65685 14 8Z" stroke="currentColor" stroke-width="1.5"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="**********" id="confirm_password">
                                    <span class="input-group-text password-toggle">
                                        <span class="close-eye password-eye">
                                            <svg width="22" height="10" viewBox="0 0 22 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 1C21 1 17 7 11 7C5 7 1 1 1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M14 6.5L15.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M19 4L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M1 6L3 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M8 6.5L6.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <span class="open-eye password-eye d-none">
                                            <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.544 7.04498C20.848 7.4713 21 7.68447 21 8C21 8.31553 20.848 8.52869 20.544 8.95501C19.1779 10.8706 15.6892 15 11 15C6.31078 15 2.8221 10.8706 1.45604 8.95502C1.15201 8.5287 1 8.31553 1 8C1 7.68447 1.15201 7.47131 1.45604 7.04499C2.8221 5.12944 6.31078 1 11 1C15.6892 1 19.1779 5.12944 20.544 7.04498Z" stroke="currentColor" stroke-width="1.5"></path>
                                                <path d="M14 8C14 6.34315 12.6569 5 11 5C9.34315 5 8 6.34315 8 8C8 9.65685 9.34315 11 11 11C12.6569 11 14 9.65685 14 8Z" stroke="currentColor" stroke-width="1.5"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    Set New Password
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include_once 'inc/copyright.php' ?>
</div>
<?php include_once 'inc/footer.php' ?>