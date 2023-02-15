<!-- <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container"> -->


<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
@php  $role=DB::table('role')->where('id', Auth::user()->role )->get();
            $permissionArray = [];
            if(count($role) > 0){
                $permissionArray = json_decode($role[0]->permission);
            }

            @endphp

    <div class="app-brand demo ">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">SPM</span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Temple</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>


    <div class="menu-divider mt-0  ">
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        @if(in_array('dashboard',$permissionArray))
        <li class="menu-item dashboard">
            <a href="/dashboard" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>
        @endif
       
       
        
       
       
      
        <!-- Apps & Pages -->
        <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Pages</span></li> -->
        @if(in_array('festival',$permissionArray))
        <li class="menu-item festivals">
            <a href="/festivals" class="menu-link">
                <i class="menu-icon tf-icons bx bx-archive"></i>
                <div data-i18n="Festivals">Festivals</div>
            </a>
        </li>
        @endif
        @if(in_array('events',$permissionArray))
        <li class="menu-item event">
            <a href="/event" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Events">Events</div>
            </a>
        </li>
        @endif
       
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-food-menu'></i>
                <div data-i18n="Family Tree">Family Tree</div>
            </a>
            <ul class="menu-sub">
            @if(in_array('dharmagartha',$permissionArray))
                <li class="menu-item dharmagarth">
                    <a href="/dharmagarth" class="menu-link">
                        <div data-i18n="Dharmagartha">Dharmagartha</div>
                    </a>
                </li>
                @endif
                
           
            @if(in_array('poosari',$permissionArray))
          
                <li class="menu-item poosaris">
                    <a href="/poosaris" class="menu-link">
                        <div data-i18n="Poosari">Poosari</div>
                    </a>
                </li>
                
            </ul>
            @endif
        </li>
      
        @if(in_array('gallery',$permissionArray))
        <li class="menu-item gallery_page">
            <a href="/gallery_page" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image-add"></i>
                <div data-i18n="Gallery">Gallery</div>
            </a>
        </li>
        @endif
        @if(in_array('blogs',$permissionArray))
        <li class="menu-item blogs">
            <a href="/blogs" class="menu-link">
                <i class="menu-icon tf-icons bx bx-conversation"></i>
                <div data-i18n="Blogs">Blogs</div>
            </a>
        </li>
        @endif
       
        <!-- Components -->
        <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li> -->
        <!-- Cards -->
       
        
        <li class="menu-item">
            <a href="/payment_page" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-rupee"></i>
                <div data-i18n="Amount">Amount</div>
            </a>
            <ul class="menu-sub">
            @if(in_array('payment',$permissionArray))
                <li class="menu-item payment_page">
                    <a href="/payment_page" class="menu-link">
                        <div data-i18n="Payment">Payment</div>
                    </a>
                </li>
                @endif
                @if(in_array('expences',$permissionArray))
                <li class="menu-item expenses">
            <a href="/expenses" class="menu-link">
                <div data-i18n="Expences">Expences</div>
            </a>
            </li>
            @endif

        </li>
                <!-- <li class="menu-item">
                    <a href="cards-advance.html" class="menu-link">
                        <div data-i18n="Remaining">Remaining</div>
                    </a>
                </li> -->
                
            </ul>
          
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="User">User</div>
            </a>

            <ul class="menu-sub">
            @if(in_array('user_list',$permissionArray))
            <li class="menu-item userlist">
                    <a href="/userlist" class="menu-link">
                        <div data-i18n="User list">User list</div>
                    </a>
                </li>
                @endif
                @if(in_array('add_user',$permissionArray))
                <li class="menu-item adduser">
                    <a href="/adduser" class="menu-link">
                        <div data-i18n="Add user">Add user</div>
                    </a>
                </li>
                @endif
                
            </ul>
        </li>
        @if(in_array('role',$permissionArray))
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons  bx bx-cog'></i>
                <div data-i18n="Setting">Setting</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item role">
            <a href="role" class="menu-link">
                <div data-i18n="Role">Role</div>
            </a>
        
                
            </ul>
        </li>
        @endif
        
    </ul>



</aside>
<!-- / Menu -->


