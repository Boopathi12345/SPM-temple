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
    height: 4em;
    image-rendering: pixelated;
}
.festival_align{
    width:100%;
    height: 28em;
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

</style>

@stop

@section('content') 



    <!-- ================> PageHeader section start here <================== -->
    <div class="text-center padding--top" style="background:white;">
       
                    <h3 class="m-0">Blog Details</h3>
               
    </div>
    <!-- ================> PageHeader section end here <================== -->


    <!-- ================> Blog section start here <================== -->
    <div class="blog blog-style2 blog-single padding--top padding--bottom bg-light">
        <div class="container">
            <div class="section__wrapper">
                <div class="row g-4">
                    <div class="col-lg-8 col-12">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="blog__item">
                                    <div class="blog__inner">
                                        <div class="blog__thumb">
                                            <!-- <img src="http://127.0.0.1:8000/frontend_css/assets/images/blog/07.jpg" alt="blog thumb"> -->
                                             <!-- start slideshow -->
                                            <div class="event__item">
                            <div class="event__inner">
                                <div class="event__thumb">
                                <!-- start slideshow -->
                                <div class="section__wrapper">
                                <div class="blog__slider overflow-hidden">
                                    <div class="swiper-wrapper">
                                    <?php $video=explode(' /', $form->video);
                                        foreach ($video as $value) {
                                            $video_im=explode('.', $value);
                                            $url=asset("");
                   if($video_im[1]=='mp4'){
                       $showvalue=' <div class="swiper-slide">
                       <div class="blog__slider-item">
                           <div class="blog__slider-thumb">
                               <a href="#"><video src="'.$url.'blog/'.$value.'" class="festival_align" controls ></video></a>
                           </div>
                       </div>
                   </div>';
                   }else{
                    $showvalue=' <div class="swiper-slide">
                    <div class="blog__slider-item">
                        <div class="blog__slider-thumb">
                            <a href="#"><img src="'.$url.'blog/'.$value.'" class="festival_align"></a>
                        </div>
                    </div>
                </div>';
                   }
                   print_r($showvalue);
                }
               
                   ?>




                                      
                                    </div>
                                    <div class="blog__pagination"></div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                             <!-- end slideshow -->

                                        </div>
                                        <div class="blog__content">
                                           <h3>{{$form->title}}</h3>
                                            <ul class="blog__content-metapost">
                                            <li><i class="far fa-clock"></i> {{$form->time}}</li>
                                                <li><i class="far fa-calendar"></i> {{$form->date}}</li>
                                               
                                            </ul>
                                            <p>{{$form->description}}</p>
                                            <!-- <h6>Fasces of harpoons for spurs</h6>
                                            <p>With a frigate’s anchors for my bridle-bitts and fasces of harpoons for spurs, would I could mount that <b>whale and leap</b> the topmost skies, to see whether the fabled heavens with all their countless tents really lie encamped beyond!</p> -->
                                            <div class="row g-2 mb-4">
                                                <div class="col-lg-12 col-12">
                                                {!!$form->html_code!!}
                                                </div>
                                               
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                              
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="sidebar">
                          
                            <div class="sidebar__tab">
                                <div class="section__header">
                                    <h2>Recent Post</h2>
                                </div>
                                <div class="section__wrapper">
                                   
                                    @php $festival = DB::table('blog')->where('active', '1')->orderBy('id','desc')->limit(3)->get();@endphp
                                   
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
                                            <div class="footer__post">
                                                <div class="section__wrapper">
                                                @foreach($festival as $festi)
                                                <!-- {{$festi->id}} -->
                                                    <div class="footer__post-item">
                                                        <div class="footer__post-inner">

                                                            <div class="footer__post-thumb">
                                                                <a href="/user/blogdetail_page/{{$festi->id}}"> <?php $video=explode(' /', $festi->video); $video_im=explode('.', $video[0]);
                    $url=asset("");
                   if($video_im[1]=='mp4'){
                       $showvalue='<video src="'.$url.'blog/'.$video[0].'" class="vido_img_align" controls ></video>';
                   }else{
                    $showvalue='<img src="'.$url.'blog/'.$video[0].'" class="vido_img_align"">';
                   }
                   print_r($showvalue);
                   ?></a>
                                                            </div>
                                                            <div class="footer__post-content">
                                                                <a href="/user/blogdetail_page/{{$festi->id}}"><h6>{{$festi->title}}</h6></a>
                                                                <p><i class="far fa-calendar-alt"></i> <?php $date=explode('-', $festi->date); $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                                        $day=$date[0]." ";
                                        $month_num=$date[1];
                                        $mon=$months[(int)$month_num]." ";
                                        $year=$date[2];
                                        print_r($day.$mon.$year);
                                        ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                    @endforeach
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Blog section end here <================== -->
   


    <!-- ================> Cause section start here <================== -->
    <div class="cause padding--top padding--bottom bg-img" style="background: url(http://127.0.0.1:8000/frontend_css/assets/images/bg-img/08.jpg) rgba(0,0,0,.4);display:none;">
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
<script src="{{URL::asset('frontend_css\js\home.js')}}"></script>

@stop