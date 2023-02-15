@extends('layouts.adminview')

@section('pagestyles')
<style>
    .dashboard_select{
        margin-bottom: 66px;
    }
    #select_year{
    width: 100px;
    position: absolute;
    right: 57px;
    margin: 0 0 0px 0;
    }
</style>


@stop

@section('content')

<!-- beautify ignore:start -->
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
    <div class="dashboard_select"><select id="select_year" onchange="DashboardCountValue(this.value)" class="form-select">
    @for($i=2020;$i<=date("Y");$i++)
  <option value='{{$i}}'>{{$i}}</option>
  @endfor
                                </select></div>
        <div class="row">
             @if(in_array('dashboard',$permissionArray))

                <div class="row">
                    <!-- Referral Chart-->
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="mb-1" id="payment"></h2>
                                <span class="text-muted">Payment</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="mb-1" id="expenses"></h2>
                                <span class="text-muted">Expenses</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-body text-center">

                                <h2 class="mb-1" id="total_value"></h2>
                                <span class="text-muted">Remaining</span>

                            </div>
                        </div>
                    </div>
                    <!-- Conversion Chart-->
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-3">
                                <div class="conversion-title mt-1">
                                    <h4 class="card-title mb-1">Festival</h4>

                                </div>
                                @php  $festival=DB::table('festival')->where('active',"1")->count();@endphp
                                <h2 class="mb-0">{{$festival}}</h2>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-3">
                                <div class="conversion-title mt-1">
                                    <h4 class="card-title mb-1">Events</h4>
                                </div>
                                @php  $expenses=DB::table('expenses')->where('active',"1")->count();@endphp
                                <h2 class="mb-0">{{$expenses}}</h2>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-3">
                                <div class="conversion-title mt-1">
                                    <h4 class="card-title mb-1">Blogs</h4>
                                </div>
                                @php  $blogs=DB::table('blog')->where('active',"1")->count();@endphp
                                <h2 class="mb-0">{{$blogs}}</h2>
                            </div>

                        </div>
                    </div>
                    <!-- Impression Radial Chart-->
                    <div class="col-lg-6 col-sm-6 col-md-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Dharmagartha</h5>
                            </div>
                            <div class="card-body d-flex align-items-end justify-content-between">
                                <div class="d-flex justify-content-between align-items-center gap-3 w-100">
                                    <div class="d-flex">
                                    <?php
function Dharmagartha  ($ID, $divis) {
//     $SetDate=1;
//    $defaultvalue=2;
//    if($ID){$user_id=$ID;}else{$user_id=$defaultvalue;}
    $poosari = DB::table('dharmagartha_family')->where('active', '1')->where('child_number', $ID)->select('id')->get();


    if(count($poosari)>0){
          $user_persent=$divis;
          $Persen=$user_persent % count($poosari);
          $Division=intval($user_persent / count($poosari));

          if($Persen=='0'){$TruePersen=count($poosari)-1;}else{$TruePersen=$Persen-1;}

          if($Division=='0'){$TrueDivision=$Division+1;}else{$TrueDivision=$Division+1;}
          $UserID=$poosari[$TruePersen]->id;
          Dharmagartha  ($UserID, $TrueDivision);


    }else{

        $Currentvalue = DB::table('dharmagartha_family')->where('active', '1')->where('id', $ID)->get();
        // dd($Currentvalue[0]->id);
        $poosari_value= $Currentvalue[0];
        // echo $poosari_value->photo;
        ?>

            <img src="{{URL::asset('')}}dharmagartha/<?php  echo $poosari_value->photo; ?>" alt="Avatar" style="border-radius: 50%;width: 120px;height: 120px;">




                                        <div class="chart-info ms-4 mt-4">
                                            <h3 class="mb-0"><?php  echo $poosari_value->name; ?></h5>
                                            <p class="text-muted mb-0"><?php  echo $poosari_value->email; ?></p>
                                            <p class="text-muted mb-0"><?php  echo $poosari_value->phone; ?></p>

                                        </div>
                                        <?php } }
                                                Dharmagartha  ("1", "21");
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Poosari</h5>
                            </div>
                            <div class="card-body d-flex align-items-end justify-content-between">
                                <div class="d-flex justify-content-between align-items-center gap-3 w-100">
                                    <div class="d-flex">
                                    <?php
            function Poosari($ID, $divis) {
            //     $SetDate=1;
            //    $defaultvalue=2;
            //    if($ID){$user_id=$ID;}else{$user_id=$defaultvalue;}
                $poosari = DB::table('poosari_family')->where('active', '1')->where('child_number', $ID)->select('id')->get();


                if(count($poosari)>0){
                      $user_persent=$divis;
                      $Persen=$user_persent % count($poosari);
                      $Division=intval($user_persent / count($poosari));

                      if($Persen=='0'){$TruePersen=count($poosari)-1;}else{$TruePersen=$Persen-1;}

                      if($Division=='0'){$TrueDivision=$Division+1;}else{$TrueDivision=$Division+1;}
                      $UserID=$poosari[$TruePersen]->id;
                      Poosari($UserID, $TrueDivision);


                }else{

                    $Currentvalue = DB::table('poosari_family')->where('active', '1')->where('id', $ID)->get();
                    // dd($Currentvalue[0]->id);
                    $poosari_value= $Currentvalue[0];

                    ?>

            <img src="{{URL::asset('')}}poosari/<?php echo $poosari_value->photo; ?>" alt="Avatar" style="border-radius: 50%;width: 120px;height: 120px;">


                                    <!-- </div>
                                    <div class="d-flex align-content-center"> -->
                                        <!-- <div class="chart-report" data-color="info" data-series="50"></div> -->
                                        <div class="chart-info ms-4 mt-4">
                                            <h3 class="mb-0"><?php echo $poosari_value->name; ?></h5>
                                            <p class="text-muted mb-0"><?php echo $poosari_value->email; ?></p>
                                            <p class="text-muted mb-0"><?php echo $poosari_value->phone; ?></p>

                                        </div>
                                        <?php } }
                                         Poosari("1", "21");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- chard -->

                    <div class="col-lg-12 col-md-12 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Payment Chart</h5>

      </div>
      <div class="card-body pb-2">

        <div id="analyticsBarChart"></div>
      </div>
    </div>

                    <!-- Chart-->


            </div>


@else
            <div class=" col-sm-12">
                <div class="card text-center p-5">
<h4>Permission Denied</h4>
</div>	</div>

@endif

            <!--/ Activity Timeline -->
        </div>
    <!-- </div> -->
</div>

    <!-- / Content -->
    </html>

    @endsection

    @section('pageScript')

<script src="{{URL::asset('admin/js/dashboard.js')}}"></script>

    @stop
