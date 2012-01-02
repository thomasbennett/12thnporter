<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '12thnporter');

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
define('AUTH_KEY',         ' ?nMUe-+F%Y@NtyJP${=h:2&:-Bpp8Ae;DBR=8n+;fo[PzVTE%EEfA6V7Z.itq`X');
define('SECURE_AUTH_KEY',  '3`Dd*%}kXFa;}V[-RRo3FEYYU*<R,fnE-|mywa/ndw+SI!`vvXIw1-0{^4TVTy(A');
define('LOGGED_IN_KEY',    '.T<jiC--?.(y:R/1F<hBgCaX|bs3:/ }|k0U]d.<2Di@+v5s-u?C-g!-Q;!cTii7');
define('NONCE_KEY',        '<@;}*huR;l%5N:WgueY?64O}|-&zKD@6Xg|m}tS=K3Rk%cD+:z?g5Z]3~-4wOr,p');
define('AUTH_SALT',        '1~W1/z=O;WNN~%6|gVBi]S`v~DD6$x3l4c[xiAL6H%P4Jo;M2CMu2]4t~ 9n#2`L');
define('SECURE_AUTH_SALT', 'J1+g7v*LVmd-{F<&tHpiVpCmZtE,qRHgr&~!=0:8Nbp&amF !x!Ho8=X^x]<1gRU');
define('LOGGED_IN_SALT',   'GZrte-Y_pzhTqES$66a8H.r-.UE,.+3(W(=/Q[y{CQ2xA5!G79{<qRX+MSiop|&W');
define('NONCE_SALT',       '#|c%.0?5k.?Q8EVg Mm;*(}p&g xvENwL,aKSp?M3e@pH+NFI!+31?#GEb{V;riP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
