<?php

/**
 * _rrze functions and definitions
 *
 * @package _rrze
 */
define('_RRZE_OPTION_NAME', '_rrze_theme_options');

if (!function_exists('_rrze_setup')):

    function _rrze_setup() {

        require( get_template_directory() . '/inc/template-tags.php' );

        require( get_template_directory() . '/inc/theme-options.php' );

        load_theme_textdomain('_rrze', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));

        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            array(
                'mainmenu' => __('Main Menu', '_rrze'),
                'generalmenu' => __('General Menu', '_rrze')
            )
        ));

        add_theme_support('post-formats', array('aside',));


        /* Add Applications */
        //  include( get_template_directory() . '/apps/widget-visibility/widget-visibility.php' );
        //   include( get_template_directory() . '/apps/robots-txt/robots-txt.php' );
    }

endif; // _rrze_setup
add_action('after_setup_theme', '_rrze_setup');

function _rrze_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar links (Kurzinfo)', '_rrze'),
        'id' => 'sidebar-left',
        'description' => __('Sidebar-Beschreibung.', '_rrze'),
        'before_widget' => '<div id="%1$s" class="widget-wrapper ym-vlist %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar rechts', '_rrze'),
        'id' => 'sidebar-right',
        'description' => __('Sidebar-Beschreibung.', '_rrze'),
        'before_widget' => '<div class="widget-wrapper ym-vlist">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer-Sidebar links', '_rrze'),
        'id' => 'sidebar-footer-left',
        'description' => __('Dieser Bereich ist f&uuml;r die Zusatzinformationen (im Footer links) vorgesehen. Hier könnten hilfreiche Links oder sonstige Informationen stehen, welche auf jeder Seite eingeblendet werden sollen. Diese Angaben werden bei der Ausgabe auf dem Drucker nicht mit ausgegeben!', '_rrze'),
        'before_widget' => '<div id="%1$s" class="widget-wrapper ym-vlist %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));

    register_sidebar(array(
        'name' => __('Footer-Sidebar mitte', '_rrze'),
        'id' => 'sidebar-footer-center',
        'description' => __('Dieser Bereich ist f&uuml;r die Zusatzinformationen (im Footer mitte) vorgesehen. Hier könnten hilfreiche Links oder sonstige Informationen stehen, welche auf jeder Seite eingeblendet werden sollen. Diese Angaben werden bei der Ausgabe auf dem Drucker nicht mit ausgegeben!', '_rrze'),
        'before_widget' => '<div id="%1$s" class="widget-wrapper ym-vlist %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));

    register_sidebar(array(
        'name' => __('Footer-Sidebar rechts', '_rrze'),
        'id' => 'sidebar-footer-right',
        'description' => __('Dieser Bereich ist f&uuml;r die Zusatzinformationen (im Footer rechts) vorgesehen. Hier könnten hilfreiche Links oder sonstige Informationen stehen, welche auf jeder Seite eingeblendet werden sollen. Diese Angaben werden bei der Ausgabe auf dem Drucker nicht mit ausgegeben!', '_rrze'),
        'before_widget' => '<div id="%1$s" class="widget-wrapper ym-vlist %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));
}

add_action('widgets_init', '_rrze_widgets_init');

function _rrze_scripts() {
    $options = _rrze_theme_options();

    wp_enqueue_style('style', get_stylesheet_uri());

    // wp_register_style( 'colset-style', sprintf('%s/css/columnset-%s.css', get_template_directory_uri(), $options['columnset'] ) );
    // wp_enqueue_style('colset-style');

    wp_register_style('columnlayout-style', sprintf('%s/css/columnlayout-%s.css', get_template_directory_uri(), $options['columnlayout']));
    wp_enqueue_style('columnlayout-style');

    wp_register_style('footer-layout-style', sprintf('%s/css/footer-layout-%s.css', get_template_directory_uri(), $options['footer_layout']));
    wp_enqueue_style('footer-layout-style');

    wp_register_style('patch-style', sprintf('%s/css/patches/patch.css', get_template_directory_uri()));
    $GLOBALS['wp_styles']->add_data('patch-style', 'conditional', 'lte IE 7');
    wp_enqueue_style('patch-style');

    wp_enqueue_script('jquery');

    wp_register_script('layout-script', sprintf('%s/js/layout.js', get_template_directory_uri()), array(), false, true);
    wp_enqueue_script('layout-script');

    wp_register_script('keyboard-script', sprintf('%s/js/keyboard_menu.js', get_template_directory_uri()), array(), false, true);
    wp_enqueue_script('keyboard-script');

    wp_register_script('headerposition-script', sprintf('%s/js/header_position.js', get_template_directory_uri()), array(), false, true);
    wp_enqueue_script('headerposition-script');

    wp_register_script('toplinescroll-script', sprintf('%s/js/topline_scroll.js', get_template_directory_uri()), array(), false, true);
    wp_enqueue_script('toplinescroll-script');

    wp_register_script('sidebarmobile-script', sprintf('%s/js/sidebar_mobile.js', get_template_directory_uri()), array(), false, true);
    wp_enqueue_script('sidebarmobile-script');

    wp_register_script('columnlayout-script', sprintf('%s/js/columnlayout-%s.js', get_template_directory_uri(), $options['columnlayout']), array(), false);
    wp_enqueue_script('columnlayout-script');
}

add_action('wp_enqueue_scripts', '_rrze_scripts');

function category_count_inline($links) {
    $links = str_replace('</a> (', ' (', $links);
    $links = str_replace(')', ')</a>', $links);
    return $links;
}

add_filter('wp_list_categories', 'category_count_inline');

function archive_count_inline($links) {
    $links = str_replace('</a>&nbsp;(', ' (', $links);
    $links = str_replace(')', ')</a>', $links);
    return $links;
}

add_filter('get_archives_link', 'archive_count_inline');


/* Debugging functions */

function _rrze_debug($input, $exit = false) {
    printf("\n<pre>\n%s\n</pre>\n", print_r($input, true));
    if ($exit)
        exit();
}

function _rrze_debug_log($input, $append = true) {
    $file = dirname(__FILE__) . "../../debug.log";
    $flags = $append ? FILE_APPEND | LOCK_EX : LOCK_EX;
    file_put_contents($file, print_r($input, true), $flags);
}

/** add_filter('widget_archives_args', 'my_widget_archives_args_filter',10,1);
function my_widget_archives_args_filter($args) {
 $args['before'] = '<li class="archive">';
 $args['after'] = '</li>';
 $args['format']='custom';
return $args;
}*/