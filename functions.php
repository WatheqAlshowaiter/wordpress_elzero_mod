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
        if (is_author()) {
            return 10;
        } else if (is_category()) {
            return 15;
        } else {
            return 20;
        }
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
     * Numbering pagination
     * by @watheq 
     *  
     */
    function watheq_number_pagination()
    {
        global $wp_query;

        $all_pages = $wp_query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));

        if ($all_pages   > 1) {
            return paginate_links(array(
                'base' => get_pagenum_link() . '%_%',
                'format' => 'page/%#%', // I deleted nut nothing happened
                'current' => $current_page,
                'mid_size' => 1,
                'end_size' => 1,
                'prev_text' => '<<', // just for the sake of make it differnt
                'next_text' => '>>'
            ));
        }
    }

    /**
     * Registering the Main Sidebar Widget 
     * by @watheq 
     * this function need to be added to an action 
     */
    function watheq_main_sidebar_widget()
    {
        $array_args = array(
            'name'          => 'Main Sidebar',
            'id'            => 'main-sidebar',    // ID should be LOWERCASE  ! ! !
            'description'   => 'The main sidebar of first theme',
            'class'         => 'main-sidebar',
            'before_widget' => '<div class="widget-content"> ',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widge-title">',
            'after_title'   => '</h3>'
        );
        register_sidebar($array_args);
    }

    /**
     * Remove autho paragaphs that is defult in WP
     * by @watheq
     */
    function remove_auto_p($content)
    {

        remove_filter('the_conent', 'wpautop', 0); // make priotary (the lower the most) 
        return $content;
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

    // adding action to registering the main sidebar 
    add_action('widgets_init', 'watheq_main_sidebar_widget');


    /**
     * Adding filters
     * by @watheq
     */

    //  filter change excerpt length 
    add_filter('excerpt_length', 'first_theme_excerpt_lenght');
    //  filter change excerpt more
    add_filter('excerpt_more', 'first_theme_change_default_excerpt_more');
    // change auto <p> 
    add_filter('the_content', 'remove_auto_p');
