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
define( 'DB_NAME', '4U' );

/** Database username */
define( 'DB_USER', '4u' );

/** Database password */
define( 'DB_PASSWORD', '1234567' );

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
define( 'AUTH_KEY',         'fu`Q(52jRCHBT7hAY:[nA=F9)N$gi2_ fNuT2Q^;huaHaYh8qE>rYV*!B:EZS~@R' );
define( 'SECURE_AUTH_KEY',  'sZh_@]Uuh+v=`%k@ @x_FV&{D^[8rl{f3G-It@5M,~*J|%wxMyPam6^yYX/1rF*y' );
define( 'LOGGED_IN_KEY',    '[i/.YB4+<?D1)V}ret[}x~Y~xDkw)l$t :*e)&q!`mo@v>t4IrhI}gn|NR&-la*R' );
define( 'NONCE_KEY',        '.EmPgP!n.u~t-J,|@UM:=OG+T`N0*U$dqR5`dx0T~J2Vht]7C|x=Efe<18KFF46w' );
define( 'AUTH_SALT',        '4VLuk4Poa91<*)]yGvB/<mk,r_MQ^yoe&87!/2 c=/kC=Vo.e?vlt ()q)lS?!x(' );
define( 'SECURE_AUTH_SALT', '5k)EauW?9q5e9l0!R)OsnOO-$mamRpO),VG0n>M/RS3Gc2V8i-LDqvtf&_8dbdI~' );
define( 'LOGGED_IN_SALT',   'pDZ#Mrcluca2l a(InZPhijj3SgE/%~(%+xCkjkS;KW#OZqh-9cfn_4t2H;A7CX{' );
define( 'NONCE_SALT',       ')3S8Z}EVmdZZUgL|$_ITyMB Yv5y`$D Nt/-Z]k7LcfSL[H!q} q^$6da%oJ!&BN' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '4u_';

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
