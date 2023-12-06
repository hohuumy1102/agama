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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_agama' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'NSEznijDOn9`l&`+-EKc!r(@ 6!{/O|~DN959)~vk-M<GY~r,[mw^t6dN+{r5xMI' );
define( 'SECURE_AUTH_KEY',  '5pTgh(s=*4QZO(|)>Nmh.}`%5=xBS1^n>slx-mmX},l|R/Dv}NNum7cx06V;iz6Q' );
define( 'LOGGED_IN_KEY',    'HCe$``5kZ*-iepO>067QtTpLmfXOJ6@^cLa@&n;x;N9Dhc`(M/J~]nBAgTA?.vI7' );
define( 'NONCE_KEY',        'Ytz`zjnO_&vy BZ0xnW9SAo%?qXe:,quup(~WiYxPwm<fBOzB`}rdMm@7g[dD_^K' );
define( 'AUTH_SALT',        'uro9tAFSpGOA//!&P|Nb}p-rZ$;|(br!4Tof${NFy,@tR)?#>Hpgg?#m<I:+*FI&' );
define( 'SECURE_AUTH_SALT', 'j!>afG#oG6eTVD<.*fP@;*ykc{*Wzv@.yXddIkp=/uG`^iuQ~HDNJwVR]P_{V2Hl' );
define( 'LOGGED_IN_SALT',   'mreSmTl^|4$yf.1rSf%QckK1=qLLb3BK9e7WPL.OHXVug$sN0!oq|I9,x7M-8+(0' );
define( 'NONCE_SALT',       'h%M| |S.L_,6w/*^#0Nzwn*SL|fOed..0C9cFmwb)>u2Gah:{cu}=60aHqmWC,_m' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
