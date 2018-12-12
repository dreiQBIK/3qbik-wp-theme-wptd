const nSite = (function($) {
   /******************************************************************
        VARS
    ******************************************************************/

   // get variables for setting js breakpoints equal to css breakpoints
   const breakpointJS = $("body");
   const breakpointJSWidth = breakpointJS.width();
   const breakpointCSSWidth = 961;

   // cache DOM elements
   const $siteNavigation = $(".n_site");
   const $siteNavigationBurger = $(".n_site-burger");

   /******************************************************************
        EVENTS
    ******************************************************************/

   // set js breakpoints equal to css breakpoints
   $(window).resize(function() {
      toggleNavAtBreakpoint();
   });

   // toggle nav on click on burger
   $siteNavigationBurger.on("click", toggleNav);

   /******************************************************************
        FUNCTIONS
    ******************************************************************/

   function toggleNav() {
      $siteNavigation.slideToggle("fast");
      $siteNavigationBurger.toggleClass("active");
   }

   function showNav() {
      $siteNavigation.show();
      $siteNavigationBurger.hide();
   }

   function hideNav() {
      $siteNavigation.hide();
      $siteNavigationBurger.show();
   }

   // checks for mobile device
   function isMobile() {
      if (
         /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
         )
      ) {
         return true;
      }
      return false;
   }

   // toggle nav on mobile/desktop
   function toggleNavAtBreakpoint() {
      // set breakpoint
      breakpointJSWidth = breakpointJS.width();

      // check for mobile device and hide/show nav
      if (!isMobile()) {
         breakpointJSWidth >= breakpointCSSWidth ? showNav() : hideNav();
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
