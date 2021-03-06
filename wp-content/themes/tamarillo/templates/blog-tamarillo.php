<section id="templatemo_blog">
    <div class="container">
        <div class="row">
            <h1>Blog</h1>
        </div>
        <?php
        $query = new WP_Query(array('category_name' => 'blog'));
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <div class="row">
                <div class="col-sm-9">
                    <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image 12"/>
                </div>
                <div class="col-sm-15">
                    <h2><?php the_title(); ?></h2>
                    <p>
                        <span class="glyphicon glyphicon-tag"></span> <?php the_tags( '', ', ', '' ); ?>&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-user"></span> <?php echo get_the_author(); ?> &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-calendar"></span> <?php echo get_the_date('d M Y'); ?> &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-thumbs-up"></span> 48 &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-thumbs-down"></span> 4 &nbsp;&nbsp;
                    </p>
                    <p>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-default margin_top">read more</a>
                    </p>
                </div>
            </div><!-- end of row -->
        <?php endwhile;
        else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif;
        wp_reset_postdata(); ?>

    </div>
</section>