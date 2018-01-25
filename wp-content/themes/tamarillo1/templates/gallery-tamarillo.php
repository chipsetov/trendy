<section id="templatemo_gallery">
    <div id="gallery" class="container">
        <div class="row">
            <h1>Gallery</h1>
        </div>
        <?php
        $newtable = $wpdb->get_results( "SELECT `guid` FROM `wp_posts` WHERE `post_type` = 'attachment' and `post_parent` = 135" );
        $i = 0;
        foreach( $newtable as $newtables ):?>
            <?php if (!($i % 3)) echo  '<ul class="thumbs row">'; ?>
            <li class="col-sm-1 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a
                        class="overlay"
                        data-lightbox="gallery"
                        data-caption="Proin at ipsum pellentesque nibh ullamcorper vehicula. Donec elit orci, auctor ut porta at, porta eget elit. Vivamus dapibus nec ipsum nec consequat."
                        href="<?php echo $newtables->guid; ?>">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="<?php echo $newtables->guid; ?>" alt="image 1" />
                </div>
            </li>
            <li class="col-md-1 col-sm-1 hidden-xs"></li>
            <?php $i++; if (!($i % 3)) echo  '</ul>'; ?>
        <?php endforeach;  ?>
    </div>
</section>