const blgTestimonials = (function($) {


   /******************************************************************
       VARS
   ******************************************************************/

   const $testimonialSlider = $('.blg_testimonials__slider');

   if (!$testimonialSlider.length) return;


   /******************************************************************
       EVENTS
   ******************************************************************/


  $testimonialSlider.slick({
       centerMode: true,
       centerPadding: '200px',
       slidesToShow: 3,
       autoplay: false,
       autoplaySpeed: 6000,
       prevArrow: '<svg class="icon icon--xlarge t-c1-main slick-prev"><use href="#icon-left-arrow" xlink:href="#icon-left-arrow"/></svg>',
       nextArrow: '<svg class="icon icon--xlarge t-c1-main slick-next"><use href="#icon-right-arrow" xlink:href="#icon-right-arrow"/></svg>',
       responsive: [
           {
               breakpoint: 1600,
               settings: {
                   centerPadding: '100px',
               }
           },
           {
               breakpoint: 1400,
               settings: {
                   centerPadding: '60px',
               }
           },
           {
               breakpoint: 961,
               settings: {
                   centerPadding: '0px',
                   slidesToShow: 1,
               }
           }
       ],
   });


   /******************************************************************
       FUNCTIONS
   ******************************************************************/


})(jQuery);
