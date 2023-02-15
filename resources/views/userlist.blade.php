@extends('layouts.adminview')

@section('pagestyles')
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<style>
  .image_width{
    width: 100px !important;
    height: 100px !important;
  }
  .margin_left{
    margin-left:75%;
  }
 #inactive{
   width:65px;
   background-color: #dff9ec !important;
    color: #39da8a !important;
 }
 #inactive:hover{
  
   background-color: #39da8a !important;
    color: white !important;
 }
</style>
   
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
@stop

@section('content') 
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

@php  $role=DB::table('role')->where('id', Auth::user()->role )->get();
            $permissionArray = [];
            if(count($role) > 0){
                $permissionArray = json_decode($role[0]->permission);
            }
            @endphp

<!-- / Navbar -->

      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="breadcrumb-wrapper">
  <span class="text-muted fw-light">Dashboard /</span> Userlist
</h4>
@if(in_array('user_list',$permissionArray))
<div class="btn-group mb-4 margin_left" role="group" aria-label="Basic radio toggle button group">
<input type="radio" class="btn-check button_click active_api_run" name="btnradio" id="btnradio1" onclick="fullvalue('all')" checked="" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio1">All</label>
                <input type="radio" class="btn-check button_click" name="btnradio" id="btnradio2" onclick="fullvalue(1)" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2">Active</label>

                <input type="radio" class="btn-check button_click" name="btnradio" onclick="fullvalue(0)" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">In Active</label>
              </div>
              
<!-- Connection Cards -->
<!-- <div class="row g-4" id="card_value">
 
</div> -->
<!-- 
<div class="card">
  <h5 class="card-header">Userlist</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <caption class="ms-4">List of Projects</caption>
      <thead>
        <tr>
          <th>S.No</th>
          <th>Image</th>
          <th>Name</th>
          <th>Type</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Status</th>
          <th>Action</th>
         
        </tr>
      </thead>
      <tbody id="festival_value">
       
      </tbody>
    </table>
  </div>
</div> -->

<div class="card radius-15">
<div class="card-body"> 
  <h5 class="card-header">Userlist</h5> 

  <!-- Complex Headers -->
<div class="">
  <!-- <h5 class="card-header">Complex Headers</h5> -->
  <div class="card-datatable text-nowrap ">
    <table class="dt-complex-header table table-bordered" style="border-color: #d4d8dd">
      <thead>
        <tr>
        <th>S.No</th>
          <th>Image</th>
          <th>Name</th>
          <th>Type</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
       
      </thead>
    </table>
  </div>
  </div>
</div>
<!--/ Extended Modals -->

@if(in_array('user_list_delete_button',$permissionArray))

<input class="delete_option_active" value="active" type="hidden">
@endif    
          </div>
<!--/ Connection Cards -->
@else
            <!-- <div class=" col-sm-12"> -->
                <div class="card text-center p-5">
<h4>Permission Denied</h4>
</div>

@endif
            
          </div>
          <!-- / Content -->
</html>
          

@endsection

@section('pageScript')
<script src="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script>
window.jQuery || document.write('<script src="./uploads/ESA 4/js/jquery-1.12.2.min.js"></script>');
</script>
  <!-- Vendors JS -->
  <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js')}}"></script>
<!-- <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script> -->
<!-- <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script> -->
<!-- <script src="{{URL::asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js')}}"></script> -->
<!-- <script src="{{URL::asset('assets/vendor/js/bootstrap.js')}}"></script> -->
<script src="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<!-- <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script> -->
<script src="{{URL::asset('admin/js/userlist.js')}}"></script>
@stop