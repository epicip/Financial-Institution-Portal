<?php
$is_edit = !empty($data);
$user = $is_edit ? $data : null;
$status = strtolower((string) ($user->status ?? 'active'));
?>
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content portal-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel"><?= $is_edit ? 'Edit User' : 'Add User' ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="<?= base_url('users/insert_update_user') ?>" action="javascript:void(0);">
            <input type="hidden" name="user_id" value="<?= html_escape($user->user_id ?? '') ?>">
            <div class="modal-body">
                <p class="text-muted mb-4"><?= $is_edit ? 'Update this portal login.' : 'Create a new portal login for this financial institution.' ?></p>
                <div class="mb-4">
                    <label class="form-label" for="userName">Name</label>
                    <input type="text" class="form-control" id="userName" name="name" placeholder="Full name" value="<?= html_escape($user->name ?? '') ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="userEmail">Email Address</label>
                    <input type="email" class="form-control" id="userEmail" name="email" placeholder="name@example.com" value="<?= html_escape($user->email ?? '') ?>" required>
                </div>
                <div class="mb-0">
                    <label class="form-label" for="userStatus">Status</label>
                    <select class="form-select" id="userStatus" name="status" required>
                        <option value="active" <?= $status === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $status === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-portal"><?= $is_edit ? 'Save Changes' : 'Add User' ?></button>
            </div>
        </form>
    </div>
</div>