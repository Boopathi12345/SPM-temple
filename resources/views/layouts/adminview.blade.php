<!DOCTYPE html>
<html lang="en">

<!-- <html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template"> -->



<!-- Mirrored from radixtouch.com/templates/admin/atrio/source/lighthr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Oct 2021 09:52:13 GMT -->

<head>

    @include('includes.admin.styles')
    @yield('pagestyles')
</head>

<body>






    <!-- side navepar -->


    @include('includes.admin.side_nav')
    <!--end side navepar -->





    <!-- header -->

    @include('includes.admin.header')


    <!--end header -->


    <!-- Content -->
    @yield('content')
    <!--end Content -->




    <!-- Footer -->
    @include('includes.admin.footer')
    <!-- / Footer -->


    <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->



    @include('includes.admin.script')
    @yield('pageScript')



</body>


<!-- Mirrored from radixtouch.com/templates/admin/atrio/source/lighthr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Oct 2021 09:54:20 GMT -->

</html>