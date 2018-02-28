jQuery(window).load(function() {

    "use strict";

    /*
     ----------------------------------------------------------------------
     Preloader
     ----------------------------------------------------------------------
     */
    jQuery(".loader").delay(400).fadeOut();
    jQuery(".animationload").delay(400).fadeOut("fast");

});

jQuery(document).ready(function() {

    jQuery('.sw_btn').on("click", function(){
        jQuery("body").toggleClass("light");
    });

    /*
     ----------------------------------------------------------------------
     Nice scroll
     ----------------------------------------------------------------------
     */
    jQuery("html").niceScroll({
        cursorcolor: '#fff',
        cursoropacitymin: '0',
        cursoropacitymax: '1',
        cursorwidth: '2px',
        zindex: 999999,
        horizrailenabled: false,
        enablekeyboard: false
    });

});
