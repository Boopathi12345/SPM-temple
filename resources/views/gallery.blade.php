@extends('layouts.adminview')

@section('pagestyles')

<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<style>
    .dz-processing{
        display: inline-block;
    width: 11.25rem;
    }
    .dz-message {
    margin: 1rem 0;
    font-weight: 500;
    text-align: center;
}
.border_style{
    border: 2px solid;
    border-style: dashed;
    /* cursor: pointer; */
    padding: 20px 25px 0px 25px;
}
.image_align{
  width: 7em;
    height: 7em;
    /* margin-right: 15px; */
    margin-bottom: -5px;
}
#output{
  /* display:none; */
}
.file_name{
  text-overflow: ellipsis;
  width: 100%;
    overflow: hidden;
    font-size:13px;
    white-space: nowrap;
    padding: 0px 8px;
}
.hr_margin{
margin:5px 0;
color:#d8dcdf;
}
.file_remove{
  padding: 3px 0px;
    width: 100%;
    font-size: 13px;
}
.file_remove:hover{
  color: #677788;
    background: rgba(38,60,85,.1);
}
.view_text_over{
  overflow: hidden;
}
.img_size{
  width:100% !important;
  height:120px !important;
  margin-bottom: 15px;
}
.edit_file_remove{
  padding:0 39px;
}
.edit_file_remove:hover{
  padding:0 39px;
  background:#d3d3d3d4;
}
.spinner_in{
  position: relative;
    top: 0px;
    left: -5px;
}

.avatar-group .avatar img, .avatar-group .avatar .avatar-initial {
    border: 0px solid #fff !important;
}
.avatar img {
    width: 39px !important;
    height: 38px !important;
}
.mm {
    padding-left: 20 !important;
    list-style: none !important;
}
.more{
  color:red; cursor:pointer;
  }
  .star{
    color:red;
  }
</style>
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />


    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <script src="{{URL::asset('assets/vendor/js/helpers.js')}}"></script>
@stop

@section('content') 

@php  $role=DB::table('role')->where('id', Auth::user()->role )->get();
            $permissionArray = [];
            if(count($role) > 0){
                $permissionArray = json_decode($role[0]->permission);
            }
            @endphp

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">
      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        @if(in_array('gallery',$permissionArray))
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Dashboard /</span> Gallery
</h4>

<!-- Bootstrap modals -->
<div class="card radius-15">
<div class="card-body"> 
  @if(in_array('add_gallery_button',$permissionArray))
  <h5 class="card-header">Gallery <button type="button" class="btn btn-primary ms-3 add_btn"><i class="bx bx-plus me-sm-2"></i> Add New</button></h5> 
  @endif
  <!-- Complex Headers -->
<div class="">
  <!-- <h5 class="card-header">Complex Headers</h5> -->
  <div class="card-datatable text-nowrap ">
    <table class="dt-complex-header table table-bordered" style="border-color: #d4d8dd">
      <thead>
        <tr>
          <th>Reg.No</th>
          <th>Gallery Tittle</th>
          <th>Description</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
       
      </thead>
    </table>
  </div>
  </div>
</div>
<!--/ Extended Modals -->

            
          </div>
          <!-- / model -->
 <!-- Modal -->
 
 <div class="modal fade" id="addmodel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Add Gallery</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="festivelform"  >
                <div class="row g-2">
                 
                    <div class="col-sm-12 mb-0">
                   
                      <label for="emailBasic" class="form-label">Title<span class="add_title star" >*</span></label>
                      <input type="text" id="emailBasic"  name="title" class="form-control" required>

                    </div>
                    <div class="col-sm-6 mb-0">
                    <input type="hidden" id="dobBasic"  name="date" value="<?php date_default_timezone_set('Asia/Calcutta'); echo date("m-d-Y / H:i:s"); ?>" class="form-control">
                      <!-- <input type="text" id="flatpickr-date" required name="date" class="form-control"> -->
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-3">
                      <label for="nameBasic" class="form-label">Description<span class="add_des star" >*</span></label></label>
                      <input type="text" id="nameBasic"  name="description" class="form-control" required>

                    </div>
                    <div class="col-sm-12">
                    <label for="nameBasic" class="form-label">Photo upload <span class="photo_alert star" >*</span></label>
                    
                    <div>
                      <div class="border_style">
                          <button type="button" class="btn btn-secondary video_add w-100 mb-3">
                            Upload Image 
                          </button>
                      <div class="demo-inline-spacing">
             
                    </div>
                  <div class="row file_image_show"></div>
          
          
          </div>
          <div class="add_input_file" style="display:none;">
          <input type="file" name="photo[]" accept="image/png, image/gif, image/jpeg " class="addremove1" onchange="addFile(event)" id="uploadInput"/>
          <!-- <input type="file" name="photo[]" onchange="loadFile(event)"  id="uploadInput"/> -->

          </div>
        
          <div class="fallback">
           
          </div>
