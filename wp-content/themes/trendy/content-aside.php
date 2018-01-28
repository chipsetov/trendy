<div class="global-content">
    <div class="post-content-music"><?php the_content(); ?></div>
    <div class="row">
        <div class="col-sm-2 left-dates"><img
                    src="<? echo get_template_directory_uri() . "/images/category-icon-music.png" ?>"
                    alt="category-icon-quote.png">
            <div class="post-date-number"><?php the_time('d'); ?></div>
            <div class="post-date-mounth"><?php the_time('M'); ?></div>
        </div>

        <div class="col-sm-10 music-post">

            <div class="post-title-music"><?php the_title(); ?> </div>

            <div class="post-metadata-music">
                <i class="fa fa-user" aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                <i class="fa fa-folder-open" aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                    $comments_count = wp_count_comments(get_the_ID());
                    echo $comments_count->approved . " comments";
                    ?>  </i>
            </div>

            <div class="post-audio-excerpt">
                <?php the_excerpt(); ?>
            </div>

        </div>

    </div>
</div>
