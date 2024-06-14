<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Bz,-p+jqm%ubRA]r?nCjL`yRpzne%1=iea{2gUK~glt{&&JNUw>@|UmU!K;c5]IG' );
define( 'SECURE_AUTH_KEY',   '|AAanZ!cwXo=jf{Q!i*N:ePQdVQ5t@=yR;$p>HP#Gd[[M^Yqe$.I|0oA-nRW4t`$' );
define( 'LOGGED_IN_KEY',     'zd{_m<$q-V%tD,o61mpBTDy*FK?~fHK1p9n?,71YV|it:)C_>4uQu}M#~4p}pL}@' );
define( 'NONCE_KEY',         '~<#N9IgcbI0Lz1U#PB {W?J,UDWbTA%[d6%UOG-fSE54.ZV91=GX~}gQO)brj5{`' );
define( 'AUTH_SALT',         'y_0l-oJ!e=$w;h3X_{|1|uk<K|+_5@>4o$o]0A<MNVppZca7[+x-R/9Jnwo0Oy`P' );
define( 'SECURE_AUTH_SALT',  '-#kWd+VOh<_;R.QQ;ua,_ZV2ccRF,:%ZPqp>LYAqp[g>!MS&`(HL8~:Cu_p}B{O1' );
define( 'LOGGED_IN_SALT',    '`,Ds.B+|GMcW,lzOWN1iCgEvnzz~eI5+O;Ds9I=I*0kSolz;CBXSz*uqad!f)$sP' );
define( 'NONCE_SALT',        '{jm_Y!}W{oADs+[881YZ&bH;s;GVuW-FrI%Oef]MFsUEz1j1@OHhC6sLn+&)hV2j' );
define( 'WP_CACHE_KEY_SALT', 'fH~o%B)GL$`-R.MtT8i#b!/v8THlt`m3_]bJI,DDQ[meGk_oO>+d@KD~:.XLy#L#' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
