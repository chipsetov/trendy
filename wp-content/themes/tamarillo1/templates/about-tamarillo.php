<section id="templatemo_about">
    <div class="container">
        <div class="row">
            <h1>About Tamarillo</h1>
        </div>
        <?php
        $query = new WP_Query( array( 'category_name' => 'web' ) );


        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

<!--            --><?php //echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
<!--            --><?php //the_title('<h3>', '</h3>'); ?>
<!--            <div>--><?php //the_content();?><!--</div>-->


        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 col-sm-7 col-xs-24">
                <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-16">
                <?php the_title('<h2>', '</h2>'); ?>
                <p><?php the_content();?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-default">read more</a>
            </div>
        </div><!-- end of row -->
        <div class="clear"></div>


        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; wp_reset_postdata(); ?>


    </div>
</section><!-- end of templatemo_about -->
