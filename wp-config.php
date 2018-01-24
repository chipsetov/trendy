<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'trendy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7Y#n[|L=VWtt!ZOtO!tEz-(4Nvgv*aqRE`8d2}qGY^!OF>@:/3jWk)3MRKAO.f4F');
define('SECURE_AUTH_KEY',  '=52!#uqZVjhgU`0&v+lBh}Y|>or]@I?Ue~k3zh#tGRR#ETD9/UL$jNKTEIfav$I,');
define('LOGGED_IN_KEY',    'rNcrmpjI`9lulj6VF)x8?QuM;(b6;6|}:l^M5C3;MSvOT0LwI|%=6h~.QTF %M/U');
define('NONCE_KEY',        'CN#t*c;-[)q.Q!k}?Fp_)wYSf Rkoz}>kO0wV!p$U4drcibU6kR>GRPf^ng3?#AD');
define('AUTH_SALT',        'xi^pUpwJdW853L*EB|?Eu;{`{N7tgLbzb2gBGxoTxg[cQkmLfZ(r!.%F9.VqbWj&');
define('SECURE_AUTH_SALT', 'UvQ!X8AeyA6MW7?<|pc85DjO|H|0d<vID<>q9y@hI):7fMB-kF5Bdy5Fm>DCWno5');
define('LOGGED_IN_SALT',   'SW0*J`RqX/l-Z9LNgxRW:YEOmi8p%v]jP}azN7z$:uOcV4|pGF>T#dljn_{8^A5~');
define('NONCE_SALT',       'Q@f,3T;T`c+60g!VmT[_0jnx%3bn71YfcR|?O-JJNqTq[II888/)ox:!7qh9+&[<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
