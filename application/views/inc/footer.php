 <div class="modal fade" id="recordsFoundModal" tabindex="-1" aria-labelledby="recordsFoundModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">
             <form id="matchFoundForm" action="<?= base_url('cases/match_found') ?>" method="post" enctype="multipart/form-data">
                 <div class="modal-header">
                     <h5 class="modal-title">Records Found</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <p class="text-muted">Enter the details of the assets found for this case.</p>
                     <input type="hidden" name="log_id" id="log_id" value="">
                     <div class="row g-4">
                         <div class="col-12">
                             <label class="form-label" for="assetNotes">Notes<span class="text-danger">*</span></label>
                             <textarea class="form-control" id="assetNotes" name="email_notes" rows="4" placeholder="Please add details of the assets found" required></textarea>
                         </div>
                         <div class="col-12">
                             <label class="form-label" for="matchAttachment">Attachment (PDF only)</label>
                             <input type="file" class="form-control" id="matchAttachment" name="match_attachment" accept="application/pdf,.pdf" aria-describedby="matchAttachmentHelp">
                             <div id="matchAttachmentHelp" class="form-text">Optional. Upload a PDF document for this match response.</div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-portal">Submit match</button>
                 </div>
             </form>
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



 <script>
     function noMatchFound(log_id) {
         if (!log_id) {
             alert('Log id is missing. Unable to save no-match response.');
             return;
         }

         if (!confirm('Are you sure you want to mark this case as no records found?')) {
             return;
         }

         $.ajax({
             url: '<?= base_url('cases/no_match') ?>',
             type: 'POST',
             dataType: 'json',
             data: {
                 log_id: log_id
             },
             beforeSend: function() {
                 showPageLoader();
             },
             success: function(response) {
                 window.location.reload();
             },
             error: function() {
                 hidePageLoader();
             }
         });
     }

     function matchFound(log_id) {
         if (!log_id) {
             alert('Log id is missing. Unable to save match response.');
             return;
         }

         $('#matchFoundForm')[0].reset();
         $('#log_id').val(log_id);
         $('#assetNotes').val('');
     }
 </script>



 </body>

 </html>