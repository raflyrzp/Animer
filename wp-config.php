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
define( 'DB_NAME', 'animer' );

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
define( 'AUTH_KEY',         ',Cb]=fZw0U^Ssok`;p68S<{Lnz;$9Ekza)I>Qt2)DlmAcZ!QdJQVZU>8|I?G[q}:' );
define( 'SECURE_AUTH_KEY',  '4PR5FeC$OZ TmM_g|dW:U!2pRxgZQ]nt/M|t$d9R/AK9ZLBK[#l24E<qR8u-Un:J' );
define( 'LOGGED_IN_KEY',    '9_o<_z&uN~tJ)auGnr&AzF*8Pv=?W?VDy~ fJ}!6qTTEYqgm5eTva46^)MMB8(+v' );
define( 'NONCE_KEY',        '&>xfq|:Y+~CalU;Dz5Z!qrG}exeN]6$`R~ZccqzOa+u3#~Rrp}|/s{bq (O9$6Fb' );
define( 'AUTH_SALT',        ':|7y0qZr`1ovI?|qUrE}y.-W$Xs83qr_ya+*y0YEY7X,MNltLD_])Krw4W:~Cl%4' );
define( 'SECURE_AUTH_SALT', 'o4~ ~ti:@B{lIP=<~Ys|54j?,)e0R5u$P(p{8WE#Z@:E{#WXl&0MKqC@>q;7n%Fq' );
define( 'LOGGED_IN_SALT',   'dZYG]U15j.ncOJ<6jP[J$CVG0aa.EAi<5S&iRD)OU4K0Tt56Y @a~[lVv69GWOs1' );
define( 'NONCE_SALT',       'rZ%GytMm8ARe7*/^g/8l=*`-c:egV>xqJ@m^lrcce/Q_~#IY_aqdtTp#QBvqkz[j' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
