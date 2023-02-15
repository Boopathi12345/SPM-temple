fullvalue();

function fullvalue() {

    $.ajax({
        type: "get",
        // data:{user_id:ID},
        url: "/api/Dharmagarthasview",
        success: function(data) {
            console.log(data);
            $(".poosari_family").html(" ");

            $.each(data, function(key, val) {
                if (val.child_number == 0) {
                    $(".poosari_family").append('<ul ><li class="tree' + val.id + '"><a rel="item-264">' +
                        '<div class="pt-thumb">' +
                        '<img src="dharmagartha/' + val.photo + '" style="width: 100%; height: 100%;">' +
                        '</div>' +
                        '<strong class="text_overflow">' + val.name + '</strong><span class="text_overflow">' + val.phone + '</span><span class="pt-options">' +
                        '<i class="bx bx-user-plus" onclick="addpoosari(' + val.id + ')"></i>' +
                        '<i class="bx bx-edit-alt me-1" onclick="editpoosari(' + val.id + ')"></i>' +
                        '<i class="bx bx-trash me-1" onclick="Alert(' + val.id + ')"></i>' +
                        '</span></a></li></ul>');
                }

                var child = $(".tree" + val.child_number + ">ul").html();
                // console.log(child);

                if (child) {
                    $('.tree' + val.child_number + ">ul").append('<li class="tree' + val.id + '"><a rel="item-264">' +
                        '<div class="pt-thumb">' +
                        '<img src="dharmagartha/' + val.photo + '" style="width: 100%; height: 100%;">' +
                        '</div>' +
                        '<strong class="text_overflow">' + val.name + '</strong><span class="text_overflow">' + val.phone + '</span><span class="pt-options">' +
                        '<i class="bx bx-user-plus" onclick="addpoosari(' + val.id + ')"></i>' +
                        '<i class="bx bx-edit-alt me-1" onclick="editpoosari(' + val.id + ')"></i>' +
                        '<i class="bx bx-trash me-1" onclick="Alert(' + val.id + ')"></i>' +
                        '</span></a></li>');
                } else {
                    $('.tree' + val.child_number).append('<ul ><li class="tree' + val.id + '"><a rel="item-264">' +
                        '<div class="pt-thumb">' +
                        '<img src="dharmagartha/' + val.photo + '" style="width: 100%; height: 100%;">' +
                        '</div>' +
                        '<strong class="text_overflow">' + val.name + '</strong><span class="text_overflow">' + val.phone + '</span><span class="pt-options">' +
                        '<i class="bx bx-user-plus" onclick="addpoosari(' + val.id + ')"></i>' +
                        '<i class="bx bx-edit-alt me-1" onclick="editpoosari(' + val.id + ')"></i>' +
                        '<i class="bx bx-trash me-1" onclick="Alert(' + val.id + ')"></i>' +
                        '</span></a></li></ul>');
                }

            });
        }
    });
}



$(document).ready(function() {
    $('.addpoosarivalidation').click(function() {
        if ($(".namevalidation").val()) {
            $(".name_validation").hide();
        } else {
            $(".name_validation").show();
            return false
        }
        if ($(".lnamevalidation").val()) {
            $(".lname_validation").hide();
        } else {
            $(".lname_validation").show();
            return false
        }
        if ($(".fathervalidation").val()) {
            $(".fathername_validation").hide();
        } else {
            $(".fathername_validation").show();
            return false
        }
        if ($(".gendervalidation").val()) {
            $(".gender_validation").hide();
        } else {
            $(".gender_validation").show();
            return false
        }
        var email = $(".emailvalidation").val();
        var txt = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!txt.test(email)) {
            $(".email_validation").show();
            return false
        } else {

            $(".email_validation").hide();
        }
        // if($("#formValidationConfirmPass").val()){
        //   $(".password_validation").hide();
        // }else{
        //   $(".password_validation").show();
        //   return false
        // }
        if ($(".dobvalidation").val()) {
            $(".dob_validation").hide();
        } else {
            $(".dob_validation").show();
            return false
        }
        var mobileNum = $(".phonevalidation").val();
        var validateMobNum = /^\d*(?:\.\d{1,2})?$/;

        if (validateMobNum.test(mobileNum) && mobileNum.length == 10) {
            $(".phone_validation").hide();
        } else {
            $(".phone_validation").show();
            return false
        }

        if ($(".cityvalidation").val()) {
            $(".city_validation").hide();
        } else {
            $(".city_validation").show();
            return false
        }
        if ($(".statevalidation").val()) {
            $(".state_validation").hide();
        } else {
            $(".state_validation").show();
            return false
        }
        if ($(".photovalidation").val()) {
            $(".photo_validation").hide();
        } else {
            $(".photo_validation").show();
            return false
        }

        if ($(".addressvalidation").val()) {
            $(".address_validation").hide();
        } else {
            $(".address_validation").show();
            return false
        }

        // var fileupload=$("#imgInp").val();
        // if(fileupload){

        // }else{
        //   warning();
        //   return false;
        // }
        // alert("success");
        add_databasevalue();
        // mailchecking();

    });
    $(".red").hide();
});


