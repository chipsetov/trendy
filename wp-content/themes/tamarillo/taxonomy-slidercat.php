<?php get_header(); ?>
<h1>taxonomy-slidercat.php</h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div>
        <?php
         global $post;
         $post->ID;
         get_the_ID();
         foreach(wp_get_post_terms($post->ID, 'slidercat') as $value){
         echo "<a href='". get_term_link($value) ."'>" . $value->name . "</a> / ";
        }
        ?>
        <?php the_title('<h1>', '</h1>'); ?>
        <?php the_content(); ?>
        <hr>
    </div>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
