<section id="templatemo_services">
    <div class="container">
        <div class="row">
            <h1>Services</h1>
        </div>

        <?php
        $i=1;
        $query = new WP_Query(array('category_name' => 'Services'));


        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>


            <?php $i++;
            if ($i % 2) echo '<div class="row">'; ?>
            <div class="col-sm-5">

                <?php echo get_the_post_thumbnail($page->ID); ?>
            </div>
            <div class="col-sm-6">

                <?php the_title('<h2>', '</h2>'); ?>

                <p><?php the_content(); ?></p>
            </div>
            <?php if ($i % 2) echo '</div>'; ?>


        <?php endwhile;
        else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</section> <!-- end of templatemo_services -->
