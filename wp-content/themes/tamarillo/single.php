<?php get_header();

echo "<hr>";
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; endif; echo "<hr>"; ?>

<?php   get_footer(); ?>





