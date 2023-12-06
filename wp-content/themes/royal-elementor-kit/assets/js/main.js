jQuery.noConflict();
(function ($) {

    function postFeatureList() {
        if ($('.post-grid-feature-list').length){
            var h = $('.post-grid-feature-list .post-grid-item').first().height();
    
            $('.post-list-scroll').css('height',(h + 30) * 4 + 40);
        }
    }

    function callApplication() {
        
    }

    function buttonMobileMenu() {
        
    }

    $(document).ready(function ($) {
        postFeatureList()
       
        setTimeout(function () {
            onScroll();
        }, 300);
    });

    $(window).bind('scroll', function () {
        onScroll();
    });

    $(window).resize(function () {
        postFeatureList();
    });

    function onScroll() {
        

    }

})(jQuery);





