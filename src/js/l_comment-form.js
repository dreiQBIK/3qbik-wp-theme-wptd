var lCommentForm = (function($) {

   /******************************************************************
       VARS
   ******************************************************************/

   var $element    = $('.l_comment-form');
   var $trigger    = $element.find('.l_comment-form__textarea.trigger');
   var $formHidden = $element.find('.l_comment-form__hidden');


   /******************************************************************
       EVENTS
   ******************************************************************/

   if (!$trigger) return;

   $trigger.focus(function(e) {
       $formHidden.removeClass('inactive');
   });



   /******************************************************************
       FUNCTIONS
   ******************************************************************/


})(jQuery);
