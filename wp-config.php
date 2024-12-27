<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'myprojec_zonacated' );

/** Database username */
define( 'DB_USER', 'myprojec_zonacated' );

/** Database password */
define( 'DB_PASSWORD', '4Ef4pFX6LA3$' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ')Ppqqtzw5<14I/1odP9<?UPvr&;j[U_OqaYarro&EV(GO/Iq&+P}[saEy`dro@rK' );
define( 'SECURE_AUTH_KEY',  'Wf`L+-D;B/X2Qin4?uJI5vE;iR+ ses$@.Z]YtW$S=7D@O!APinR;kYF_$gD8]6a' );
define( 'LOGGED_IN_KEY',    '[_;=NlqC]j-;xJ=AxP7)?)jTX^x2W(B|taCbmDoC|fl)ITzm^.GCG32>R7M]&)#;' );
define( 'NONCE_KEY',        'Eb}M,M<[ u,3Y!Vi:zE-Wee,.LIBt`eL%gE%9^`ABU|_Z4wOc04))@r0L`(>[W6/' );
define( 'AUTH_SALT',        'A~125 ]l%rfeg&IgebB>@U/4ti+!Ef]I|oD8v%*+LJUjNg1MF*Hc`LxCl?r;N&A:' );
define( 'SECURE_AUTH_SALT', 'I$@xUw^CZtFGll.`Z[9Dq<-OAyWsrHp-W3DYM*VHA{}%?<$^orB]_]#ZCuo.w5.7' );
define( 'LOGGED_IN_SALT',   ']:VN^{iHO$!G6w{w1&p`Ff+j^1#FCWiUM,z?MpE-0izq0yNuKAm4n3A{q6++eGPr' );
define( 'NONCE_SALT',       'w>,$nI/K@5UoiPKeq0hAy~j6&hDgX/&,?B9?$B`LF=v5>k}*{RbFBnO~NG=J*-K2' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', 1 );

define('FS_METHOD','direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
