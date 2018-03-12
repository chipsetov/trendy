<?php

namespace customcontactus; class Activations
{
    static function activate()
    {
        global $wpdb;
        $your_db_name = $wpdb->prefix . 'contact_us_own_plugin';
        // create the ECPT metabox database table
        if($wpdb->get_var("show tables like '$your_db_name'") != $your_db_name)
        {
            $sql = "CREATE TABLE " . $your_db_name . " (
		`id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`email` VARCHAR(22) NULL,
		`name` VARCHAR(22) NULL,
		`phone` VARCHAR(22) NULL,
		`message` TEXT NULL,
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