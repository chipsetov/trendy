<!-- end of templatemo_slideshow -->
<section id="templatemo_about">
<div class="container content">
    <div class="row">
        <h1>About Tamarillo</h1>
    </div>
    <div id="wait" style="display:none; width:400px;height:300px; position: absolute; left:50%; margin-left: -200px;"><img src="http://uploads.webflow.com/56dfccba3d760e08049f42a9/56dfccba3d760e08049f4300_infinite-gif-preloader.gif" /></div>

<?php
$query = new WP_Query( array( 'category_name' => 'web' ) );
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 col-sm-7 col-xs-24">
               <?php the_post_thumbnail(); ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-16">
                <h2 id="testajax"><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-default">read more</a>
            </div>
        </div><!-- end of row -->
        <div class="clear"></div>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; wp_reset_postdata(); ?>
</div>
</section><!-- end of templatemo_about -->