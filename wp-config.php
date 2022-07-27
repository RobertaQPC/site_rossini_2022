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

 if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
   define( 'WP_LOCAL_DEV', true );
   define( 'DBI_STAGING_SITE', false );
   include dirname( __FILE__ ) . '/local-config.php';
}
elseif ( file_exists( dirname( __FILE__ ) . '/staging-config.php' ) ) {
   define( 'WP_LOCAL_DEV', false );
   define( 'DBI_STAGING_SITE', true );
   include dirname( __FILE__ ) . '/staging-config.php';
}
else {
   define( 'WP_LOCAL_DEV', true );
   define( 'DBI_STAGING_SITE', false );
   include dirname( __FILE__ ) . '/live-config.php';
}



/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         ',1xS[&Y,&q4^n<+Li8}5>|T4ob)#7??Rs!Qk!T%Tr4uJxT]x5WP&WY;%%uMf(X#0');
 define('SECURE_AUTH_KEY',  'LFf<~DaJ)tz3~Gr2z*SOx0OZKf2UA{UDv>_,kA)>u1=KjHR~qlh&/<qnKEJEQ9sB');
 define('LOGGED_IN_KEY',    ')u&g4CQ}!qOB*S0*D28qF-pbXl|pYH}<KKP<~+wxL-m0.0:vv .[Q/LUhzaA2O#4');
 define('NONCE_KEY',        'b~.+Q(E>+bq7rHp%73qJ<i.hmh66K|43c<TJ_n}t:zIZWui#|:1Rmqi(+654=i%h');
 define('AUTH_SALT',        '[(S+W--G^c&]qWT?<-`%D;L%22#!c+HgM}DM&QR&[z)e2BwcP|.W*E+*(1CIe{ y');
 define('SECURE_AUTH_SALT', '&bu-M&#HL+[ f@/d1+S2!`DyFrki6p+tK{2-H$5Ze4b%A9+J4WAI&?Qsyu.xJ>J#');
 define('LOGGED_IN_SALT',   'sM56}v+F+}$=rYfuK #i6.hzTX5~eqW[/r;wzuKFFs5?GLenqp.Ww~paG=)H@>0N');
 define('NONCE_SALT',       '0M0ILE>7Q/6+6Q%S:~.u0w:TN|D1cPM<P}{|Ud#za=igB-?uPyB8ha.:oy;9Zy<#');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'qpcPrefix17_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

define( 'AUTOMATIC_UPDATER_DISABLED', true );

/* Disabilito le dipendenze di CF7 che sono già presdenti nel mio global.min.js */
define ('WPCF7_LOAD_JS', false); // Added to disable JS loading
define ('WPCF7_LOAD_CSS', false); // Added to disable CSS loading

/* Disabilito i tag <p> e <br> da CF7 */
define ('WPCF7_AUTOP', false );

/* Abilito tutto il caricamento per i media (sopratutto svg) */
define('ALLOW_UNFILTERED_UPLOADS', true);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
