<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | EPIC Investment Partners</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" type="image/png">

    <!-- global style sheet for all pages -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="login-page">


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
                        Secure portal
                    </span>
                    <h4 class="login-title mb-1">Welcome back</h4>
                    <p class="login-subtitle">Sign in with your email address and password.</p>
                </div>

                <form method="post" novalidate action="<?= base_url() ?>users/login_process">
                    <div class="login-field mb-4">
                        <label for="loginEmail" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <div class="login-field-control">
                            <svg class="login-field-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M4 6.75h16A1.25 1.25 0 0 1 21.25 8v8A1.25 1.25 0 0 1 20 17.25H4A1.25 1.25 0 0 1 2.75 16V8A1.25 1.25 0 0 1 4 6.75Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="m3.5 8 8.05 5.2a1 1 0 0 0 1.1 0L20.5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="email" class="form-control" id="loginEmail" name="email_id" placeholder="name@example.com" required>
                        </div>
                    </div>

                    <div class="login-field mb-3">
                        <label for="loginPassword" class="form-label">Password <span class="text-danger">*</span></label>
                        <div class="login-field-control">
                            <svg class="login-field-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M7.5 10.5V8.25a4.5 4.5 0 1 1 9 0V10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <rect x="5.25" y="10.5" width="13.5" height="9" rx="2" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                            <input type="password" class="form-control pe-5" placeholder="**********" id="loginPassword" type="password" required>
                            <span class="password-toggle" role="button" tabindex="0" aria-label="Show password">
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

                    <div class="d-flex justify-content-end mb-5">
                        <a href="<?= base_url() ?>forgot-password" class="login-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- global js scripts for all pages -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/perfect-scrollbar.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Ld-YakaAAAAAO4HAQzTpECYGe5M0hj4Pqr9UFo-', {
                action: 'userLogin'
            }).then(function(token) {
                // console.log(token);
                document.getElementById("token").value = token;
            });
        });
    </script>

</body>

</html>