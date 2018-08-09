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
define('DB_NAME', 'wordpress_chnky');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'N_xsKZT6npiJWTA+v.ca)0A|R5~]~nAsQ%5-emJ!HCPQOp6y^C=f5=lvU_7zn}[u');
define('SECURE_AUTH_KEY',  'K$mG]+;kaaOrbg>(RXkCae/)?AmQZ{{5jAe|/|.hWWFp/:[C;ft)Nfoch~Sv88yz');
define('LOGGED_IN_KEY',    'ODxcf|v.OP2O~Ytc}+-kV@iiNR3G.?cN?cTdHk1c<NI,yhcHk~7u%qu3E6M[;L@{');
define('NONCE_KEY',        'R%Ti}%jc+{0l?9MgRSW;:^S}Mn3HyBXi-0f~Jx CpS;[p<@j^%G5NH75< HPF>,5');
define('AUTH_SALT',        '~M)Z3]Qv)Rwi@9NQF+nHPZPXg:B[ltY[BOTMv6Su=`=^XV<4%(X+KY&!GGzbC@^a');
define('SECURE_AUTH_SALT', 'UXK?UrC#%[717vwH&UN!Dj n *SPPQ#ejymnxd~f0cYVG>NMOd8Zc1bjT!FOUJmN');
define('LOGGED_IN_SALT',   'p[wz~F1c0.GzLBFfS;Vn6klgj` `/=7}Rg)(<e6E@II&p*&)dB{{|^3pI2#`6jaR');
define('NONCE_SALT',       '>8`O7F6fJBMfZ=;k^G_6SoJ8b-BmF?sR`In3pF~9PqcZP2InOjjh=E<UbVqjA#X&');

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
