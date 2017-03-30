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
//define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/home/capa2/public_html/arteck/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'arteck2');

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
define('AUTH_KEY',         '0gYBo:?t~z$ccLCyMnQ{zW5`w)m5.s_+[(n)Mi&lZsyG8i.C[nbtn+({cbj<4^5<');
define('SECURE_AUTH_KEY',  'r+Z9(&Yu*oBso=DW;J*Staiq,DV,/QJsG_ch@bw*Xd>CMi1,7M&DH_#*NpYHq}4y');
define('LOGGED_IN_KEY',    '0!.Seb~]}=@=jHO5%$Lsi~ +2*G Bh=AZAcG>iv%DgJTR+_NjXQG|)COVFJ~JcU0');
define('NONCE_KEY',        '$6 w5!/%(DwmJGef,{+@t_C%>K;d=[IWh<z|QoFor zZim2W`zpU.C3Zv888W+Lh');
define('AUTH_SALT',        'wg#9k<IQ>l8A F0lq{;]12GK$q,MJ*[$i+L]N6c@-7h.]9]n81Z%WL$k;$G}_v{.');
define('SECURE_AUTH_SALT', 'xS9<w$tz9]rlv+, >V6}Pr-Ic#,NAKA&mPXZ2Ybuw0QTaq)(*rq5N)KA,HS{E+<0');
define('LOGGED_IN_SALT',   '$6o)T:4|xewCO~&<B@wKdz*#90C/bWcn=>J75[(GM8PM}$]h!tHow3xrt4;{9Sk=');
define('NONCE_SALT',       ' n[fZEP6-|roQsM-$C0V8BH_0;vN/31[<=jky@7|/9TG!2bh-)me.qYg1-.OtF?}');

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
