/* USAGE: add class `img-cover` and
//  `data-pos-y="0" => standard / top`
//  `data-pos-y="1" => bottom`
//  `data-pos-y="2" => center`
//  `data-pos-y=">2" => to top`
//  `data-pos-x="0" => standard / left`
//  `data-pos-x="1" => right`
//  `data-pos-x="2" => center`
//  `data-pos-x=">2" => to left`

const imgCover = (function($) {
    /******************************************************************
        EVENTS
    ******************************************************************/

    $(document).on('lazyloaded', function(e){
        // no img-cover
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
            const containerWidth    = $container.outerWidth();
            const containerHeight   = $container.outerHeight();
            const imgWidth          = $this.width();
            const imgHeight         = $this.height();

            const containerRatio     = containerWidth / containerHeight;
            const imgRatio           = imgWidth / imgHeight;

            const horizontalStretch = containerRatio >= imgRatio;

            let centerHeight;
            let centerWidth;

            // get data attributes from image
            const posY = parseInt($this.data('pos-y'), 10);
            const posX = parseInt($this.data('pos-x'), 10);

            if (horizontalStretch) {
                $this.css({
                    width: '100%',
                    height: 'auto',
                });

                centerHeight = ($this.height() - containerHeight) * (1 / posY);

                $this.css({
                    marginLeft: '0',
                    marginTop: -(centerHeight) + 'px',
                });
            } else {
                $this.css({
                    width: 'auto',
                    height: '100%',
                });

                centerWidth = ($this.width() - containerWidth) * (1 / posX);

                $this.css({
                    marginTop: '0px',
                    marginLeft: -(centerWidth) + 'px',
                });
            }
        });
    }

 })(jQuery);
