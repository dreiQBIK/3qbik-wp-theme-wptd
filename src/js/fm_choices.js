const choicesJS = (function($) {

   // Select via choices
   $("select").each(function() {
      new Choices(this, {
         searchEnabled: false,
         itemSelectText: "",
      });
   });

})(jQuery);
