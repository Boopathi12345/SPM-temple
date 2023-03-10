<div class="layout-page">
    <!-- Navbar -->
    <!-- <div class="layout-page"> -->

    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="container-fluid">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>


            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">




                <ul class="navbar-nav flex-row align-items-center ms-auto">



                  

                

                   

                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar">
                                <img src="{{ asset('') }}<?php if(Auth::user()->photo){echo "images/".Auth::user()->photo;}else{echo"assets/img/avatars/1.png";} ?>" alt class="rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="{{ asset('') }}<?php if(Auth::user()->photo){echo "images/".Auth::user()->photo;}else{echo"assets/img/avatars/1.png";} ?>" alt class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block lh-1">{{ Auth::user()->name }}</span>
                                            <small><?php if(Auth::user()->user_type){echo Auth::user()->user_type;}else{echo"Admin";} ?></small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            @php  $role=DB::table('role')->where('id', Auth::user()->role )->get();
            $permissionArray = [];
            if(count($role) > 0){
                $permissionArray = json_decode($role[0]->permission);
            }

            @endphp
            @if(in_array('profile',$permissionArray))
                            <li>
                                <a class="dropdown-item" href="/edituser/{{ Auth::user()->id }}">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profile</span>
                                </a>
                            </li>
                           @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  target="_blank">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                            </form>
                            </li>
                        </ul>
                    </li>
                    <!--/ User -->


                </ul>
            </div>


            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper  d-none">
                <input type="text" class="form-control search-input container-fluid border-0" placeholder="Search..."
                    aria-label="Search...">
                <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
            </div>


        </div>
    </nav>
    <!-- </div> -->



    <!-- / Navbar -->