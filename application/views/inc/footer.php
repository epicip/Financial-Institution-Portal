<div class="hk-footer-wrap container-fluid  dark:bg-[#1e293b]    dark:border-[#ffffff0d]  table-container-dark z-index-3">
    <footer class="footer">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center text-lg text-slate-400 dark:text-slate-400 p-4 "> Copyright ©
                    2007-<?= date('Y') ?> <a href="Javascript:void(0)" class="hover:underline fw-600 secondary-theme-text-color" target="_blank">Client Portal</a> All
                    rights reserved.</div>
            </div>

        </div>
    </footer>
</div>
</div>
</main>
</div>
</div>
<!-- /HK Wrapper -->
<!-- Modal -->
<div class="modal fade" id="newsPapperModal" tabindex="-1" role="dialog" aria-labelledby="newsPapperModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered customModalText dark-mode-popup" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsPapperModalLabel">Search Newspaper by post code</h5>
                <button type="button" class="btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="news_postcode" id="getPostCode" class="form-control"
                                placeholder="PostCode" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-primary table-bordered mb-0">
                        <thead class="thead-primary">
                            <tr>
                                <th>Newspaper Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="whatmedianews">
                            <tr>
                                <td colspan="4">Please enter postcode</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="logout" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog   modal-dialog-centered customModalText ">
        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Confirm Logout</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="logoutIocns">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </div>
                <h5>Are you sure you want to log out?</h5>
                <p>You will be redirected to the login page and will need to sign in again to access your account.</p>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="d_flexing_btn py-0 m-0 buttoncustomize">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url() ?>users/logout">Logout</a>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- JavaScript -->

<!-- Experian address proxy URLs — consumed by address-autocomplete.js auto-init -->
<script>
    window.EXPERIAN_SEARCH_PROXY = '<?= base_url("orders/address_search_proxy") ?>';
    window.EXPERIAN_FORMAT_PROXY = '<?= base_url("orders/address_format_proxy") ?>';
</script>

<!-- jQuery -->
<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
<script src="<?= base_url() ?>dist/js/validation-data.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<!-- Data Table JavaScript -->

<script src="<?= base_url() ?>dist/js/dataTables.min.js"></script>
<script src="<?= base_url() ?>dist/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>dist/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>dist/js/pdfmake.min.js"></script>
<script src="<?= base_url() ?>dist/js/vfs_fonts.js"></script>
<script src="<?= base_url() ?>dist/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>dist/js/buttons.print.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>dist/js/popper.min.js"></script>
<script src="<?= base_url() ?>dist/js/bootstrap.min.js"></script>
<!-- Slimscroll JavaScript -->
<script src="<?= base_url() ?>dist/js/jquery.slimscroll.js"></script>
<!-- Fancy Dropdown JS -->
<script src="<?= base_url() ?>dist/js/dropdown-bootstrap-extended.js"></script>
<!-- FeatherIcons JavaScript -->
<script src="<?= base_url() ?>dist/js/feather.min.js"></script>
<!-- Toggles JavaScript -->
<script src="<?= base_url() ?>dist/js/toggles.min.js"></script>
<script src="<?= base_url() ?>dist/js/toggle-data.js"></script>
<!-- Counter Animation JavaScript -->
<script src="<?= base_url() ?>dist/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>dist/js/jquery.counterup.min.js"></script>
<!-- Vector Maps JavaScript -->
<script src="<?= base_url() ?>dist/js/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?= base_url() ?>dist/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url() ?>dist/js/vectormap-data.js"></script>
<!-- Toastr JS -->
<script src="<?= base_url() ?>dist/js/jquery.toast.min.js"></script>
<!-- Init JavaScript -->
<script src="<?= base_url() ?>dist/js/init.js"></script>
<script src="<?= base_url() ?>dist/js/dashboard-data.js"></script>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
<script src="<?= base_url() ?>dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom  JavaScript -->
<script src="<?= base_url() ?>dist/js/custom.js"></script>
<!-- Experian address autocomplete service -->
<script src="<?= base_url() ?>dist/js/address-autocomplete.js"></script>

