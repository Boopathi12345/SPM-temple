// maniiii


$(document).ready(function() {
    $('#festivelform').submit(function(e) {
        e.preventDefault();

        $(".add_submit_btn").attr('disabled', 'disabled')
        $(".add_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
        // let formData = new FormData($('#festivelform')[0]);
        var roleadd = {
            name: $("input[name='name']").val(),
            permission: $("#permission").val(),
        };
        console.log(roleadd);
        $.ajax({
            type: "POST",
            url: "api/addrole",
            data: roleadd,
            dataType: "JSON",
            enctype: "multipart/form-data",
            success: function(data) {
                $(".add_submit_btn").removeAttr('disabled');
                $(".add_submit_btn").html('Save');
                if (data && data.id) {
                    success();
                    $("#addmodel").modal("hide");
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

    $(".video_add").on('click', function() {

        $("#uploadInput").click();

    });


});

$(document).ready(function() {

    $(".add_btn").on('click', function() {

        $("#addmodel").modal("show");

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
        url: "/api/RoleValue",
        data: { id: ID },
        success: function(data) {
            console.log(data);
            $('#editmodel').modal('show');
            $.each(data, function(key, val) {
                $("input[name='id']").val(val.id);
                $("#edit_name").val(val.name);
                console.log(val.permission);

                var permission = JSON.parse(val.permission);
                $("#edit_role_select").val(permission);
                console.log(permission);
                for (i = 0; i < permission.length; i++) {
                    console.log(permission[i]);
                    $("#edit_role_select").val(permission[i]);
                }

                permissioneditvalue(val.permission);
            });
        }
    });
}

function permissioneditvalue(role_value) {
    $.ajax({
        type: "get",
        url: "api/permissonfullvalue",
        success: function(data) {
            console.log(data);
            $("#edit_role_select").html(" ");
            $.each(data, function(key, val) {
                $("#edit_role_select").append('<option value="' + val.permission + '">' + val.name + '</option>');
            });
            $('#edit_role_select').val(JSON.parse(role_value));

        }
    });

}

permissionvalue();

function permissionvalue() {
    $.ajax({
        type: "get",
        url: "api/permissonfullvalue",
        success: function(data) {
            $.each(data, function(key, val) {
                $("#permission").append('<option value="' + val.permission + '">' + val.name + '</option>');
            });
        }
    });
}


$(document).ready(function() {
    $('#Editform').submit(function(e) {
        e.preventDefault();

        $(".edit_submit_btn").attr('disabled', 'disabled')
        $(".edit_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
        // let formData = new FormData($('#Editform')[0]);
        var formData = {
            name: $("input[name='edit_name']").val(),
            permission: $("#edit_role_select").val(),
            id: $("input[name='id']").val(),
        };
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "/api/updateRole",
            data: formData,
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
                DeleteRole(ID);
                Swal.fire({
                    icon: 'success',
                    title: 'Delete',
                    text: 'Your role has been deleted.',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your role file is safe',
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

function DeleteRole(ID) {
    $.ajax({
        type: "delete",
        url: "/api/deleteRole",
        data: { adminrole_id: ID },
        success: function(data) {
            console.log(data);
            festivaltable();

        }
    });
}

function success() {


    Swal.fire({
        title: 'Good job!',
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



// data table 

festivaltable();

function festivaltable() {
    $.ajax({
        type: "get",
        url: "/api/ShowroleAll",
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
                    {
                        data: null,
                        "render": function(data) {
                            var permission = JSON.parse(data.permission);
                            var roleList = "";
                            $.each(permission, function(key, value) {
                                var space = value.replace(/_/g, ' ');
                                roleList +=
                                    '<span class="badge bg-label-primary">' +
                                    space +
                                    '</span> &nbsp;';
                            });


                            // roleList = '<span class="badge bg-label-primary">' + change + "</span> &nbsp;";
                            return roleList;
                        }
                    },
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