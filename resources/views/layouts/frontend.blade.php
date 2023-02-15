<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.codexcoder.com/themeforest/html/peace/peace/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 09:12:37 GMT -->

<head>
@include('frontend_includes.style')
    @yield('pagestyles')

</head>

<body>


    <!-- ================> preloader start here <================ -->
    <!-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- ================> preloader ending here <================ -->

    <!-- ================> Header Search <================ -->

    @include('frontend_includes.header')


    <!-- ================> header section end here <================== -->

    @yield('content')
    <!-- ================> Banner section start here <================== -->


    
    <!-- ================> Social section end here <================== -->



    <!-- ================> Footer section start here <================== -->
    @include('frontend_includes.footer')
    <!-- ================> Footer section end here <================== -->





    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="fas fa-arrow-up"></i><span class="pluse_1"></span><span class="pluse_2"></span></a>
    <!-- scrollToTop ending here -->



    @include('frontend_includes.script')
    @yield('pageScript')

    <!-- vendor plugins -->
   
</body>

<!-- Mirrored from demos.codexcoder.com/themeforest/html/peace/peace/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 09:13:57 GMT -->

</html>