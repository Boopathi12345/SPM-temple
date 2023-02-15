@extends('layouts.adminview')

@section('pagestyles')
<style>
  .star{
    color:red;
  }
</style>

<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/dropzone/dropzone.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />


    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />

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
@if(in_array('payment',$permissionArray))
        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Dashboard /</span> Payment
</h4>

<!-- Bootstrap modals -->
<div class="card radius-15">
<div class="card-body"> 
@if(in_array('add_payment_button',$permissionArray))
  <h5 class="card-header">Payment <button type="button" class="btn btn-primary ms-3 add_btn"><i class="bx bx-plus me-sm-2"></i> Add New</button></h5> 
@endif
  <!-- Complex Headers -->
<div class="">
  <!-- <h5 class="card-header">Complex Headers</h5> -->
  <div class="card-datatable text-nowrap ">
    <table class="dt-complex-header table table-bordered" style="border-color: #d4d8dd">
      <thead>
        <tr>
          <th>Reg.No</th>
          <th>Name</th>
          <th>Father</th>
          <th>Amount</th>
          <th>Date / Time</th>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Add Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="festivelform">
                <div class="row g-2">
                 
                    <div class="col-sm-6 mb-2">
                    <label for="nameBasic" class="form-label">Name<span class="nameBasic star" >*</span></label>
                    <input type="text" id="nameBasic" name="name" class="form-control"  required>
                      
                    </div>
                    <input type="hidden" id="dobBasic" required name="date" value="<?php date_default_timezone_set('Asia/Calcutta'); echo date("d-m-Y / H:i:s"); ?>" class="form-control">
              
                    <div class="col-sm-6 mb-2">
                      <label for="emailBasic" class="form-label">Father Name<span class="emailBasic star" >*</span></label>
                      <input type="text" id="emailBasic" name="father_name" class="form-control"  required>
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col-sm-6 mb-2">
                    <label for="nameBasic" class="form-label">Total Amount<span class="amount star" >*</span></label>
                    
                    <input type="text" id="amount" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" required name="amount" class="form-control" >
                    </div>
                    <div class="col-sm-6 mb-2">
                    <label for="nameBasic" class="form-label">Phone Number<span class="add_number star" >*</span></label>
                    <div class="input-group">
                     <span class="input-group-text">IN (+91)</span>
                     <!-- <input type="text" id="number" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" name="number" class="form-control" required > -->
                      <!-- <input type="text" name="number" id="phone-number-mask" class="form-control phone-number-mask" > -->
                      <input type="text" id="add_number" name="number" class="form-control" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" pattern=".{10,}" maxlength="10" name="formValidationPhone" required id="formValidationPhone" required />
                    </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                    <label for="nameBasic" class="form-label">Address <span class="address star" >*</span></label>
                    
                    <textarea id="address" class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Edit Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(in_array('update_payment_button',$permissionArray))
                <form id="Editform">
                <div class="row g-2">
                 
                    <div class="col-sm-6 mb-2">
                   
                      <label for="emailBasic" class="form-label">Name<span class="edit_name star" >*</span></label>
                      <input type="hidden" name="id">
                      <input type="text" id="edit_name" name="edit_name" class="form-control"  required>
                    </div>
                 
                      <input type="hidden" id="edit_date" required name="date" value="<?php date_default_timezone_set('Asia/Calcutta'); echo date("d-m-Y / H:i:s"); ?>" class="form-control">
    
                    <div class="col-sm-6 mb-2">
                      <label for="nameBasic" class="form-label">Father Name<span class="edit_f_name star" >*</span></label>
                      <input type="text" id="edit_f_name" name="edit_f_name" class="form-control"  required>
                    </div>
                  </div>
                  <div class="row g-2">
                    
                    <div class="col-sm-6 mb-2">
                    <label for="nameBasic" class="form-label">Total Amount<span class="edit_amount star" >*</span></label>
                    
                    <input type="text" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" required id="edit_amount" name="edit_amount" class="form-control" >
                    </div>
                    <div class="col-sm-6 mb-2">
                    <label for="nameBasic" class="form-label">Phone Number<span class="edit_number star" >*</span></label>
                    <div class="input-group">
                     <span class="input-group-text">IN (+91)</span>
                      <!-- <input type="text" id="edit_number" name="edit_number" class="form-control phone-number-mask" > -->
                      <!-- <input type="text" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" required id="edit_number" name="edit_number" class="form-control"  > -->
                      <input type="text" id="edit_number" name="edit_number" class="form-control" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" pattern=".{10,}" maxlength="10" name="formValidationPhone" required id="formValidationPhone" required />
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-2">
                    <label for="nameBasic" class="form-label">Address <span class="edit_address star" >*</span></label>
                    <textarea class="form-control" name="edit_address" id="edit_address" rows="3"></textarea>
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
          @if(in_array('delete_payment_button',$permissionArray))
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

<script src="{{URL::asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{URL::asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{URL::asset('assets/js/form-layouts.js')}}"></script>

<script src="{{URL::asset('admin/js/payment.js')}}"></script>
@stop