@extends('layouts.frontend')

@section('pagestyles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<style>
.video_align {
    width: 100%;
    height: 250px !important;
}

.vido_img_align {
    width: 100%;
    height: 250px;
}

.sermon__thumb {
    height: 180px !important;
}

.border-start1 {
    border-right: 1px solid #dee2e6 !important;
}

.ps {
    padding-right: 3rem !important;
}

.ms {
    margin-right: 1.5rem !important;
}

.mm {
    flex-wrap: wrap !important;
    text-align: -webkit-center !important;
    justify-content: center !important;
    display: contents !important;
}

/* .pd-top{
    padding: 100px 122px 44px 133px;
} */
.banner__content h2 {

}


.social-list {
    margin: 40px !important;
}

.social__list li::after {

    right: 23px !important;

}

.blog__right {
    box-shadow: 0 0 38px rgb(13 13 13 / 39%) !important;

}

.blg {

    box-shadow: 0 0 15px rgb(13 13 13 / 39%) !important;
}

.section__header {
    margin-bottom: 106px;
}

.contact__form .form-message.success,
.contact__form .form-message.error,
.blog__comments-details ul ul li,
.cause__bottom,
.shedule__sunrise {
    margin-top: 30px;
    background: rgba(255, 255, 255, .1) !important;
}

.shedule__time ul li span {
    color: #f1c152;
    font-size: 1.8rem;
}

.shedule__time ul li {
    width: 210px !important;
    height: 70px !important;
}

/*    Video    */


 .video-section {
  background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity))!important;
  width: 100%;
  height: 420px;
}

.video-container {
  display: flex;
  justify-content: center;
  align-items:  flex-start;
  flex-direction: row;
  max-width: 1056px;
  margin: 0 auto;
  width: 100%;
  padding-bottom: 505px;
}

.thumbnail {
  flex: 0.5;
}

.video-thumbnail {
  width: 540px;
  margin: 2em 4em 0 0;
  order: 2;
  display: block;
  position: relative;
}

.video-thumbnail img{
  width: inherit;
  height: inherit;
  object-fit: contain;
  z-index: 1;
  position: relative;
  border-radius: 12px !important;
}

.videoBtn {
  z-index: 2;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 60px;
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  border: 0;
}

@keyframes playPluse {
  from {
    transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
    opacity: 1;
  }
  to {
    transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
    opacity: 0;
  }
}

.videoBtn::before {
  position: absolute;
  content: "";
  top: 50%;
  left: 50%;
  transform: translateX(-50%), translateY(-50%);
  display: block;
  width: 60px;
  height: 60px;
  background-color: #f80864;
  border-radius: 50%;
  animation: playPluse 1.5s ease-out infinite;
  opacity: 0.5,
}

.videoBtn span {
  background-color: rgba(241, 140, 8, 0.871);
  width: inherit;
  height: inherit;
  text-align: center;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.5s;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  z-index: 2;
}

.videoBtn i {
  font-size: 48px;
}

.attribution {
  width: 540px;
  display: flex;
  justify-content: center;
}

.attribution p {
  margin-top: 0;
  margin-left: 20px;
  font-size: 1em;
}

.video-content {
  flex: 0.5;
  display: flex;
  align-items: center;
  flex-direction: column;
}

.info-section {
  display: flex;
  align-items: flex-start;
}

.info-group {
  margin-top: 0.5em;
}

.info-heading {
  font-size: 1.2rem !important;
  color: #A50740;
}

.video-content p {
  margin: 0 !important;
  font-size: 0.85rem;
}







iframe {
    width: 85%;
    height: 75%;
  }

@media screen and (max-width: 1200px) {
  .video-section {
    height: 460px;
  }

  .thumbnail {
    margin-top: 3%;
  }

  .video-thumbnail {
    width: 450px;
  }

  .video-content {
    margin-top: 1.5em;
  }
}

@media screen and (max-width: 1024px) {
  .video-section {
    height: 780px;
  }

  .video-container {
    justify-content: flex-start;
    align-items:  center;
    flex-direction: column;
    padding-bottom: 780px;
  }

  .video-thumbnail {
    margin: 0;
    height: 300px;
    width: 780px;

  }

  .video-content {
    margin-top: 30px;
  }

  .video-content h2 {
    margin: 1em 0;
  }

  iframe {
    width: 85%;
    height: 60%;
  }

  .video-action {
    text-align: center;
  }
}
.info-aboutUs{
    margin-top: 60px;
}

