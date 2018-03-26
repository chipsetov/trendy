jQuery( document ).on( 'click', '#contactus-plg-name-submit', function() {
    //var email =jQuery('#rcps_contact_email').val();
    var name =  $('#contactus-plg-name').val();
    var email =  $('#contactus-plg-email').val();
    var phone =  $('#contactus-plg-phone').val();
    var message =  $('#contactus-plg-message').val();
    jQuery.ajax({

        url : getdata_form.ajax_url,
        type : 'post',
        data : {
            action :'contact_us_callback',
            name : name,
            email : email,
            phone : phone,
            message : message
        },
        success : function( response ) {
            alert(response);
        }
    });
    return false;
});
