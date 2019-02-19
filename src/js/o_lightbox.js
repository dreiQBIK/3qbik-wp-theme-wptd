const oLightbox = (function($) {


   /******************************************************************
       VARS
   ******************************************************************/

   const $lightbox = $('.o_lightbox');
   const $closeButton = $('.o_lightbox__close');
   const $allImages = $('figure.with-lightbox');


   /******************************************************************
       EVENTS
   ******************************************************************/

   // close lightbox
   $closeButton.on('click', (e) => {
       closeLightbox();
   });

   // open lightbox
   $allImages.on('click', (e) => {
       const $img = $(e.target).closest('figure').find('img');
       openLightbox($img);
   });

   // close on click on background
   $lightbox.on('click', (e) => {
       const $target = $(e.target);
       if ($target.closest('.o_lightbox').hasClass('is-open')) {
           if (!$target.hasClass('o_lightbox__img')) {
               closeLightbox();
           }
       }
   });

   $(window).on('resize', function(e) {
       if ($lightbox.hasClass('is-open')) {
           setTimeout(function() {
               adjustImageSize($('.o_lightbox__img'));
           }, 100);
       }
   });

   /******************************************************************
       FUNCTIONS
   ******************************************************************/

   function openLightbox($img) {
       const imgAlt = $img.attr('alt');
       const imgSrc = $img.attr('data-src');
       const imgSrcset = $img.attr('data-srcset');

       // build img with given attributes
       $lightbox.addClass('is-open');
       const lightboxImg = '<img class="o_lightbox__img lazyload" alt="' + imgAlt + '" data-src="' + imgSrc + '" data-srcset="' + imgSrcset + '" sizes="' + $lightbox.width() + '" />'
       $lightbox.find('.o_lightbox__figure').append(lightboxImg);

       // add to DOM and adjust sizing
       adjustImageSize($img);
   }

   function closeLightbox() {
       const $lightboxImg = $('.o_lightbox__img');
       $lightbox.removeClass('is-open');
       $lightboxImg.remove();
   }

   function adjustImageSize($img) {
       const $container = $('.o_lightbox__figure');
       const $lightboxImg = $('.o_lightbox__img');
       const containerSize     = $container.width() / $container.height();
       const imgSize           = $img.width() / $img.height();

       if (containerSize < imgSize) {
           $lightboxImg.css({
               width: '100%',
               height: 'auto',
           });
       } else {
           $lightboxImg.css({
               width: 'auto',
               height: '100%',
           });
       }
   }

})(jQuery);
