<!-- Security Error Modal -->
<div class="modal fade" id="securityErrorModal" tabindex="-1" role="dialog" aria-labelledby="securityErrorModalLabel"
    aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary"
                style="display:flex; align-items:center; justify-content:space-between;">
                <h5 class="modal-title text-white" id="securityErrorModalLabel">Security Validation Failed</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <h6>Please correct the following issues:</h6>
                    <ul id="securityErrorList" class="mb-0"></ul>
                </div>
                <p class="text-muted small mt-3">For security reasons, your form could not be submitted. Please review
                    and correct the highlighted fields.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to show security modal
    function showSecurityModal(errors) {
        // Process and display errors
        processSecurityErrors(errors);

        // Initialize and show the modal using Bootstrap 5
        var modal = new bootstrap.Modal(document.getElementById('securityErrorModal'), {
            backdrop: 'static',
            keyboard: false
        });
        modal.show();

        // Add event listener for the close button
        document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                modal.hide();
            });
        });
    }

    // Function to process security errors
    function processSecurityErrors(errors) {
        var errorList = document.getElementById('securityErrorList');
        if (!errorList) return;

        errorList.innerHTML = '';
        errors.forEach(function (error) {
            if (error && error.trim() !== '') {
                var li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);

                // Highlight problematic fields
                highlightProblematicField(error);
            }
        });
    }

    // Function to highlight problematic fields
    function highlightProblematicField(error) {
        var fieldMatch = error.match(/in '([^']+)'/);
        if (fieldMatch && fieldMatch[1]) {
            var fieldName = fieldMatch[1];
            var field = document.querySelector('[name="' + fieldName + '"]');
            if (field) {
                field.classList.add('is-invalid');
                field.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    }
</script>