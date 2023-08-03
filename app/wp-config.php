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
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

/** Database hostname */
define( 'DB_HOST', 'database' );

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
define( 'AUTH_KEY',          'L,<nu ~T^#Y)=z>33v|/AAQdu/n2,@4F<4x-Dm(CY.L}KBPK?}SiQ|%URpMDRd,&' );
define( 'SECURE_AUTH_KEY',   'qOOnDk%1J3d:W)h^J>O-x$&#`<4c4ATn%b(NvIok?YT2E/>3T[c~f>wO0/^9`E`7' );
define( 'LOGGED_IN_KEY',     'A9Y$i(; %:Va.dW9e T[pkQi^y1IGIy(P(vJ@]1g&{;`xb@r#u/I2j!j3HjMXiP%' );
define( 'NONCE_KEY',         'kM-NkC4ibkRf[@OWKV)o168T46{O,B:<$B1/,@?1mJ:)S:Po&^S-2bq~PXM*ighx' );
define( 'AUTH_SALT',         'AMZ)SJgh#|f2-`Yu)O.>$Yt667_MQnJJ!isvH65w3XSx{i<}h%idA7[r?|>|7=(R' );
define( 'SECURE_AUTH_SALT',  'bc,B# $TZZ{0a6 6j9.{W@; %$^BZ^D[z~G<k4^2pYZqXFq|$1GZGit]tAx6c^HJ' );
define( 'LOGGED_IN_SALT',    'f0Afp8m9s07U&%s!ysZJat+>`:N<Nb<J-=ST5,<IRH@.O4_2MrmSp2:Lnje[~PHm' );
define( 'NONCE_SALT',        '^jS9iC;PmGxt7#]2VZj=>_L5c,qrt+5i_pr~M2 Z8yic90JwzP%H/}NHdkvxB{b|' );
define( 'WP_CACHE_KEY_SALT', '!Y.KZ`<8J6l|d.;}Sa%tMY;0#IIL)o-Y<:;,iM&!v[$~pFan%J0Z J~x/GBorjAr' );


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
