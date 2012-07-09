<?php
/**
 * _rrze functions and definitions
 *
 * @package _rrze
 */

if ( ! function_exists( '_rrze_setup' ) ):
function _rrze_setup() {
    
    require( get_template_directory() . '/inc/template-tags.php' );
    
    require( get_template_directory() . '/inc/theme-options.php' );
    
    load_theme_textdomain( '_rrze', get_template_directory() . '/languages' );
    
	add_theme_support( 'automatic-feed-links' );
    
	register_nav_menus( array(
        array(
            'mainmenu' => __( 'Main Menu', '_rrze' ),
            'generalmenu' => __( 'General Menu', '_rrze' )
        )
	) );
    
	add_theme_support( 'post-formats', array( 'aside', ) );
    
}
endif; // _rrze_setup
add_action( 'after_setup_theme', '_rrze_setup' );

function _rrze_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Short Info', '_rrze' ),
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );

    register_sidebar(array(
        'name' => __( 'Sidebar', '_rrze' ),
        'id' => 'sidebar-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', '_rrze_widgets_init' );

function _rrze_scripts() {
    $options = _rrze_get_theme_options();
    
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
   // wp_register_style( 'colset-style', sprintf('%s/css/columnset-%s.css', get_template_directory_uri(), $options['columnset'] ) );
   // wp_enqueue_style('colset-style');

    wp_register_style('patch-style', sprintf('%s/css/patches/patch.css', get_template_directory_uri() ) );
    $GLOBALS['wp_styles']->add_data('patch-style', 'conditional', 'lte IE 7');
    wp_enqueue_style('patch-style');
    
    wp_enqueue_script( 'jquery' );    
    
    wp_register_script('layout-script', sprintf('%s/js/layout.js', get_template_directory_uri() ), array(), false, true);
    wp_enqueue_script('layout-script'); 
    
    wp_register_script('keyboard-script', sprintf('%s/js/keyboard_menu.js', get_template_directory_uri() ), array(), false, true);
    wp_enqueue_script('keyboard-script');
    
    wp_register_script('headerposition-script', sprintf('%s/js/header_position.js', get_template_directory_uri() ), array(), false, true);
    wp_enqueue_script('headerposition-script');
    
    wp_register_script('toplinescroll-script', sprintf('%s/js/topline_scroll.js', get_template_directory_uri() ), array(), false, true);
    wp_enqueue_script('toplinescroll-script');
    
    wp_register_script('sidebarmobile-script', sprintf('%s/js/sidebar_mobile.js', get_template_directory_uri() ), array(), false, true);
    wp_enqueue_script('sidebarmobile-script');
}
add_action( 'wp_enqueue_scripts', '_rrze_scripts' );

function _rrze_debug($input, $exit = false) {
    printf("\n<pre>\n%s\n</pre>\n", print_r($input, true));
    if ($exit)
        exit();
}
