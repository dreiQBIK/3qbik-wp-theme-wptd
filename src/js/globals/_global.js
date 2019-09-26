const global = (function($) {

    /******************************************************************
        VARS
    ******************************************************************/

   /*
   * USAGE:
   *     if (global.breakpoint.value === 'xs' || global.breakpoint.value === 'sm') {
   *        // your code
   *     } else {
   *        // your code
   *     }
   */
   let breakpoint = {};
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
      let timeout;
      return function() {
         const context = this;
         const args = arguments;
         const later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
         };
         const callNow = immediate && !timeout;
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
      const $linkEl = $clickedCard.find('a[data-link]');

      // leave if no link is present
      if (!$linkEl.length) return;

      event.stopPropagation();
      const linkHref = $clickedCard.find('a[data-link]').attr('href');
      let linkTarget = $clickedCard.find('a[data-link]').attr('target');

      if (linkTarget == '_blank') {
         linkTarget = '_blank';
      } else {
         linkTarget = '_self';
      }
      //simulate anchor click
      window.open(linkHref, linkTarget);
   }


   /*
   * USAGE:
   *     global.scrollToSection($(this));
   */
   function scrollToSection($sectionName) {
      $("html, body").animate(
         {
            scrollTop: $sectionName.offset().top,
         },
         "swing"
      );
   }


   /** ****************************************************************
         PUBLIC_FUNCTIONS
     ******************************************************************/

   return {
      debounce,
      getRandomInt,
      breakpoint,
      triggerCardClick,
      scrollToSection,
   };

})(jQuery);
