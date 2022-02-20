<?php
    
    define('FUTURIO_SLT_PATH',   plugin_dir_path(__FILE__));
    define('FUTURIO_SLT_URL',    plugins_url('', __FILE__));
    define('FUTURIO_SLT_APP_API_URL',      'https://futuriowp.com/index.php');
    
    define('FUTURIO_SLT_VERSION', FUTURIO_PRO_CURRENT_VERSION);
    define('FUTURIO_SLT_DB_VERSION', '1.0'); 
    
    define('FUTURIO_SLT_PRODUCT_ID',           'ftrpro');
    define('FUTURIO_SLT_INSTANCE',             str_replace(array ("https://" , "http://"), "", network_site_url()));
    
   
    include_once(FUTURIO_SLT_PATH . '/include/class.wooslt.php');
    include_once(FUTURIO_SLT_PATH . '/include/class.licence.php');
    include_once(FUTURIO_SLT_PATH . '/include/class.options.php');
    include_once(FUTURIO_SLT_PATH . '/include/class.updater.php');
    
    function FUTURIO_SLT_activated() 
        {
         
        }

    function FUTURIO_SLT_deactivated() 
        {

        }
    
    global $FUTURIO_SLT;
    $FUTURIO_SLT = new FUTURIO_SLT()

?>