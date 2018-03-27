jQuery( document ).ready(function() {
    var ppp = 3; // Post per page
    /*var cat = 18;*/
    var pageNumber = 1;

    function load_posts() {
        pageNumber++;
        var str = /*'&cat=' + cat + */'&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: frontendajax.ajaxurl,
            data: str,
            success: function (data) {
                var $data = jQuery(data);
                if ($data.length) {
                    jQuery("#cd-timeline").append($data);
                    jQuery("#more_posts").attr("disabled", false);
                } else {
                    jQuery("#more_posts").attr("disabled", true);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                jQueryloader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    jQuery("#more_posts").on("click", function () { // When btn is pressed.
        jQuery("#more_posts").attr("disabled", true); // Disable the button, temp.
        load_posts();
    });
    console.log("fffd   f");

});
