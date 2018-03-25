<?php
/*
Plugin Name: Testimonials
Description: Display customer testimonials.
Version: 1.0
Author: Web Revenue Blog
License: GPL2
*/

//enqueueing scripts and styles
function plugin_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', plugins_url( 'js/jquery.flexslider-min.js' , __FILE__ ), array('jquery'), '2.2', false);
    wp_enqueue_script('testimonials', plugins_url( 'js/testimonials.js' , __FILE__ ), array('jquery'), '1.0', false);
    wp_enqueue_style('flexsliderCSS', plugins_url( 'css/flexslider.css' , __FILE__ ), false, '2.2', 'all' );
    wp_enqueue_style('testimonialsCSS', plugins_url( 'css/testimonials.css' , __FILE__ ), false, '1.0', 'all' );
}
add_action("wp_enqueue_scripts","plugin_scripts");

//the black magic to create the post type
function create_post_type() {
	register_post_type(
		'testimonials',//new post type
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' )
			),
			'public' => true,/*Post type is intended for public use. This includes on the front end and in wp-admin. */
			'supports' => array('title','editor','thumbnail','custom_fields'),
			'hierarchical' => false
		)
	);	
}
add_action( 'init', 'create_post_type' );


//adding the URL meta box field
function add_custom_metabox() {
	add_meta_box( 'custom-metabox', __( 'Link' ), 'url_custom_metabox', 'testimonials', 'side', 'low' );
}
add_action( 'admin_init', 'add_custom_metabox' );

// HTML for the admin area
function url_custom_metabox() {
	global $post;
	$urllink = get_post_meta( $post->ID, 'urllink', true );
	
	//validating!
	if ( ! preg_match( "/http(s?):\/\//", $urllink ) && $urllink != "") {
		$errors = "This URL isn't valid";
		$urllink = "http://";
	} 
	
	// output invlid url message and add the http:// to the input field
	if( isset($errors) ) { echo $errors; }
?>	
<p>
	<label for="siteurl">URL:<br />
		<input id="siteurl" size="37" name="siteurl" value="<?php if( isset($urllink) ) { echo $urllink; } ?>" />
	</label>
</p>
<?php
}

//saves custom field data
function save_custom_url( $post_id ) {
	global $post;	
	
	if( isset($_POST['siteurl']) ) {
		update_post_meta( $post->ID, 'urllink', $_POST['siteurl'] );
	}
}
add_action( 'save_post', 'save_custom_url' );

//return URL for a post
function get_url($post) {
	$urllink = get_post_meta( $post->ID, 'urllink', true );

	return $urllink;
}

//registering the shortcode to show testimonials
function load_testimonials($a){
	
	$args = array(
		"post_type" => "testimonials"
	);
	
	if( isset( $a['rand'] ) && $a['rand'] == true ) {
		$args['orderby'] = 'rand';
	}
	if( isset( $a['max'] ) ) {
		$args['posts_per_page'] = (int) $a['max'];
	}
	//getting all testimonials
	$posts = get_posts($args);
	
	echo '<div class="flexslider">';
		echo '<ul class="slides">';
		
		foreach($posts as $post){
			//getting thumb image
			$url_thumb = wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
			$link = get_url($post);
			echo '<li>';
				if ( ! empty( $url_thumb ) ) { echo '<img class="post_thumb" src="'.$url_thumb.'" />'; }
				echo '<h2>'.$post->post_title.'</h2>';
				if ( ! empty( $post->post_content ) ) { echo '<p>'.$post->post_content.'<br />'; }
				if ( ! empty( $link ) ) { echo '<a href="'.$link.'">Visit Site</a></p>'; }
			echo '</li>';
		}
		
		echo '</ul>';
	echo '</div>';
}
add_shortcode("testimonials","load_testimonials");

add_filter('widget_text', 'do_shortcode');
?>