function addpoosari(child) {
    // alert("add");

    $("#addchild_id").val(child);
    $('#addmodel').modal('show');

}

function add_databasevalue() {
    // $('#Addpoosari').submit(function(e) {
    // e.preventDefault();
    $(".add_submit_btn").attr('disabled', 'disabled')
    $(".add_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
    var date = $("#flatpickr_add").val();
    Date1 = date.split("-");
    datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];

    $("#flatpickr_add").val(datefor);
    let formData = new FormData($('#Addpoosari')[0]);
    console.log(formData);
    $.ajax({
        type: "post",
        url: "/api/AddDharmagartha",
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
                // $('input').val(' ');
                success();
                $('#addmodel').modal('hide');
                fullvalue();
                addvalueempty();
                return false;
            } else {
                error();
            }
        }
    });
    return false
        // });
}

function addvalueempty() {
    // alert("ugvuyvyuf");
    $(".form-control").val(null);
    $(".form-select").val(null);
    $('.addimage_in').attr('type', "text");
    $('.addimage_in').attr('type', "file");
    $('.addimageshow').attr('src', "#");


}

$(document).ready(function() {

    $(".addimage_in").change(function() {
        Addimage(this);
    });

});

function Addimage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.addimageshow').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}






// alert message 

function Alert(ID) {
    // Delete_acti=checking.id;
    //  alert(Delete_acti);
    var permission_page = $(".delete_option_active").val();
    if (permission_page == 'active') {
        var dontdelete = $(".tree" + ID + ">ul").html();
        if (dontdelete) {
            warning("delete");
            return false;
        }



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
                deletepoosari(ID);
                Swal.fire({
                    icon: 'success',
                    title: 'Delete',
                    text: 'Your dharmagartha has been deleted.',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your dharmagartha file is safe',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
        });
    } else {

        user_warning();
    }

}

