@extends('layouts.adminview')

@section('pagestyles')
<style>
  .star{
    color:red;
  }
</style>
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
      @if(in_array('expences',$permissionArray))
        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Dashboard /</span> Expenses
</h4>


<div class="card radius-15">
						<div class="card-body">
							<div class="card-title display-inline">
              @if(in_array('add_expences_button',$permissionArray))
								<h4 class="mb-0 leave_add_res_title">Expenses <button class="btn btn-primary ms-3 add_model">Add</button></h4>
              @endif  
</div>

                                   
                            <div class="card-datatable text-nowrap ">
    <table class="dt-complex-header table table-bordered" style="border-color: #d4d8dd">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Description</th>
          <th>Date</th>
          <th>Amount</th>
          <th>Action</th>
        </tr>
       
      </thead>
    </table>
  </div>
                      
       
						
					</div>
				</div>




                                        </div>
                                      
            
       
          <!-- / Content -->
  <!-- / model -->
 <!-- Modal -->
 <div class="modal fade" id="addmodel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Add Expenses</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                <form id="AddExpenses">
                <div class="row g-2">
                <div class="col-sm-12 mb-0">
                      <label for="dobBasic" class="form-label">name<span class="nameBasic star" >*</span></label>
                      <input type="text" id="nameBasic" required name="name" class="form-control">
                    </div>
                    <div class="col-sm-12 mb-0">
                      <label for="dobBasic" class="form-label">Description<span class="des star" >*</span></label>
                      <input type="text" id="des" required name="description" class="form-control">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Date<span class="flatpickr-date star" >*</span></label>
                      <input type="text" id="flatpickr-date" required name="date" class="form-control">
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Amount<span class="amount star" >*</span></label>
                      <input type="text" id="amount" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" required name="amount" class="form-control">
                    </div>
                   
                   
                  </div>
 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary add_submit">Save</button>
                  </form>
                </div>
               
              </div>

            </div>
          </div>
      
     

		  <div class="modal fade" id="editmodel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Edit Expenses</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(in_array('update_expences_button',$permissionArray))
                <form id="EditdExpenses">
                <div class="row g-2">
                <div class="col-sm-12 mb-0">
                      <label for="dobBasic" class="form-label">name<span class="edd_name star" >*</span></label>
                      <input type="text" id="edd_name" required name="editname" class="form-control">
                    </div>
                <div class="col-sm-12 mb-0">
                      <label for="dobBasic" class="form-label">Description<span class="edd_des star" >*</span></label>
                      <input type="text" id="edd_des" required name="editdescription" class="form-control">
                    </div>
                    <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Date<span class="edit-flatpickr-date star" >*</span></label>
                      <input type="text" id="edit-flatpickr-date" required name="editdate" class="form-control">
                    </div>
                
				  <div class="col-sm-6 mb-0">
                      <label for="dobBasic" class="form-label">Amount<span class="edd_amt star" >*</span></label>
                      <input type="text" id="edd_amt" oninput="this.value =this.value.replace(/[^0-9.]/g, '')" required name="editamount" class="form-control">
                    </div>
					
				
                      <input type="hidden" name="editid" class="form-control">
                  
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
                  <button type="submit" class="btn btn-primary edd_submit">Save</button>
                  </form>
                </div>
               
              </div>

            </div>
          </div>
          @if(in_array('update_expences_button',$permissionArray))
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
    <script src="{{URL::asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
	<script src="{{URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js')}}"></script>
<!-- <script src="{{URL::asset('assets/vendor/js/bootstrap.js')}}"></script> -->
	<script src="{{URL::asset('admin/js/expenses.js')}}"></script>

    @stop