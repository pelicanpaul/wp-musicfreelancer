<?php
require_once('functions/wp_bootstrap_navwalker.php');
require_once('functions/theme-functions.php');
require_once('functions/comments.php');

/*============================================
Register navbar and sidebar
=============================================*/

register_nav_menus( array(
    'primary' => __( 'Main Menu', 'musicfreelancer' ),
    'footer' => __( 'Footer Menu', 'musicfreelancer' ),
    'social'  => __( 'Social Links Menu', 'musicfreelancer' ),
) );


add_action('wp_enqueue_scripts', 'header_enqueue_css');
add_action('wp_enqueue_scripts', 'footer_enqueue_js');


/*============================================
Enqueue js and css
=============================================*/

function header_enqueue_css() {
    //load css files
    wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/bootstrap/dist/css/bootstrap.css', 'style');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', 'style');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', 'style');
    wp_enqueue_style('shadowbox', get_template_directory_uri() . '/js/shadowbox/shadowbox.css', 'style');
}

function footer_enqueue_js() {

    //load js files
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', 'jquery','1.9.1',TRUE);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/css/bootstrap/dist/js/bootstrap.min.js','bootstrap', '1.4.8', TRUE);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', 'main','1.0',TRUE);
    wp_enqueue_script('shadowbox', get_template_directory_uri() . '/js/shadowbox/shadowbox.js', 'shadowbox','1.0',TRUE);
}


// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

add_theme_support( 'title-tag' );

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
 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );

/**
 * Register our sidebars and widgetized areas.
 *
 */

function sidebar_widget_init() {

    register_sidebar(array(
        'name' => 'Primary Sidebar Widgets',
        'id' => 'primary_sidebar',
        'description' => 'These are widgets for primary sidebar.',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action( 'widgets_init', 'sidebar_widget_init' );

function social_widget_init() {

    register_sidebar( array(
        'name' => 'Social Widget',
        'id' => 'social_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="hide">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'social_widget_init' );

function copyright_widget_init() {

    register_sidebar( array(
        'name' => 'Copyright Widget',
        'id' => 'copyright_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="hide">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'copyright_widget_init' );

?>

