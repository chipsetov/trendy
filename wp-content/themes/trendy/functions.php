<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/24/2018
 * Time: 9:27 PM
 */

function trendy_script_enqueue() {



    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('bootstrapmap', get_template_directory_uri() . '/css/bootstrap.min.css.map', array(), '3.3.7', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', '', '', false);
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);




}
add_action( 'wp_enqueue_scripts', 'trendy_script_enqueue');

function trendy_theme_setup() {

    add_theme_support('menus');

    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');

}
add_action('init', 'trendy_theme_setup');

function build_tree_menu($items, $tree = null) {
    if(!isset($tree)) {
        $tree = (object) [ 'children' => [] ];
    } else if (!isset($tree->children)) {
        $tree->children = [];
    }
    foreach ($items as $index => $item) {
        if(isset($tree->ID) == false && $item->menu_item_parent == 0 ||
            (isset($tree->ID) && $item->menu_item_parent == $tree->ID)) {
            array_splice($items, $index, 1);
            build_tree_menu($items, $item);
            array_push($tree->children, $item);
        }
    }
    return $tree;
}

function print_menu($tree) {
    if(isset($tree->children) && count($tree->children) > 0) {
        return '<ul>' . print_menu_nodes($tree->children) . '</ul>';
    }
}

function print_menu_node($item) {
    return '<li>' .
        '<a ' .  'href="' .  $item->url .  '">' .
        do_shortcode($item->title) .
        '</a>' .
        print_menu($item) .
        '</li>';
}

function print_menu_nodes($items) {
    return join(array_map('print_menu_node', $items), '');
}


add_theme_support( 'custom-logo' );


require_once get_template_directory() . '/wp-bootstrap-navwalker.php';