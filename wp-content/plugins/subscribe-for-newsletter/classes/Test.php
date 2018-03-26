<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/11/2018
 * Time: 1:24 PM
 */

class Test
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
        add_shortcode('sfn-display-form', array($this, 'createPostShortcode'));
        add_action('admin_menu', array($this, 'test_plugin_setup_menu'));
    }

    function addJS()
    {
        wp_enqueue_script('getForm', plugins_url('../js/sfn.js', __FILE__), array('jquery'), NULL, true);
        // wp_enqueue_script('getFormm', plugins_url('../getFormData.js', __FILE__), array('jquery'), NULL, true);
        wp_localize_script('getForm', 'getdata_form', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }

    function createPost()
    {
        try {
            $post_data = array(
                'post_title' => wp_strip_all_tags($_POST['title']),
                'post_content' => $_POST['body'],
                'post_status' => 'publish',
                'post_author' => 1,
                'post_category' => array($_POST['cat'])
            );
            $post_id = wp_insert_post($post_data);
            echo "Post created";
        } catch (Exception $e) {
            echo 'Error : ', $e->getMessage(), "\n";
        }
        wp_die();
    }

    public function createPostShortcode($atts)
    {
        ob_start();
        ?>
        <div class="subscription-wdg">
            <div class="subscription-wdg-desc"><?= $atts['desc']; ?></div>

            <div><input type="email" id="rcps_contact_email" name="rcps-email" placeholder="YOUR EMAIL ADDRSS"></input>
            </div>
            <br/>
            <div>
                <button type="button" id="rcps_submit"><i class="fa fa-envelope"></i>Subscribe</button>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }

    function rcps_subscription_callback()
    {
        try {
            global $wpdb;
            $email = $_POST['email'];
            // $fetch_sql_query = "select * from rcps_email_subscribers where email='$email'";
            //   $result = $wpdb->get_results($fetch_sql_query);
            //   if (!empty($result)) {
            //Insert new row
            $table = $wpdb->prefix . 'rcps_email_subscribers';
            $fetch_sql_query = "select * from wp_rcps_email_subscribers where email='$email'";
            $result = $wpdb->get_results($fetch_sql_query);
            if (empty($result)) {
                $data = array('email' => $email);
                $wpdb->insert($table, $data);
            }//if ends
            echo "Success";
        } catch (Exception $e) {
            echo 'Error : ', $e->getMessage(), "\n";
        }

        wp_die();

    }

    function test_plugin_setup_menu(){
        add_menu_page( 'Subscribers emails', 'Subscribers emails', 'manage_options', 'test-plugin', array( $this, 'test_init' ) );
    }

    function test_init(){
        echo "<h1>Subscribers emails</h1>";?>
<table border="1">
    <tr>
        <th>id</th>
        <th>email</th>
    </tr>
    <?php
    global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM wp_rcps_email_subscribers" );
    foreach ( $result as $print )   {
        ?>
        <tr>
            <td><?php echo $print->id;?></td>
            <td><?php echo $print->email;?></td>
        </tr>
    <?php }
    ?>
    <?php


    }

}

new Test;