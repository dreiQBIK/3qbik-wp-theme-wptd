const animationsScrollReveal = (function($) {

   /******************************************************************
       EVENTS
   ******************************************************************/

   revealContent();


   /******************************************************************
       FUNCTIONS
   ******************************************************************/

   function revealContent() {
      ScrollReveal().reveal('.sr-1', {
         delay: 100,
         distance: '50px',
         origin: 'bottom',
         duration: 600,
         mobile: false,
         viewOffset: {
            top: -100,
            right: 0,
            bottom: 0,
            left: 0,
        },
      });
   }

})(jQuery);
