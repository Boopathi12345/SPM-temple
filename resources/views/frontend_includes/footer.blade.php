<style>
.img_align {
    width: 100%;
    height: 71px;
}
</style>
<footer class="footer">
        <div class="footer__top padding--top padding--bottom">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="footer__about">
                            <div class="section__header">
                                <h2>About</h2>
                            </div>
                            <div class="section__wrapper">
                                <div class="footer__about-thumb">
                                    <img src="{{URL::asset('frontend_css/assets/image/62-629375_m.jpg')}}" alt="footer thumb" class="w-100">
                                </div>
                                <div class="footer__about-contet">
                                    <p>Dramatically strategize economically sound action items for e-business niches. Quickly re-engineer 24/365 potentialities before.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="footer__tags">
                            <div class="section__header">
                                <h2>Post Tag</h2>
                            </div>
                            <div class="section__wrapper">
                                <ul>
                                    <li><a href="#">Christian</a></li>
                                    <li><a href="#">Hindu</a></li>
                                    <li><a href="#">Magazine</a></li>
                                    <li><a href="#">Muslims</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">SEO</a></li>
                                    <li><a href="#">Themes</a></li>
                                    <li><a href="#">WordPress</a></li>
                                    <li><a href="#">Web Development</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Photography</a></li>
                                    <li><a href="#">Media</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="footer__post">
                            <div class="section__header">
                                <h2>Recent Post</h2>
                            </div>
                            <div class="section__wrapper">
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
                      $showvalue='<video src="'.$url.'blog/'.$video[0].'" class="img_align" controls ></video>';
                  }else{
                   $showvalue='<img src="'.$url.'blog/'.$video[0].'" class="img_align"">';
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
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="footer__links">
                            <div class="section__header">
                                <h2>Links</h2>
                            </div>
                            <div class="section__wrapper">
                                <ul>
                                    <!-- <li><a href="#">Log in</a></li> -->
                                    <li><a href="home">Home </a></li>
                                    <li><a href="about_us">About Us </a></li>
                                    <li><a href="dharmagartha">Family Tree</a></li>
                                    <li><a href="festival">Festival</a></li>
                                    <li><a href="events">event</a></li>
                                    <li><a href="blog">Blog</a></li>
                                    <li><a href="gallery">Gallery</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-area text-center">
                    <div class="footer__bottom-content">
                        <p><a href="https://tamilzorous.com/">© 2020 tamilzorous.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>