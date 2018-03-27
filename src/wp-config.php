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
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USERNAME'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

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
 define('AUTH_KEY',         'W+2yp^0aeoJ6D4tT*ZewAJs4;=T!U;oTPr!}^R<Q2Z9-lx[d.lk75PIOuMX=/Jt1');
 define('SECURE_AUTH_KEY',  '$lZoU7IC*%o8/XHom3]Xk]uW<YWX}gRk*%Cuge1e<w+>ZAs_$*_d/6&/I~TNE|zg');
 define('LOGGED_IN_KEY',    'R{v3d|J@q-9X++(<@SL|(hqQ %5M,#^]M:?h=*,yrasj}<PsYPTXKuMbOQg(C{5Q');
 define('NONCE_KEY',        'J+~Uo~RJ1qNXMZ-]p>Nu%$F_zf,$0T4zx-Kf*v}q%g,o~mNh+ryE{eF7,j--RK:_');
 define('AUTH_SALT',        ',(Wi|quNME{<n^Wi|qhg(>D}8`SGx _,{v<bg>m%s*;FNlCU+e5]-At<ceR6Ib@-');
 define('SECURE_AUTH_SALT', '?mwLA$)Fs-/+^oPIwkoMl>w?yF>.O 3mW|ut^<UL#%sL`+g{.,$.`aG-s};1_Zz9');
 define('LOGGED_IN_SALT',   'Yw+syUJwzQ[ka1SYXKWcj6y#r w{ k#}YNG&NM6j)1| 7m=A3v}#<RJc@PWp+?{u');
 define('NONCE_SALT',       '@J-70JCl==%)8=;&o4;KcjrBS4/sK%.bQyl-*q:{y4mu8i< iKTqJE3|TZofo.=J');

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
