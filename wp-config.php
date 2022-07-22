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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'recovr' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '1n0!_zJ/#N{YP$knu/ ao&KXKN=Y?6Vu+j1Tdr*b=Iiqkbw 4lKQKk7W$yebbB-D' );
define( 'SECURE_AUTH_KEY',  '1O5ojM^[dg^yt~G+=hj|076Z,#$(?^]&eIf[n&rsU,wZ~!vr&/~?k~aTj!xX{_B>' );
define( 'LOGGED_IN_KEY',    '4MvLZ(}g(/5aunW/u3p&Kq>A*a13,B++,0uZO54pi^YJxZk^#_#/shf[+1|i;HxK' );
define( 'NONCE_KEY',        '7w0dfN2B<1aC:P<>_/)0a9!jZ41fI,(os{%TwD ]ExC6{T>XgvNJa6NTRGc+EV6Y' );
define( 'AUTH_SALT',        '`*[ vpsCz~2kbMn8gE48FxneQ8~VZ=!w2Z7)U]!fW<0a(&<j_kZ<=doU7r$~Sy~F' );
define( 'SECURE_AUTH_SALT', 'FN)7WMy*XP),eMAMSm!Z-{mS2ZNWVm#d|,XMC@%eBcAk+|$cZ=8So$_RUg1<x^n@' );
define( 'LOGGED_IN_SALT',   'QN<SW|Fh:dR@]#3D;d>QRDHZi6-E8JfM9A+)v/7+XuL-S3l+gAQ-3#QP_Th> 64Z' );
define( 'NONCE_SALT',       'r7VQqH^wYZy.pE&-d*[oI5pC1eX-[:s=ujG$>1=YLYzMG.U%o[z?Ze0-@C*v}IbA' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
