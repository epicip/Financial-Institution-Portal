$(function () {
    var $table = $('#casesTable');
    if (!$table.length) {
        return;
    }

    var colCount = $table.find('thead th').length;
    var nonOrderableTargets = [];
    if (colCount >= 10) {
        nonOrderableTargets.push(colCount - 1);
    }
    if (colCount >= 11) {
        nonOrderableTargets.push(colCount - 2);
    }

    var table = $table.DataTable({
        autoWidth: false,
        scrollX: false,
        pageLength: 5,
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, 'All']],
        pagingType: 'full_numbers',
        order: [[3, 'asc']],
        columnDefs: nonOrderableTargets.length
            ? [{ orderable: false, targets: nonOrderableTargets }]
            : [],
        language: {
            search: '',
            searchPlaceholder: 'Search name or National Insurance Number',
            lengthMenu: 'Show _MENU_ cases',
            info: 'Showing _START_ to _END_ of _TOTAL_ cases',
            infoEmpty: 'No cases to show',
            infoFiltered: '(filtered from _MAX_ cases)',
            emptyTable: 'No cases found for this user',
            zeroRecords: 'No matching cases found',
            paginate: {
                first: 'First',
                last: 'Last',
                next: 'Next',
                previous: 'Prev'
            }
        },
        dom:
            "<'row align-items-center g-3 mb-4 cases-table-toolbar'<'col-md-6'l><'col-md-6'f>>" +
            "<'cases-table-scroll'tr>" +
            "<'row align-items-center g-3 mt-4'<'col-md-5'i><'col-md-7'p>>",
        initComplete: function () {
            var $length = $('#casesTable_length select');
            $length.addClass('form-select cases-length-select');

            var $input = $('#casesTable_filter input');
            $input.addClass('form-control cases-search-input');
            $('#casesTable_filter').addClass('cases-search-wrap');
        }
    });

    table.columns.adjust();
});
