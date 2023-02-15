//   //qoute slider
//   var swiper = new Swiper('.slider_festival', {
//     slidesPerView: 1,
//     spaceBetween: 20,
//     autoplay: {
//         delay: 500000,
//         disableOnInteraction: false,
//     },
//     loop:true,
//     // loopedSlides: 1,
// });

var swiper = new Swiper('.slider_festival', {
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    breakpoints: {
        768: {
            slidesPerView: 1,
        },
        567: {
            slidesPerView: 2,
        },
    },
});

  