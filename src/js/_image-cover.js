const imgCover = (function($) {

   /******************************************************************
       EVENTS
   ******************************************************************/

   $(document).on('lazyloaded', function(e){
       if (!$(e.target).hasClass('img-cover')) return;
       makeImgCover($(e.target));
   });

   $(window).on('resize', function(e) {
       setTimeout(function() {
           makeImgCover($('.img-cover'));
       }, 100);
       // trigger again to further improve it
       setTimeout(function() {
           makeImgCover($('.img-cover'));
       }, 500);
   });


   /******************************************************************
       FUNCTIONS
   ******************************************************************/

   function makeImgCover($img) {

       $img.each(function() {

           const $this             = $(this);
           const $container        = $this.parent();
           const containerWidth    = $container.width();
           const containerHeight   = $container.height();
           const imgWidth          = $this.width();
           const imgHeight         = $this.height();

           const containerSize     = containerWidth / containerHeight;
           const imgSize           = imgWidth / imgHeight;

           const horizontalStretch = containerSize >= imgSize;

           let centerHeight;
           let centerWidth;

           if (horizontalStretch) {

               $this.css({
                   width: '100%',
                   height: 'auto',
               });

                centerHeight = ($this.height() - containerHeight) / 3;

               $this.css({
                   marginLeft: '0px',
                   marginTop: -(centerHeight) + 'px',
               });

           } else {

               $this.css({
                   width: 'auto',
                   height: '100%',
               });

               centerWidth = ($this.width() - containerWidth) / 2;

               $this.css({
                   marginTop: '0px',
                   marginLeft: -(centerWidth) + 'px',
               });
           }
       });
   }

})(jQuery);
