@extends('layouts.frontend')

@section('pagestyles')
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
body {
    color: #737373;
    /* font-size: 15px; */
    line-height: 1.5;
    font-family: "Yellowtail", cursive;
    background: #fff
}
</style>

@stop

@section('content') 



    <!-- ================> Banner section start here <================== -->
    <div class="banner-style3 overflow-hidden">
        <!-- <div class="swiper-wrapper">
            <div class="swiper-slide"> -->
                <div class="banner" style="background-image: url({{URL::asset('slider/DSC_0155.JPG')}}); height: 700px;">
                    <!-- <div class="container">
                        <div class="banner__content ">
                            <h2 class="text-white">Gratest God</h2>
                            <p class="text-white">Sri puthu mariyamman temple 1,000-year Gratest ancient temple. Pillars that Sing! Architectural Marvels of Indian Temples </p>
                            <a href="#" class="default-btn move-right"><span>GET HELP NOW</span></a>
                        </div>
                    </div> -->
                </div>
            <!-- </div> -->
            <!-- <div class="swiper-slide">
                <div class="banner" style="background-image: url({{URL::asset('slider/DSC_0145.JPG')}}); height: 700px;">
                    <div class="container">
                        <div class="banner__content ">
                            <h2 class="text-white">Mariamman Temple</h2>
                            <p class="text-white">The temple is one of the most prominent places of worship for Tamil Hindus in the country, built to honour Goddess Mariamman – the deity of disease and protection</p>
                            <a href="#" class="default-btn move-right"><span>GET HELP NOW</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="banner" style="background-image: url({{URL::asset('slider/DSC_0144.JPG')}}); height: 700px;">
                    <div class="container">
                        <div class="banner__content ">
                            <h2 class="text-white">The Hindu</h2>
                            <p class="text-white">India—often described as the ‘country of temples’—saw temple-building activity begin in the fifth century CE. It was only in the sixth–seventh centuries that a more pronounced idiom developed. In that, regional styles began taking shape. These styles had their own quirks. Gradually, these distinct architectural styles became a ‘formula’ that came to be associated with a region.</p>
                            <a href="#" class="default-btn move-right"><span>GET HELP NOW</span></a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- ================> Banner section end here <================== -->

    <!-- ================> Cause section start here <================== -->
    <div class="cause  padding--top  bg-img" style="background: url({{URL::asset('slider/Donate.jpg')}});" style="background: black;">
    <!-- <div class="banner" style="background-image: url({{URL::asset('slider/DSC_0155.JPG')}}); height: 700px;"> -->
        <div class="container">
            <div class="section__header text-center">
                <!-- <h2 >Donater</h2> -->
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
                            <h4><span>66% Donated / $10,013 To Go</span></h4>
                            <div class="donaterange__bars" data-percent="60%">
                                <div class="donaterange__bar"></div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Cause section end here <================== -->



 <!-- ================> Service section start here <================== -->
 <div class="service padding--top padding--bottom">
        <div class="container">
            <div class="section__header text-center">
                <h2>Our Services</h2>
                <p>Enthusiastically underwhelm quality benefits rather than professional outside the box thinking. Distinctively network highly efficient leadership skills</p>
            </div>
            <div class="section__wrapper">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-3 col-12">
                        <div class="service__left">
                            <div class="service__item">
                                <div class="service__inner">
                                    <div class="service__icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div class="service__content">
                                        <h5>Pooja</h5>
                                        <p>Assertively redefine end end potentialities for principle-centered synergy. Quickly promote granular.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service__item">
                                <div class="service__inner">
                                    <div class="service__icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="service__content">
                                        <h5>Marriage</h5>
                                        <p>Assertively redefine end end potentialities for principle-centered synergy. Quickly promote granular.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service__item">
                                <div class="service__inner">
                                    <div class="service__icon">
                                        <i class="far fa-gem"></i>
                                    </div>
                                    <div class="service__content">
                                        <h5>Bhoomi Pooja</h5>
                                        <p>Assertively redefine end end potentialities for principle-centered synergy. Quickly promote granular.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="service__center">
                            <div class="service__text">
                                <p>WHAT</p>
                                <h3>Services</h3>
                                <h6>WE PROVID</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="service__right">
                            <div class="service__item">
                                <div class="service__inner">
                                    <div class="service__icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="service__content">
                                        <h5>Darshon</h5>
                                        <p>Assertively redefine end end potentialities for principle-centered synergy. Quickly promote granular.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service__item">
                                <div class="service__inner">
                                    <div class="service__icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div class="service__content">
                                        <h5>Prashad</h5>
                                        <p>Assertively redefine end end potentialities for principle-centered synergy. Quickly promote granular.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service__item">
                                <div class="service__inner">
                                    <div class="service__icon">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <div class="service__content">
                                        <h5>Car Pooja</h5>
                                        <p>Assertively redefine end end potentialities for principle-centered synergy. Quickly promote granular.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Service section end here <================== -->

                                <div class="service padding--bottom">
                                    <div class="container">
                                            <div class="section__header text-center">
                                                <h2>History</h2>
                                            </div>
                                            <p>Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque In Ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada.</p>
                                            <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque In Ipsum id orci porta dapibus. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Proin Eget Tortor Risus.</p>
                                            <p>Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                            <p>Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>
                                      
                                    </div>
                                </div>
  
@endsection

@section('pageScript')
<script src="{{URL::asset('frontend_css\js\home.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.3.0/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
@stop