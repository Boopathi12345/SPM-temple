@extends('layouts.adminview')

@section('pagestyles')

 <!-- Vendors CSS -->
 <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<style>
    .flatpickr-calendar{
        background:white;
    }
    .red{
      color:red;
    }
</style>

@stop

@section('content') 
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

@php  $role=DB::table('role')->where('id', Auth::user()->role )->get();
            $permissionArray = [];
            if(count($role) > 0){
                $permissionArray = json_decode($role[0]->permission);
            }
            @endphp
   <!-- Content wrapper -->
   <div class="content-wrapper">

<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    
    
<h4 class="py-3 breadcrumb-wrapper mb-4">
<span class="text-muted fw-light">Dashboard /</span> Add User
</h4>

<div class="row">
@if(in_array('add_user',$permissionArray))
<!-- FormValidation -->
<div class="col-12">
<div class="card">
<h5 class="card-header">Add User</h5>
<div class="card-body">

<form id="formValidationExam" action="" class="row g-3">

  <!-- Account Details -->
    <div class="card-body ps-xl-2">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="assets\img\avatars\1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
          <div class="button-wrapper">
            <!-- <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              
            </label> -->
            <input type="file" id="imgInp" class="account-file-input" name="photo" hidden="" accept="image/png, image/jpeg, image/gif">
            <button type="button" class="btn btn-primary file_select mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Upload photo</span>
            </button>

            <p class="mb-0">Allowed JPG, GIF or PNG
              <!-- . Max size of 800K -->
            </p>
          </div>
        </div>
      </div>
    <hr class="mt-0" />


  <div class="col-md-6">
    <label class="form-label" for="formValidationName">Full Name <span class="name_validation red">*</span></label>
    <input type="text" id="formValidationName" required class="form-control" name="formValidationName" />
  </div>

  <div class="col-md-6">
    <label class="form-label" for="formValidationLast">Last Name <span class="lname_validation red">*</span></label>
    <input type="text" id="formValidationLast" required class="form-control" name="formValidationLast" />
  </div>
  <div class="col-md-6">
    <label class="form-label" for="formValidationFather">Father Name <span class="fathername_validation red">*</span></label>
    <input type="text" id="formValidationFather" required class="form-control" name="formValidationFather" />
  </div>
  <div class="col-md-6">
    <label class="form-label" for="formValidationEmail">Email <span class="email_validation red">*</span></label>
    <input class="form-control" required type="email" id="formValidationEmail" name="formValidationEmail" />
  </div>

  <!-- <div class="col-md-6">
    <div class="form-password-toggle">
      <label class="form-label" for="formValidationPass">Password</label>
      <div class="input-group input-group-merge">
        <input class="form-control" required type="password" id="formValidationPass" name="formValidationPass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-password2" />
        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>
      </div>
    </div>
  </div> -->
  <div class="col-md-6">
    <div class="form-password-toggle">
      <label class="form-label" for="formValidationConfirmPass">Password <span class="password_validation red">*</span></label>
      <div class="input-group input-group-merge">
        <input class="form-control" type="password" required id="formValidationConfirmPass" name="formValidationConfirmPass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-confirm-password2" />
        <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i class="bx bx-hide"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label class="form-label" for="formValidationDob">date of birth <span class="dob_validation red">*</span></label>
    <input type="text" class="form-control flatpickr-validation" required style="background: white;" name="formValidationDob" id="formValidationdate" required />
  </div>
  <div class="col-md-6">
    <label class="form-label" for="formValidationPhone">Phone <span class="phone_validation red">*</span></label>
    <input type="text" class="form-control" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" pattern=".{10,}" maxlength="10" name="formValidationPhone" required id="formValidationPhone" required />
  </div>

  <!-- <div class="col-md-6">
    <label for="formValidationFile" class="form-label">Profile Pic</label>
    <input class="form-control" type="file" id="formValidationFile" name="formValidationFile">
  </div> -->
 

  <div class="col-md-6">
    <label class="form-label" for="formValidationSelect2">User type <span class="usertype_validation red">*</span></label>
    <select id="formValidationSelect2" name="formValidationSelect2" required class="form-select select2" data-allow-clear="true">
      <option value="">Select</option>
      <option value="Poosari">Poosari </option>
      <option value="Dharmagartha">Dharmagartha</option>
      <option value="Other">Other</option>
      
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label" for="formValidationCity">City <span class="city_validation red">*</span></label>
    <input type="text" value="" class="form-control" required name="formValidationCity" id="formValidationCity" />
  </div>

  <div class="col-md-6">
    <label class="form-label" for="formValidationState">State <span class="state_validation red">*</span></label>
    <input class="form-control typeahead" type="text" required id="formValidationState" name="formValidationState" autocomplete="off" />
  </div>
  <div class="col-md-6">
    <label class="form-label" for="formValidationHobbies">Gender <span class="gender_validation red">*</span></label>
    <select id="formValidationGender" name="formValidationGender" required class="form-select select2" data-allow-clear="true">
      <option value="">Select</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
</select>
  </div>

  <div class="col-md-6">
    <label class="form-label" for="formValidationPermission">Role <span class="role_validation red">*</span></label>
    <select id="formValidationPermission" name="formValidationPermission" required class="form-select select2" data-allow-clear="true">
      <option value="">Select</option>
      @php $role = DB::table('role')->where('active', '1')->orderBy('id','desc')->get();@endphp
                                    @foreach($role as $rolevalue)
      <option value="{{$rolevalue->id}}">{{$rolevalue->name}}</option>
      @endforeach
     
</select>
  </div>

  <div class="col-md-12">
    <label class="form-label" for="formValidationAddress">Address <span class="address_validation red">*</span></label>
    <textarea class="form-control" id="formValidationAddress" required name="formValidationAddress" rows="3"></textarea>
  </div>
 



  @if(in_array('user_list_view_button',$permissionArray))
  <div class="col-md-12 text-center">
    <button type="submit" name="submitButton" class="btn btn-primary submit_button adduservalidation">Submit</button>
  </div>
  @endif
</form>
</div>

</div>
@else
            <div class=" col-sm-12">
                <div class="card text-center p-5">
<h4>Permission Denied</h4>
</div>	</div>

@endif
</div>
<!-- /FormValidation -->
</div>

    
 </html>




@endsection

@section('pageScript')
 <!-- Vendors JS -->

<script src="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{URL::asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>


  <!-- Page JS -->
  <!-- <script src="{{URL::asset('assets/js/form-validation.js')}}"></script> -->
  <script src="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
  
<script src="{{URL::asset('admin/js/adduser.js')}}"></script>
@stop