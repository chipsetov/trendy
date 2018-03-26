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
    wp_enqueue_style('sclick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0.0', 'all');
    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery.nicescroll404.min', get_template_directory_uri() . '/js/jquery.nicescroll404.min.js', array(), '1.0.0', true);
    wp_enqueue_script('modernizr.custom404', get_template_directory_uri() . '/js/modernizr.custom404.js', array(), '1.0.0', true);
    wp_enqueue_script('scripts404', get_template_directory_uri() . '/js/scripts404.js', array(), '1.0.0', true);
    wp_enqueue_script('animate-number', get_template_directory_uri() . '/js/animate/jquery.animateNumber.js', array(), '1.0.0', true);
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);


    wp_enqueue_style('googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i&amp;subset=cyrillic,cyrillic-ext');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Bold.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Book.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Light.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Regular.ttf');
    wp_enqueue_style('bebas-bold', get_template_directory_uri() . '/fonts/BebasNeue-Thin.ttf');

    wp_enqueue_script('ajax_custom_script', get_stylesheet_directory_uri() . '/js/loadmoreposts.js', array('jquery'));
    wp_localize_script('ajax_custom_script', 'frontendajax', array('ajaxurl' => admin_url('admin-ajax.php')));

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


/*
	==========================================
	 Custom Post Type
	==========================================
*/
function awesome_custom_post_type()
{

    $labels = array(
        'name' => 'Team',
        'singular_name' => 'Team',
        'add_new' => 'Add team member',
        'all_items' => 'All team members',
        'add_new_item' => 'Add team member',
        'edit_item' => 'Edit team member profile',
        'new_item' => 'New team member',
        'view_item' => 'View team member',
        'search_item' => 'Search team member',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Item'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'menu_icon' => 'dashicons-businessman',
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        //'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('team_member', $args);
}

add_action('init', 'awesome_custom_post_type');

/*
	==========================================
	 Meta Box
	==========================================
*/
function global_notice_meta_box()
{

    add_meta_box(
        'global-notice',
        __('Social links', 'sitepoint'),
        'global_notice_meta_box_callback',
        'team_member'
    );
}

add_action('add_meta_boxes', 'global_notice_meta_box');

function global_notice_meta_box_callback($post)
{

    // Add a nonce field so we can check for it later.
    wp_nonce_field('global_notice_nonce', 'global_notice_nonce');

    $value = get_post_meta($post->ID, '_global_notice', true);
    $fb_value = get_post_meta($post->ID, '_fb', true);
    $tw_value = get_post_meta($post->ID, '_tw', true);
    $gp_value = get_post_meta($post->ID, '_gp', true);
    $in_value = get_post_meta($post->ID, '_in', true);
    $pin_value = get_post_meta($post->ID, '_pin', true);

    echo '<textarea style="width:100%" id="global_notice" name="global_notice">' . esc_attr($value) . '</textarea>';
    echo '<label for="fb">Facebook</label><input type="text" id="fb "name="fb" value="' . esc_attr($fb_value) . '">';
    echo '<label for="tw">Twitter</label><input type="text" id="tw "name="tw" value="' . esc_attr($tw_value) . '">';
    echo '<label for="gp">Google+</label><input type="text" id="gp "name="gp" value="' . esc_attr($gp_value) . '">';
    echo '<label for="in">LinkedIn</label><input type="text" id="in "name="in" value="' . esc_attr($in_value) . '">';
    echo '<label for="pin">LinkedIn</label><input type="text" id="pin "name="pin" value="' . esc_attr($pin_value) . '">';
}

function save_global_notice_meta_box_data($post_id)
{

    // Check if our nonce is set.
    if (!isset($_POST['global_notice_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['global_notice_nonce'], 'global_notice_nonce')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

        if (!current_user_can('edit_page', $post_id)) {
            return;
        }

    } else {

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if (!isset($_POST['global_notice'])) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field($_POST['global_notice']);
    $fb_data = sanitize_text_field($_POST['fb']);
    $tw_data = sanitize_text_field($_POST['tw']);
    $gp_data = sanitize_text_field($_POST['gp']);
    $in_data = sanitize_text_field($_POST['in']);
    $pin_data = sanitize_text_field($_POST['pin']);

    // Update the meta field in the database.
    update_post_meta($post_id, '_global_notice', $my_data);
    update_post_meta($post_id, '_fb', $fb_data);
    update_post_meta($post_id, '_tw', $tw_data);
    update_post_meta($post_id, '_gp', $gp_data);
    update_post_meta($post_id, '_in', $in_data);
    update_post_meta($post_id, '_pin', $pin_data);
}

add_action('save_post', 'save_global_notice_meta_box_data');

//function global_notice_before_post( $content ) {
//
//    global $post;
//
//    // retrieve the global notice for the current post
//    $global_notice = esc_attr( get_post_meta( $post->ID, '_global_notice', true ) );
//
//    $notice = "<div class='sp_global_notice'>$global_notice</div>";
//
//    return $notice . $content;
//
//}
//
//add_filter( 'the_content', 'global_notice_before_post' );

/*
	==========================================
	 Subscribe block
	==========================================
*/


/*
	==========================================
	 Services
	==========================================
*/


function services_func($atts)
{
    $atts = shortcode_atts(array(
        'name' => '',
        'text' => '',
        'imghref' => '',
    ), $atts);
    return '

    <div class="services-wrap">
        <div class="pricing_table_btn">
            <img src="' . $atts['imghref'] . '" alt="service-img" height="42" width="42">
        </div>
        <div class="service-name">
            ' . $atts['name'] . '
        </div>
        <div class="services-text">
        ' . $atts['text'] . '
        </div>


    </div>

';
}

add_shortcode('services', 'services_func');


/*
	==========================================
	 Pricing table block
	==========================================
*/

function prices_basic_func($atts)
{
    $atts = shortcode_atts(array(
        'name' => '',
        'price' => '',
        'term' => '',
        'advantage1' => '',
        'advantage2' => '',
        'advantage3' => '',
        'advantage4' => '',
        'advantage5' => '',
        'linkname' => '',
        'href' => '',
    ), $atts);
    return '

    <div class="pricing_table">
        <div class="pricing_table_name">
            ' . $atts['name'] . '
        </div>
        <div class="pricing_table_price">
        ' . $atts['price'] . '
        </div>
        <div class="pricing_table_term">
        ' . $atts['term'] . '
        </div>
        
        <div class="pricing_table_advantages">
            <p>' . $atts['advantage1'] . '</p>
            <p>' . $atts['advantage2'] . '</p>
            <p>' . $atts['advantage3'] . '</p>
            <p>' . $atts['advantage4'] . '</p>
            <p>' . $atts['advantage5'] . '</p>
        </div>
        <div class="pricing_table_btn">
            <a href="' . $atts['href'] . '">' . $atts['linkname'] . '</a>
        </div>
    </div>

';
}

add_shortcode('price_basic', 'prices_basic_func');

function prices_best_func($atts)
{
    $atts = shortcode_atts(array(
        'name' => '',
        'price' => '',
        'term' => '',
        'advantage1' => '',
        'advantage2' => '',
        'advantage3' => '',
        'advantage4' => '',
        'advantage5' => '',
        'linkname' => '',
        'href' => '',
    ), $atts);
    return '

    <div class="pricing_table_best">
        <div class="pricing_table_name">
            ' . $atts['name'] . '
        </div>
        <div class="pricing_table_price">
        ' . $atts['price'] . '
        </div>
        <div class="pricing_table_term">
        ' . $atts['term'] . '
        </div>
        
        <div class="pricing_table_advantages">
            <p>' . $atts['advantage1'] . '</p>
            <p>' . $atts['advantage2'] . '</p>
            <p>' . $atts['advantage3'] . '</p>
            <p>' . $atts['advantage4'] . '</p>
            <p>' . $atts['advantage5'] . '</p>
        </div>
        <div class="pricing_table_btn">
            <a href="' . $atts['href'] . '">' . $atts['linkname'] . '</a>
        </div>
    </div>

';
}

add_shortcode('price_best', 'prices_best_func');


function more_post_ajax()
{

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'cat' => 18,
        'paged' => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
        $out .= '<div class="small-12 large-4 columns">
                <h1>' . get_the_title() . '</h1>
                <p>' . get_the_content() . '</p>
         </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

