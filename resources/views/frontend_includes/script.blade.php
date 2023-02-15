<script src="{{URL::asset('frontend_css/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/swiper.min.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/lightcase.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/donate-range.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/wow.js')}}"></script>
    <script src="{{URL::asset('frontend_css/assets/js/custom.js')}}"></script>

    <script>
    $(document).ready(function(){
      var href = window.location.pathname.split('/');
       $("."+href[2]).addClass('active');
      
});
</script>