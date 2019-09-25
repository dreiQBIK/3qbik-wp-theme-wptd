const prgPattern = (function($) {

    // TODO: copy prg-pattern.php into the root of the website (not theme)


   /******************************************************************
       EVENTS
   ******************************************************************/

   $('.prg-link[data-submit]').on('click', function(e) {
       redirect(e, $(this));
   });


   /******************************************************************
       FUNCTIONS
   ******************************************************************/

   function redirect(e, $el) {
       e.preventDefault();
       const $this = $el,
           $redirectForm = $('#prg-form'),
           $redirectValue = $('#prg-data'),
           value = $this.data('submit');

       $redirectValue.val(value);
       $redirectForm.submit();
   }

})(jQuery);
