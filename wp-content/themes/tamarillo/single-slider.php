<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="content">
        <h1>Single-slider.php</h1>
        <?php the_title('<h1>', '</h1>'); ?>
        <?php the_content(); ?>

        <hr>
    </div>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php // comments_template(); ?>
<?php get_footer(); ?>