</div>
                    </div>
                  </div>
                 
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary add_submit_btn gallery_submit">Save</button>
                  </form>
                </div>
               
              </div>

            </div>
          </div>
        </div>
  
       
 <div class="modal fade" id="editmodel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Edit Gallery</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(in_array('update_gallery_button',$permissionArray))
                <form id="Editform" class="needs-validation" novalidate >
                <div class="row g-2">
                 
                    <div class="col-sm-12 mb-0">
                   
                      <label for="emailBasic" class="form-label">Title <span class="edd_title star" >*</span></label>
                      <input type="hidden" name="id">
                      <input type="text" id="edit_title"  name="title" class="form-control" required>
                       
                    </div>
                    <div class="col-sm-6 mb-0">
                      <!-- <label for="dobBasic" class="form-label">Date</label> -->
                      <input type="hidden" id="edit_date" required name="date" value="<?php date_default_timezone_set('Asia/Calcutta'); echo date("m-d-Y / H:i:s"); ?>" class="form-control">
                      <!-- <input type="text" id="edit_date" required name="date" class="form-control edit_date_datepec"> -->
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-3">
                      <label for="nameBasic" class="form-label">Description<span class="edd_des star" >*</span></label>
                      <input type="text" id="edit_description" required name="description" class="form-control">
                    </div>
                    <div class="col-sm-12">
                    <label for="nameBasic" class="form-label">Photo  upload<span class="photo_alert star" >*</span></label>
                    <div>
          <div class="border_style file_image_edit">
          <button type="button" class="btn btn-secondary video_edit w-100 mb-3">
                 Upload Image 
              </button>
          <div class="demo-inline-spacing"></div>
          <div class="row edit_input_file">
            
            </div>
          </div>
          <div class="edit_input_old" style="display:none;">
          
          <!-- <input type="file" name="photo[]" onchange="loadFile(event)"  id="uploadInput"/> -->
          </div>
          <div class="fallback">
           
          </div>
          </div>
                    </div>
                  </div>
                 
                  @else
                  <div class="row">
                    <div class="col mb-3">
                      <h5>Permission Denied</h5>
                    </div>
                  </div>
                  @endif 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary edit_submit_btn edd_submit">Save</button>

                  </form>
                </div>
               
              </div>

            </div>
          </div>

@if(in_array('delete_gallery_button',$permissionArray))
<input class="delete_option_active" value="active" type="hidden">
@endif


  @else
            <div class=" col-sm-12">
                <div class="card text-center p-5">
                <h4>Permission Denied</h4>
                </div>
         	</div>

  @endif
           <!-- /end model -->

</html>

@endsection

@section('pageScript')
 <!-- Vendors JS -->
 <script src="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>

<!-- <script src="../../assets/js/forms-pickers.js"></script> -->
<script>
window.jQuery || document.write('<script src="./uploads/ESA 4/js/jquery-1.12.2.min.js"></script>');
</script>
  <!-- Vendors JS -->
  <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js')}}"></script>
<!-- <script src="{{URL::asset('assets/vendor/js/bootstrap.js')}}"></script> -->

<script src="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
<script src="{{URL::asset('admin/js/gallery.js')}}"></script>
@stop