<?php get_header(); ?>

<div class="row">
    <div class="container">

    <div class="col-xs-12 col-sm-8">

        <?php

        if( have_posts() ):

            while( have_posts() ): the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_title('<h1 class="entry-title">','</h1>' ); ?>

                    <?php if( has_post_thumbnail() ): ?>

                        <div class="post-thumbnail"><?php the_post_thumbnail('spec_thumb_post'); ?></div>

                    <?php endif; ?>

                    <small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>

                    <?php the_content(); ?>

                    <hr>

                    <div class="row">
                        <div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
                        <div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
                    </div>


                    <?php
                        //Related Posts by Category
                    $orig_post = $post;
                    global $post;
                    $categories = get_the_category($post->ID);
                    if ($categories) {
                        $category_ids = array();
                        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                        $args=array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=> 2, // Number of related posts that will be shown.
                            'caller_get_posts'=>1
                        );

                        $my_query = new wp_query( $args );
                        if( $my_query->have_posts() ) {
                            echo '<div id="related_posts"><h3>Related Posts</h3><ul>';
                            while( $my_query->have_posts() ) {
                                $my_query->the_post();?>

                                <div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                    <div class="relatedcontent">
                                        <div class="relatedimage"><?php the_post_thumbnail('spec_thumb_rel_post'); ?></div>
                                        <h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="rel-posts-excerpt"><?php the_excerpt(); ?></div>
                                        <a href="<? the_permalink()?>" rel="bookmark" title="READ MORE">READ MORE</a></h3>
                                    </div>

                                <?
                            }
                            echo '</ul></div>';
                        }
                    }
                    $post = $orig_post;
                    wp_reset_query();
                    //end Related Posts by Category
                    ?>

                    <?php
                    if( comments_open() ){
                        comments_template();
                    } else {
                        echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
                    }

                    ?>

                </article>

            <?php endwhile;

        endif;

        ?>

    </div>

    <div class="col-xs-12 col-sm-4">
        <?php get_sidebar(); ?>
    </div>
    </div>
</div>

<?php get_footer(); ?>