@extends('layouts.frontend')

@section('pagestyles')
<link rel="stylesheet" href="{{URL::asset('assets\familytree.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets\familytree.css')}}">
<style>
.video_align{
    width:100%;
    height: 250px !important;
}
.vido_img_align{
    width: 100%;
    height: 250px;
}
.festival_align{
    width:100%;
    height: 250px;
}

.pagination-wrap {
  user-select: none;
  display: flex;
    
}

.pagination-layout {
  display: flex;
  padding: 0;
  margin: 0;
  list-style-type: none;

}
.button_colors>li {
    margin-right:10px;
    padding:8px 14px;
    outline: none;
    box-shadow: none;
    color: black;
    position: relative;
    display: block;
    color: #0d6efd;
    background-color: #fff;
    border: 1px solid #dee2e6;
}
.button_colors>li:hover {
    color: white;
    background: #f1c152;
}
.button_colors>li:hover>a {
    color: white;
    /* background: #f1c152; */
}
.button_colors>.active{
    background: #f1c152;
    color: white;
    border-color: #f1c152;
}
.button_colors>.active>a{  
    color: white;  
}
.disabled{
    cursor: no-drop !important;
}
/* .pagination-prev:hover,.pagination-next:hover{
    background: #f1c152;
    color: white;
}
.pagination-prev,.pagination-next{
    background: #f1c152;
    color: black;
} */

.letter{
    font-size: 14px;
    color: #b56908;
}
.padding--top{
    padding-top: 100px;
}

</style>

@stop

@section('content') 


 <!-- ================> Event section start here <================== -->
 <div class="event padding--top padding--bottom bg-light">
        <div class="container">
            <div class="section__header text-center">
                <h2>Gallery</h2>
                <p>Enthusiastically underwhelm quality benefits rather than professional outside the box thinking. Distinctively network highly efficient leadership skills</p>
            </div>
            <div class="section__wrapper" id="test-list">

               
                <div class="row justify-content-center list">
                @php $gallery = DB::table('gallery')->where('active', '1')->orderBy('id','desc')->get();@endphp
                                    @foreach($gallery as $image)
                                    
                                    @foreach(explode(' /', $image->photo) as $value)
                                   <div class="col-lg-4 col-sm-6 col-12 mb-4">
                                    <div class="blog__slider-item">
                                      <div class="gallery__item">
                                         <div class="gallery__inner">
                                          <div class="gallery__thumb">
                                          <img src="{{URL::asset('')}}gallery/{{$value}}" style="object-fit: cover; width:100%;height:15em;" alt="gallery">
                                          </div>
                                          <div class="gallery__content text-center">
                                          <a href="{{URL::asset('')}}gallery/{{$value}}" data-rel="lightcase" class="gallery__icon"><i class="fas fa-plus"></i></a>
                                          </div>
                                         </div>   
                                      </div>
                                    </div>
                                    </div>
                                    @endforeach

                    @endforeach
                    </div>
                    
                 
                <div class="pagination-wrap flex justify-content-center padding--top">
                  <button class="pagination-prev disabled me-2 btn btn-primary" disabled="disabled">Previous</button>
                  <ul class="pagination-layout button_colors"></ul>
                  <button class="pagination-next btn-primary btn">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Event section end here <================== -->


    <!-- ================> Cause section start here <================== -->
    <div class="cause padding--top padding--bottom bg-img" style="background: url(http://127.0.0.1:8000/frontend_css/http://127.0.0.1:8000/frontend_css/assets/images/bg-img/08.jpg) rgba(0,0,0,.4);display:none;">
        <div class="container">
            <div class="section__header text-center">
                <h2 class="text-white">Urgent Causes</h2>
            </div>
            <div class="section__wrapper">
                <div class="cause__top row justify-content-center g-4 row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>82.5%</h3>
                                <h6>Founded</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>$ 1650</h3>
                                <h6>Donate</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>$ 2000</h3>
                                <h6>Goal</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>10</h3>
                                <h6>Donator</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>60</h3>
                                <h6>Day to go</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cause__bottom">
                    <div class="cause__bars">
                        <div class="donaterange__content text-center">
                            <h4><span>66% Donated </span> / $10,013 To Go</h4>
                            <div class="donaterange__bars" data-percent="60%">
                                <div class="donaterange__bar"></div>
                            </div>
                            <a href="causes.html" class="default-btn move-right"><span>Donate <i class="fas fa-heart"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Cause section end here <================== -->


  
@endsection

@section('pageScript')
<script src="{{URL::asset('admin/js/poosari.js')}}"></script>
<script src="{{URL::asset('frontend_css\js\home.js')}}"></script>
<script>
  $(document).ready(function(){
 var perPage = 12;

new List("test-list", {
  valueNames: ["name"],
  page: perPage,
  plugins: [
    // can not make left and right work on List.js 1.5.0, so I use 1.3.0 instead, which requires List.pagination.js plugin
    ListPagination({
      paginationClass: "pagination-layout",
      left: 2,
      right: 2
    })
  ]
}).on("updated", function(list) {
  var isFirst = list.i == 1;
  var isLast = list.i > list.matchingItems.length - list.page;

  // make the Prev and Nex buttons disabled on first and last pages accordingly
  $(".pagination-prev.disabled, .pagination-next.disabled").removeAttr('disabled');
  $(".pagination-prev.disabled, .pagination-next.disabled").removeClass(
    "disabled"
  );
  
  if (isFirst) {
    $(".pagination-prev").addClass("disabled");
    $(".pagination-prev").attr('disabled','disabled');
  }
  if (isLast) {
    $(".pagination-next").addClass("disabled");
    $(".pagination-next").attr('disabled','disabled');
  }

  // hide pagination if there one or less pages to show
  if (list.matchingItems.length <= perPage) {
    $(".pagination-wrap").hide();
  } else {
    $(".pagination-wrap").show();
  }
});

$(".pagination-next").click(function() {
  $(".pagination-layout .active")
    .next()
    .trigger("click");
});
$(".pagination-prev").click(function() {
  $(".pagination-layout .active")
    .prev()
    .trigger("click");
});

});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.3.0/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>

@stop