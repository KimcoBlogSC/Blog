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

 /** =============================OLD PROD SETTINGS==========================================================*/
 
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/** define('DB_NAME', 'kimcoblogdb_new'); */

/** MySQL database username */
/** define('DB_USER', 'root'); */

/** MySQL database password */
/** define('DB_PASSWORD', 'root'); */

/** MySQL hostname */
/** define('DB_HOST', 'localhost'); */

/** Database Charset to use in creating database tables. */
/** define('DB_CHARSET', 'utf8'); */

/** The Database Collate type. Don't change this if in doubt. */
/** define('DB_COLLATE', ''); */

/** =============================LOCAL SETTINGS==========================================================*/
define('REVISR_GIT_PATH', 'C:\Program Files\Git\cmd\git.exe'); // Added by Revisr
define('DB_NAME', 'kimcoblogdb_new');

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
/** define('AUTH_KEY',         'R+jB2iw$+nO&J!iF:v"A$DARy(|Ge_zeL(AQvr(f;#u*3!c@oMZkM"|V83DZplaA');*/
/** define('SECURE_AUTH_KEY',  'l*IMy5O@`%0xiED$r(KhwDRR/C+0|mpFw7)2v01:X59mA!dm@+%`!WLT6GI?x)ut');*/
/** define('LOGGED_IN_KEY',    'MxM*+$)`CzyrW0pW3L$2Rtql;j*PNFsn`j~WGIOedGkh/)qL)Q%|E`K/sy9:K4!o');*/
/** define('NONCE_KEY',        '6Zwhvx7IKTx%14S(QJtJ+6Dbk^^vRQG6YUvW+TL7q!tCP;8K#uH"jFphE0~d3VQk');*/
/** define('AUTH_SALT',        'Ue1U@r(9OWMN+C30I`aG//:RRwv7&t7/Y#L`XhBr@2rlobKe5eqW8R3vX2cd(b/8');*/
/** define('SECURE_AUTH_SALT', '8+xaZaZrJ&xjEQO0@O`eN!zC)X5+8+CqRNtH6b!VN_Jz8Dh:U5__l@"^*HGWgkj$');*/
/** define('LOGGED_IN_SALT',   '/q@lyHBOLn8rFI*58ywCb^h9`)Pzc%gl~4Qc"Zl@VX+BaX:Xy/Qj3!i*`&lJgNMK');*/
/** define('NONCE_SALT',       '*k;2+"M!C:gMmhNS?#bA&0L&vECW8ZUPa3Vhi6:%4/RZg"RAtLBiA)~1`8!CqoEk');*/

define('AUTH_KEY',         '=OHT4*:k+t.ISxv@d2~}5S1Dtu[sK5Un/?kh&>(AD*U+^K7{dq+EF<~*CyxF|cu5');
define('SECURE_AUTH_KEY',  '60dbA- q]89&wGFIsp7 G._k!!q5@+X[u%uCE1BdL4?HA7z+}EawJ:m|3wkKT e/');
define('LOGGED_IN_KEY',    'T-7*=O9~pdy{{fXzc,w6Vu_M:1fsDv=^VfS8|SDQ3^+gJz,s{i6l>b(TMV}Qn%Y(');
define('NONCE_KEY',        '#vO*634zfUE<2(bufZ#bL?o1@#XBd>/GXu +zQ&xJT&,Iu6-/aM^)1:_icm~<Z[S');
define('AUTH_SALT',        'voGqL2|}xV&c+D ,--nu+{ay4>Y+&Pkx4[-E+RC)K:iKur^DE:.9UmryRD6y60b ');
define('SECURE_AUTH_SALT', 'l%}-9sNu?qQdbcnB<n4 4SP8^xa$L5n_k$-?:_2rxVyjY@cTVqX9lz4k;3]t]v;e');
define('LOGGED_IN_SALT',   'wo<&(-+:7tnZ^+7>N5GS|1+19n;sM?Pknyrd~R+C(-_jpK=(nT4;Wb16I5kegxxN');
define('NONCE_SALT',       'nmBA-]-3Y1v[d-2i`LA6dbE1|(KX/i~c{x??ywG|%A0l`^2eg?S~&u7BT>Xe0VnC');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_7bunuq_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

