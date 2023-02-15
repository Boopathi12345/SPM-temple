@extends('layouts.adminview')

@section('pagestyles')
<style>
  .star{
    color:red;
  }
</style>
<link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />

    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />


    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />

@stop

@section('content') 
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
      @if(in_array('role',$permissionArray))
        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Dashboard /</span> Role
</h4>

<!-- Bootstrap modals -->
<div class="card radius-15">
<div class="card-body"> 
<h5 class="card-header">Role <button type="button" class="btn btn-primary ms-3 add_btn" ><i class="bx bx-plus me-sm-2"></i> Add New</button></h5> 

<p id="demo"></p>
  <!-- Complex Headers -->
<div class="table" style="">
  <!-- <h5 class="card-header">Complex Headers</h5> -->
  <div class="card-datatable text-nowrap ">
    <table class="dt-complex-header table table-bordered" style="border-color: #d4d8dd">
      <thead>
        <tr>
          <th>Reg.No</th>
          <th>Name</th>
          <th>permission</th>
          
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
                  <h5 class="modal-title" id="exampleModalLabel1">Add Role</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="festivelform">
                <div class="row g-2">
                 
                    <div class="col-sm-12 mb-2">
                    <label for="nameBasic" class="form-label">Name<span class="nameBasic star" >*</span></label>
                    <input type="text" id="nameBasic" name="name" class="form-control" required>
                    </div>
                    <div class="col-sm-12 mb-2">
                       <label for="nameBasic" class="form-label">Permission </label>
                       <select class="mm select2 form-select" id="permission" name="permission" multiple="multiple" placeholder="Choose anything" required>
                      </select>
                    
                    </div>
                  </div>
                 
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary add_submit_btn add_submit">Save</button>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Edit Role</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(in_array('update_role_button',$permissionArray))
                <form id="Editform">
                <div class="row g-2">
                 
                    <div class="col-sm-12 mb-2">
                   
                      <label for="emailBasic" class="form-label">Name<span class="edit_name star" >*</span></label>
                      <input type="hidden" name="id">
                      <input type="text" id="edit_name" name="edit_name" class="form-control" required>
                    </div>
                 
                     
                      <div class="col-sm-12 mb-2">
                       <label for="nameBasic" class="form-label">Permission <span class="edit_role_select star" >*</span></label>
                       <select class="select2 form-select " id="edit_role_select" name="edit_role_select" multiple="multiple" placeholder="Choose anything" required>
                                                       
                       </select>
                    
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
          @if(in_array('delete_role_button',$permissionArray))
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


    <script src="{{URL::asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{URL::asset('assets/js/main.js')}}"></script>
    <script src="{{URL::asset('assets/js/forms-selects.js')}}"></script>
  <!-- Vendors JS -->
  <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js')}}"></script>
<!-- <script src="{{URL::asset('assets/vendor/js/bootstrap.js')}}"></script> -->

<script src="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

    

<script src="{{URL::asset('admin/js/role.js')}}"></script>
@stop