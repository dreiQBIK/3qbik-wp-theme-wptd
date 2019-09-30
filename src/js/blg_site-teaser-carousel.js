const blgSiteTeaserCarousel = (function($) {


   /******************************************************************
       VARS
   ******************************************************************/

   const $slider = $('.blg_site-teaser-carousel__slider');
   let sliderInitialized = false;

   if (!$slider.length) return;

   /******************************************************************
       EVENTS
   ******************************************************************/

   $(window).on('resize', function(){
       handleSlickUnslick();
   });

   handleSlickUnslick();


   /******************************************************************
       FUNCTIONS
   ******************************************************************/

   function handleSlickUnslick() {
       if ( (global.breakpoint.value === 'sm' || global.breakpoint.value === 'xs') && !sliderInitialized ) {
           $slider.slick({
               infinite: true,
               slidesToShow: 1,
               slidesToScroll: 1,
               dots: true,
               arrows: false,
               draggable: true,
               swipe: true,
               touchMove: true,
               touchThreshold: 5,
               centerMode: true,
               variableWidth: true,
               variableHeight: false,
           });
           sliderInitialized = true;
       }
       else if ( (global.breakpoint.value === 'md' || global.breakpoint.value === 'lg' || global.breakpoint.value === 'xl') && sliderInitialized ) {
           $slider.slick('unslick');
           sliderInitialized = false;
       }
   }
})(jQuery);