@media screen and (max-width: 600px) {
  .video-section {
    height: 670px;
  }

  .video-thumbnail {
    width: 320px;
    height: 200px;
  }

  .video-content h2 {
    font-size: 1.8rem;
  }
  iframe {
    width: 85%;
    height: 35%;
  }
}

@media screen and (max-width: 360px) {
  .video-content h2 {
    font-size: 1.5rem;
  }

  iframe {
    width: 85%;
    height: 20%;
  }
}
</style>

@stop

@section('content')
<div class="bg-light">
    <div class="banner__slider  banner-style3 overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="banner"
                    style="background-image: url({{URL::asset('slider/DSC_0155.JPG')}}); height: 700px;">
                    <div class="container">
                        <div class="banner__content ">
                            <h2 class="text-white">Gratest God</h2>
                            <p class="text-white" style="font-family: Yellowtail">Sri puthu mariyamman temple 1,000-year
                                Gratest ancient temple. Pillars that Sing! Architectural Marvels of Indian Temples </p>
                            <a href="{{URL::asset('user/about_us')}}"
                                class="default-btn move-right"><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="banner"
                    style="background-image: url({{URL::asset('slider/DSC_0145.JPG')}}); height: 700px;">
                    <div class="container">
                        <div class="banner__content ">
                            <h2 class="text-white">Mariamman Temple</h2>
                            <p class="text-white">The temple is one of the most prominent places of worship for Tamil
                                Hindus in the country, built to honour Goddess Mariamman – the deity of disease and
                                protection</p>
                            <a href="{{URL::asset('user/about_us')}}"
                                class="default-btn move-right"><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="banner"
                    style="background-image: url({{URL::asset('slider/DSC_0144.JPG')}}); height: 700px;">
                    <div class="container">
                        <div class="banner__content ">
                            <h2 class="text-white">The Hindu</h2>
                            <p class="text-white">India—often described as the ‘country of temples’—saw temple-building
                                activity begin in the fifth century CE. It was only in the sixth–seventh centuries that
                                a more pronounced idiom developed. In that, regional styles began taking shape. These
                                styles had their own quirks. Gradually, these distinct architectural styles became a
                                ‘formula’ that came to be associated with a region.</p>
                            <a href="{{URL::asset('user/about_us')}}"
                                class="default-btn move-right"><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Banner section end here <================== -->


    <!-- ================> Event Time section end here <================== -->
    <div class="container padding--top padding--bottom">
        <div class="text-center">
            <h2 class="">About Us</h2>
            <p>Sri Puthu Mariamman Temple is the oldest shrine in Desavilakku,Kilakkumedu. The temple is one of the most
                prominent places of worship for Tamil Hindus in the country, built to honour Goddess Mariamman – the
                deity of disease and protection. Originally erected by Seeranga Kownder – in 1827, the temple was
                modified to its present structure in 1862 but has undergone several renovations since.</p>
            <a href="{{URL::asset('user/about_us')}}" class="default-btn move-right"><span>More</span></a>
        </div>

    </div>



    <!-- ================> Blog section start here <================== -->
    <div class="blog  padding--bottom">
        <div class="container">
            <div class="section__header text-center">
                <h2>Festival</h2>
                <!-- <p> Oldest shrine in Desavilakku,Kilakkumedu Sri Puthumariyamman Kovil Village Temple...</p> -->
            </div>
            <div class="section__wrapper">
                <div class="row g-4">

                    <div class="col-lg-12 col-12">
                        <div class="blog__right">

                            <div class="section__wrapper">
                                <div class="blog__slider overflow-hidden">
                                    <div class="swiper-wrapper">
                                        @php $festival = DB::table('festival')->where('active',
                                        '1')->orderBy('id','desc')->limit(3)->get();@endphp
                                        @foreach($festival as $festi)



                                        <div class="swiper-slide">
                                            <div class="">
                                                <div class="row">

                                                    <div class="col-lg-6 col-12">

                                                        <?php $video=explode(' /', $festi->video); $video_im=explode('.', $video[0]);
                    $url=asset("");
                   if($video_im[1]=='mp4'){
                       $showvalue='<video src="'.$url.'festival/'.$video[0].'" class="vido_img_align" controls ></video>';
                   }else{
                    $showvalue='<img src="'.$url.'festival/'.$video[0].'" class="vido_img_align"">';
                   }
                   print_r($showvalue);
                   ?>
                                                        <!-- <img src="frontend_css/assets/images/event/07.jpg" style="width: 100%;height: 70%;" alt="event thumb"> -->
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="section__header">
                                                            <h3 style="font-size:25px;">{{ $festi->title}}</h3>
                                                            <div class="event__metapost">
                                                                <ul class="event__metapost-info">
                                                                    <li><i class="far fa-calendar"></i>
                                                                        {{ $festi->date}}</li>
                                                                    <li><i class="far fa-clock"></i>{{ $festi->time}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <p>{{ $festi->description}}</p>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div class="blog__pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Blog section end here <================== -->


    <!-- ================> Shedule section start here <================== -->
    <div class="shedule padding--top padding--bottom bg-img"
        style="background: url(frontend_css/assets/image/amman1.jpeg) rgba(0,0,0,.8);">
        <div class="container">
            <div class="row g-4">

                <div class="col-12 col-12">
                    <div class="section__wrapper">
                        <div class="shedule__top">

                            <div class="shedule__item">
                                <div class="shedule__inner">
                                    <div class="shedule__content">
                                        <div class="shedule__left">
                                            <div class="shedule__title">
                                                <h6>Date</h6>
                                                <!-- <div class="date" id="printTime"></div> -->
                                            </div>
                                        </div>
                                        <div class="shedule__right">
                                            <div class="shedule__time">
                                                <ul class="countdown count-down">
                                                    <li class="clock-item">
                                                        <span
                                                            class="count-number"><?php date_default_timezone_set('Asia/Calcutta'); echo date("m-d-Y"); ?></span>
                                                        <p class="count-text">
                                                            <!-- <div class="date" id="printTime"></div> -->
                                                        </p>
                                                    </li>

                                                    <li class="clock-item">
                                                        <span class="count-number "></span>
                                                        <p class="count-text">Month</p>
                                                    </li>
                                                    <li class="clock-item">
                                                        <span class="count-number "></span>
                                                        <p class="count-text">Year</p>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shedule__item">
                                <div class="shedule__inner">
                                    <div class="shedule__content">
                                        <div class="shedule__left">
                                            <div class="shedule__title">
                                                <h6>Time</h6>

                                            </div>
                                        </div>
                                        <div class="shedule__right">
                                            <div class="shedule__time">
                                                <ul class="countdown count-down">

                                                    <li class="clock-item">
                                                        <span class="count-number" id="printTime"></span>
                                                    </li>
                                                    <li class="clock-item">
                                                        <span class="count-number "></span>
                                                        <p class="count-text">Minutes</p>
                                                    </li>

                                                    <li class="clock-item">
                                                        <span class="count-number "></span>
                                                        <p class="count-text">Seconds</p>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="shedule__bottom">
                            <div class="shedule__sunrise">
                                <div class="shedule__sunrise-item">
                                    <div class="shedule__sunrise-inner">
                                        <div class="shedule__sunrise-thumb">
                                            <img src="frontend_css/assets/image/sun.png" alt="event sunrise">
                                        </div>
                                        <div class="shedule__sunrise-content">
                                            <h3>OPENING</h3>
                                            <p class="text-white">5.00 - 7.00 AM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shedule__sunrise-item">
                                    <div class="shedule__sunrise-inner">
                                        <div class="shedule__sunrise-thumb">
                                            <img src="frontend_css/assets/image/sun2.png" alt="event sunrise">
                                        </div>
                                        <div class="shedule__sunrise-content">
                                            <h3>CLOSING</h3>
                                            <p class="text-white">6.00 - 6.30 PM</p>
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
    <!-- ================> Shedule section end here <================== -->



    <!-- =================> video section start here   <==================-->


    <div id=tofi-video><link rel=stylesheet href=https://s.electerious.com/basicLightbox/dist/basicLightbox.min.css>
        <script src=https://s.electerious.com/basicLightbox/dist/basicLightbox.min.js defer></script>
    <div class=video-section id=modal-video-section>
        <div class="section__header text-center">
            <h2>Video</h2>
      <div class=container>
        <div class=video-container>
          <div class=thumbnail>
            <div class=video-thumbnail>
              <img src="/assets/12345.jpg" alt=Thumbnail>
              <button class=videoBtn><span><i class="fa fa-play-circle" style="font-size:36px;"></i></span></button>
              </div></div><div class=video-content>
                <div class=info-aboutUs>
                  <div class=info-section>
                    <img src="/assets/templesAdded.png" alt="">
                    <div class=info-group><p class=info-heading>7.5 Lakh+ Temples</p>
                    <p>We are a community-led platform listing more than 7.5 lakh temples across India.</p>
                    </div></div><div class=info-section><img src="/assets/contributions.png" alt="">
                    <div class=info-group><p class=info-heading>2000+ Contributors</p>
                    <p>We have registered more than 2000 contributors from the community.</p>
                    </div></div><div class=info-section><img src="/assets/languages.png" alt="">
                    <div class=info-group><p class=info-heading>Available in 7 Languages</p>
                    <p>Our content will soon be available in 7 Indian Languages to serve Indian audience.</p>
                    </div>
                  </div>
                </div>
                   </div>
                  </div>
                </div>
              </div>
    </div>
              <script>document.querySelector('button.videoBtn').onclick = () => {
                basicLightbox.create(`
                  <iframe id="yt" src="https://www.youtube.com/embed/4nn8Su_F53g?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                `).show()

                }

                document.getElementById('exploreTemples-btn').addEventListener('click', function(e) {
                  window.location.href = "/explore"
                })
                </script>
                </div>


    <!-- ================> video section End here   <==================-->



    <!-- ================> gallery section start here <================== -->
    <div class="gallery bg-light padding--top padding--bottom  ">
        <div class="container-fluid">
            <div class="section__header text-center">
                <h2>Gallery</h2>
            </div>
            <div class="section__wrapper">
                <div class="row justify-content-center list">
                    @php $gallery = DB::table('gallery')->where('active',
                    '1')->limit(8)->orderBy('id','desc')->get();@endphp
                    @foreach($gallery as $image)

                    @foreach(explode(' /', $image->photo) as $value)
                    <div class="col-lg-3 col-sm-6 col-12 mb-4">
                        <div class="blog__slider-item">
                            <div class="gallery__item">
                                <div class="gallery__inner">
                                    <div class="gallery__thumb">
                                        <img src="{{URL::asset('')}}gallery/{{$value}}"
                                            style="object-fit: cover; width:100%;height:15em;" alt="gallery">
                                    </div>
                                    <div class="gallery__content text-center">
                                        <a href="{{URL::asset('')}}gallery/{{$value}}" data-rel="lightcase"
                                            class="gallery__icon"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @endforeach
                </div>


                <div class="text-center mt-5">
                    <a href="{{URL::asset('user/gallery')}}" class="default-btn move-right"><span>View All</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> gallery section end here <================== -->



    <!-- ================> Event section start here <================== -->

    <div class="event padding--bottom bg-light">
        <div class="container">
            <div class="section__header text-center">
                <h2>Event</h2>
                <!-- <p>Enthusiastically underwhelm quality benefits rather than professional outside the box thinking. Distinctively network highly efficient leadership skills</p> -->
            </div>
            <div class="section__wrapper">
                <div class="row g-4 justify-content-center">
                    @php $events = DB::table('event')->where('active',
                    '1')->orderBy('id','desc')->limit(3)->get();@endphp
                    @foreach($events as $even)

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="event__item">
                            <div class="event__inner">
                                <div class="event__thumb">
                                    <a href="{{ asset('user/eventsdetail_page') }}/{{$even->id}}"><?php $video=explode(' /', $even->video); $video_im=explode('.', $video[0]);
                                     $url=asset("");
                   if($video_im[1]=='mp4'){
                       $showvalue='<video src="'.$url.'events/'.$video[0].'" class="vido_img_align" controls ></video>';
                   }else{
                    $showvalue='<img src="'.$url.'events/'.$video[0].'" class="vido_img_align"">';
                   }
                   print_r($showvalue);
                   ?></a>
                                    <div class="event__thumb-date">
                                        <h6>{{$even->date}}</h6>

                                    </div>
                                </div>
                                <div class="event__content">
                                    <a href="{{ asset('user/eventsdetail_page') }}/{{$even->id}}">
                                        <h5>{{$even->title}}</h5>
                                    </a>
                                    <div class="event__metapost">
                                        <ul class="event__metapost-info">
                                            <li><i class="far fa-clock"></i>{{$even->time}}</li>
                                            <li><i class="far fa-calendar"></i>{{$even->date}}</li>
                                        </ul>

                                    </div>
                                    <p>{{$even->description}}</p>
                                </div>
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
<!-- ================> Shedule section end here <================== -->

<!-- ================> Cause section start here <================== -->
<div class="cause padding--top padding--bottom bg-img"
    style="background: url(frontend_css/assets/image/shutter.jpg) rgba(0,0,0,.5);">
    <div class="container">
        <div class="section__header text-center">
            <h2 class="text-white">Donation</h2>
        </div>
        <div class="section__wrapper">
            <div class="">
                <!-- <div class="sponsor">
                    <div class="container"> -->
                <div class="sponsor__slider padding--bottom overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">

                            <img src="frontend_css/assets/image/62-629375_m.jpg" alt="sponsor thumb">

                        </div>
                        <div class="swiper-slide">

                            <img src="frontend_css/assets/image/62-629375_m.jpg" alt="sponsor thumb">

                        </div>
                        <div class="swiper-slide">

                            <img src="frontend_css/assets/image/62-629375_m.jpg" alt="sponsor thumb">

                        </div>
                        <div class="swiper-slide">

                            <img src="frontend_css/assets/image/62-629375_m.jpg" alt="sponsor thumb">

                        </div>
                    </div>
                </div>
                <!-- </div>
                </div> -->
            </div>
            <div class="cause__bottom">
                <div class="cause__bars">
                    <div class="donaterange__content text-center">
                        <h4><span>66% Donated </span> / $10,013 To Go</h4>
                        <div class="donaterange__bars" data-percent="60%">
                            <div class="donaterange__bar"></div>
                        </div>
                        <a href="causes.html" class="default-btn move-right"><span>Donate <i
                                    class="fas fa-heart"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> Cause section end here <================== -->


<!-- ================> Sermon section start here <================== -->
<div class="sermon bg-light padding--bottom padding--top ">
    <div class="container">
        <div class="section__header text-center">
            <h2>Blogs</h2>
            <!-- <p>Proin Eget Tortor Risus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p> -->
        </div>
        <div class="blg section__wrapper">
            <div class="row g-4">
                @php $gallery = DB::table('blog')->where('active', '1')->limit(4)->orderBy('id','desc')->get();@endphp
                @foreach($gallery as $blogs)


                <div class="col-lg-6 col-12">
                    <div class="sermon__item">
                        <div class="sermon__inner">
                            <div class="sermon__thumb">
                                <?php $video=explode(' /', $blogs->video); $video_im=explode('.', $video[0]);
                    $url=asset("");
                   if($video_im[1]=='mp4'){
                       $showvalue='<video src="'.$url.'blog/'.$video[0].'" class="vido_img_align" controls ></video>';
                   }else{
                    $showvalue='<img src="'.$url.'blog/'.$video[0].'" class="vido_img_align"">';
                   }
                   print_r($showvalue);
                   ?>

                            </div>
                            <div class="sermon__content">
                                <a href="/user/blogdetail_page/{{$blogs->id}}">
                                    <h6>{{$blogs->title}}</h6>
                                </a>
                                <ul class="sermon__content-metapost">
                                    <li><i class="far fa-calendar"></i>{{$blogs->date}}</li>
                                    <li><i class="far fa-clock"></i> {{$blogs->time}}</li>
                                </ul>
                                <p style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">
                                    {{$blogs->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>



                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- ================> Sermon section end here <================== -->


<!-- ================> Cause section start here <================== -->
<div class="cause padding--top padding--bottom bg-img"
    style="background: url(assets/images/bg-img/08.jpg) rgba(0,0,0,.4);display:none;">
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
                        <a href="" class="default-btn move-right"><span>Donate <i class="fas fa-heart"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> Cause section end here <================== -->


<!-- ================> About section start here <================== -->
<!-- <div class="about padding--top padding--bottom"> -->
<!-- <div class="shedule padding--top padding--bottom bg-img" style="background: url(assets/images/bg-img/07.jpg) rgba(0,0,0,.4);">
        <div class="container">
            <div class="row g-4"> -->
<!-- <div class="col-xl-4 col-12">
                    <div class="section__header mb-xl-0 text-white">
                        <h2 class="text-white">Festival Schedule</h2>
                        <p>Dramatically strategize economically sound action items for e-business niches. Quickly re-engineer 24/365 potentialities before.</p>
                        <p class="mb-0">Holisticly extend sticky partnerships and cross functional markets. Monotonectally.</p>
                    </div>
                </div> -->
<div class="about  bg-light ">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-8 col-12">
                <div class="about__contentpart ms ps border-start1">
                    <div class="section__header">
                        <h2>Dharmagartha</h2>
                        <!-- <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit.</p> -->
                    </div>
                    <div class="section__wrapper">
                        <div class="about__item">
                            <div class="about__inner">
                                <div class="about__icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="about__content">
                                    <h5>The Temple Administration</h5>
                                    <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                                        Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                        </div>
                        <div class="about__item">
                            <div class="about__inner">
                                <div class="about__icon">
                                    <i class="fas fa-binoculars"></i>
                                </div>
                                <div class="about__content">
                                    <h5>Love Community</h5>
                                    <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                                        Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="about__item">
                                <div class="about__inner">
                                    <div class="about__icon">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                    <div class="about__content">
                                        <h5>Believe Biblically</h5>
                                        <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="about__thumbpart">
                    <?php
              dharmagartha("1", "21");
            function dharmagartha($ID, $divis) {
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
                      dharmagartha($UserID, $TrueDivision);


                }else{

                    $Currentvalue = DB::table('dharmagartha_family')->where('active', '1')->where('id', $ID)->get();
                    // dd($Currentvalue[0]->id);
                    $poosari_value= $Currentvalue[0];


               ?>




                    <img src="{{URL::asset('')}}dharmagartha/<?php echo $poosari_value->photo; ?>"
                        style="width: 71%;height: 18em;" alt="event thumb">

                    <div>
                        <div class="">
                            <ul class=" mm">
                                <li><i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $poosari_value->name; ?> <?php echo $poosari_value->last_name; ?>
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true" style="transform: rotate(100deg);"></i>
                                    <?php echo $poosari_value->phone; ?>
                                </li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <?php echo $poosari_value->email; ?></li>
                                <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    <?php echo $poosari_value->address; ?></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <?php } } ?>


            </div>
        </div>
    </div>
</div>
</div>

<!-- ================> About section end here <================== -->


<!-- ================> About section start here <================== -->
<div class="about padding--top bg-light padding--bottom">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-12">
                <?php
              Poosari("1", "21");
             function Poosari($ID, $divis) {

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

                    $poosari_value= $Currentvalue[0];

                    ?>
                <div class="about__thumbpart">
                    <img src="{{URL::asset('')}}poosari/<?php echo $poosari_value->photo; ?>"
                        style="width: 71%;height: 18em;" alt="event thumb">



                    <div class="">
                        <ul class="mm">
                            <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $poosari_value->name; ?>
                                <?php echo $poosari_value->last_name; ?></li>
                            <li><i class="fa fa-phone" aria-hidden="true" style="transform: rotate(100deg);"></i>
                                <?php echo $poosari_value->phone; ?></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $poosari_value->email; ?>
                            </li>
                            <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                <?php echo $poosari_value->address; ?></li>
                        </ul>
                    </div>
                </div>

            </div>



            <?php } } ?>

            <div class="bg-light col-lg-8 col-12">
                <div class="about__contentpart ms-lg-4 ps-lg-5 border-start">
                    <div class="section__header">
                        <h2>Poosari</h2>
                        <!-- <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit.</p> -->
                    </div>
                    <div class="section__wrapper">
                        <div class="about__item">
                            <div class="about__inner">
                                <div class="about__icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="about__content">
                                    <h5>Glorify God</h5>
                                    <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris
                                        blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                        </div>
                        <div class="about__item">
                            <div class="about__inner">
                                <div class="about__icon">
                                    <i class="fas fa-binoculars"></i>
                                </div>
                                <div class="about__content">
                                    <h5>Love Community</h5>
                                    <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris
                                        blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="about__item">
                                <div class="about__inner">
                                    <div class="about__icon">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                    <div class="about__content">
                                        <h5>Believe Biblically</h5>
                                        <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div>
        </div>
    </div>
     -->
<!-- ================> About section end here <================== -->



<!-- ================> Contact section start here <================== -->
<!-- <div class="contact padding--top padding--bottom ">
        <div class="container">
            <div class="section__header text-center">
                <h2>Contact Us</h2>
                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
            </div>
            <div class="section__wrapper">
                <div class="contact__form">
                    <form class="d-flex flex-wrap justify-content-between" action="https://demos.codexcoder.com/themeforest/html/peace/peace/contact.php" id="contact-form" method="POST">
                        <input type="text" placeholder="Your Name" id="name" name="name" required="required">
                        <input type="text" placeholder="Your Email" id="email" name="email" required>
                        <input class="w-100" type="text" placeholder="Subject" id="subject" name="subject" required>
                        <textarea placeholder="Your Message" rows="8" name="message" id="message" required></textarea>
                        <div class="text-center w-100">
                            <button type="submit" class="default-btn move-right"><span>SEND NOW</span></button>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div> -->
<!-- ================> Contact section end here <================== -->


<!-- ================> Location section start here <================== -->
<div class="location">
    <div class="container-fluid">
        <div class="row g-0">
            <div class="col-lg-8 col-12">
                <div class="location__left">
                    <div class="location__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3907.4027357505192!2d77.96666421744384!3d11.6658442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3babfd973a1a06cb%3A0xae9bdf02f4fb6ca6!2sSri%20Puthu%20Mariyamman%20Temple!5e0!3m2!1sen!2sin!4v1650263352182!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="location__right padding--top padding--bottom">
                    <div class="location__info">

                        <div class="location__info-bottom">
                            <div class="section__header">
                                <h2>Contact Info</h2>
                            </div>
                            <div class="section__wrapper">
                                <div class="location__info-list">
                                    <ul>
                                        <li>
                                            <div class="location__info-left">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="location__info-right">
                                                <p>Sri Puthumariyamman Temple</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="location__info-left">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="location__info-right">

                                                <ul>
                                                    <li>Temple Opening & Closing.</li>
                                                    <li><b>Monday-Thursday :</b> 06:00 am - 09:00 pm</li>
                                                    <li><b>Friday :</b> 10:30 am - 05:30 pm</li>
                                                    <li><b>Saturday :</b> 10:30 am - 05:30 pm</li>
                                                    <li><b>Sunday :</b> Closed</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> Location section end here <================== -->


<!-- ================> Social section start here <================== -->
<div class="social">
    <div class="container">
        <div class="social__area">
            <ul class="social__list">
                <li class="social__list-facebook">
                    <a class="social-list" href="#">
                        <i class="fab fa-facebook-f"></i>
                        <span>facebook</span>
                    </a>
                </li>
                <li class="social__list-twitter">
                    <a class="social-list" href="#">
                        <i class="fab fa-twitter"></i>
                        <span>twitter</span>
                    </a>
                </li>
                <li class="social__list-linkedin">
                    <a class="social-list" href="#">
                        <i class="fab fa-whatsapp"></i>
                        <span>whatsapp</span>
                    </a>
                </li>
                <li class="social__list-instagram">
                    <a class="social-list" href="#">
                        <i class="fab fa-instagram"></i>
                        <span>instagram</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('pageScript')
<script src="{{URL::asset('frontend_css\js\home.js')}}"></script>
<script>
var date = new Date();
const elementTime = document.getElementById("printTime");


function printTime() {
    date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (hours > 12) {
        hours = hours - 12;
        elementTime.innerHTML = hours + " : " + minutes + " : " + seconds + "  PM ";
    } else if (hours < 12) {
        elementTime.innerHTML = hours + " : " + minutes + " : " + seconds + "  AM ";
    } else if (hours = 12) {
        elementTime.innerHTML = hours + " : " + minutes + " : " + seconds + "  PM ";
    }
}

setInterval(function() {
    printTime();

}, 1000);
</script>
@stop
