<?php

if ( ! function_exists( 'backin88_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function backin88_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Test Theme, use a find and replace
         * to change 'backin88' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'backin88', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'main-menu' => esc_html__( 'Main Menu', 'backin88' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'backin88_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;

add_action( 'after_setup_theme', 'backin88_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function backin88_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'backin88_content_width', 640 );
}
add_action( 'after_setup_theme', 'backin88_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function backin88_scripts() {

    //styles
    wp_enqueue_style('roboto-font', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i', array(), false, 'all');
    wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style( 'backin88-style', get_stylesheet_uri() );

    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), false, 'all');


    /**
     * Enqueue scripts.
     */
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);


    wp_enqueue_script('settings', get_template_directory_uri() . '/js/settings.js', array(), false, true);



    wp_enqueue_script( 'backin88-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'backin88-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'backin88_scripts' );



 /* ACF OPTIONS PAGE */
if(function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(
        array(
            'page_title'  => 'Theme Settings',
            'menu_title'  => 'Theme Settings',
            'menu_slug'   => 'theme-settings',
            'capability'  => 'edit_posts',
            'redirect'    => true,
            'position' => 79,
            'icon_url'    => 'dashicons-admin-generic'
        )
    );
    $option_page = acf_add_options_sub_page(
      array(
        'page_title'  => 'Theme Settings',
        'menu_title'  => 'Theme Settings',
        'parent_slug' => 'theme-settings',
      )
    );
}


//Register Rapper Post Type
add_action( 'init', 'backin88_post_types_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function backin88_post_types_init() {
    $labels = array(
        'name'               => _x( 'Rappers', 'post type general name', 'backin88' ),
        'singular_name'      => _x( 'Rapper', 'post type singular name', 'backin88' ),
        'menu_name'          => _x( 'Rappers', 'admin menu', 'backin88' ),
        'name_admin_bar'     => _x( 'Rapper', 'add new on admin bar', 'backin88' ),
        'add_new'            => _x( 'Add New', 'rapper', 'backin88' ),
        'add_new_item'       => __( 'Add New Rapper', 'backin88' ),
        'new_item'           => __( 'New Rapper', 'backin88' ),
        'edit_item'          => __( 'Edit Rapper', 'backin88' ),
        'view_item'          => __( 'View Rapper', 'backin88' ),
        'all_items'          => __( 'All Rappers', 'backin88' ),
        'search_items'       => __( 'Search Rappers', 'backin88' ),
        'parent_item_colon'  => __( 'Parent Rappers:', 'backin88' ),
        'not_found'          => __( 'No rappers found.', 'backin88' ),
        'not_found_in_trash' => __( 'No rappers found in Trash.', 'backin88' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'backin88' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'rapperss' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array( 'title' )
    );

    register_post_type( 'rapper', $args );



    // Register Rapper Type Taxonomy
    $labels = array(
        'name'              => _x( 'Rapper Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Rapper Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Rapper Types', 'textdomain' ),
        'all_items'         => __( 'All Rapper Types', 'textdomain' ),
        'parent_item'       => __( 'Parent Rapper Type', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Rapper Type:', 'textdomain' ),
        'edit_item'         => __( 'Edit Rapper Type', 'textdomain' ),
        'update_item'       => __( 'Update Rapper Type', 'textdomain' ),
        'add_new_item'      => __( 'Add New Rapper Type', 'textdomain' ),
        'new_item_name'     => __( 'New Rapper Type Name', 'textdomain' ),
        'menu_name'         => __( 'Rapper Type', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'rapper_type' ),
    );

    register_taxonomy( 'rapper_type', array( 'rapper' ), $args );




}




require get_template_directory() . '/inc/required_plugins.php';





















