fullvalue_in('all');

function fullvalue_in(ID){
 
     $.ajax({
        type: "get",
        data:{user_id:ID},
        url: "/api/ActiveUserValue",
        success: function(data) {
            console.log(data);
            $("#festival_value").html(" ");
            $.each(data, function(key, val) {
                if(val.photo){
                  image='images/'+val.photo;
                }else{
                   image= 'assets/img/avatars/3.png';
                }
                // if(val.active==1){
                //     active='<span class="badge bg-label-success">Active</span>';
                // }else{
                //     active='<span class="badge bg-danger">In Active</span>';
                // }
                if(val.active==1){
                    activepage='active';
                    clore='badge bg-label-success me-1';
                    active_button='IN Active';
                    active_button_c='badge btn-outline-danger me-1';
                    
                }else{
                  activepage='inactive';
                  clore='bg-label-reddit badge me-1';
                  active_button='Active';
                  active_button_c='badge btn-outline-success me-1';
                 
                }
                
               
                $("#festival_value").append(' <tr>'
                +'<td>'+(key+1)+'</td>'
                +'<td><img src="'+image+'" alt="" class="rounded-circle" style="width:60px;height:60px;"></td>'
                +'<td>'+val.name+'</td>'
                +'<td>'+val.user_type+'</td>'
                +'<td>'+val.email+'</td>'
                +'<td>'+val.phone+'</td>'
                +'<td><span class="badge '+clore+' me-1">'+activepage+'</span></td>'+
          '<td><a href="/profile/'+val.id+'" class="btn btn-outline-warning btn-icon me-3"><i class="bx bxs-user"></i></a>'+
          '<a href="/edituser/'+val.id+'" class="btn btn-outline-success btn-icon me-3"><i class="bx bxs-edit"></i></a>'+
          '<a href="javascript:;" class="btn btn-icon '+active_button_c+'" id="'+activepage+'" style="padding: 0 35px" onclick="Alert(this,'+val.id+')">'+active_button+'</a>'+
        '</td></tr>');
            });
        }
    });
}



function Alert(checking,ID){
var permission_page=$(".delete_option_active").val();
if(permission_page=='active'){
   Delete_acti=checking.id;
  //  alert(Delete_acti);
   if(Delete_acti=='active'){
     modelbutton='Yes, Inactive it!';
     successtitle='Inactive';
     successtext='Your user has been inactive.';
     title_val="Your user has been inactive.";

   }else{
    modelbutton='Yes, Active it!';
    successtitle='Active';
    successtext='Your user has been active.';
    title_val="Your user has been active.";
   }
    
    Swal.fire({
        title: 'Are you sure?',
        text: title_val,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText:modelbutton,
        customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          if(Delete_acti=="active"){
            delete_function(ID);
          }else{
            InativeUser(ID);
          }
          Swal.fire({
            icon: 'success',
            title: successtitle,
            text: successtext,
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your user file is safe',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    }else{
      
      warning();
    }
}
function delete_function(ID){
    $.ajax({
        type: "delete",
        url: "/api/DestroyUser",
        data: {user_id:ID},
        success: function(data) {
            // console.log(data);
            var checking= $(".active_api_run").attr('id');
            if(checking=='btnradio1'){
              fullvalue('all');
            }else{
             fullvalue(1);
            }
           
        }
    });
}

function warning(){
 
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

function InativeUser(ID){
    $.ajax({
        type: "get",
        url: "/api/INActiveUser",
        data: {user_id:ID},
        success: function(data) {
            // console.log(data);
           var checking= $(".active_api_run").attr('id');
           if(checking=='btnradio1'){
            fullvalue('all');
           }else{
            fullvalue(0);
           }
           
           
        }
    });
}

$(document).ready(function(){
  $(".button_click").click(function(){
    $(".button_click").removeClass("active_api_run");
    $("#"+this.id).addClass("active_api_run");
  });
});
fullvalue('all');
function fullvalue(ID) {
  $.ajax({
            type: "get",
            data:{user_id:ID},
        url: "/api/ActiveUserValue",
            success: function(Vdata) {
            
                console.log(Vdata);
              
      $('.dt-complex-header').DataTable( {
    data: Vdata,
    bDestroy: true,
    // scrollX: false,
   
    columns: [
      { 
      data: "id",
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        },
    },
    { data: null,
     
      "render": function(data) {
        var active = data.photo;
        if(active){
          image='<img src="images/'+active+'" alt="" class="rounded-circle" style="width:60px;height:60px;"></img>';
          
          return image;
        }else{
           image= '<img src="assets/img/avatars/3.png" alt="" class="rounded-circle" style="width:60px;height:60px;">';
           return image;
        }

      }
    },
      { data: 'name' },
      { data: 'user_type' },
      { data: 'email' },
      { data: 'phone' },
      { data: null,
        "render": function(data) {
          var active = data.active;
          if(active==1){
            activevalue='<span class="badge bg-label-success me-1">active</span>';
          }else{
            activevalue='<span class="badge bg-label-reddit me-1">inactive</span>';}
          return activevalue;
        }
      
      
      },
      { 
      data: null,
                "render": function(data) {
                    var ID = data.id;
                    var Active = data.active;
                    if(Active==1){
                      activepage='active';
                      active_button='IN Active';
                      active_button_c='badge btn-outline-danger me-1';
                      
                  }else{
                    active_button='Active';
                    active_button_c='badge btn-outline-success me-1';
                    activepage='inactive';
                  }
                   
                    fromefullvalue = '<a href="/profile/'+ID+'" class="btn btn-outline-warning btn-icon me-3"><i class="bx bxs-user"></i></a><a href="/edituser/'+ID+'" class="btn btn-outline-success btn-icon me-3"><i class="bx bxs-edit"></i></a>'
                    +'<a href="javascript:;" class="btn btn-icon '+active_button_c+'" id="'+activepage+'" style="padding: 0 35px" onclick="Alert(this,'+ID+')">'+active_button+'</a>';
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