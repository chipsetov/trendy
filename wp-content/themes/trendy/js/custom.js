jQuery('.count').each(function () {
    jQuery(this).prop('Counter',0).animate({
        Counter: jQuery(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            jQuery(this).text(Math.ceil(now));
        }
    });
});
var defaults = {
    numberStep: function(now, tween) {
        var floored_number = Math.floor(now),
            target = jQuery(tween.elem);

        target.text(floored_number);
    }
};
jQuery.fn.animateNumber = function() {
    var options = arguments[0],
        settings = jQuery.extend({}, defaults, options),

        target = jQuery(this),
        args = [settings];

    for(var i = 1, l = arguments.length; i < l; i++) {
        args.push(arguments[i]);
    }

    // needs of custom step function usage
    if (options.numberStep) {
        // assigns custom step functions
        var items = this.each(function(){
            this._animateNumberSetter = options.numberStep;
        });

        // cleanup of custom step functions after animation
        var generic_complete = settings.complete;
        settings.complete = function() {
            items.each(function(){
                delete this._animateNumberSetter;
            });

            if ( generic_complete ) {
                generic_complete.apply(this, arguments);
            }
        };
    }

    return target.animate.apply(target, args);
};

    var decimal_places = 1;
    var decimal_factor = decimal_places === 0 ? 1 : decimal_places * 10;

    jQuery('#decimal').animateNumber(
        {
            number: 1.2 * decimal_factor,

            numberStep: function(now, tween) {
                var floored_number = Math.floor(now) / decimal_factor,
                    target = jQuery(tween.elem);
                if (decimal_places > 0) {
                    floored_number = floored_number.toFixed(decimal_places);
                }

                target.text(floored_number + ' K');
            }
        },
        15000
    )





