<?php
# Database Configuration
define( 'DB_NAME', 'dbg12sqrbsmmpm' );
define( 'DB_USER', 'uoznhvg53q6al' );
define( 'DB_PASSWORD', 'LO83ju24SkiR_U8cFkoq' );
define( 'DB_HOST', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         ']-Ic+PdH+xBu/~8.K>4-freD|WY%sBFzqmU@K2Q>]euyC|Pe 7F^lGX/Dd%hq>=#');
define('SECURE_AUTH_KEY',  '-R6xtl|SsFo+v,Cm[pm|i E$+ JVmqiF()MTXBTj#;ER7xn938r,+>[6-7J7h?iI');
define('LOGGED_IN_KEY',    '5i7x,zmwb;-2:l*i*SPt,!#:qgt|X7sj?S,VVx-L-B..|T(.!a}S.rdzg~sGPu$i');
define('NONCE_KEY',        'xIJ*6l9u>,HY/|/exUuHrRz;X<l.%#++@ob`O7o}+`Y0$a*(>(T`8QIO5E~nvK2Z');
define('AUTH_SALT',        '^|Km*IP2?`Vc%7$F:)3d|FBRtuYL8z5FZWQnD(T6-SvNY3Bf3=GB)ceh9w]smhQ_');
define('SECURE_AUTH_SALT', '%d,<8M*kGn`2vOqAST(r_bi{kpBGaDB)v%uD]p- BYi=}Qhj*I;qvderOR=&h at');
define('LOGGED_IN_SALT',   '&Y;DO~y7<22W809vG#o!BQ fG5Bwe/l+pL(*W@^.+6j^$p3;Oo Ip<KG&h:K)2s-');
define('NONCE_SALT',       'nJHLE}HB5*]~Eewp)zPt_U.~,}`6Dj3n`TX]&0GgeEN|&, }88n9Yj,y|<lGYFgh');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

#define( 'PWP_NAME', 'spectrumskin' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

umask(0002);

##define( 'WPE_APIKEY', 'eb853f65dce4f0734871e5abc196e46f0116458f' );

##define( 'WPE_CLUSTER_ID', '114332' );

#define( 'WPE_CLUSTER_TYPE', 'pod' );

##define( 'WPE_ISP', true );

#define( 'WPE_BPOD', false );

#define( 'WPE_RO_FILESYSTEM', false );

#define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

#define( 'WPE_SFTP_PORT', 2222 );

#define( 'WPE_LBMASTER_IP', '' );

#define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

#define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

#define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

#define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

#define( 'WPE_BETA_TESTER', false );

#$wpe_cdn_uris=array ( );

#$wpe_no_cdn_uris=array ( );

#$wpe_content_regexs=array ( );

#$wpe_all_domains=array ( 0 => 'spectrumskin.wpengine.com', 1 => 'spectrumskin.wpenginepowered.com', );

#$wpe_varnish_servers=array ( 0 => 'pod-114332', );

#$wpe_special_ips=array ( 0 => '35.192.118.63', );

#$wpe_netdna_domains=array ( );

#$wpe_netdna_domains_secure=array ( );

#$wpe_netdna_push_domains=array ( );

#$wpe_domain_mappings=array ( );

#$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

#define( 'WPE_SFTP_ENDPOINT', '' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');

