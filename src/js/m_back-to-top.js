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
