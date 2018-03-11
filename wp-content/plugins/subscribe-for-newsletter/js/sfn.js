// jQuery(document).ready(function($) {
//     jQuery('#rcps_submit').click(function() {
//         var email =jQuery('#rcps_contact_email').val();
//         var data = {
//             'action': 'rcps_subscription',
//             'email': email
//         };
//         jQuery.post(my_ajax_object.ajax_url, data, function(response) {
//         });
//     });
// });

jQuery( document ).on( 'click', '#rcps_submit', function() {
    //var email =jQuery('#rcps_contact_email').val();
    var email =  $('#rcps_contact_email').val();
    jQuery.ajax({

        url : getdata_form.ajax_url,
        type : 'post',
        data : {
            action :'rcps_subscription_callback',
            email : email
        },
        success : function( response ) {
            alert(response);
        }
    });
    return false;
});

