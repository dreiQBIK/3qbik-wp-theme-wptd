const nSite = (function($) {
   /******************************************************************
        VARS
    ******************************************************************/

   const $siteNavigation = $(".n_site");
   const $siteNavigationBurger = $(".h_site__burger");

   /******************************************************************
        EVENTS
    ******************************************************************/

   $(window).resize(function() {
      toggleNavAtBreakpoint();
   });

   // toggle nav on click on burger
   $siteNavigationBurger.on("click", toggleNav);


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

   // toggle nav on mobile/desktop
   function toggleNavAtBreakpoint() {
      if (global.breakpoint.value === 'xs' || global.breakpoint.value === 'sm') {
         showNav();
      } else {
         hideNav();
      }
   }

   /******************************************************************
        PUBLIC_FUNCTIONS
    ******************************************************************/

   return {
      showNav: showNav,
      hideNav: hideNav,
   };
})(jQuery);
