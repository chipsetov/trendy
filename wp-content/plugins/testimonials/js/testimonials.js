/**/
// Can also be used with $(document).ready()

/*no conflict the jquery parameter*/
var $j = jQuery.noConflict();

$j(document).ready(function() {
  $j('.flexslider').flexslider({
    animation: "slide"
  });
});