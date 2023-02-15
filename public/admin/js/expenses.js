// add value

$(document).ready(function() {
    $("#AddExpenses").submit(function(e) {
        e.preventDefault();
        var date = $("#flatpickr-date").val();
        Date1 = date.split("-");
        datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];

        var addexpenses = {
            description: $("input[name='description']").val(),
            date: datefor,
            amount: $("input[name='amount']").val(),
            name: $("input[name='name']").val(),
        };
        // console.log(addexpenses);
        $.ajax({
            type: "POST",
            url: "/api/AddExpenses",
            data: addexpenses,
            success: function(data) {
                // console.log(data);

                if (data && data.id) {
                    success();
                    $("#addmodel").modal("hide");
                    festivaltable();
                    $("input[name='description']").val(" ");
                    $("#flatpickr-date").val(" ");
                    $("input[name='amount']").val(" ");
                    $("input[name='editname']").val(" ");
                    $("input[name='name']").val(" ");
                } else {
                    error();
                }
            },
        });
        return false;
    });
    $(".add_model").click(function() {
        $("#addmodel").modal("show");
    });

});




// alert 

function Alert(ID) {
    // Delete_acti=checking.id;
    //  alert(Delete_acti);
    var permission_page = $(".delete_option_active").val();
    if (permission_page == 'active') {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                Deleteexpenses(ID);
                Swal.fire({
                    icon: 'success',
                    title: 'Delete',
                    text: 'Your expenses has been deleted.',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your expenses file is safe',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
        });

    } else {

        permission_dlt();
    }
}

function permission_dlt() {

    Swal.fire({
        title: 'Warning!',
        text: 'Permission Denied',
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
}

function Deletefestivel(ID) {
    $.ajax({
        type: "delete",
        url: "/api/DeleteEvents",
        data: { user_id: ID },
        success: function(data) {
            // console.log(data);
            festivaltable();

        }
    });
}

function success() {


    Swal.fire({
        title: 'Success',
        text: 'You clicked the button!',
        icon: 'success',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });


}

function error() {

    Swal.fire({
        title: 'Error!',
        text: ' You clicked the button!',
        icon: 'error',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });

}

function warning() {
    Swal.fire({
        title: 'Warning!',
        text: 'You Select Minimum 50MB!',
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
}


//   end alert

// table value

festivaltable();

function festivaltable() {
    $.ajax({
        type: "get",
        url: "/api/ShowExpenses",
        success: function(Vdata) {
            var fullValue;
            //   console.log(Vdata);
            var fullValue = Vdata;
            $('.dt-complex-header').DataTable({
                data: Vdata,
                bDestroy: true,
                // scrollX: false,

                columns: [{
                        data: "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    { data: 'name' },
                    { data: 'description' },
                    {
                        data: null,
                        "render": function(data) {
                            var date = data.date;
                            Date1 = date.split("-");
                            datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];
                            return datefor;
                        }
                    },
                    { data: 'amount' },
                    {
                        data: null,
                        "render": function(data) {
                            var fromedate = data.id;

                            fromefullvalue = '<button class="btn btn-outline-success btn-icon me-3" onclick="editshowvalue(' + fromedate + ')"><i class="bx bxs-edit"></i></button>' +
                                '<button class="btn btn-outline-danger btn-icon me-3" onclick="Alert(' + fromedate + ')"><i class="bx bx-trash me-1"></i></button>';
                            return fromefullvalue;
                        }
                    },

                ],


                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100]
            });
        }
    });
}
// end table value 


// datapickers  date
(function() {
    // Flat Picker
    // --------------------------------------------------------------------
    const flatpickrDate = document.querySelector('#flatpickr-date'),
        editflatpickrDate = document.querySelector('#edit-flatpickr-date');

    // Date
    if (flatpickrDate) {
        flatpickrDate.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'd-m-Y',
            minDate: new Date(),

        });
    }
    if (editflatpickrDate) {
        editflatpickrDate.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'd-m-Y',
            minDate: new Date(),
        });
    }


})();
// end date     



// edit valu show
function editshowvalue(ID) {

    $.ajax({
        type: "get",
        url: "/api/EditviewExpenses",
        data: { id: ID },
        success: function(data) {
            // console.log(data);
            $('#editmodel').modal('show');
            $.each(data, function(key, val) {
                $("input[name='editid']").val(val.id);
                $("input[name='editdescription']").val(val.description);
                $("input[name='editamount']").val(val.amount);
                Date1 = val.date.split("-");
                datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];
                // console.log(datefor);
                $("input[name='editdate']").val(datefor);
                $("input[name='editname']").val(val.name);
            });
        }
    });
}

//end edit value show

// edit update 
$(document).ready(function() {
    $("#EditdExpenses").submit(function(e) {
        e.preventDefault();
        var date = $("#edit-flatpickr-date").val();
        Date1 = date.split("-");
        datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];

        var addexpenses = {
            id: $("input[name='editid']").val(),
            description: $("input[name='editdescription']").val(),
            date: datefor,
            amount: $("input[name='editamount']").val(),
            name: $("input[name='editname']").val(),
        };
        // console.log(addexpenses);
        $.ajax({
            type: "POST",
            url: "/api/EditExpenses",
            data: addexpenses,
            success: function(data) {
                // console.log(data);

                if (data && data.id) {
                    success();
                    $("#editmodel").modal("hide");
                    festivaltable();
                } else {
                    error();
                }
            },
        });
        return false;
    });
});
// end update 

// delete
function Deleteexpenses(ID) {
    $.ajax({
        type: "delete",
        url: "/api/DeleteExpenses",
        data: { id: ID },
        success: function(data) {
            // console.log(data);
            festivaltable();

        }
    });
}
//  end deleted

$(document).ready(function() {
    $(".nameBasic").hide();
    $(".des").hide();
    $(".flatpickr-date").hide();
    $(".amount").hide();
    $('.add_submit').click(function() {
        var name = $("#nameBasic").val();
        var des = $("#des").val();
        var date = $("#flatpickr-date").val();
        var amount = $("#amount").val();

        if (name = $("#nameBasic").val()) {
            $(".nameBasic").hide();
        } else {
            $(".nameBasic").show();
            return false;
        }
        if (des = $("#des").val()) {
            $(".des").hide();
        } else {
            $(".des").show();
            return false;
        }
        if (date = $("#flatpickr-date").val()) {
            $(".flatpickr-date").hide();
        } else {
            $(".flatpickr-date").show();
            return false;
        }
        if (amount = $("#amount").val()) {
            $(".amount").hide();
        } else {
            $(".amount").show();
            return false;
        }


    });
});
$(document).ready(function() {
    $(".edd_name").hide();
    $(".edd_des").hide();
    $(".edit-flatpickr-date").hide();
    $(".edd_amt").hide();
    $('.edd_submit').click(function() {
        var name = $("#edd_name").val();
        var f_name = $("#edd_des").val();
        var date = $("#edit-flatpickr-date").val();
        var amount = $("#edd_amt").val();
        if (name = $("#edd_name").val()) {
            $(".edd_name").hide();
        } else {
            $(".edd_name").show();
            return false;
        }
        if (f_name = $("#edd_des").val()) {
            $(".edd_des").hide();
        } else {
            $(".edd_des").show();
            return false;
        }
        if (date = $("#edit-flatpickr-date").val()) {
            $(".edit-flatpickr-date").hide();
        } else {
            $(".edit-flatpickr-date").show();
            return false;
        }
        if (amount = $("#edd_amt").val()) {
            $(".edd_amt").hide();
        } else {
            $(".edd_amt").show();
            return false;
        }

    });
});