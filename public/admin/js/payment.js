// maniiii


$(document).ready(function() {
    $('#festivelform').submit(function(e) {
        e.preventDefault();
        $(".add_submit_btn").attr('disabled', 'disabled')
        $(".add_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
        let formData = new FormData($('#festivelform')[0]);
        console.log(formData);
        $.ajax({
            type: "post",
            url: "/api/addPayment",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "JSON",
            enctype: "multipart/form-data",
            success: function(data) {
                $(".add_submit_btn").removeAttr('disabled');
                $(".add_submit_btn").html('Save');
                if (data && data.id) {
                    success();
                    $("#addmodel").modal("hide");
                    $(".form-control").val(null);
                    // $('.modal-backdrop').remove();
                    // $('body').removeClass('modal-open');
                    festivaltable();


                } else {
                    error();
                }

            }


        });
        return false
    });
    $(".photo_alert").hide();
});

$(document).ready(function() {

    $(".add_btn").on('click', function() {

        $("#addmodel").modal("show");

    });


});

$(document).ready(function() {

    $(".video_add").on('click', function() {

        $("#uploadInput").click();

    });


});


// document.getElementsByClassName("remove_option").addEventListener("click", myFunction);

function removeadd(classid) {
    // alert(classid);
    $(".addremove" + classid).remove();
}






// edit function in show in value 
function editshowvalue(ID) {

    $.ajax({
        type: "get",
        url: "/api/paymentValue",
        data: { id: ID },
        success: function(data) {
            console.log(data);
            $('#editmodel').modal('show');
            $.each(data, function(key, val) {
                $("input[name='id']").val(val.id);
                $("#edit_name").val(val.name);
                $("#edit_f_name").val(val.father_name);
                $("#edit_amount").val(val.amount);
                $("#edit_number").val(val.number);
                $("#edit_address").val(val.address);

            });
        }
    });
}

function removeedit(id) {
    alert(id);
    $(".remove" + id).remove();
    // $(".edit_input_old").append('<input type="hidden" name="oldphoto[]">');
}

$(document).ready(function() {

    var hshshsh = document.getElementsByClassName("edit_file_remove");
    hshshsh.onclick = function() { alert("Finaly!") };
    //   $(".video_add").on('click', function() {

    //    $("#uploadInput").click();

    // });
    $(".video_edit").on('click', function() {

        $("#uploadInputedit").click();

    });

});



$(document).ready(function() {
    $('#Editform').submit(function(e) {
        e.preventDefault();

        $(".edit_submit_btn").attr('disabled', 'disabled')
        $(".edit_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
        let formData = new FormData($('#Editform')[0]);
        console.log(formData);
        $.ajax({
            type: "post",
            url: "/api/editPayment",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "JSON",
            enctype: "multipart/form-data",
            success: function(data) {
                $(".edit_submit_btn").removeAttr('disabled');
                $(".edit_submit_btn").html('Save');
                if (data && data.id) {
                    success();
                    $('#editmodel').modal('hide');

                    festivaltable();


                } else {
                    error();
                }

            }


        });
        return false
    });
});


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
                Deletefestivel(ID);
                Swal.fire({
                    icon: 'success',
                    title: 'Delete',
                    text: 'Your payment has been deleted.',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your payment file is safe',
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
        url: "/api/deletePayment",
        data: { user_id: ID },
        success: function(data) {
            console.log(data);
            festivaltable();

        }
    });
}

function success() {


    Swal.fire({
        title: 'Success!',
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


$(document).ready(function() {
    $(".nameBasic").hide();
    $(".emailBasic").hide();
    $(".amount").hide();
    $(".add_number").hide();
    $(".address").hide();
    $('.add_submit').click(function() {
        var name = $("#nameBasic").val();
        var f_name = $("#emailBasic").val();
        var amount = $("#amount").val();
        var num = $("#add_number").val();
        var address = $("#address").val();
        if (name = $("#nameBasic").val()) {
            $(".nameBasic").hide();
        } else {
            $(".nameBasic").show();
            return false;
        }
        if (f_name = $("#emailBasic").val()) {
            $(".emailBasic").hide();
        } else {
            $(".emailBasic").show();
            return false;
        }
        if (amount = $("#amount").val()) {
            $(".amount").hide();
        } else {
            $(".amount").show();
            return false;
        }
        if (num = $("#add_number").val()) {
            $(".add_number").hide();
        } else {
            $(".add_number").show();
            return false;
        }
        if (address = $("#address").val()) {
            $(".address").hide();
        } else {
            $(".address").show();
            return false;
        }
    });
});
$(document).ready(function() {
    $(".edit_name").hide();
    $(".edit_f_name").hide();
    $(".edit_amount").hide();
    $(".edit_number").hide();
    $(".edit_address").hide();
    $('.edd_submit').click(function() {
        var name = $("#edit_name").val();
        var f_name = $("#edit_f_name").val();
        var amount = $("#edit_amount").val();
        var num = $("#edit_number").val();
        var address = $("#edit_address").val();
        if (name = $("#edit_name").val()) {
            $(".edit_name").hide();
        } else {
            $(".edit_name").show();
            return false;
        }
        if (f_name = $("#edit_f_name").val()) {
            $(".edit_f_name").hide();
        } else {
            $(".edit_f_name").show();
            return false;
        }
        if (amount = $("#edit_amount").val()) {
            $(".edit_amount").hide();
        } else {
            $(".edit_amount").show();
            return false;
        }
        if (num = $("#edit_number").val()) {
            $(".edit_number").hide();
        } else {
            $(".edit_number").show();
            return false;
        }
        if (address = $("#edit_address").val()) {
            $(".edit_address").hide();
        } else {
            $(".edit_address").show();
            return false;
        }
    });
});





// data table 

festivaltable();

function festivaltable() {
    $.ajax({
        type: "get",
        url: "/api/showPayment",
        success: function(Vdata) {
            var fullValue;
            console.log(Vdata);
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
                    { data: 'father_name' },
                    { data: 'amount' },
                    { data: 'date' },

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

$('.dt-complex-header tbody').on('click', '.delete-record', function() {
    dt_basic.row($(this).parents('tr')).remove().draw();
    console.log(dt_basic.id);
});