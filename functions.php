<?php

// requiring nav walker for bulma css 
require_once('bulma-navwalker.php');

/*
*
*   This is my functions 
*
*/

/**
 * Add Feature Image Support 
 *  
 * */

add_theme_support('post-thumbnails');

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
 * Function to make a custom menu to our theme 
 * by @watheq 
 */

function first_theme_register_custom_menu()
{
    // register_nav_menu("Bulma-framework-menu", __("1st theme Navigation"));
    // this function is better becaues it had multible menus 
    register_nav_menus(array(
        "navbar-menu" => "Navigation Menu",
        "footer-menu" => "Footer Menu",  // we can add menus as we wish!
    ));
}

/**
 * adding custom menu 
 * by @watheq 
 */

function register_custom_menu()
{
    wp_nav_menu(array(
        "theme_location" => "navbar-menu", // the names that registered in register_nav_menus() 
        "menu_class" => "navbar-end  ",  // change the class of <ul> tag  
        "container" => false, // no defaul container (from WordPress)
        "depth" => 2, // how many sub items 
        "walker" => new Navwalker(), // important to make library classes inside items and sub items
    ));
}

/**
 * changing length of the excerpt length
 * by @watheq 
 */
function first_theme_excerpt_lenght($lenght)
{
    return 5;
}

/**
 * changing length of the excerpt length
 * by @watheq 
 */
function first_theme_change_default_excerpt_more($lenght)
{
    return '...'; // instead of [...]
}

/**
 * 
 * Adding hooks to fire up our functions
 */

//  actions to including scripts and styles
add_action('wp_enqueue_scripts', 'watheq_add_style');
add_action('wp_enqueue_scripts', 'watheq_add_script');

// adding action to fire up menu after wordpress initialization 
add_action("init", "first_theme_register_custom_menu");


/**
 * Adding filters
 * by @watheq
 */

//  filter change excerpt length 
add_filter('excerpt_length', 'first_theme_excerpt_lenght');
//  filter change excerpt more
add_filter('excerpt_more', 'first_theme_change_default_excerpt_more');
