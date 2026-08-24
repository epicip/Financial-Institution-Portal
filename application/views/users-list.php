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

                <div class="portal-hero">

                    <h2 class="fw-semibold fs-7 mb-2">User</h2>
                    <p class="mb-0">Manage portal logins and how often reminder emails are sent.</p>
                </div>

                <div class="card shadow-custom rounded-custom mb-6 eachfinancial-ins">
                    <div class="card-body p-6">
                        <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-2">
                            <div>
                                <h5 class="portal-section-title mb-2"><?= html_escape($institution_name ?? '') ?></h5>
                                <p class="text-muted mb-0">Each financial institution can have multiple logins.</p>
                            </div>
                            <button type="button" class="btn btn-portal d-inline-flex align-items-center" onclick="add_edit_user_form()">
                                <svg class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                                Add User
                            </button>
                        </div>

                        <div class="d-flex flex-column gap-3 mt-5">
                            <?php if (!empty($users)) { ?>
                                <?php foreach ($users as $user) { ?>
                                    <div class="portal-user-card">
                                        <span class="portal-avatar"><?= $user->type == 'admin' ? 'AD' : html_escape(strtoupper(substr($user->name, 0, 2))) ?></span>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0"><?= $user->type == 'admin' ? 'Admin' : html_escape($user->name ?? '') ?></h6>
                                            <span class="text-muted"><?= html_escape($user->email ?? '') ?></span>
                                        </div>
                                        <?php if ($user->type != 'admin') { ?>
                                            <span class="portal-status-badge is-<?= $user->status == 'Active' ? 'active' : 'inactive' ?>"><?= html_escape($user->status ?? '') ?></span>

                                            <div class="portal-user-actions">
                                                <button type="button" class="btn btn-sm btn-outline-portal portal-edit-btn" onclick="add_edit_user_form('<?= html_escape($user->user_id ?? '') ?>')">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                        <path d="M12 20h9" />
                                                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary portal-remove-btn" onclick="deleteUser('<?= html_escape($user->user_id ?? ($user->id ?? '')) ?>')">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                        <polyline points="3 6 5 6 21 6" />
                                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                        <path d="M10 11v6M14 11v6" />
                                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                                    </svg>
                                                    Remove
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="text-center">
                                    <p class="text-muted">No users found</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <h5 class="portal-section-title mb-2">Reminder emails</h5>
                        <p class="text-muted mb-5">Reminders are sent to all users.</p>

                        <form action="<?= base_url('users/update_reminder_emails') ?>" method="post">
                            <div class="mb-5">
                                <label class="form-label d-block mb-3">How often should reminders be sent?</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <label class="portal-choice" for="reminderWeekly">
                                        <input class="form-check-input me-2" type="radio" name="reminder" value="weekly" id="reminderWeekly" <?= $reminder->reminder == 'weekly' ? 'checked' : '' ?>>
                                        Weekly
                                    </label>
                                    <label class="portal-choice" for="reminderTwoWeekly">
                                        <input class="form-check-input me-2" type="radio" name="reminder" value="two_weekly" id="reminderTwoWeekly" <?= $reminder->reminder == 'two_weekly' ? 'checked' : '' ?>>
                                        Two weekly
                                    </label>
                                    <label class="portal-choice" for="reminderMonthly">
                                        <input class="form-check-input me-2" type="radio" name="reminder" value="monthly" id="reminderMonthly" <?= $reminder->reminder == 'monthly' ? 'checked' : '' ?>>
                                        Monthly
                                    </label>
                                    <label class="portal-choice" for="reminderQuarterly">
                                        <input class="form-check-input me-2" type="radio" name="reminder" value="quarterly" id="reminderQuarterly" <?= $reminder->reminder == 'quarterly' ? 'checked' : '' ?>>
                                        Quarterly
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-portal">Save settings</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>

        <?php include_once 'inc/copyright.php' ?>
    </div>
</div>

<!-- Add / Edit User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true"></div>

<?php include_once 'inc/footer.php' ?>

<script>
    function add_edit_user_form(user_id) {
        user_id = user_id || null;

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?= base_url('users/add_edit_user_form') ?>",
            data: {
                user_id: user_id
            },
            success: function(response) {
                var $modal = $('#addUserModal');
                $modal.html(response);

                var modalEl = document.getElementById('addUserModal');
                var modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                modalInstance.show();
            },
            error: function() {
                alert('Unable to load the user form. Please try again.');
            }
        });
    }
</script>

<script>
    function deleteUser(user_id) {
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: '<?= base_url('users/delete_user') ?>',
                type: 'POST',
                data: {
                    user_id: user_id
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function() {
                    alert('Unable to delete the user. Please try again.');
                }
            });
        }
    }
</script>