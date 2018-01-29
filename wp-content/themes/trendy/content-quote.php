<div class="global-content">
    <div class="row">
        <div class="col-sm-2 left-dates"><img
                    src="<? echo get_template_directory_uri() . "/images/category-icon-quote.png" ?>"
                    alt="category-icon-quote.png">
            <div class="post-date-number"><?php the_time('d'); ?></div>
            <div class="post-date-mounth"><?php the_time('M'); ?></div>
        </div>
        <div class="col-sm-10 quote-post">
            <div class="quote-post-border">
                <div class="post-content-quote"><?php the_content(); ?></div>
                <?php the_title(sprintf('<h1 class="post-title-quote"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
            </div>
        </div>

    </div>
</div>