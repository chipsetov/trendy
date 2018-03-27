<?php
/*

Template Name: test

*/
?>
<?php get_header(); ?>
<section id="cd-timeline" class="cd-container">
<!--<div id="ajax-posts" class="row">-->
    <?php
    $postsPerPage = 3;
    $args = array(
        'post_type' => 'history',
        'posts_per_page' => $postsPerPage,
//        'cat' => 18
    );

    $loop = new WP_Query($args);

    while ($loop->have_posts()) :
        $loop->the_post();
        ?>


        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-picture">
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2>Title of section 3</h2>
                <p><?php the_content(); ?></p>
                <span class="cd-date">Jan 24</span>
            </div> <!-- cd-timeline-content -->
        </div> <



<!--        <div class="small-12 large-4 columns">-->
<!--            <h1>--><?php //the_title(); ?><!--</h1>-->
<!--            <p>--><?php //the_content(); ?><!--</p>-->
<!--        </div>-->

        <?php
    endwhile;
    wp_reset_postdata();
    ?>
</section>
    <!--</div>-->
<div id="more_posts">Load More</div>

<?php get_footer(); ?>
