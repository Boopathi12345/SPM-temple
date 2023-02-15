@extends('layouts.frontend')

@section('pagestyles')


@stop

@section('content') 


   <!-- ================> Contact section start here <================== -->
   <div class="contact padding--top padding--bottom bg-light">
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
    </div>
    <!-- ================> Contact section end here <================== -->

  <!-- ================> Location section start here <================== -->
  <div class="location padding--bottom">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-lg-6 col-12">
                    <div class="location__left">
                        <div class="location__map">
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423283.4355669374!2d-118.69192993092697!3d34.02073049448939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1633958856057!5m2!1sen!2sbd" allowfullscreen="" loading="lazy"></iframe> -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3907.4027357505192!2d77.96666421744384!3d11.6658442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3babfd973a1a06cb%3A0xae9bdf02f4fb6ca6!2sSri%20Puthu%20Mariyamman%20Temple!5e0!3m2!1sen!2sin!4v1650263352182!5m2!1sen!2sin"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
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


@stop