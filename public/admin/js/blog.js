$(document).ready(function() {
    $('#festivelform').submit(function(e) {
        e.preventDefault();

        var fileupload = $("input[name='photo[]']").val();
        if (fileupload) {
            $(".photo_alert").hide();
        } else {
            $(".photo_alert").show();
            return false;
        }
        $(".add_editervalue").val($(".full-editor>.ql-editor").html());
        $(".add_submit_btn").attr('disabled', 'disabled');
        $(".add_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
        console.log(fileupload);

        let formData = new FormData($('#festivelform')[0]);
        console.log(formData);
        $.ajax({
            type: "post",
            url: "/api/addBlog",
            data: formData,
            processData: false,
            contentType: false,
            // cache: false,
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
                    addvalueempty();

                } else {
                    error();
                }

            }


        });
        return false
    });
    $(".photo_alert").hide();
});

function addvalueempty() {
    // alert("ugvuyvyuf");
    $(".form-control").val(null);
    $(".file_image_show").empty();
    $("#uploadInput").siblings().remove();
    $(".full-editor>.ql-editor").empty();

}

$(document).ready(function() {

    $(".video_add").on('click', function() {

        $("#uploadInput").click();

    });


});
var addcount = 0;

function addFile(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    var file_name = $("#uploadInput").val();
    value = file_name.split(/(\\|\/)/g).pop()
    const oFile = document.getElementById("uploadInput").files[0];
    if (oFile.size > 53477376) // 2 MiB for bytes.
    {
        warning();
        return false;
    }
    addcount++;
    phovid = value.split(".");
    if (phovid[1] === 'jpg' || phovid[1] === 'png') {

        $(".file_image_show").append('<div class="col-sm-4 mb-3 addremove' + addcount + '"><div class="crad text-center" id="file_empty" style="background:#efefef;"><img class="image_align" src="' + tmppath + '" id="output"/><hr class="hr_margin"><div class="file_name remove_option">' + value + '</div><hr class="hr_margin">' +
            '<a class="btn edit_file_remove" onclick="removeadd(' + addcount + ')">Remove</a>' +
            '</div>');
    } else {

        $(".file_image_show").append('<div class="col-sm-4 mb-3 addremove' + addcount + '""><div class="crad text-center" id="file_empty" style="background:#efefef;"><video class="image_align" src="' + tmppath + '" id="output" controls></video><hr class="hr_margin"><div class="file_name remove_option">' + value + '</div><hr class="hr_margin">' +
            '<a class="btn edit_file_remove" onclick="removeadd(' + addcount + ')">Remove</a></div>');
    }
    if (1 == 1) {
        inputcount = 1 + addcount;
        $("#uploadInput").removeAttr("id");
        $(".add_input_file").append('<input type="file" class="addremove' + inputcount + '"" accept="image/png, image/gif, image/jpeg, video/*" name="photo[]" onchange="addFile(event)"  id="uploadInput"/>');
    }

}

// document.getElementsByClassName("remove_option").addEventListener("click", myFunction);

function removeadd(classid) {
    // alert(classid);
    $(".addremove" + classid).remove();
}


$(document).ready(function() {
    $(".add_model_op").click(function() {
        $('#addmodel').modal('show');
    });
});



// edit function in show in value 
function editshowvalue(ID) {

    $.ajax({
        type: "get",
        url: "/api/blogValue",
        data: { id: ID },
        success: function(data) {
            console.log(data);
            $('#editmodel').modal('show');
            $.each(data, function(key, val) {
                $("input[name='id']").val(val.id);
                $("#edit_title").val(val.title);
                $("#edit_time").val(val.time);
                $("#edit_date").val(val.date);
                $("#edit_description").val(val.description);
                $("#edit_file").html(" ");
                $(".edit_input_file").html(" ");
                $(".edit_input_old").html(" ");
                $(".full-editor_edit>.ql-editor").empty();
                $(".full-editor_edit>.ql-editor").append(val.html_code);
                $(".edit_input_old").append('<input type="file" name="newphoto[]" class="remove301" accept="image/png, image/gif, image/jpeg ,video/*" onchange="editFile(event)"  id="uploadInputedit"/>');
                var image = val.video.split(" /");
                var count = 0;
                for (let i = 0; i < image.length; i++) {
                    var formate = image[i].split(".")
                    if (formate[1] === 'jpg' || formate[1] === 'png') {
                        count++;
                        $(".edit_input_file").append('<div class="col-sm-4 mb-3 remove10' + count + ' "><div class="crad text-center" style="background:#efefef;"><img class="image_align" src="blog/' + image[i] + '"><hr class="hr_margin"><div class="file_name">' + image[i] + '</div><hr class="hr_margin">' +
                            '<a class="btn edit_file_remove" onclick="removeedit(10' + count + ')">Remove</a>' +
                            '</div></div>');
                        $(".edit_input_old").append('<input class="remove10' + count + '" type="text" value="' + image[i] + '" name="oldphoto[]">');
                    } else {
                        count++;
                        $(".edit_input_file").append('<div class="col-sm-4 mb-3 remove20' + count + '"><div class="crad text-center" style="background:#efefef;"><video class="image_align" controls src="blog/' + image[i] + '"></video><hr class="hr_margin"><div class="file_name">' + image[i] + '</div><hr class="hr_margin">' +
                            '<a class="btn edit_file_remove" onclick="removeedit(20' + count + ')">Remove</a>' +
                            '</div></div>');
                        $(".edit_input_old").append('<input type="hidden" class="remove20' + count + '" value="' + image[i] + '" name="oldphoto[]">');
                    }
                }
            });
        }
    });
}

