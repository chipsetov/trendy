<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/24/2018
 * Time: 9:27 PM
 */

function trendy_script_enqueue()
{


//    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
//
//   wp_enqueue_style('bootstrapmap', get_template_directory_uri() . '/css/bootstrap.min.css.map', array(), '3.3.7', 'all');
//    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
//
//    wp_deregister_script('jquery');
//    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', '', '', false);
//    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', '', '', false);
//    wp_enqueue_script('jquery');
//
//    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', false);
//    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);


    //css
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('respons404', get_template_directory_uri() . '/css/respons404.css', array(), '1.0.0', 'all');
    wp_enqueue_style('style404', get_template_directory_uri() . '/css/style404.css', array(), '1.0.0', 'all');
    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery.nicescroll404.min', get_template_directory_uri() . '/js/jquery.nicescroll404.min.js', array(), '1.0.0', true);
    wp_enqueue_script('modernizr.custom404', get_template_directory_uri() . '/js/modernizr.custom404.js', array(), '1.0.0', true);
    wp_enqueue_script('scripts404', get_template_directory_uri() . '/js/scripts404.js', array(), '1.0.0', true);


    wp_enqueue_style('googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i&amp;subset=cyrillic,cyrillic-ext');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Bold.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Book.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Light.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Regular.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Thin.ttf');


}

add_action('wp_enqueue_scripts', 'enqueue_load_fa');
function enqueue_load_fa()
{

    wp_enqueue_style('load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

}

add_action('wp_enqueue_scripts', 'trendy_script_enqueue');

function trendy_theme_setup()
{

    add_theme_support('menus');

    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');

}

add_action('init', 'trendy_theme_setup');

function build_tree_menu($items, $tree = null)
{
    if (!isset($tree)) {
        $tree = (object)['children' => []];
    } else if (!isset($tree->children)) {
        $tree->children = [];
    }
    foreach ($items as $index => $item) {
        if (isset($tree->ID) == false && $item->menu_item_parent == 0 ||
            (isset($tree->ID) && $item->menu_item_parent == $tree->ID)
        ) {
            array_splice($items, $index, 1);
            build_tree_menu($items, $item);
            array_push($tree->children, $item);
        }
    }
    return $tree;
}

function print_menu($tree)
{
    if (isset($tree->children) && count($tree->children) > 0) {
        return '<ul>' . print_menu_nodes($tree->children) . '</ul>';
    }
}

function print_menu_node($item)
{
    return '<li>' .
    '<a ' . 'href="' . $item->url . '">' .
    do_shortcode($item->title) .
    '</a>' .
    print_menu($item) .
    '</li>';
}

function print_menu_nodes($items)
{
    return join(array_map('print_menu_node', $items), '');
}


add_theme_support('custom-logo');


require_once get_template_directory() . '/wp-bootstrap-navwalker.php';


/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'video', 'audio', 'quote', 'gallery'));
add_theme_support('html5', array('search-form'));
add_image_size('spec_thumb_post', 770, 400, true);
add_image_size('spec_thumb_rel_post', 310, 162, true);

/*
	==========================================
	 Sidebar function
	==========================================
*/
function awesome_widget_setup()
{

    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => 'footer head',
            'id' => 'sidebar-f-4',
            'class' => 'custom',
            'description' => 'Standard footer Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

//    register_sidebar(
//        array(
//            'name' => 'footer sidebar 1',
//            'id' => 'sidebar-f-1',
//            'class' => 'custom',
//            'description' => 'Standard footer Sidebar',
//            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//            'after_widget' => '</aside>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        )
//    );
//    register_sidebar(
//        array(
//            'name' => 'footer sidebar 2',
//            'id' => 'sidebar-f-2',
//            'class' => 'custom',
//            'description' => 'Standard footer Sidebar',
//            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//            'after_widget' => '</aside>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        )
//    );
//
//    register_sidebar(
//        array(
//            'name' => 'footer sidebar 3',
//            'id' => 'sidebar-f-3',
//            'class' => 'custom',
//            'description' => 'Standard footer Sidebar',
//            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//            'after_widget' => '</aside>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        )
//    );
//
//    register_sidebar(
//        array(
//            'name' => 'footer sidebar 5',
//            'id' => 'sidebar-f-5',
//            'class' => 'custom',
//            'description' => 'Standard footer Sidebar',
//            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//            'after_widget' => '</aside>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        )
//    );

//    register_sidebar(
//        array(
//            'name' => 'footer sidebar 2-1',
//            'id' => 'sidebar-f-2-1',
//            'class' => 'custom',
//            'description' => 'Standard footer Sidebar',
//            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//            'after_widget' => '</aside>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        )
//    );
//
//    register_sidebar(
//        array(
//            'name' => 'footer sidebar 2-2',
//            'id' => 'sidebar-f-2-2',
//            'class' => 'custom',
//            'description' => 'Standard footer Sidebar',
//            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//            'after_widget' => '</aside>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        )
//    );


}

add_action('widgets_init', 'awesome_widget_setup');

function true_register_multiple_sidebars()
{

    register_sidebars(2, array(
        'name' => 'footer sidebar 2 %d',
        'id' => 'sidebar-f-2',
        'class' => 'custom',
        'description' => 'Standard footer Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebars(5, array(
            'name' => 'footer sidebar %d',
            'id' => 'sidebar-f',
            'class' => 'custom',
            'description' => 'Standard footer Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );


}

add_action('widgets_init', 'true_register_multiple_sidebars');


function add_to_author_profile($contactmethods)
{

    $contactmethods['google_profile'] = 'Google Profile URL';
    $contactmethods['twitter_profile'] = 'Twitter Profile URL';
    $contactmethods['facebook_profile'] = 'Facebook Profile URL';
    $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
    $contactmethods['pinterest_profile'] = 'Pinterest Profile URL';

    return $contactmethods;
}

add_filter('user_contactmethods', 'add_to_author_profile', 10, 1);

