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
define('DB_NAME', 'cicta');

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
define('AUTH_KEY',         '#TyQ%{Z{-9HmcqlA:xyZ-ooB:u2PS6S0kji^<b,1yrkj{Y6G.5-0[99i)<CS2R{J');
define('SECURE_AUTH_KEY',  '4}RWCyVLb%P|*{F(?N7qu>$hK(+T#_w6Ss6g5CfdY]87n.NEnHF~niogp>#Tig0^');
define('LOGGED_IN_KEY',    '0>BjQ#~X/MT0AT2YnlCgbj~`.M,-LEv?x4=%Bb|F-Hq,j._@i[RiX;2S94w2z5.#');
define('NONCE_KEY',        'Mfcd/]49@A8Mm`zGi/D%PBh#uI(z39HbEMGeh@>Yt{9MgAopb);zBS&Bc)|)?7|v');
define('AUTH_SALT',        'oL@J5eFD::PvGTiS9$@UK3$Yl4MT`j-CJdjIZB0b^h((_JMs 8@drfaXh]1_3i#$');
define('SECURE_AUTH_SALT', '2W2u0)+vlDjI:pWwK74qu]u7NA+.+RUsTL^:E@0VfNGzM;:vUcS^h_tE}?J5Y((P');
define('LOGGED_IN_SALT',   '?a_!4`Zj&*aF[1UL:5pe^;EO[z#B:[MXG^&L)refI0YWF{b[ [Uk|-5$zaPSb*3h');
define('NONCE_SALT',       '6w|{{:jA _4CGMC#jP-DUkr^Ez!r7)cTh=_|k~<7?)?z.uI/$?~5x~3%zQm{0zlC');

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
