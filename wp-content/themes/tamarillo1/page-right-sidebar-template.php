<?php
/*
         Template Name: Page Right Sidebar
*/
?>

<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
                <?php the_title('<h3>', '</h3>'); ?>
                <div><?php the_content(); ?></div>
            <?php endwhile;
            else : ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>


        </div>

        <div class="col-xs-12 col-sm-8">
            <?php get_sidebar('right'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
