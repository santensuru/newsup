    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop:true,
            margin:1,
            autoHeight: false,
            responsive:{
                0:{
                    items:1
                }
            }
        });
        $('.owl-next').click(function() {
        owl.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.owl-prev').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl.trigger('prev.owl.carousel', [300]);
        })
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                $('.owl-next').click();
            } else {
                $('.owl-prev').click();
            }
            e.preventDefault();
        });

        $(document).ready(function(){
            var heights = $(".sub-popular").map(function ()
            {
                return $(this).height();
            }).get(),

            maxHeight = Math.max.apply(null, heights);
            $('.sub-popular').height(maxHeight);
        });
    </script>