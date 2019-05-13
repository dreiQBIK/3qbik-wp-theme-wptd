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
"use strict";

var lCommentForm = function ($) {
  /******************************************************************
      VARS
  ******************************************************************/
  var $element = $('.l_comment-form');
  var $trigger = $element.find('.l_comment-form__textarea.trigger');
  var $formHidden = $element.find('.l_comment-form__hidden');
  /******************************************************************
      EVENTS
  ******************************************************************/

  if (!$trigger) return;
  $trigger.focus(function (e) {
    $formHidden.removeClass('inactive');
  });
  /******************************************************************
      FUNCTIONS
  ******************************************************************/
}(jQuery);
"use strict";

var mBackToTop = function ($) {
  var $window = $(window);
  $window.on("scroll", function () {
    global.debounce(toggleBackToTop(), 2000);
  });
  $(document).on("click", ".m_back-to-top", function () {
    scrollToTop();
  });

  function toggleBackToTop() {
    var $button = $(".m_back-to-top");
    var scrollDistance = $(document).scrollTop();
    var windowHeight = $window.height();

    if (scrollDistance >= windowHeight) {
      console.log('remove');
      $button.removeClass("is-hidden");
    } else {
      console.log('add');
      $button.addClass("is-hidden");
    }
  }

  function scrollToTop() {
    $("html, body").animate({
      scrollTop: 0
    }, "swing");
  }
}(jQuery);
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

var oLightbox = function ($) {
  /******************************************************************
      VARS
  ******************************************************************/
  var $lightbox = $('.o_lightbox');
  var $closeButton = $('.o_lightbox__close');
  var $allImages = $('figure.with-lightbox');
  /******************************************************************
      EVENTS
  ******************************************************************/
  // close lightbox

  $closeButton.on('click', function (e) {
    closeLightbox();
  }); // open lightbox

  $allImages.on('click', function (e) {
    var $img = $(e.target).closest('figure').find('img');
    openLightbox($img);
  }); // close on click on background

  $lightbox.on('click', function (e) {
    var $target = $(e.target);

    if ($target.closest('.o_lightbox').hasClass('is-open')) {
      if (!$target.hasClass('o_lightbox__img')) {
        closeLightbox();
      }
    }
  });
  $(window).on('resize', function (e) {
    if ($lightbox.hasClass('is-open')) {
      setTimeout(function () {
        adjustImageSize($('.o_lightbox__img'));
      }, 100);
    }
  });
  /******************************************************************
      FUNCTIONS
  ******************************************************************/

  function openLightbox($img) {
    var imgAlt = $img.attr('alt');
    var imgSrc = $img.attr('data-src');
    var imgSrcset = $img.attr('data-srcset'); // build img with given attributes

    $lightbox.addClass('is-open');
    var lightboxImg = '<img class="o_lightbox__img lazyload" alt="' + imgAlt + '" data-src="' + imgSrc + '" data-srcset="' + imgSrcset + '" sizes="' + $lightbox.width() + '" />';
    $lightbox.find('.o_lightbox__figure').append(lightboxImg); // add to DOM and adjust sizing

    adjustImageSize($img);
  }

  function closeLightbox() {
    var $lightboxImg = $('.o_lightbox__img');
    $lightbox.removeClass('is-open');
    $lightboxImg.remove();
  }

  function adjustImageSize($img) {
    var $container = $('.o_lightbox__figure');
    var $lightboxImg = $('.o_lightbox__img');
    var containerSize = $container.width() / $container.height();
    var imgSize = $img.width() / $img.height();

    if (containerSize < imgSize) {
      $lightboxImg.css({
        width: '100%',
        height: 'auto'
      });
    } else {
      $lightboxImg.css({
        width: 'auto',
        height: '100%'
      });
    }
  }
}(jQuery);
"use strict";

var parsleyLocalization = function ($) {
  Parsley.addMessages('de', {
    defaultMessage: "Die Eingabe scheint nicht korrekt zu sein.",
    type: {
      email: "Die Eingabe muss eine gültige E-Mail-Adresse sein.",
      url: "Die Eingabe muss eine gültige URL sein.",
      number: "Die Eingabe muss eine Zahl sein.",
      integer: "Die Eingabe muss eine Zahl sein.",
      digits: "Die Eingabe darf nur Ziffern enthalten.",
      alphanum: "Die Eingabe muss alphanumerisch sein."
    },
    notblank: "Die Eingabe darf nicht leer sein.",
    required: "Dies ist ein Pflichtfeld.",
    pattern: "Die Eingabe scheint ungültig zu sein.",
    min: "Die Eingabe muss größer oder gleich %s sein.",
    max: "Die Eingabe muss kleiner oder gleich %s sein.",
    range: "Die Eingabe muss zwischen %s und %s liegen.",
    minlength: "Die Eingabe ist zu kurz. Es müssen mindestens %s Zeichen eingegeben werden.",
    maxlength: "Die Eingabe ist zu lang. Es dürfen höchstens %s Zeichen eingegeben werden.",
    length: "Die Länge der Eingabe ist ungültig. Es müssen zwischen %s und %s Zeichen eingegeben werden.",
    mincheck: "Wählen Sie mindestens %s Angaben aus.",
    maxcheck: "Wählen Sie maximal %s Angaben aus.",
    check: "Wählen Sie zwischen %s und %s Angaben.",
    equalto: "Dieses Feld muss dem anderen entsprechen."
  });
  Parsley.setLocale('de');
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
"use strict";

// USAGE: add class `img-cover` and
//  `data-pos-y="0" => standard / top`
//  `data-pos-y="1" => bottom`
//  `data-pos-y="2" => center`
//  `data-pos-y=">2" => to top`
//  `data-pos-x="0" => standard / left`
//  `data-pos-x="1" => right`
//  `data-pos-x="2" => center`
//  `data-pos-x=">2" => to left`
var imgCover = function ($) {
  /******************************************************************
      EVENTS
  ******************************************************************/
  $(document).on('lazyloaded', function (e) {
    // no img-cover
    if (!$(e.target).hasClass('img-cover')) return;
    makeImgCover($(e.target));
  });
  $(window).on('resize', function (e) {
    setTimeout(function () {
      makeImgCover($('.img-cover'));
    }, 100); // trigger again to further improve it

    setTimeout(function () {
      makeImgCover($('.img-cover'));
    }, 500);
  });
  /******************************************************************
      FUNCTIONS
  ******************************************************************/

  function makeImgCover($img) {
    $img.each(function () {
      var $this = $(this);
      var $container = $this.parent();
      var containerWidth = $container.outerWidth();
      var containerHeight = $container.outerHeight();
      var imgWidth = $this.width();
      var imgHeight = $this.height();
      var containerRatio = containerWidth / containerHeight;
      var imgRatio = imgWidth / imgHeight;
      var horizontalStretch = containerRatio >= imgRatio;
      var centerHeight;
      var centerWidth; // get data attributes from image

      var posY = parseInt($this.data('pos-y'), 10);
      var posX = parseInt($this.data('pos-x'), 10);

      if (horizontalStretch) {
        $this.css({
          width: '100%',
          height: 'auto'
        });
        centerHeight = ($this.height() - containerHeight) * (1 / posY);
        $this.css({
          marginLeft: '0',
          marginTop: -centerHeight + 'px'
        });
      } else {
        $this.css({
          width: 'auto',
          height: '100%'
        });
        centerWidth = ($this.width() - containerWidth) * (1 / posX);
        $this.css({
          marginTop: '0px',
          marginLeft: -centerWidth + 'px'
        });
      }
    });
  }
}(jQuery);