function removeedit(id) {
    // alert(id);
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

var myFuncCalls = 0;

function editFile(event) {

    var tmppath = URL.createObjectURL(event.target.files[0]);
    var file_name = $("#uploadInputedit").val();
    value = file_name.split(/(\\|\/)/g).pop()
    const oFile = document.getElementById("uploadInputedit").files[0];
    if (oFile.size > 53477376) // 2 MiB for bytes.
    {
        warning();
        return false;
    }
    myFuncCalls++;
    phovid = value.split(".");
    if (phovid[1] === 'jpg' || phovid[1] === 'png') {

        $(".edit_input_file").append('<div class="col-sm-4 mb-3 remove30' + myFuncCalls + '"><div class="crad text-center" id="file_empty" style="background:#efefef;"><img class="image_align" src="' + tmppath + '" id="output"/><hr class="hr_margin"><div class="file_name">' + value + '</div><hr class="hr_margin">' +
            '<a class="btn edit_file_remove" onclick="removeedit(30' + myFuncCalls + ')">Remove</a>' +
            '</div>');
    } else {

        $(".edit_input_file").append('<div class="col-sm-4 mb-3 remove30' + myFuncCalls + '"><div class="crad text-center" id="file_empty" style="background:#efefef;"><video class="image_align" src="' + tmppath + '" id="output" controls></video><hr class="hr_margin"><div class="file_name">' + value + '</div><hr class="hr_margin">' +
            '<a class="btn edit_file_remove" onclick="removeedit(30' + myFuncCalls + ')">Remove</a>' +
            '</div>');
    }

    filecount = 1 + myFuncCalls;
    $("#uploadInputedit").removeAttr("id");
    $(".edit_input_old").append('<input type="file" class="remove30' + filecount + '" name="newphoto[]" accept="image/png, image/gif, image/jpeg, video/*", onchange="editFile(event)"  id="uploadInputedit"/>');
    // console.log(tmppath);
    // $(this).closest("img").attr('src',tmppath);
}

// $(document).ready(function(){

//   $(".edit_file_remove").click(function () {
//       alert("iuguygu");
//     $(".remove"+this.id).html(" ");
//     // loadFile();
// });
// });

$(document).ready(function() {
    $('#Editform').submit(function(e) {
        e.preventDefault();
        var editor = $(".full-editor_edit>.ql-editor").html();
        $(".edit_editervalue").val(editor);
        $(".edit_submit_btn").attr('disabled', 'disabled')
        $(".edit_submit_btn").html('<span class="spinner-border spinner_in" role="status" aria-hidden="true"></span> Loading...');
        let formData = new FormData($('#Editform')[0]);
        console.log(formData);
        $.ajax({
            type: "post",
            url: "/api/editBlog",
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
                    text: 'Your blog has been deleted.',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your blog file is safe',
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
        url: "/api/deleteBlog",
        data: { user_id: ID },
        success: function(data) {
            console.log(data);
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



$(document).ready(function() {
    $(".add_title").hide();
    $(".add_date").hide();
    $(".add_time").hide();
    $(".add_des").hide();
    $('.add_submit').click(function() {
        var email = $("#emailBasic").val();
        var date = $("#flatpickr-date").val();
        var time = $("#flatpickr-time").val();
        var des = $("#nameBasic").val();
        if (email = $("#emailBasic").val()) {
            $(".add_title").hide();
        } else {
            $(".add_title").show();
            return false;
        }
        if (date = $("#flatpickr-date").val()) {
            $(".add_date").hide();
        } else {
            $(".add_date").show();
            return false;
        }
        if (time = $("#flatpickr-time").val()) {
            $(".add_time").hide();
        } else {
            $(".add_time").show();
            return false;
        }
        if (des = $("#nameBasic").val()) {
            $(".add_des").hide();
        } else {
            $(".add_des").show();
            return false;
        }
    });
});
$(document).ready(function() {
    $(".edd_title").hide();
    $(".edd_date").hide();
    $(".edd_time").hide();
    $(".edd_des").hide();
    $('.edd_submit').click(function() {
        var email = $("#edit_title").val();
        var date = $("#edit_date").val();
        var time = $("#edit_time").val();
        var des = $("#edit_description").val();
        if (email = $("#edit_title").val()) {
            $(".edd_title").hide();
        } else {
            $(".edd_title").show();
            return false;
        }
        if (date = $("#edit_date").val()) {
            $(".edd_date").hide();
        } else {
            $(".edd_date").show();
            return false;
        }
        if (time = $("#edit_time").val()) {
            $(".edd_time").hide();
        } else {
            $(".edd_time").show();
            return false;
        }
        if (des = $("#edit_description").val()) {
            $(".edd_des").hide();
        } else {
            $(".edd_des").show();
            return false;
        }
    });
});



// data table 

festivaltable();

function festivaltable() {
    $.ajax({
        type: "get",
        url: "/api/showBlog",
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
                    { data: 'title' },
                    { data: 'date' },
                    { data: 'time' },
                    { data: 'description' },
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

// datapickers 
(function() {
    // Flat Picker
    // --------------------------------------------------------------------
    const flatpickrDate = document.querySelector('#flatpickr-date'),
        flatpickrTime = document.querySelector('#flatpickr-time'),
        editflatpickrDate = document.querySelector('.edit_date_datepec'),
        editflatpickrDateTime = document.querySelector('.edit_time_datepec');


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

    // Time
    if (flatpickrTime) {
        flatpickrTime.flatpickr({
            enableTime: true,
            noCalendar: true
        });
    }

    // time

    if (editflatpickrDateTime) {
        editflatpickrDateTime.flatpickr({
            enableTime: true,
            noCalendar: true
        });
    }




})();