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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '|{&&Mi|5A;o(Rg&_+~1.7F#N-Jf[)+a7_.K=PY}iZp{)#IJyX82C)S;c04:<<+h.');
define('SECURE_AUTH_KEY',  'n:OXoM5N,Zh$AW`W|K/-<QEVnFCsFz>F+7j~EI$St<X~Bb^xnu)-JnF+`*3uPdIS');
define('LOGGED_IN_KEY',    'Qd7g_/obwYCp-NJIE:4IpO6]D*T&U1-xAu+r?@pMb3OKE@)BHL-q0/%r%1#]Cp,?');
define('NONCE_KEY',        '1wIf*~@V[+%llpl`DH0l~a!V- R-PD_PCZ-@-Unr1F],3fhjbzBTyP)=doRZwF,C');
define('AUTH_SALT',        'VWiyFW[<^IUJ/pT?W!+D2b+:% RFpGl6qpAF,yiX147%,Y44%t2p(so.Q]qHcHnJ');
define('SECURE_AUTH_SALT', '$K^`70cir|>H:R9Ux%G]$3..NMT.v5$p;tw:(70xK.|Xgrt#/-V8 m8:gew.}Gms');
define('LOGGED_IN_SALT',   'Kj{J{A[}F#Uz|@0VM-~:O=6x}rL4+^2}b;l`7jf04=rJ9F9OMdT8ZF`K7E~r4~3/');
define('NONCE_SALT',       '&aieK#/:egIW-~J7v.sMxx2+43RG.=X/m]df|7<heXwRgwj#:GwoPa)/rCG7lbn%');

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
