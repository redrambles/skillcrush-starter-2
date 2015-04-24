<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'skillcrush_anew');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'n-3+cwpC>ww`sh@P%z{*)W4YK]!YfgGzlovmZi-;BIeJT3_*|Uf-o$+BgV?$E|5O');
define('SECURE_AUTH_KEY',  'Z|C $iY:.[|{^l;=Z-$@2%dOMPpr^/}(]|,K]Im|sm-:d5+YPLvb |N|c!6,)5+W');
define('LOGGED_IN_KEY',    '*I|-txft%_{A%*kPlO/8]do[s6fZ5GiNO2i[Yzc7)Fh5``I`I=JoDwzrg%%,:{X7');
define('NONCE_KEY',        '&<>&lC3Swklp>S+W][0hv.D4sN{c`@R:Pw+SAa/>N&A{*(+8v8x5k*Yi$wLLjG*7');
define('AUTH_SALT',        '0L.#T(0n*_Vs/%pA@Tw@qv-|ICZ=Fdj VqCF;n,ew,Nh8s7?,_EDS!}-Wh&)A2`^');
define('SECURE_AUTH_SALT', '*(q83.v_bx*o$o4MYKSsrqKr!^m_oMS$FfKF6obn7X}]!7d?LEczbFE}JK.~|O|k');
define('LOGGED_IN_SALT',   '!}c`:cs=P5i-TU=mP$za)7b9lUNN0 #-9/2jMV~4s#ySn2Z?|Zp]~L=Rz>z:Qgt7');
define('NONCE_SALT',       'IBwh)_sRTZ(+O%}gjK^+tv?.s9.S|{{;RHc~flI.{*=kv8z6H&Xe O{4-Q7;,u+8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
