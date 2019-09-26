const nSite = (function($) {
   /******************************************************************
        VARS
    ******************************************************************/

   const $siteNavigation = $(".n_site");
   const $siteNavigationBurger = $(".h_site__burger");
   const header = document.querySelector(".h_site-wrapper");
   const headroom = new Headroom(header, {
      offset: 0,
      tolerance: 5,
   });

   /******************************************************************
        EVENTS
    ******************************************************************/

   $(window).resize(function() {
      if (global.breakpoint.value === 'md' || global.breakpoint.value === 'lg'  || global.breakpoint.value === 'xl') {
         hideNav();
      }
   });

   // toggle nav on click on burger
   $siteNavigationBurger.on("click", toggleNav);

   headroom.init();


   /******************************************************************
        FUNCTIONS
    ******************************************************************/

   function toggleNav() {
      $siteNavigationBurger.toggleClass("is-active");
      $siteNavigation.toggleClass("is-active");
   }

   function showNav() {
      $siteNavigationBurger.addClass("is-active");
      $siteNavigation.addClass("is-active");
   }

   function hideNav() {
      $siteNavigationBurger.removeClass("is-active");
      $siteNavigation.removeClass("is-active");
   }

   /******************************************************************
        PUBLIC_FUNCTIONS
    ******************************************************************/

   return {
      showNav: showNav,
      hideNav: hideNav,
   };
})(jQuery);
