<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password | LegalAds Advertisement Agency</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" type="image/png">

    <!-- global style sheet for all pages -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="login-page">
    <?php if ($this->session->flashdata('sErrMSG') != '') { ?>
        <div class="alert alert-<?= $this->session->flashdata('sErrMSGType') ?> page-alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            <?= $this->session->flashdata('sErrMSG') ?>
        </div>
    <?php } ?>

    <div class="auth-wrapper auth-cover min-vh-100 d-flex align-items-center justify-content-center">
        <span class="login-orb login-orb-1"></span>
        <span class="login-orb login-orb-2"></span>
        <span class="login-orb login-orb-3"></span>

        <div class="auth-card">
            <div class="login-card-inner">
                <div class="mb-6 text-center">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <img class="app-main-logo logo-black" src="assets/img/logo/epic-logo.svg" alt="EPIC Investment Partners">
                    </div>
                    <span class="login-kicker">
                        <span class="login-kicker-dot"></span>
                        Account recovery
                    </span>
                    <h4 class="login-title mb-1">Forgot password</h4>
                    <p class="login-subtitle">Enter your email address and we will send you a new password.</p>
                </div>

                <form id="forgotPasswordForm" action="<?= base_url('forgot-password-process') ?>" method="post">
                    <input type="hidden" name="token" id="token" value="">
                    <div class="login-field mb-5">
                        <label for="forgotEmail" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <div class="login-field-control">
                            <svg class="login-field-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M4 6.75h16A1.25 1.25 0 0 1 21.25 8v8A1.25 1.25 0 0 1 20 17.25H4A1.25 1.25 0 0 1 2.75 16V8A1.25 1.25 0 0 1 4 6.75Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="m3.5 8 8.05 5.2a1 1 0 0 0 1.1 0L20.5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="email" class="form-control" id="forgotEmail" name="email_id" placeholder="name@example.com" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send new password</button>
                </form>

                <div class="text-center">
                    <a href="<?= base_url() ?>login" class="login-back">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M10 3.5 5.5 8 10 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- global js scripts for all pages -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/perfect-scrollbar.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Ld-YakaAAAAAO4HAQzTpECYGe5M0hj4Pqr9UFo-"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Ld-YakaAAAAAO4HAQzTpECYGe5M0hj4Pqr9UFo-', {
                action: 'userLogin'
            }).then(function(token) {
                document.getElementById("token").value = token;
            });
        });
    </script>

</body>

</html>