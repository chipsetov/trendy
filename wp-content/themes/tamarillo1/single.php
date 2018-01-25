<?php get_header(); ?>
<div class="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
    <?php the_title('<h3>', '</h3>'); ?>
    <div><?php the_content();?></div>
    <?php echo get_post_meta( get_the_ID(), 'color', true ); ?>
    <?php echo get_post_meta( get_the_ID(), 'CPU', true ); ?>
    <?php echo get_post_meta( get_the_ID(), 'price', false ); ?>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>

<?php get_footer(); ?>