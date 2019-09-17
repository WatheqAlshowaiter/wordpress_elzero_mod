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
    wp_enqueue_style('main-css', get_template_directory_uri() . '/vendor/css/main.css');
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

    // adding TWO JavaSctipr libraries to make theme work fine in Intenet Explorer < 9
    // we want two steps: 

    // 1. enque the library in the HEAD 
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/vendor/js/html5shiv.min.js');
    // 2. make a conditional comment e.g: !--[if lt IE 9]> SOME SCRIPT <![endif]-->
    wp_script_add_data('html5shiv', "conditional", "lt IE 9");

    // Do it again with respond.js 

    // 1. enque the library in the HEAD 
    wp_enqueue_script('respond', get_template_directory_uri() . '/vendor/js/respond.min.js');
    // 2. make a conditional comment e.g: !--[if lt IE 9]> SOME SCRIPT <![endif]-->
    wp_script_add_data('respond', "conditional", "lt IE 9");

    // adding my own script
    wp_enqueue_script("main-js", get_template_directory_uri() . '/vendor/js/main.js', array(), false, true); 
}


/**
 * 
 * Adding hooks to fire up our functions
 */

add_action('wp_enqueue_scripts', 'watheq_add_style');
add_action('wp_enqueue_scripts', 'watheq_add_script');
