  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{URL::asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  
  <script src="{{URL::asset('assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->
  <!-- Vendors JS -->
  <script src="{{URL::asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script src="{{URL::asset('assets/js/main.js')}}"></script>
  <!-- <script src="{{URL::asset('assets/js/main.js')}}"></script> -->

  <!-- Page JS -->
 
  <script>
    $(document).ready(function(){
      var href = window.location.pathname.split('/');
      
       if(href[1]){
        $("."+href[1]).addClass('active');
       $("."+href[1]).parents('li').addClass('open');
       }else{
        $(".dashboard").addClass('active');
       }
});
</script>