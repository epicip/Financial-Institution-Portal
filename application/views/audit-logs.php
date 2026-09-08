<?php
$audit_log_ready = $audit_log_ready ?? false;
$audit_logs = $audit_logs ?? array();
include_once 'inc/header.php';
?>

<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
        <?php include_once 'inc/left-sidebar.php' ?>

        <div class="app-content-wrapper pt-5 pb-5 px-5">
            <div class="container-fluid px-0">
                <div class="portal-hero">
                    <h2 class="fw-semibold fs-7 mb-2">Audit logs</h2>
                    <p class="mb-0">Review portal user creation and case match decisions.</p>
                </div>

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="mb-5 border-bottom pb-3">
                            <h5 class="portal-section-title mb-1">Activity</h5>
                            <p class="text-muted mb-0">Only administrators in this institution can view these records.</p>
                        </div>

                        <div class="table-responsive">
                            <table id="auditLogsTable" class="table align-middle portal-table mb-0 w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th class="fw-medium">Date and time</th>
                                        <th class="fw-medium">User</th>
                                        <th class="fw-medium">Role</th>
                                        <th class="fw-medium">Action</th>
                                        <th class="fw-medium">Record</th>
                                        <th class="fw-medium">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($audit_logs as $log) { ?>
                                        <?php
                                        $action_labels = array(
                                            'case_match' => 'Match',
                                            'case_no_match' => 'No match',
                                            'user_created' => 'User created',
                                        );
                                        $action_label = $action_labels[$log->action] ?? ucwords(str_replace('_', ' ', $log->action));
                                        ?>
                                        <tr>
                                            <td data-order="<?= html_escape($log->created_at) ?>" class="text-nowrap">
                                                <?= html_escape(date('d M Y H:i', strtotime($log->created_at))) ?>
                                            </td>
                                            <td><?= html_escape($log->actor_name ?: 'Unknown user') ?></td>
                                            <td><?= html_escape(ucfirst($log->actor_type ?: 'unknown')) ?></td>
                                            <td><span class="portal-status-badge is-active"><?= html_escape($action_label) ?></span></td>
                                            <td><?= html_escape(ucfirst($log->entity_type) . ' #' . $log->entity_id) ?></td>
                                            <td><?= html_escape($log->description) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'inc/copyright.php' ?>
    </div>
</div>

<?php include_once 'inc/footer.php' ?>

<script>
    $(function() {
        $('#auditLogsTable').DataTable({
            pageLength: 25,
            order: [[0, 'desc']],
            language: {
                search: '',
                searchPlaceholder: 'Search audit logs',
                lengthMenu: 'Show _MENU_ logs',
                info: 'Showing _START_ to _END_ of _TOTAL_ logs',
                infoEmpty: 'No audit logs to show',
                emptyTable: 'No audit activity has been recorded yet'
            }
        });
    });
</script>