<script>
    var baseURL = "<?php echo base_url(); ?>";

    function getSelectedServices() {
        var serviceValue = $('input[name="services"]').val() || '';

        return serviceValue.split(',').map(function(serviceId) {
            return $.trim(serviceId);
        }).filter(function(serviceId) {
            return serviceId !== '';
        });
    }

    $("#getPostCode").on("keyup change", function(e) {
        var postCode = $(this).val();
        var jobTypes = getSelectedServices();
        var jobType = jobTypes.length ? jobTypes.join(',') : '';

        if ($.inArray('1', jobTypes) !== -1 || $.inArray('53', jobTypes) !== -1 || $.inArray('54', jobTypes) !== -1) {
            jobType = '1';
        }

        $.ajax({
            url: baseURL + 'orders/getWDdetailsbypost/' + postCode + '/' + jobType,
            type: "GET",
            success: function(response) {
                $('#whatmedianews').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {}
        });
    });

    function hideNewsPapperModal() {
        var modalElement = document.getElementById('newsPapperModal');

        if (!modalElement) {
            return;
        }

        try {
            if ($.fn.modal) {
                $('#newsPapperModal').modal('hide');
            }
        } catch (error) {}

        try {
            if (window.bootstrap && bootstrap.Modal) {
                var modalInstance = bootstrap.Modal.getInstance(modalElement);

                if (modalInstance) {
                    modalInstance.hide();
                }
            }
        } catch (error) {}

        setTimeout(function() {
            if ($('#newsPapperModal').hasClass('show')) {
                $('#newsPapperModal')
                    .removeClass('show')
                    .hide()
                    .attr('aria-hidden', 'true')
                    .removeAttr('aria-modal');
            }

            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open').css('padding-right', '');
        }, 150);
    }

    function getNewsPapperName(newsPapper) {
        $('input[name="newspapername"]').val(newsPapper);
        hideNewsPapperModal();
    }

    $(document).on('click', '.select-newspaper', function(e) {
        e.preventDefault();

        var newsPapper = $(this).data('newspaper');

        if (typeof newsPapper === 'undefined') {
            newsPapper = $(this).val();
        }

        getNewsPapperName(newsPapper);
    });

    $(document).ready(function() {
        var jobTypes = getSelectedServices();
        var quoteText = ($.inArray('53', jobTypes) !== -1 || $.inArray('54', jobTypes) !== -1) ?
            'Quote Required for Trustee Notice Advertising?' :
            'Quote Required?';

        $('.quote').text(quoteText).show();
    });
</script>

<script>
    $(function() {
        setTimeout(function() {
            $("#alert-msg").hide('blind', {}, 300)
        }, 3000);
    });
    $(document).ajaxComplete(function() {
        $('[data-toggle="tooltip"]').tooltip({
            "html": true,
            "delay": {
                "show": 0,
                "hide": 0
            },
            "offset": [0, 10]
        });
    });
</script>

<script>
    // Validation for Goods Vehicle Operator Licence Applications – local newspaper notices form page.
    // Only runs for "Submit Order" — "Save as draft" is intentionally allowed
    // to save an incomplete form so the user can finish it later.

    $('#submitOrderBtn').on('click', function(e) {
        let isValid = true;

        // Hide all previous errors
        $('.error-msg').hide();
        $('.form-control, select').removeClass('error');

        // Validate: Name of operator
        const nameOfOperator = $('input[name="name_of_operator"]');
        if (nameOfOperator.val().trim() === '') {
            nameOfOperator.addClass('error');
            nameOfOperator.closest('.form-group').find('.name-error').show();
            isValid = false;
        }

        // Validate: Application Type
        const applicationType = $('select[name="application_type"]');
        if (applicationType.val() === '' || applicationType.val() === 'Select Application Type') {
            applicationType.addClass('error');
            applicationType.closest('.form-group').find('.app-error').show();
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
            return false;
        }
    });

    // Hide error on user input/change
    $('input, select').on('change keyup', function() {
        $(this).removeClass('error');
        $(this).closest('.form-group').find('.error-msg').hide();
    });

    // End  Validation for Goods Vehicle Operator Licence Applications – local newspaper notices form page
</script>

<!-- Mobile Menu Toggle -->
<script>
    $(document).ready(function() {
        // Mobile menu toggle
        $('#navbar_toggle_btn').on('click', function() {
            $('aside').toggleClass('mobile-open');
            $('#hk_nav_backdrop').toggleClass('active');
        });

        // Close menu when backdrop is clicked
        $('#hk_nav_backdrop').on('click', function() {
            $('aside').removeClass('mobile-open');
            $(this).removeClass('active');
        });

        // Close menu on window resize if desktop
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('aside').removeClass('mobile-open');
                $('#hk_nav_backdrop').removeClass('active');
            }
        });
    });
</script>
<?php if (defined('ERROR_SERVICE_FRONTEND_ENABLED') && ERROR_SERVICE_FRONTEND_ENABLED): ?>
    <?php $this->load->view('partials/error-logger'); ?>
<?php endif; ?>

<!-- Security Error Handler for AJAX -->
<script>
    // Global AJAX error handler for security validation
    $(document).ajaxError(function(event, jqXHR, ajaxSettings, thrownError) {
        if (jqXHR.status === 422) {
            try {
                var response = JSON.parse(jqXHR.responseText);
                if (response.type === 'security_validation' && response.errors) {
                    // Load the security modal if not already loaded
                    if ($('#securityErrorModal').length === 0) {
                        $.get('<?php echo base_url("templates/security_error_modal"); ?>', function(html) {
                            $('body').append(html);
                            showSecurityModal(response.errors);
                        });
                    } else {
                        showSecurityModal(response.errors);
                    }
                    return false;
                }
            } catch (e) {
                console.log('Could not parse security error response');
            }
        }
    });
</script>
<script>
    /* Timeline Summary Details accordion */
    $(document).ready(function() {
        $(".timeline-accordion-section .summaryTitles").on("click", function() {
            var $section = $(this).closest(".timeline-accordion-section");
            var isOpen = $section.hasClass("accordion-open");

            if (isOpen) {
                $section.removeClass("accordion-open");
            } else {
                $(".timeline-accordion-section").removeClass("accordion-open");
                $section.addClass("accordion-open");
            }
        });
    });
</script>
<!-- Include Security Error Modal -->
<?php $this->load->view('templates/security_error_modal'); ?>
</script>

<?php
$securityErrors = $this->session->flashdata('security_errors');
if (!empty($securityErrors) && !is_array($securityErrors)) {
    $securityErrors = [$securityErrors];
}
?>
<!-- Show security errors in modal if present for non ajax -->
<?php if (!empty($securityErrors)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof showSecurityModal === 'function') {
                showSecurityModal(<?= json_encode(array_values($securityErrors), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
            }
        });
    </script>
<?php endif; ?>
</body>

</html>