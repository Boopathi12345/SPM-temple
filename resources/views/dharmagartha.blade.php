@extends('layouts.adminview')

@section('pagestyles')

<!-- <link rel="stylesheet" href="https://vwebtech.com/familytree2/public/themes/orange/css/tree.css?v=1"> -->
    <link rel="stylesheet" href="{{URL::asset('assets\familytree.css')}}">
	<style>
		.user_image{
			width: 60%;
       margin-left: 10px;
     height: 103%;
		}
		#remove_image{
	position: absolute;
    border-radius: 50%;
    border: 1px solid #ff0000c9;
color:#ff0000c9;
    padding: 4px 1px 4px 4px;
    right: 26px;
		}
		#remove_image:hover{
			color:white;
			/* border-color:white; */
			background:#ff0000c9;

		}
    .text_overflow{
      text-overflow: unset;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    width: 103px;
    }
    .red{
      color:red;
    }
	</style>
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
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
  <span class="text-muted fw-light">Dashboard /</span> Dharmagartha
</h4>

@if(in_array('dharmagartha',$permissionArray))
<div class="card radius-15">
						<div class="card-body">
							<div class="card-title display-inline">
								<h4 class="mb-0 leave_add_res_title text-center">Dharmagartha Family Tree</h4>
</div>
                          

							<div class="pt-wrapper" style="overflow: auto;">
                                    <div class="pt-tree">
    <div class="pt-sm">
        
                <div class="tree poosari_family">

				
        </div></div>
		</div></div>
       
						
					</div>
				</div>




                                        </div>
                                      
                                        @else
            
                <div class="card text-center p-5">
<h4>Permission Denied</h4>
</div>

@endif
       
          <!-- / Content -->
  <!-- / model -->
 <!-- Modal -->
 <div class="modal fade" id="addmodel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Add Dharmagartha</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(in_array('add_dharmagartha_button',$permissionArray))
                <form id="Addpoosari">
                <div class="row g-2">
                 
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Name <span class="name_validation red">*</span></label>
                      <input type="text" required name="name" class="form-control namevalidation">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Last Name <span class="lname_validation red">*</span></label>
                      <input type="text" required name="last_name" class="form-control lnamevalidation">
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Father Name <span class="fathername_validation red">*</span></label>
                      <input type="text" required name="father_name" class="form-control fathervalidation">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Gender <span class="gender_validation red">*</span></label>
                       <select class="form-select gendervalidation" name="gender" data-style="btn-default">
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
			  <option value="other">Other</option>
            </select>
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Email <span class="email_validation red">*</span></label>
                      <input type="text" required name="email" class="form-control emailvalidation">
                    </div>
					<div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Date of birth <span class="dob_validation red">*</span></label>
                      <input type="text" id="flatpickr_add" required name="dob" class="form-control dobvalidation">
                    </div>
                  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Phone <span class="phone_validation red">*</span></label>
                      <input type="text" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" pattern=".{10,}" maxlength="10" required name="phone" class="form-control phonevalidation">
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">City <span class="city_validation red">*</span></label>
                      <input type="text" required name="city" class="form-control cityvalidation" style="color:#677788;">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">State <span class="state_validation red">*</span></label>
                      <input type="text" required name="state" class="form-control statevalidation" style="color:#677788;">
                    </div>
				
					<div class="col-sm-4 mb-0">
                      <label for="dobBasic" class="form-label">Photo <span class="photo_validation red">*</span></label>
                      <input type="file" required name="photo" accept="image/*" class="form-control addimage_in photovalidation">
                    </div>
                    <div class="col-sm-2 mb-0">
                      <img src="" class="addimageshow user_image" alt="user-image">
					  <!-- <input type="text" class="" name="oldphoto"> -->
					 
                    </div>
                    <div class="col-sm-12 mb-0">
                      <label for="dobBasic" class="form-label">Address <span class="address_validation red">*</span></label>
					  <textarea class="form-control addressvalidation" required name="address" rows="4"></textarea>
                      
                    </div>
			
                      <input type="hidden" id="addchild_id" required name="child_id" class="form-control">
                   
                  </div>
                  @else
                <div class="text-center">
<h4>Permission Denied</h4>
</div>

@endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary add_submit_btn addpoosarivalidation">Save</button>
                  </form>
                </div>
               
              </div>

            </div>
          </div>
      
     

		  <div class="modal fade" id="editmodel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Edit Dharmagartha</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(in_array('update_dharmagartha_button',$permissionArray))
                <form id="Editdpoosari">
                <div class="row g-2">
                 
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Name <span class="red editname_validation">*</span></label>
                      <input type="text" id="editname" required name="name" class="form-control">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Last Name <span class="red editlname_validation">*</span></label>
                      <input type="text" required id="editlast_name" name="last_name" class="form-control">
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Father Name <span class="red editfathername_validation">*</span></label>
                      <input type="text" required id="editfather_name" name="father_name" class="form-control">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Gender <span class="red editgender_validation">*</span></label>
                       <select class="form-select" id="editgender" name="gender" data-style="btn-default">
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
			  <option value="other">Other</option>
            </select>
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Email <span class="red editemail_validation">*</span></label>
                      <input type="text" required id="editemail" name="email" class="form-control">
                    </div>
					<div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Date of birth <span class="red editdob_validation">*</span></label>
                      <input type="text"required id="editdob" name="dob" class="form-control flatpickr_edit">
                    </div>
                  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Phone <span class="red editphone_validation">*</span></label>
                      <input type="text" required id="editphone" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" pattern=".{10,}" maxlength="10" name="phone" class="form-control">
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">City <span class="red editcity_validation">*</span></label>
                      <input type="text" required id="editcity" name="city" class="form-control">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">State <span class="red editstate_validation">*</span></label>
                      <input type="text" id="editstate" name="state" class="form-control">
                    </div>
					<div class="col-sm-4 mb-0">
                      <label for="dobBasic" class="form-label">Photo <span class="red editphoto_validation">*</span></label>
                      <input type="file" name="photo" class="form-control new_image editphoto" accept="image/*">
                    </div>
					<div class="col-sm-2 mb-0">
                      <img src="" class="user_image editimage_show" alt="user-image">
					  <input type="hidden" class="old_photo" name="oldphoto">
					  <a class="btn" id="remove_image"><i class="bx bx-trash me-1"></i></a>
                    </div>
					<div class="col-sm-12 mb-0">
                      <label for="dobBasic" class="form-label">Address <span class="red editaddress_validation">*</span></label>
					  <textarea class="form-control" required id="editaddress" name="address" rows="4"></textarea>
                      
                    </div>
					
				
                      <input type="hidden" id="poosariID" name="user_id" class="form-control">
                  
                  </div>
                  @else
                <div class="text-center">
<h4>Permission Denied</h4>
</div>

@endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary edit_submit_btn editpoosarivalidation">Save</button>
                  </form>
                </div>
               
              </div>

            </div>
          </div>
          @if(in_array('delete_dharmagartha_button',$permissionArray))

<input class="delete_option_active" value="active" type="hidden">
@endif  
     
           <!-- /end model -->
  
    </html>

    @endsection

    @section('pageScript')
    <script src="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
	<script src="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
	<script src="{{URL::asset('admin/js/dharmagartha.js')}}"></script>

    @stop