<section id="templatemo_services">
    <div class="container">
        <div class="row">
            <h1>Services</h1>
        </div>
        <?php
        $i = 3;
        $query = new WP_Query(array('category_name' => 'services'));
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <?php $i++;
            if ($i % 2) echo '<div class="row">'; ?>
            <div class="col-sm-5">
                <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image 4"/>
            </div>
            <div class="col-sm-6">
                <h2><?php the_title(); ?></h2>
                <p>Proin at ipsum pellentesque nibh ullamcorper vehicula. Donec elit orci, auctor ut porta at, porta
                    eget elit. Vivamus dapibus nec ipsum nec consequat.</p>
            </div>
            <div class="col-sm-1"></div>
            <?php if ($i % 2) echo '</div>'; ?>

        <?php endwhile;
        else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</section> <!-- end of templatemo_services -->