<div class="global-content">
    <div class="thumbnail-img"><?php the_post_thumbnail('large', ['class' => 'img-responsive']); ?></div>
    <div class="row">
        <div class="col-sm-2 left-dates"><img
                    src="<? echo get_template_directory_uri() . "/images/category-icon-standard.png" ?>"
                    alt="category-icon-standard.png">
            <div class="post-date-number"><?php the_time('d'); ?></div>
            <div class="post-date-mounth"><?php the_time('M'); ?></div>
        </div>

        <div class="col-sm-10 standard-post">
            <?php the_title(sprintf('<h1 class="post-title-standard"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>

            <div class="post-metadata-standard">
                <i class="fa fa-user" aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                <i class="fa fa-folder-open" aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                    $comments_count = wp_count_comments(get_the_ID());
                    echo $comments_count->approved . " comments";
                    ?>  </i>
            </div>

            <div class="post-standard-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <div class="post-standard-readmore">
                <a href="<?php echo get_permalink(); ?>">READ MORE</a>
            </div>
        </div>

    </div>
</div>
