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

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'sbpm');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0{xdXZQMCzz$7<mu4^$o+O:!-+/MYm+[VGr-rmEzjY-NyG!> lF#*Y&Saz*)X<ZE');
define('SECURE_AUTH_KEY',  '<o!Fn+GJyY;Dw|[lmB1g>OCjM3}/~7p-bLvG*@ZC>{Rittusa!kU<4VfW!%(YnAw');
define('LOGGED_IN_KEY',    '^2_-P8! 4Q 4;o~%ctFrm>50W`V~5?=C(d.J4=[0V<`E~nJp]-1||Vfda|/4t5k#');
define('NONCE_KEY',        'YcN(HMSCRkmt.M_C5%%5jRi}/egvh|cvl(!$#d3#5Okf%)M-HNSFo#7f0XN6R$/B');
define('AUTH_SALT',        'w)sW/:lO Z/E^z8HDU_~xv|*+F+T*}B5vpL&{` =%M9.pg?jtI*_Q^pi+J<*~t`W');
define('SECURE_AUTH_SALT', ':i--:8>`a.DL{{dskJyJ_#+3V0d+6a[>~BbAVZ?TP|`q<Vlbg2[ZOO&xm})e:^.5');
define('LOGGED_IN_SALT',   'eT>;>:bOx{v;.6Xv^QM)KL4oil]mpY#yVTt|Htmv4C]F[u[=H*3`2nN^Gw37,NE1');
define('NONCE_SALT',       ';%pPD/6oF@=P/>y`qo|5vz72|vcttAoPQ?;qJr/F0J$Z<MUYK2@USkWE=%DT]G^^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'client_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://localhost/sbpm/cms');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://localhost/sbpm/cms');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}

define('WP_TEMP_DIR',dirname(__FILE__).'/content/uploads');

define('FS_METHOD', 'direct'); // fuerza el modo de sistema de archivos: "direct", "ssh", "ftpext", o "ftpsockets"
define('FTP_BASE', '/bibliomed/paginaweb/'); // ruta absoluta al directorio raiz donde está instalado WordPress
define('FTP_CONTENT_DIR', '/bibliomed/paginaweb/content/'); // ruta absoluta al directorio "wp-content"
define('FTP_PLUGIN_DIR ', '/bibliomed/paginaweb/content/plugins/'); // ruta absoluta al directorio "wp-plugins"
define('FTP_USER', 'bibliomed'); // tu usuario FTP o SSH
define('FTP_PASS', 'cjLCo37qTPydmMRW'); // contraseña del usuario FTP_USER
define('FTP_HOST', 'bibliolabs.cc:33'); // combinación de puerto:servidor a tu servidor SSH

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
	
}
 error_reporting(0);
/* That's all, stop editing! Happy blogging. */

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

	echo ABSPATH;

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
