"use strict";

var debugJS = function ($) {

  /******************************************************************
      VARS
  ******************************************************************/
 const $copyElement = $('.wptd-copy');

  /******************************************************************
      EVENTS
  ******************************************************************/
 $copyElement.on('click', (e) => {
    const $element = $(e.target);
    copyText($element);
});

  /******************************************************************
      FUNCTIONS
  ******************************************************************/

    function copyText($element) {
        let $temp = $("<input>");
        const $elementText = $element.text();

        $("body").append($temp);
        $temp.val($elementText).select();
        document.execCommand("copy");
        $temp.remove();

        // set calss to scale clicked element
        $element.addClass('wptd-copied');
        setTimeout(() => {
            $element.removeClass('wptd-copied');
        }, 150);
    }

  /******************************************************************
      PUBLIC_FUNCTIONS
  ******************************************************************/
  return {// your code here
  };
}(jQuery);
