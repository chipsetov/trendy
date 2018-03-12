<?php
/**
 * Created by PhpStorm.
 * User: AntoA
 * Date: 12.03.2018
 * Time: 18:46
 */

class ContactUS
{
    public function __construct()
    {
//        add_action('wp_ajax_nopriv_getFormTest', array($this, 'getFormTest'));
        add_action('wp_ajax_nopriv_createPost', array($this, 'createPost'));
        add_action('wp_ajax_nopriv_rcps_subscription_callback', array($this, 'rcps_subscription_callback'));
//        add_action('wp_ajax_getFormTest', array($this, 'getFormTest'));
        add_action('wp_ajax_createPost', array($this, 'createPost'));
        add_action('wp_ajax_rcps_subscription_callback', array($this, 'rcps_subscription_callback'));
        add_action('wp_enqueue_scripts', array($this, 'addJS'));
        add_shortcode('contactus-display-form', array($this, 'contactUsShortcode'));
        add_action('admin_menu', array($this, 'test_plugin_setup_menu'));
    }

    function addJS()
    {
        wp_enqueue_script('contactUs', plugins_url('../js/contactus.js', __FILE__), array('jquery'), NULL, true);
        // wp_enqueue_script('getFormm', plugins_url('../getFormData.js', __FILE__), array('jquery'), NULL, true);
        wp_localize_script('contactUs', 'getdata_form', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }

    public function contactUsShortcode($atts)
    {
        ob_start();
        ?>
        <div class="contactus-wdg">

            <div><input type="text" id="contactus-plg-name" name="contactus-plg-name" placeholder="YOUR NAME"></input> </div>
            <div><input type="text" id="contactus-plg-email" name="contactus-plg-email" placeholder="YOUR EMAIL"></input> </div>
            <div><input type="text" id="contactus-plg-phone" name="contactus-plg-phone" placeholder="YOUR PHONE"></input> </div>
            <div><input type="text" id="contactus-plg-message" name="contactus-plg-message" placeholder="THE MESSAGE"></input></div>
            <br/>
            <div>
                <button type="button" id="contactus-plg-name-submit">Send the message</button>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }





}

new ContactUS();