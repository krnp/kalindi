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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/naazperfumes/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'naazperf_live');

/** MySQL database username */
define('DB_USER', 'naazperfumes');

/** MySQL database password */
define('DB_PASSWORD', 'W3jgH12154523bEA8dqR');

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
define('AUTH_KEY',         'UJu@0yiA$#Xe@)5FCP1t:XDwI|}FqHbJ0n1g5QiP7:j[YKqC>F*sZQ1D%%/F/+_-');
define('SECURE_AUTH_KEY',  'fZUrngYO/W&WChWS?9vmK.[O7Kb?e3EK}V`X}EJ>+}}r|;wW&[s.-*!lT1{X]{Ij');
define('LOGGED_IN_KEY',    '[{2nvO>g/k!Z]yE$GM,gxJda%_1wA?A#=)z8) S@XC*vrTaKhjCRu6`zRcgdB~)]');
define('NONCE_KEY',        '3M2G>#Nw6|aO%7Mt0;~+~ZM26j8I-LDChG-2.D4nf-9eF20qu&$AYD<Y}Kh@0iwV');
define('AUTH_SALT',        '`8flTfqi^Z0w.GwCWqX`MB_fA+PEqo:U?h,2a{gI4 ;V@@rNCwnKsmAn,1U+~*?%');
define('SECURE_AUTH_SALT', '6v<Prj!)CN<0c|.1QO4.[NOm9K.:8[kNy<._tzsX~%av@ M[ztvK2e2A9@1DQzfD');
define('LOGGED_IN_SALT',   'Yj}wORI[Tl/yzuq]Mn(^|yg;mw:{Vp,OsSKd;:y*xziN13:r-dv4uf}[45M,+iB&');
define('NONCE_SALT',       'Su|bvM>5N?^!3|&^T:HHc=kUl}caoH@i`uZ?:RU%Kb%htk:u-:8+UAR+KBb=]A.@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nz_';

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