function user_warning() {

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

function warning(warning) {
    if (warning == 'image') {
        title_in = "Image Daelete and Image Add";
    } else if (warning = "delete") {
        title_in = "Not Delete Dharmagartha";
    }

    Swal.fire({
        title: 'Warning!',
        text: title_in,
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
}


// end alert message 


// edit poosari 
function editpoosari(child) {
    $('#editmodel').modal('show');
    $("#addchild_id").val(child);
    $.ajax({
        type: "get",
        data: { user_id: child },
        url: "/api/EditviewDharmagartha",
        success: function(data) {
            $.each(data, function(key, val) {
                console.log(val.id);
                $("#poosariID").val(val.id);
                $("#editname").val(val.name);
                $("#editlast_name").val(val.last_name);
                $("#editemail").val(val.email);
                $("#editphone").val(val.phone);
                $("#editphoto").val(val.photo);
                Date1 = val.dob.split("-");
                datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];
                $("#editdob").val(datefor);
                $("#editfather_name").val(val.father_name);
                $("#editgender").val(val.gender);
                $("#editcity").val(val.city);
                $("#editstate").val(val.state);
                $("#editaddress").val(val.address);
                $(".editimage_show").attr({ "src": "dharmagartha/" + val.photo });
                $("#remove_image").show();
                $(".new_image").removeAttr("id");
                $(".new_image").removeAttr("type");
                $(".new_image").attr({ "type": "file" });

            });
        }
    });
}


$(document).ready(function() {
    $("#remove_image").click(function() {
        $("#remove_image").hide();
        // $("#remove_image").removeAttr("class");
        $(".editimage_show").attr({ "src": " " });
        $(".new_image").attr({ "id": "cheating" });

    });
    $(".new_image").click(function() {

        if (this.id == 'cheating') {
            $(".new_image").change(function() {
                readURL(this);
            });

        } else {
            warning("image");
            return false;
        }
    });
});

$(document).ready(function() {
    $('.editpoosarivalidation').click(function() {
        if ($("#editname").val()) {
            $(".editname_validation").hide();
        } else {
            $(".editname_validation").show();
            return false
        }
        if ($("#editlast_name").val()) {
            $(".editlname_validation").hide();
        } else {
            $(".editlname_validation").show();
            return false
        }
        if ($("#editfather_name").val()) {
            $(".editfathername_validation").hide();
        } else {
            $(".editfathername_validation").show();
            return false
        }
        if ($("#editgender").val()) {
            $(".editgender_validation").hide();
        } else {
            $(".editgender_validation").show();
            return false
        }
        var email = $("#editemail").val();
        var txt = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!txt.test(email)) {
            $(".editemail_validation").show();
            return false
        } else {

            $(".editemail_validation").hide();
        }

        if ($("#editdob").val()) {
            $(".editdob_validation").hide();
        } else {
            $(".editdob_validation").show();
            return false
        }
        var mobileNum = $("#editphone").val();
        var validateMobNum = /^\d*(?:\.\d{1,2})?$/;

        if (validateMobNum.test(mobileNum) && mobileNum.length == 10) {
            $(".editphone_validation").hide();
        } else {
            $(".editphone_validation").show();
            return false
        }

        if ($("#editcity").val()) {
            $(".editcity_validation").hide();
        } else {
            $(".editcity_validation").show();
            return false
        }
        if ($("#editstate").val()) {
            $(".editstate_validation").hide();
        } else {
            $(".editstate_validation").show();
            return false
        }
        // if($(".editphoto").val()){
        //   $(".editphoto_validation").hide();
        // }else{
        //   $(".editphoto_validation").show();
        //   return false
        // }

        if ($("#editaddress").val()) {
            $(".editaddress_validation").hide();
        } else {
            $(".editaddress_validation").show();
            return false
        }

        // var fileupload=$("#imgInp").val();
        // if(fileupload){

        // }else{
        //   warning();
        //   return false;
        // }
        // alert("success");
        editpoosarivalue();
        // mailchecking();

    });
    $(".red").hide();
});



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.editimage_show').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
// $(document).ready(function(){
//     // alert("add");


//     $('#Editdpoosari').submit(function(e) {
//         e.preventDefault();
function editpoosarivalue() {
    $(".edit_submit_btn").attr('disabled', 'disabled')
    $(".edit_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
    var date = $(".flatpickr_edit").val();
    Date1 = date.split("-");
    datefor = Date1[2] + '-' + Date1[1] + '-' + Date1[0];

    $(".flatpickr_edit").val(datefor);
    let formData = new FormData($('#Editdpoosari')[0]);
    console.log(formData);
    $.ajax({
        type: "post",
        url: "/api/EditdDharmagartha",
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

                fullvalue();

            } else {
                error();
            }
        }
    });
    return false
}
// });
// }); 

// delete poosari 
function deletepoosari(ID) {
    $.ajax({
        type: "delete",
        url: "/api/deleteDharmagartha",
        data: { user_id: ID },
        success: function(data) {
            console.log(data);
            fullvalue();

        }
    });
}

// datapickers 
(function() {
    // Flat Picker
    // --------------------------------------------------------------------
    const flatpickrDateadd = document.querySelector('#flatpickr_add'),
        flatpickrDateedit = document.querySelector('.flatpickr_edit');



    // Date
    if (flatpickrDateadd) {
        flatpickrDateadd.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'd-m-Y',
            maxDate: new Date(),
        });
    }
    if (flatpickrDateedit) {
        flatpickrDateedit.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'd-m-Y',
            maxDate: new Date(),
        });
    }

})();