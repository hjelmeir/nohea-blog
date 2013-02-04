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
$server = $_SERVER['SERVER_NAME'];
(strstr($server,'localhost')) ? $env = 'local' : $env = 'production';
if($env == 'local') {
  define('DB_NAME', 'nohea');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_HOST', 'localhost');
  define('DB_CHARSET', 'utf8');
  define('DB_COLLATE', '');
} else {
  define('DB_NAME', 'noheades_blog');
  define('DB_USER', 'noheades_nohea');
  define('DB_PASSWORD', 'ZxAs!2Qw');
  define('DB_HOST', 'localhost');
  define('DB_CHARSET', 'utf8');
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
define('AUTH_KEY',         'K2vW5cjt.p2<f,[6E$PkUgT~4 0X|5WMgt5&!C,{Df:^e}L?o14!Xu[,61z)ml_9');
define('SECURE_AUTH_KEY',  ',N;B(Yu-.,xZ+^ s#sX#2+v!O%1R#_G`{jfwD] 3E62o;4PZO,9)5o*Vp.r4SrCN');
define('LOGGED_IN_KEY',    'fACGO/NZ]tm-zfOvs|yX GG}rnR[ -xI{vfVft14)bi+}]-cb_UxK1pczyuE^j~>');
define('NONCE_KEY',        'oy[,;Cat)|siOgzzIlLAUy-%@]GEe>V?t+zKxkGUL/VYYjxldJ6QUWlHDF+x&fE?');
define('AUTH_SALT',        'J-Pl{YsEB7D)=3S0B}{c3bFn[?FxV-MLK-,R7*,`hO) AoA+&h,wBd||F^nP+7iH');
define('SECURE_AUTH_SALT', '|V[aPjZ_Wn)-h:QdsSN3kTlHi79OC:@Y.!^0tQik7n0;|o4_AP(3%n(]ocoFI)`T');
define('LOGGED_IN_SALT',   'X:%(R05c_A|7pgj7m_8+V?Rf@WI}bf@->#oj|A*.KkR}:,b>OS1&T:hA#9L+qrTJ');
define('NONCE_SALT',       'wzV]Rf#2j,,wu=ZTukJG#k@cAiBC%IP+fx#P/lp5Y5z9{wTIb._UP!EQjsFU;O43');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
