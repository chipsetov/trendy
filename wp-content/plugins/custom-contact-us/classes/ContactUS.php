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
        add_action('wp_ajax_contact_us_callback', array($this, 'contact_us_callback'));
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

            <div class="first-row"><input type="text" id="contactus-plg-name" name="contactus-plg-name" placeholder="YOUR NAME"></input>
                <input type="text" id="contactus-plg-email" name="contactus-plg-email" placeholder="YOUR EMAIL"></input>
                <input type="text" id="contactus-plg-phone" name="contactus-plg-phone" placeholder="YOUR PHONE"></input>
            </div>
<!--            <div><input type="text" id="contactus-plg-message" name="contactus-plg-message" placeholder="THE MESSAGE"></input></div>-->
            <div class="second-row"><textarea id="contactus-plg-message" name="contactus-plg-message" cols="40" rows="5" placeholder="THE MESSAGE"></textarea></div>
            <div class="submit-btn-class">
                <button type="button" id="contactus-plg-name-submit">Send the message</button>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }

    function contact_us_callback()
    {
        try {
            global $wpdb;
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            // $fetch_sql_query = "select * from rcps_email_subscribers where email='$email'";
            //   $result = $wpdb->get_results($fetch_sql_query);
            //   if (!empty($result)) {
            //Insert new row
            $table = $wpdb->prefix . 'contact_us_own_plugin';
            $fetch_sql_query = "select * from wp_contact_us_own_plugin' where email='$email'";
            $result = $wpdb->get_results($fetch_sql_query);
            if (empty($result)) {
                $data = array('email' => $email, 'name' => $name, 'phone' => $phone, 'message' => $message);
                $wpdb->insert($table, $data);
            }//if ends
            echo "Success";
        } catch (Exception $e) {
            echo 'Error : ', $e->getMessage(), "\n";
        }

        wp_die();

    }

    function test_plugin_setup_menu(){
        add_menu_page( 'Contact us list', 'Contact us list', 'manage_options', 'contact-us-list', array( $this, 'test_init' ) );
    }


    function test_init(){
        echo "<h1>Contact us list</h1>";?>
        <table border="1">
        <tr>
            <th>id</th>
            <th>email</th>
            <th>name</th>
            <th>phone</th>
            <th>message</th>
        </tr>
        <?php
        global $wpdb;
        $result = $wpdb->get_results ( "SELECT * FROM wp_contact_us_own_plugin" );
        foreach ( $result as $print )   {
            ?>
            <tr>
                <td><?php echo $print->id;?></td>
                <td><?php echo $print->email;?></td>
                <td><?php echo $print->name;?></td>
                <td><?php echo $print->phone;?></td>
                <td><?php echo $print->message;?></td>
            </tr>
        <?php }
        ?>
        <?php


    }

}

new ContactUS();