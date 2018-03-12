<?php
/*
Plugin Name: Custom contact us plugin
Plugin URI: http://wordpress.org/plugins/
Description: Create post by user
Author: Developer
Version: 1
Author URI: http://chim.com
*/

require_once (dirname(__FILE__) . '/classes/Activations.php');
register_activation_hook( __FILE__, array( 'Activations', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Activations', 'deactivate' ) );
register_uninstall_hook( __FILE__, array( 'Activations', 'uninstall' ) );

require_once (dirname(__FILE__) . '/classes/ContactUS.php');