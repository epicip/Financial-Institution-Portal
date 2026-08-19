 <div class="modal fade" id="recordsFoundModal" tabindex="-1" aria-labelledby="recordsFoundModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recordsFoundModalLabel">Records Found</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Enter the details of the assets found for this case.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label" for="assetType">Asset type</label>
                            <select class="form-select" id="assetType">
                                <option>Bank / current account</option>
                                <option>Savings / ISA</option>
                                <option>Investment / shares</option>
                                <option>Pension</option>
                                <option>Life insurance / policy</option>
                                <option>Property / mortgage</option>
                                <option>Loan / credit card / overdraft</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="assetInstitution">Institution / product name</label>
                            <input type="text" class="form-control" id="assetInstitution" placeholder="e.g. Barclays Current Account">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="assetReference">Account / policy number</label>
                            <input type="text" class="form-control" id="assetReference" placeholder="Reference number">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="assetValue">Estimated value</label>
                            <input type="text" class="form-control" id="assetValue" placeholder="£0.00">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="assetNotes">Notes</label>
                            <textarea class="form-control" id="assetNotes" rows="4" placeholder="Add details of the assets found"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-portal" data-bs-dismiss="modal">Submit match</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <script src="<?= base_url('assets/js/cases-table.js') ?>"></script>
</body>

</html>
