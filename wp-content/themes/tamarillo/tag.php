<?php get_header(); ?>
<h1>TAG.php</h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div>
        <?php the_title('<h1>', '</h1>'); ?>
        <?php the_content(); ?>
        <hr>
    </div>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
