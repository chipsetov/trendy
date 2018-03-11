<?php

class Activations
{
    static function activate()
    {
        global $wpdb;
        $your_db_name = $wpdb->prefix . 'rcps_email_subscribers';
        // create the ECPT metabox database table
        if($wpdb->get_var("show tables like '$your_db_name'") != $your_db_name)
        {
            $sql = "CREATE TABLE " . $your_db_name . " (
		`id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`email` mediumtext NOT NULL,
		UNIQUE KEY id (id)
		);";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    static function deactivate()
    {
    }

    static function uninstall()
    {
    }
}