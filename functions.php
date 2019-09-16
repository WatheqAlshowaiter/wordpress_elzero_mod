<?php

/*
*
*   this is my functions 
*
*/

/**
 * adding css to wordpress 
 */
function watheq_add_style()
{
    // adding (bulma) CSS framework
    wp_enqueue_style('bulma-css', get_template_directory_uri() . '/vendor/css/bulma.min.css');
}

/** 
 * ading scripts to wordpress 
 */
function watheq_add_script()
{

    // adding (jQuery) has three steps: 

    // 1. deregister  jQuery script
    wp_deregister_script('jquery');
    // 2. regiser jQuery script from WordPress includes and in footer 
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), array(), false, true);
    // 3. enqure jQuery 
    wp_enqueue_script('jquery');


    // adding (Friconix) icon framwork (in JS)
    wp_enqueue_script('friconix-font-icon', get_template_directory_uri() . '/vendor/js/friconix.js', array(), false, true);
}


/**
 * 
 * Adding hooks to fire up our functions
 */

add_action('wp_enqueue_scripts', 'watheq_add_style');
add_action('wp_enqueue_scripts', 'watheq_add_script');
