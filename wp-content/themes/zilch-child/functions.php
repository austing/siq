<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' ); 
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );
// END ENQUEUE PARENT ACTION

// Test if device is touchscreen and if so disable topmenu links
$(document).ready(function(){
    if(Modernizr.touch){
        $('#menu-mainmenu').on('click', '> li', function(e){
            if(!$(this).data('open')){
                e.preventDefault();
            }
            $(this).data('open', true);
        });
    }
});

