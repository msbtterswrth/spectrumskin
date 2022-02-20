<?php
    
    if ( ! defined( 'ABSPATH' ) ) { exit;}
    
    class FUTURIO_SLT
        {
            var $licence;
            
            var $interface;
            
            /**
            * 
            * Run on class construct
            * 
            */
            function __construct( ) 
                {
                    $this->licence              =   new FUTURIO_SLT_licence(); 

                    $this->interface            =   new FUTURIO_SLT_options_interface();
                     
                }
                
              
        } 
    
    
    
?>