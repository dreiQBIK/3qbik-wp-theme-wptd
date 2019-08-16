const bldGallery = (function($) {


   /******************************************************************
       VARS
   ******************************************************************/

   const $slider = $('.bld_gallery__slider');

   if (!$slider.length) return;


   /******************************************************************
       FUNCTIONS
   ******************************************************************/

   $slider.each( function() {

       const $currentSlider = $(this);
       const $thumbsNav = $currentSlider.next('.bld_gallery__nav');

       // navigation with thumbnail preview
       if ($thumbsNav.length) {

           $currentSlider.slick({
               slidesToShow: 1,
               slidesToScroll: 1,
               arrows: true,
               fade: true,
               asNavFor: '.bld_gallery__nav',
               prevArrow: '<button class="slick-prev" aria-label="Zurück"><i class="slick-icon"><svg class="icon"><use href="#icon-left-arrow" xlink:href="#icon-left-arrow"/></svg></i></button>',
               nextArrow: '<button class="slick-next" aria-label="Weiter"><i class="slick-icon"><svg class="icon"><use href="#icon-right-arrow-2" xlink:href="#icon-right-arrow-2"/></svg></i></button>',
           });
           $thumbsNav.slick({
               slidesToShow: 4,
               slidesToScroll: 4,
               asNavFor: '.bld_gallery__slider',
               centerMode: true,
               arrows: false,
               focusOnSelect: true,
               responsive: [
                   {
                   breakpoint: 1461,
                   settings: {
                       slidesToShow: 3,
                       slidesToScroll: 3,
                   },
                   },
                   {
                   breakpoint: 481,
                   settings: {
                       slidesToShow: 2,
                       slidesToScroll: 1,
                   },
                   },
               ],
           });

       // navigation with dots
       } else {
           $currentSlider.slick({
               dots: true,
               arrows: true,
               fade: true,
               prevArrow: '<button class="slick-prev" aria-label="Zurück"><i class="slick-icon"><svg class="icon"><use href="#icon-left-arrow" xlink:href="#icon-left-arrow"/></svg></i></button>',
               nextArrow: '<button class="slick-next" aria-label="Weiter"><i class="slick-icon"><svg class="icon"><use href="#icon-right-arrow-2" xlink:href="#icon-right-arrow-2"/></svg></i></button>',
           });
       }
   });


})(jQuery);
