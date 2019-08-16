"use strict";

var global = function ($) {
  /******************************************************************
      VARS
  ******************************************************************/

  /*
  * USAGE:
  *     if (global.breakpoint.value === 'xs' || global.breakpoint.value *     === 'sm') {
  *        // your code
  *     } else {
  *        // your code
  *     }
  */
  var breakpoint = {};

  breakpoint.refreshValue = function () {
    this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');
  };
  /******************************************************************
        EVENTS
    ***************************************************************** */


  $(window).resize(function () {
    breakpoint.refreshValue();
  }).resize();
  /******************************************************************
        FUNCTIONS
    ***************************************************************** */

  /*
  * USAGE:
  *     global.debounce(function(), 2000);
  */

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
  /*
  * USAGE:
  *     1. add attribute `data-link` to anchor, you want to trigger
  *     2. add click event on element you want the link to trigger on
  *     ---
  *     $card.on('click', function(e){
  *        global.triggerCardClick($(this), e);
  *     });
  */


  function triggerCardClick($clickedCard, event) {
    var $linkEl = $clickedCard.find('a[data-link]'); // leave if no link is present

    if (!$linkEl.length) return;
    event.stopPropagation();
    var linkHref = $clickedCard.find('a[data-link]').attr('href');
    var linkTarget = $clickedCard.find('a[data-link]').attr('target');

    if (linkTarget == '_blank') {
      linkTarget = '_blank';
    } else {
      linkTarget = '_self';
    } //simulate anchor click


    window.open(linkHref, linkTarget);
  }
  /** ****************************************************************
        PUBLIC_FUNCTIONS
    ******************************************************************/


  return {
    debounce: debounce,
    getRandomInt: getRandomInt,
    breakpoint: breakpoint,
    triggerCardClick: triggerCardClick
  };
}(jQuery);
"use strict";

var bldGallery = function ($) {
  /******************************************************************
      VARS
  ******************************************************************/
  var $slider = $('.bld_gallery__slider');
  if (!$slider.length) return;
  /******************************************************************
      FUNCTIONS
  ******************************************************************/

  $slider.each(function () {
    var $currentSlider = $(this);
    var $thumbsNav = $currentSlider.next('.bld_gallery__nav'); // navigation with thumbnail preview

    if ($thumbsNav.length) {
      $currentSlider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.bld_gallery__nav',
        prevArrow: '<button class="slick-prev" aria-label="Zurück"><i class="slick-icon"><svg class="icon"><use href="#icon-left-arrow" xlink:href="#icon-left-arrow"/></svg></i></button>',
        nextArrow: '<button class="slick-next" aria-label="Weiter"><i class="slick-icon"><svg class="icon"><use href="#icon-right-arrow-2" xlink:href="#icon-right-arrow-2"/></svg></i></button>'
      });
      $thumbsNav.slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        asNavFor: '.bld_gallery__slider',
        centerMode: true,
        arrows: false,
        focusOnSelect: true,
        responsive: [{
          breakpoint: 1461,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        }, {
          breakpoint: 481,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }]
      }); // navigation with dots
    } else {
      $currentSlider.slick({
        dots: true,
        arrows: true,
        fade: true,
        prevArrow: '<button class="slick-prev" aria-label="Zurück"><i class="slick-icon"><svg class="icon"><use href="#icon-left-arrow" xlink:href="#icon-left-arrow"/></svg></i></button>',
        nextArrow: '<button class="slick-next" aria-label="Weiter"><i class="slick-icon"><svg class="icon"><use href="#icon-right-arrow-2" xlink:href="#icon-right-arrow-2"/></svg></i></button>'
      });
    }
  });
}(jQuery);
"use strict";

var blgTestimonials = function ($) {
  /******************************************************************
      VARS
  ******************************************************************/
  var $testimonialSlider = $('.blg_testimonials__slider');
  /******************************************************************
      EVENTS
  ******************************************************************/

  $testimonialSlider.slick({
    centerMode: true,
    centerPadding: '200px',
    slidesToShow: 3,
    autoplay: false,
    autoplaySpeed: 6000,
    prevArrow: '<svg class="icon icon--xlarge t-c-white slick-prev"><use href="#icon-left-arrow" xlink:href="#icon-left-arrow"/></svg>',
    nextArrow: '<svg class="icon icon--xlarge t-c-white slick-next"><use href="#icon-right-arrow" xlink:href="#icon-right-arrow"/></svg>',
    responsive: [{
      breakpoint: 1600,
      settings: {
        centerPadding: '100px'
      }
    }, {
      breakpoint: 1400,
      settings: {
        centerPadding: '60px'
      }
    }, {
      breakpoint: 961,
      settings: {
        centerPadding: '0px',
        slidesToShow: 1
      }
    }]
  });
  /******************************************************************
      FUNCTIONS
  ******************************************************************/
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
  /******************************************************************
      VARS
  ******************************************************************/
  var $window = $(window);
  /******************************************************************
       EVENTS
  ******************************************************************/

  $window.on("scroll", function () {
    global.debounce(toggleBackToTop(), 2000);
  });
  $(document).on("click", ".m_back-to-top", function () {
    scrollToTop();
  });
  /******************************************************************
       FUNCTIONS
   ******************************************************************/

  function toggleBackToTop() {
    var $button = $(".m_back-to-top");
    var scrollDistance = $(document).scrollTop();
    var windowHeight = $window.height();

    if (scrollDistance >= windowHeight) {
      $button.removeClass("is-hidden");
    } else {
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
  var $siteNavigation = $(".n_site");
  var $siteNavigationBurger = $(".h_site__burger");
  /******************************************************************
       EVENTS
   ******************************************************************/

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
  } // toggle nav on mobile/desktop


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

/*
 * USAGE: add class `img-cover` and
 *   - `data-pos-y="0" => standard / top`
 *   - `data-pos-y="1" => bottom`
 *   - `data-pos-y="2" => center`
 *   - `data-pos-y=">2" => to top`
 *   - `data-pos-x="0" => standard / left`
 *   - `data-pos-x="1" => right`
 *   - `data-pos-x="2" => center`
 *   - `data-pos-x=">2" => to left`
 */
var imgCover = function ($) {
  /******************************************************************
      EVENTS
  ******************************************************************/
  $(document).on('lazyloaded', function (e) {
    // no img-cover
    if (!$(e.target).hasClass('img-cover')) return;
    makeImgCover($(e.target));
    setTimeout(function () {
      makeImgCover($(e.target));
    }, 100);
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