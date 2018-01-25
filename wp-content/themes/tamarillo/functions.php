<?php
add_action('wp_enqueue_scripts', 'theme_name_scripts');
add_action('after_setup_theme', 'custom_theme_support');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'widgets_init', 'register_my_widgets' );

function theme_name_scripts()
{
    /* including scc files*/
  //  wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrapcdn', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
 /*   wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('flexslider', get_template_directory_uri() . "/css/flexslider.css");
    wp_enqueue_style('lightbox', get_template_directory_uri() . "/css/jquery.lightbox.css");
    wp_enqueue_style('templatemo', get_template_directory_uri() . "/css/templatemo_style.css");
    /* including js files */
    wp_enqueue_style('sliderstyle', get_template_directory_uri() . "/css/style.css");
    wp_enqueue_style('awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', NULL, NULL, false);
    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', NULL, NULL, false);
    wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js', NULL, NULL, false);
    wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', NULL, NULL, true);
    wp_enqueue_script('scrollto', get_template_directory_uri() . '/js/jquery.scrollto.min.js', NULL, NULL, true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', NULL, NULL, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', NULL, NULL, true);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/jquery.lightbox.min.js', NULL, NULL, true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', NULL, NULL, true);
    wp_enqueue_script('singlePageNav', get_template_directory_uri() . '/js/jquery.singlePageNav.min.js', NULL, NULL, true);
    wp_enqueue_script('templatemo-script', get_template_directory_uri() . '/js/templatemo_script.js', NULL, NULL, true);
    wp_enqueue_script('jquery-simpleslider', get_template_directory_uri() . '/js/jquery.simpleslider.js', array('jquery'), NULL, true);
}

function custom_theme_support()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

function theme_register_nav_menu()
{
    register_nav_menu('primary', 'Primary Menu');
}
function register_my_widgets(){
    register_sidebar( array(
        'name' => "Left footer",
        'id' => 'left-footer',
        'description' => 'Left footer',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ) );

    register_sidebar( array(
        'name' => "Right footer",
        'id' => 'right-footer',
        'description' => 'Right footer',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ) );
}


function custom_post_type(){
    $lables = array(

        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => 'Add Item',
        'all_items' => 'All items',
        'add_new_item' => 'Add item',
        'edit_item' => 'Edit item',
        'new_item' => 'New item',
        'view_item' => 'View item',
        'search_items' => 'Search Slider',
        'not_found' => 'No item found',
        'not_found_in_trash' => 'No item found in trash',
        'parent_item_colon' => 'Parent item',
        'menu_name' => 'Slider'

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
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title','editor','thumbnail','excerpt', 'trackbacks'),
        'taxonomies' => array('slidercat'),
        'menu_position' => 2,
        'exclude_from_search' => false
    );
    register_post_type('slider', $args);
}
add_action('init', 'create_taxonomy');
function create_taxonomy(){
    $labels = array(

        'name' => 'Slider cat',
        'singular_name' => 'Slider cat',
        'search_items' => 'Search Slider cat',
        'all_items' => 'All Slider cat',
        'parent_item' => 'Parent Slider cat',
        'parent_item_colon' => 'Parent Slider cat:',
        'edit_item' => 'Edit Slider cat',
        'update_item' => 'Update Slider cat',
        'add_new_item' => 'Add New Slider cat',
        'new_item_name' => 'New Genre Slider cat',
        'menu_name' => 'Slider cat',

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
        'hierarchical' => false,
        'update_count_callback' => '',
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => null,
        'show_admin_column' => false,
        '_builtin' => false,
        'show_in_quick_edit' => null,

    );
    register_taxonomy('slidercat', 'slider', $args );

}


add_action('init', 'custom_post_type');
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';







add_action('add_meta_boxes', 'custom_meta_box');
add_action('save_post', 'save_user_data');
function custom_meta_box(){

    add_meta_box('user_info', 'User Information', 'user_info_callback', array('post', 'page'), 'side', 'high');

}
function user_info_callback($post){

    wp_nonce_field('save_user_data', 'action_user_box_nonce');
    $value = get_post_meta($post->ID, '_contact_email_value_key', true);
    $name = get_post_meta($post->ID, '_contact_name_value_key', true);
    $lastname = get_post_meta($post->ID, '_contact_lastname_value_key', true);
    echo '<label for="user_email_field"> User email adress';
    echo '<input type="email" id="user_email_field" name="user_email_field" value="'. esc_attr($value) .'">';
    echo '<label for="user_name_field"> User name';
    echo '<input type="text" id="user_name_field" name="user_name_field" value="'. esc_attr($name) .'">';

    echo '<label for="user_lastname_field"> User name';
    echo '<input type="radio" id="user_lastname_field" name="user_lastname_field" value="male">';
    echo '<input type="radio" id="user_lastname_field" name="user_lastname_field" value="female">';
}
function save_user_data($post_id){

    if( wp_verify_nonce($_POST['action_user_box_nonce'],'save_user_data') ){

        $nameData = $_POST['user_name_field'];
        update_post_meta($post_id, '_contact_name_value_key', $nameData);
        $emailData = $_POST['user_email_field'];
        update_post_meta($post_id, '_contact_email_value_key', $emailData);

        $lastnameData = $_POST['user_lastname_field'];
        update_post_meta($post_id, '_contact_lastname_value_key', $lastnameData);
    }

}



function my_shortcode( $atts ){

if( (int)$atts['cat_id'] )$catID = (int)$atts['cat_id'];
else $catID = 0;

$postsPerPage = (int)$atts['post_per_page'];

$query = new WP_Query(array('cat' => $catID, 'posts_per_page' => $postsPerPage));
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
<?php the_title('<h1>', '</h1>'); ?>
<?php endwhile; endif; wp_reset_query();
}
add_shortcode('mycode', 'my_shortcode');


add_filter('the_content', 'add_text_to_content');
function add_text_to_content($content){
    if(is_single())return $content . "<h1>add_filter Content</h1>";
    else return $content;
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

add_filter('the_title',
    function($title){ return '<strong>'. $title. '</strong>';}
    );











