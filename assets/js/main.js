"use strict";

var global = function ($) {
  /******************************************************************
        FUNCTIONS
    ***************************************************************** */
  function debounce(func, wait, immediate) {
    var timeout;
    return function () {
      var context = this;
      var args = arguments;

      var later = function later() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };

      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
  }
  /** ****************************************************************
        PUBLIC_FUNCTIONS
    ******************************************************************/


  return {
    debounce: debounce,
    getRandomInt: getRandomInt
  };
}(jQuery);
"use strict";

var choicesJS = function ($) {
  // Select via choices
  $("select").each(function () {
    new Choices(this, {
      searchEnabled: false,
      itemSelectText: ""
    });
  });
}(jQuery);
// const mForm = (function($) {
//
//
//     /******************************************************************
//         VARS
//     ******************************************************************/
//
//     // get all input fields and trigger float labels on focus
//     var $formInputs = $('.m_form__input');
//
//     // quit if element does not exist (on this page)
//     if (!$formInputs.length) return;
//
//
//     /******************************************************************
//         EVENTS
//     ******************************************************************/
//
//     // remove label classes and return to initial state after form was sent successfully
//     $(document).on('.btn', returnToInitialState);
//
//     $formInputs.on('focusin', makeLabelActive);
//     $formInputs.on('focusout', makeLabelInactive);
//
//
//     /******************************************************************
//         FUNCTIONS
//     ******************************************************************/
//
//     function makeLabelActive() {
//
//         var $activeInput = $(this);
//         var $activeFormLabel = $activeInput.parents('p').find('.m_form__label');
//
//         // add active state
//         $activeFormLabel.addClass('active');
//     }
//
//     function makeLabelInactive() {
//
//         var $activeInput = $(this);
//         var $activeFormLabel = $activeInput.parents('p').find('.m_form__label');
//
//         // remove active state
//         $activeFormLabel.removeClass('active');
//
//         // check if field isn't empty and add done state
//         if ($activeInput.val() && $activeInput.val().length) {
//             $activeFormLabel.addClass('done');
//
//         // return to initial state if field is empty
//         } else {
//             $activeFormLabel.removeClass('done');
//         }
//     }
//
//     function returnToInitialState() {
//         var $formLabels = $('.m_form__label');
//         $formLabels.removeClass('active done');
//     }
//
// })(jQuery);
"use strict";
// const mBackToTop = (function($) {
//    const $window = $(window);
//    $window.on("scroll", function() {
//       global.debounce(toggleBackToTop(), 2000);
//    });
//    $(document).on("click", ".m_back-to-top", function() {
//       scrollToTop();
//    });
//    function toggleBackToTop() {
//       const $button = $(".m_back-to-top");
//       const scrollDistance = $(document).scrollTop();
//       const windowHeight = $window.height();
//       if (scrollDistance >= windowHeight) {
//          $button.removeClass("is-hidden");
//       } else {
//          $button.addClass("is-hidden");
//       }
//    }
//    function scrollToTop() {
//       $("html, body").animate(
//          {
//             scrollTop: 0,
//          },
//          "swing"
//       );
//    }
// })(jQuery);
"use strict";
"use strict";

var nSite = function ($) {
  /******************************************************************
       VARS
   ******************************************************************/
  // get variables for setting js breakpoints equal to css breakpoints
  var breakpointJS = $("body");
  var breakpointCSSWidth = 961;
  var breakpointJSWidth = breakpointJS.width(); // cache DOM elements

  var $siteNavigation = $(".n_site");
  var $siteNavigationBurger = $(".n_site-burger");
  /******************************************************************
       EVENTS
   ******************************************************************/
  // set js breakpoints equal to css breakpoints

  $(window).resize(function () {
    toggleNavAtBreakpoint();
  }); // toggle nav on click on burger

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
  } // checks for mobile device


  function isMobile() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      return true;
    }

    return false;
  } // toggle nav on mobile/desktop


  function toggleNavAtBreakpoint() {
    // set breakpoint
    breakpointJSWidth = breakpointJS.width(); // check for mobile device and hide/show nav

    if (!isMobile()) {
      breakpointJSWidth >= breakpointCSSWidth ? showNav() : hideNav();
    }
  }
  /******************************************************************
       PUBLIC_FUNCTIONS
   ******************************************************************/


  return {
    showNav: showNav,
    hideNav: hideNav
  };
}(jQuery);
"use strict";

var example = function ($) {
  /******************************************************************
      VARS
  ******************************************************************/
  // your code here

  /******************************************************************
      EVENTS
  ******************************************************************/
  // your code here

  /******************************************************************
      FUNCTIONS
  ******************************************************************/
  // your code here

  /******************************************************************
      PUBLIC_FUNCTIONS
  ******************************************************************/
  return {// your code here
  };
}(jQuery);