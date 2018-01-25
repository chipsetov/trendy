<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
    <?php the_title('<h3>', '</h3>'); ?>
    <div><?php the_content();?></div>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>