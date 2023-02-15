// datatable (jquery)
$(function() {
    var dt_basic_table = $('.datatables-basic'),
        dt_basic;
    if (dt_basic_table.length) {
        dt_basic = dt_basic_table.DataTable({
            type: "get",
            url: "/api/ShowFestval",
            columns: [
                { data: 'Reg.no' },
                { data: 'Name' },
                { data: 'Permission' },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        return (
                            '<div class="d-inline-block">' +
                            '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>' +
                            '<ul class="dropdown-menu dropdown-menu-end">' +
                            '<li><a href="javascript:;" class="dropdown-item">Details</a></li>' +
                            '<li><a href="javascript:;" class="dropdown-item">Archive</a></li>' +
                            '<div class="dropdown-divider"></div>' +
                            '<li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>' +
                            '</ul>' +
                            '</div>' +
                            '<a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>'
                        );
                    }
                }
            ],
            columnDefs: [

                {
                    // Actions
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    searchable: false,

                }
            ],

            // kjnds
            order: [
                // [1, 'desc']
            ],
            // kjssd


            displayLength: 7,

            lengthMenu: [7, 10, 25, 50, 75, 100],
            // btn
            buttons: [

                {
                    text: ' <span data-bs-toggle="modal" data-bs-target="#modalScrollable"><i class="bx bx-plus me-sm-2"></i>Add New </span>',
                    className: 'create-new btn btn-primary'
                }
            ],

        });

        // $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');
    }




    // Delete Record
    $('.datatables-basic tbody').on('click', '.delete-record', function() {
        dt_basic.row($(this).parents('tr')).remove().draw();
    });


    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);
});