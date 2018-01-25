<?php
/**
 * Created by PhpStorm.
 * User: AntoA
 * Date: 14.11.2017
 * Time: 17:57
 */
//
//// правильный способ подключить стили и скрипты
//add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
//// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
//function theme_name_scripts() {
//    wp_enqueue_style( 'style', get_stylesheet_uri() );
//    wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
//    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
//    wp_enqueue_style( 'jquery-lightbox', get_template_directory_uri() . '/css/jquery.lightbox.css');
//    wp_enqueue_style( 'templatemo-style',get_template_directory_uri() . '/css/templatemo_style.css');
//
//    wp_deregister_script('jquery');
//    wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', NULL, NULL, true );
//    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'jquery-scrollto-min', get_template_directory_uri() . '/js/jquery.scrollto.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'jquery-scrollto-min', get_template_directory_uri() . '/js/jquery.scrollto.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'jquery-easing-min', get_template_directory_uri() . '/js/jquery.easing.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'jquery-lightbox-min', get_template_directory_uri() . '/js/jquery.lightbox.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', NULL, NULL, false );
//    wp_enqueue_script( 'jquery-singlePageNav-min', get_template_directory_uri() . '/js/jquery.singlePageNav.min.js', NULL, NULL, true );
//    wp_enqueue_script( 'templatemo-script', get_template_directory_uri() . '/js/templatemo_script.js', NULL, NULL, true );
//}

add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{
    /* including scc files */
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-min-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('flexslider', get_template_directory_uri() . "/css/flexslider.css");
    wp_enqueue_style('lightbox', get_template_directory_uri() . "/css/jquery.lightbox.css");
    wp_enqueue_style('templatemo', get_template_directory_uri() . "/css/templatemo_style.css");

    /* including js files */
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', NULL, NULL, false);
    //wp_enqueue_script( 'maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp', NULL, NULL, false );
    wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBgKBUD5BMob4kTDTC_2paooH1uH8jaKuU', NULL, NULL, false);
    wp_enqueue_script('bootstrap-min-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', NULL, NULL, false);
    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', NULL, NULL, false);
    wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js', NULL, NULL, false);
    wp_enqueue_script('scrollto', get_template_directory_uri() . '/js/jquery.scrollto.min.js', NULL, NULL, false);
    wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', NULL, NULL, false);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', NULL, NULL, false);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/jquery.lightbox.min.js', NULL, NULL, false);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', NULL, NULL, false);
    wp_enqueue_script('singlePageNav', get_template_directory_uri() . '/js/jquery.singlePageNav.min.js', NULL, NULL, false);
    wp_enqueue_script('templatemo-script', get_template_directory_uri() . '/js/templatemo_script.js', NULL, NULL, false);
}


function custom_theme_logo()
{
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'custom_theme_logo');


add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu()
{
    register_nav_menu('primary', 'Primary Menu');
}

add_theme_support('post-thumbnails'); // поддержка миниатюр
set_post_thumbnail_size(540, 230, false);


add_action('widgets_init', 'register_my_widgets');
function register_my_widgets()
{
    register_sidebar(array(
        'name' => 'left footer',
        'id' => "sidebar-left-footer",
        'description' => '',
        'class' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => "</li>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
}


add_action('widgets_init', 'register1_my_widgets');
function register1_my_widgets()
{
    register_sidebar(array(
        'name' => 'right footer',
        'id' => "sidebar-right-footer",
        'description' => 'right',
        'class' => '',
        'before_widget' => ' ',
        'after_widget' => " ",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
}


/////////////


function custom_post_type()
{
    $lables = array(

        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => 'Add Item',
        'all_items' => 'All items',
        'add_new_item' => 'Add item',
        'edit_item' => 'Edit item',
        'new_item' => 'New item',
        'menu_icon' => 'dashicons-admin-comments',
        'view_item' => 'View item',
        'search_items' => 'Search Slider',
        'not_found' => 'No item found',
        'not_found_in_trash' => 'No item found in trash',
        'parent_item_colon' => 'Parent item',
        'menu_name' => 'Slider',


    );
    $args = array(

        'labels' => $lables,
        'public' => true,
        'has_archive' => 'slider',
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats'),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 2,
        'exclude_from_search' => false

    );
    register_post_type('slider', $args);

}

add_action('init', 'custom_post_type');


add_action('init', 'create_taxonomy');
function create_taxonomy()
{
    $labels = array(

        'name' => 'Genres',
        'singular_name' => 'Genre',
        'search_items' => 'Search Genres',
        'all_items' => 'All Genres',
        'parent_item' => 'Parent Genre',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item' => 'Edit Genre',
        'update_item' => 'Update Genre',
        'add_new_item' => 'Add New Genre',
        'new_item_name' => 'New Genre Name',
        'menu_name' => 'Genre',

    );

    $args = array(

        'label' => '',
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'publicly_queryable' => null,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_in_rest' => null,
        'rest_base' => null,
        'hierarchical' => true,
        'update_count_callback' => '',
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => null,
        'show_admin_column' => false,
        '_builtin' => false,
        'show_in_quick_edit' => null,

    );
    register_taxonomy('genres', 'Slider', $args);

}

//
//function my_shortcode(){
//    echo "function result";
//
//}
//add_shortcode( 'mycode', 'my_shortcode' );


function awesome_widget_setup()
{

    register_sidebar(
        array(
            'name' => 'SidebarLeft',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Left Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );

    register_sidebar(
        array(
            'name' => 'SidebarRight',
            'id' => 'sidebar-2',
            'class' => 'custom2',
            'description' => 'Right Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );

}

add_action('widgets_init', 'awesome_widget_setup');

function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);

add_filter('the_title', function ($title) {
    return '<strong>' . $title . '</strong>';
});