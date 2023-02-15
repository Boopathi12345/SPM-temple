@extends('layouts.adminview')

@section('pagestyles')
<style>
.user_image{
    /* border: 5px solid; */
    width: 120px;
    height: 120px !important;
    margin-bottom:20px;
    /* border-color: white; */
    /* position: relative; */
    /* top: -25px; */
}
.profile_bg_img{
    width: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    height: 250px;
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
<span class="text-muted fw-light">Dashboard /</span> Profile
</h4>


<!-- Header -->
<!-- <div class="row">
<div class="col-12">
<div class="card mb-4">
<div class="user-profile-header-banner">
<img src="{{URL::asset('assets/img/pages/profile-banner.png')}}" alt="Banner image" class="rounded-top profile_bg_img">
</div>
<div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center">
<div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
  <img src="{{URL::asset('images')}}/{{$form->photo}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img user_image">
</div>
<div class="flex-grow-1 mt-3">
  <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
    <div class="user-profile-info">
      <h4> <b>{{$form->name}} {{$form->last_name}}</b></h4>
      <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
        <li class="list-inline-item fw-semibold">
          {{$form->user_type}}
        </li></ul>
    </div>
    <a href="/edituser/{{$form->id}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user-check'></i> Edit
    </a>
  </div>
</div>
</div>
</div>
</div>
</div> -->
<!--/ Header -->


<!-- User Profile Content -->
<div class="row">
@if(in_array('profile',$permissionArray))
<div class="col-xl-12 card">
<div class="card-body ">
<div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center">
<div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
  <img src="{{URL::asset('images')}}/{{$form->photo}}" alt="user image" class="d-block h-auto ms-0 rounded-3 user-profile-img user_image">
</div>
<div class="flex-grow-1 mt-3">
  <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
    <div class="user-profile-info">
      <h4> <b>{{$form->name}} {{$form->last_name}}</b></h4>
      <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
        <li class="list-inline-item fw-semibold">
          {{$form->user_type}}
        </li></ul>
    </div>
    <a href="/edituser/{{$form->id}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user-check'></i> Edit
    </a>
  </div>
</div>
</div>
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">

        <!-- <small class="text-muted text-uppercase">About</small> -->
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2">Father Name:</span> <span>{{$form->father_name}}</span></li>
          <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2">Date of birth:</span> <span><?php $date=explode('-', $form->dob); $fulldate=$date[2].'/'.$date[1].'/'.$date[0]; print_r($fulldate);?></span></li>
          <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2">Gender:</span> <span>{{$form->gender}}</span></li>
 
        </ul>
     
  </div>
   <div class="col-xl-4 col-lg-5 col-md-5">
        <!-- <small class="text-muted text-uppercase">Address</small> -->
        <ul class="list-unstyled mt-3 mb-0">
          <li class="align-items-center mb-3"><span class="fw-semibold mx-2">State:</span> <span>{{$form->state}}</span></li>
          <li class="align-items-center mb-3"><span class="fw-semibold mx-2">City:</span> <span>{{$form->city}}</span></li>
          <li class="align-items-center"><span class="fw-semibold mx-2">Address:</span> <span>{{$form->address}}</span></li>
        </ul>
      </div>  
      <div class="col-xl-4 col-lg-5 col-md-5">
         <!-- <small class="text-muted text-uppercase">Contacts</small> -->
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2">Phone:</span> <span>{{$form->phone}}</span></li>
          <!-- <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>john.doe</span></li> -->
          <li class="d-flex align-items-center mb-3"><span class="fw-semibold mx-2">Email:</span> <span>{{$form->email}}</span></li>
        </ul>
    </div>
</div>
</div>
  </div>
  @else
            <div class=" col-sm-12">
                <div class="card text-center p-5">
<h4>Permission Denied</h4>
</div>	</div>

@endif
  </div>
</div>
          <!-- / Content -->
</html>
       


@endsection

@section('pageScript')

@stop