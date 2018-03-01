<?php get_header(); ?>
<?php
if (has_post_format('video')) { ?>
    <div class="row">
        <div class="container">

            <div class="col-xs-12 col-sm-8">

                <?php

                if (have_posts()):

                    while (have_posts()): the_post(); ?>

                        <div class="col-sm-2 left-dates"><img
                                    src="<? echo get_template_directory_uri() . "/images/category-icon-standard.png" ?>"
                                    alt="category-icon-standard.png">
                            <div class="post-date-number"><?php the_time('d'); ?></div>
                            <div class="post-date-mounth"><?php the_time('M'); ?></div>
                        </div>
                        <div class="col-sm-10 standard-post">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                <?php the_title(sprintf('<h1 class="post-title-standard"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>

                                <div class="post-metadata-standard">
                                    <i class="fa fa-user"
                                       aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                                    <i class="fa fa-folder-open"
                                       aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                                    <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                                        $comments_count = wp_count_comments(get_the_ID());
                                        echo $comments_count->approved . " comments";
                                        ?>  </i>
                                </div>

                                <div class="single-post-excerpt"><?php the_excerpt(); ?></div>
                                <div class="social-share">
                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=box_count&size=small&mobile_iframe=true&width=59&height=40&appId"
                                            width="94" height="40" style="border:none;overflow:hidden" scrolling="no"
                                            frameborder="0" allowTransparency="true"></iframe>
                                </div>
                                <div class="content-of-article">

                                    <?php the_content(); ?>
                                </div>
                                <div class="content-tags">
                                    <i class="fa fa-tags" aria-hidden="true"> <?php the_tags('', ' ', $after); ?></i>

                                </div>

                                <div class="about-author">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 140); ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 author-metadata">
                                            <div class="about-author-title">
                                                <?php echo 'about ' . get_the_author(); ?>
                                            </div>
                                            <div class="author-description">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 social-description">
                                                    <a href="<?php echo get_the_author_meta('facebook_profile'); ?>"><i
                                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('twitter_profile'); ?>"><i
                                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('google_profile'); ?>"><i
                                                                class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('linkedin_profile'); ?>/"><i
                                                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('pinterest_profile'); ?>"><i
                                                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                </div>


                                                <div class="col-sm-6 all-author-posts">
                                                    <?php echo get_the_author_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rpbycat">
                                    <?php
                                    //Related Posts by Category
                                    $orig_post = $post;
                                    global $post;
                                    $categories = get_the_category($post->ID);
                                    if ($categories) {
                                        $category_ids = array();
                                        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                        $args = array(
                                            'category__in' => $category_ids,
                                            'post__not_in' => array($post->ID),
                                            'posts_per_page' => 2, // Number of related posts that will be shown.
                                            'caller_get_posts' => 1
                                        );

                                        $my_query = new wp_query($args);
                                        if ($my_query->have_posts()) {
                                            echo '<div id="related_posts"><h3>Related Posts</h3>';
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post(); ?>

                                                <!--                                            <div class="relatedthumb"><a href="--><?// the_permalink() ?><!--" rel="bookmark"-->
                                                <!--                                                                         title="--><?php //the_title(); ?><!--">--><?php //the_title(); ?><!--</a>-->
                                                <!--                                            </div>-->
                                                <div class="col-xs-12 col-sm-6 relatedcontent">
                                                    <div class="relatedimage"><?php the_post_thumbnail('spec_thumb_rel_post'); ?></div>
                                                    <h4><a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="rel-posts-excerpt"><?php the_excerpt(); ?></div>
                                                    <div class="read-more-rel-post">
                                                        <a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="READ MORE">READ
                                                            MORE</a></h3></div>
                                                </div>

                                                <?
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    $post = $orig_post;
                                    wp_reset_query();
                                    //end Related Posts by Category
                                    ?>
                                </div>
                                <?php
                                if (comments_open()) {
                                    comments_template();
                                } else {
                                    echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
                                }

                                ?>

                            </article>
                        </div>

                    <?php endwhile;

                endif;

                ?>

            </div>

            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (has_post_format('quote')) { ?>
    <div class="row">
        <div class="container">

            <div class="col-xs-12 col-sm-8">

                <?php

                if (have_posts()):

                    while (have_posts()): the_post(); ?>
                        <?php if (has_post_thumbnail()): ?>


                            <div class="post-thumbnail"><?php the_post_thumbnail('spec_thumb_post', ['class' => 'img-responsive']); ?></div>

                        <?php endif; ?>


                        <div class="col-sm-2 left-dates"><img
                                    src="<? echo get_template_directory_uri() . "/images/category-icon-standard.png" ?>"
                                    alt="category-icon-standard.png">
                            <div class="post-date-number"><?php the_time('d'); ?></div>
                            <div class="post-date-mounth"><?php the_time('M'); ?></div>
                        </div>
                        <div class="col-sm-10 standard-post">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                <?php the_title(sprintf('<h1 class="post-title-standard"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>

                                <div class="post-metadata-standard">
                                    <i class="fa fa-user"
                                       aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                                    <i class="fa fa-folder-open"
                                       aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                                    <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                                        $comments_count = wp_count_comments(get_the_ID());
                                        echo $comments_count->approved . " comments";
                                        ?>  </i>
                                </div>


                                <div class="content-of-article">

                                    <div class="quote-post-border">
                                        <div class="post-content-quote"><?php the_content(); ?></div>
                                        <?php the_title(sprintf('<h1 class="post-title-quote"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
                                    </div>
                                </div>

                                <div class="content-tags">
                                    <i class="fa fa-tags" aria-hidden="true"> <?php the_tags('', ' ', $after); ?></i>

                                </div>

                                <div class="social-share">
                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=box_count&size=small&mobile_iframe=true&width=59&height=40&appId"
                                            width="94" height="40" style="border:none;overflow:hidden" scrolling="no"
                                            frameborder="0" allowTransparency="true"></iframe>
                                </div>

                                <div class="about-author">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 140); ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 author-metadata">
                                            <div class="about-author-title">
                                                <?php echo 'about ' . get_the_author(); ?>
                                            </div>
                                            <div class="author-description">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 social-description">
                                                    <a href="<?php echo get_the_author_meta('facebook_profile'); ?>"><i
                                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('twitter_profile'); ?>"><i
                                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('google_profile'); ?>"><i
                                                                class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('linkedin_profile'); ?>/"><i
                                                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('pinterest_profile'); ?>"><i
                                                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                </div>


                                                <div class="col-sm-6 all-author-posts">
                                                    <?php echo get_the_author_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rpbycat">
                                    <?php
                                    //Related Posts by Category
                                    $orig_post = $post;
                                    global $post;
                                    $categories = get_the_category($post->ID);
                                    if ($categories) {
                                        $category_ids = array();
                                        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                        $args = array(
                                            'category__in' => $category_ids,
                                            'post__not_in' => array($post->ID),
                                            'posts_per_page' => 2, // Number of related posts that will be shown.
                                            'caller_get_posts' => 1
                                        );

                                        $my_query = new wp_query($args);
                                        if ($my_query->have_posts()) {
                                            echo '<div id="related_posts"><h3>Related Posts</h3>';
                                            echo '<div id="related_posts_inner">';
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post(); ?>

                                                <!--                                            <div class="relatedthumb"><a href="--><?// the_permalink() ?><!--" rel="bookmark"-->
                                                <!--                                                                         title="--><?php //the_title(); ?><!--">--><?php //the_title(); ?><!--</a>-->
                                                <!--                                            </div>-->
                                                <div class="col-xs-12 col-sm-6 relatedcontent">
                                                    <div class="relatedimage"><?php the_post_thumbnail('spec_thumb_rel_post'); ?></div>
                                                    <h4><a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="rel-posts-excerpt"><?php the_excerpt(); ?></div>
                                                    <div class="read-more-rel-post">
                                                        <a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="READ MORE">READ
                                                            MORE</a></h3></div>
                                                </div>

                                                <?
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    }
                                    $post = $orig_post;
                                    wp_reset_query();
                                    //end Related Posts by Category
                                    ?>
                                </div>
                                <?php
                                if (comments_open()) {
                                    comments_template();
                                } else {
                                    echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
                                }

                                ?>

                            </article>
                        </div>

                    <?php endwhile;

                endif;

                ?>

            </div>

            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (has_post_format('image')) { ?>
    <div class="row">
        <div class="container">

            <div class="col-xs-12 col-sm-8">

                <?php

                if (have_posts()):

                    while (have_posts()): the_post(); ?>
                        <?php if (has_post_thumbnail()): ?>


                            <div class="post-thumbnail"><?php the_post_thumbnail('spec_thumb_post', ['class' => 'img-responsive']); ?></div>

                        <?php endif; ?>


                        <div class="col-sm-2 left-dates"><img
                                    src="<? echo get_template_directory_uri() . "/images/category-icon-standard.png" ?>"
                                    alt="category-icon-standard.png">
                            <div class="post-date-number"><?php the_time('d'); ?></div>
                            <div class="post-date-mounth"><?php the_time('M'); ?></div>
                        </div>
                        <div class="col-sm-10 standard-post">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                <?php the_title(sprintf('<h1 class="post-title-standard"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>

                                <div class="post-metadata-standard">
                                    <i class="fa fa-user"
                                       aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                                    <i class="fa fa-folder-open"
                                       aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                                    <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                                        $comments_count = wp_count_comments(get_the_ID());
                                        echo $comments_count->approved . " comments";
                                        ?>  </i>
                                </div>


                                <div class="content-of-article">

                                    <div class="thumbnail-img"><?php the_post_thumbnail('large', ['class' => 'img-responsive']); ?></div>
                                </div>

                                <div class="content-tags">
                                    <i class="fa fa-tags" aria-hidden="true"> <?php the_tags('', ' ', $after); ?></i>

                                </div>

                                <div class="social-share">
                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=box_count&size=small&mobile_iframe=true&width=59&height=40&appId"
                                            width="94" height="40" style="border:none;overflow:hidden" scrolling="no"
                                            frameborder="0" allowTransparency="true"></iframe>
                                </div>

                                <div class="about-author">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 140); ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 author-metadata">
                                            <div class="about-author-title">
                                                <?php echo 'about ' . get_the_author(); ?>
                                            </div>
                                            <div class="author-description">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 social-description">
                                                    <a href="<?php echo get_the_author_meta('facebook_profile'); ?>"><i
                                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('twitter_profile'); ?>"><i
                                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('google_profile'); ?>"><i
                                                                class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('linkedin_profile'); ?>/"><i
                                                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('pinterest_profile'); ?>"><i
                                                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                </div>


                                                <div class="col-sm-6 all-author-posts">
                                                    <?php echo get_the_author_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rpbycat">
                                    <?php
                                    //Related Posts by Category
                                    $orig_post = $post;
                                    global $post;
                                    $categories = get_the_category($post->ID);
                                    if ($categories) {
                                        $category_ids = array();
                                        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                        $args = array(
                                            'category__in' => $category_ids,
                                            'post__not_in' => array($post->ID),
                                            'posts_per_page' => 2, // Number of related posts that will be shown.
                                            'caller_get_posts' => 1
                                        );

                                        $my_query = new wp_query($args);
                                        if ($my_query->have_posts()) {
                                            echo '<div id="related_posts"><h3>Related Posts</h3>';
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post(); ?>

                                                <!--                                            <div class="relatedthumb"><a href="--><?// the_permalink() ?><!--" rel="bookmark"-->
                                                <!--                                                                         title="--><?php //the_title(); ?><!--">--><?php //the_title(); ?><!--</a>-->
                                                <!--                                            </div>-->
                                                <div class="col-xs-12 col-sm-6 relatedcontent">
                                                    <div class="relatedimage"><?php the_post_thumbnail('spec_thumb_rel_post'); ?></div>
                                                    <h4><a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="rel-posts-excerpt"><?php the_excerpt(); ?></div>
                                                    <div class="read-more-rel-post">
                                                        <a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="READ MORE">READ
                                                            MORE</a></h3></div>
                                                </div>

                                                <?
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    $post = $orig_post;
                                    wp_reset_query();
                                    //end Related Posts by Category
                                    ?>
                                </div>
                                <?php
                                if (comments_open()) {
                                    comments_template();
                                } else {
                                    echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
                                }

                                ?>

                            </article>
                        </div>

                    <?php endwhile;

                endif;

                ?>

            </div>

            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (has_post_format('audio')) { ?>
    <div class="row">
        <div class="container">

            <div class="col-xs-12 col-sm-8">

                <?php

                if (have_posts()):

                    while (have_posts()): the_post(); ?>
                        <?php if (has_post_thumbnail()): ?>


                        <?php endif; ?>


                        <div class="col-sm-2 left-dates"><img
                                    src="<? echo get_template_directory_uri() . "/images/category-icon-standard.png" ?>"
                                    alt="category-icon-standard.png">
                            <div class="post-date-number"><?php the_time('d'); ?></div>
                            <div class="post-date-mounth"><?php the_time('M'); ?></div>
                        </div>
                        <div class="col-sm-10 standard-post">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                <?php the_title(sprintf('<h1 class="post-title-standard"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>

                                <div class="post-metadata-standard">
                                    <i class="fa fa-user"
                                       aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                                    <i class="fa fa-folder-open"
                                       aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                                    <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                                        $comments_count = wp_count_comments(get_the_ID());
                                        echo $comments_count->approved . " comments";
                                        ?>  </i>
                                </div>


                                <div class="content-of-article">

                                    <?php the_content(); ?>
                                </div>

                                <div class="content-tags">
                                    <i class="fa fa-tags" aria-hidden="true"> <?php the_tags('', ' ', $after); ?></i>

                                </div>

                                <div class="social-share">
                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=box_count&size=small&mobile_iframe=true&width=59&height=40&appId"
                                            width="94" height="40" style="border:none;overflow:hidden" scrolling="no"
                                            frameborder="0" allowTransparency="true"></iframe>
                                </div>

                                <div class="about-author">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 140); ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 author-metadata">
                                            <div class="about-author-title">
                                                <?php echo 'about ' . get_the_author(); ?>
                                            </div>
                                            <div class="author-description">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 social-description">
                                                    <a href="<?php echo get_the_author_meta('facebook_profile'); ?>"><i
                                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('twitter_profile'); ?>"><i
                                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('google_profile'); ?>"><i
                                                                class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('linkedin_profile'); ?>/"><i
                                                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('pinterest_profile'); ?>"><i
                                                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                </div>


                                                <div class="col-sm-6 all-author-posts">
                                                    <?php echo get_the_author_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rpbycat">
                                    <?php
                                    //Related Posts by Category
                                    $orig_post = $post;
                                    global $post;
                                    $categories = get_the_category($post->ID);
                                    if ($categories) {
                                        $category_ids = array();
                                        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                        $args = array(
                                            'category__in' => $category_ids,
                                            'post__not_in' => array($post->ID),
                                            'posts_per_page' => 2, // Number of related posts that will be shown.
                                            'caller_get_posts' => 1
                                        );

                                        $my_query = new wp_query($args);
                                        if ($my_query->have_posts()) {
                                            echo '<div id="related_posts"><h3>Related Posts</h3>';
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post(); ?>

                                                <!--                                            <div class="relatedthumb"><a href="--><?// the_permalink() ?><!--" rel="bookmark"-->
                                                <!--                                                                         title="--><?php //the_title(); ?><!--">--><?php //the_title(); ?><!--</a>-->
                                                <!--                                            </div>-->
                                                <div class="col-xs-12 col-sm-6 relatedcontent">
                                                    <div class="relatedimage"><?php the_post_thumbnail('spec_thumb_rel_post'); ?></div>
                                                    <h4><a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="rel-posts-excerpt"><?php the_excerpt(); ?></div>
                                                    <div class="read-more-rel-post">
                                                        <a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="READ MORE">READ
                                                            MORE</a></h3></div>
                                                </div>

                                                <?
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    $post = $orig_post;
                                    wp_reset_query();
                                    //end Related Posts by Category
                                    ?>
                                </div>
                                <?php
                                if (comments_open()) {
                                    comments_template();
                                } else {
                                    echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
                                }

                                ?>

                            </article>
                        </div>

                    <?php endwhile;

                endif;

                ?>

            </div>

            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (has_post_format('aside')) { ?>
    <div class="row">
        <div class="container">

            <div class="col-xs-12 col-sm-8">

                <?php

                if (have_posts()):

                    while (have_posts()): the_post(); ?>
                        <?php if (has_post_thumbnail()): ?>


                            <div class="post-thumbnail"><?php the_post_thumbnail('spec_thumb_post', ['class' => 'img-responsive']); ?></div>

                        <?php endif; ?>


                        <div class="col-sm-2 left-dates"><img
                                    src="<? echo get_template_directory_uri() . "/images/category-icon-standard.png" ?>"
                                    alt="category-icon-standard.png">
                            <div class="post-date-number"><?php the_time('d'); ?></div>
                            <div class="post-date-mounth"><?php the_time('M'); ?></div>
                        </div>
                        <div class="col-sm-10 standard-post">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                <?php the_title(sprintf('<h1 class="post-title-standard"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>

                                <div class="post-metadata-standard">
                                    <i class="fa fa-user"
                                       aria-hidden="true">&nbsp;<?php echo get_the_author(); ?></p></i>
                                    <i class="fa fa-folder-open"
                                       aria-hidden="true">&nbsp;<?php the_category(', '); ?></i>
                                    <i class="fa fa-comment" aria-hidden="true">&nbsp;<?php
                                        $comments_count = wp_count_comments(get_the_ID());
                                        echo $comments_count->approved . " comments";
                                        ?>  </i>
                                </div>

                                <div class="single-post-excerpt"><?php the_excerpt(); ?></div>
                                <div class="social-share">
                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=box_count&size=small&mobile_iframe=true&width=59&height=40&appId"
                                            width="94" height="40" style="border:none;overflow:hidden" scrolling="no"
                                            frameborder="0" allowTransparency="true"></iframe>
                                </div>
                                <div class="content-of-article">

                                    <?php the_content(); ?>
                                </div>
                                <div class="content-tags">
                                    <i class="fa fa-tags" aria-hidden="true"> <?php the_tags('', ' ', $after); ?></i>

                                </div>

                                <div class="about-author">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 140); ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 author-metadata">
                                            <div class="about-author-title">
                                                <?php echo 'about ' . get_the_author(); ?>
                                            </div>
                                            <div class="author-description">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 social-description">
                                                    <a href="<?php echo get_the_author_meta('facebook_profile'); ?>"><i
                                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('twitter_profile'); ?>"><i
                                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('google_profile'); ?>"><i
                                                                class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('linkedin_profile'); ?>/"><i
                                                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                    <a href="<?php echo get_the_author_meta('pinterest_profile'); ?>"><i
                                                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                </div>


                                                <div class="col-sm-6 all-author-posts">
                                                    <?php echo get_the_author_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rpbycat">
                                    <?php
                                    //Related Posts by Category
                                    $orig_post = $post;
                                    global $post;
                                    $categories = get_the_category($post->ID);
                                    if ($categories) {
                                        $category_ids = array();
                                        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                        $args = array(
                                            'category__in' => $category_ids,
                                            'post__not_in' => array($post->ID),
                                            'posts_per_page' => 2, // Number of related posts that will be shown.
                                            'caller_get_posts' => 1
                                        );

                                        $my_query = new wp_query($args);
                                        if ($my_query->have_posts()) {
                                            echo '<div id="related_posts"><h3>Related Posts</h3>';
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post(); ?>

                                                <!--                                            <div class="relatedthumb"><a href="--><?// the_permalink() ?><!--" rel="bookmark"-->
                                                <!--                                                                         title="--><?php //the_title(); ?><!--">--><?php //the_title(); ?><!--</a>-->
                                                <!--                                            </div>-->
                                                <div class="col-xs-12 col-sm-6 relatedcontent">
                                                    <div class="relatedimage"><?php the_post_thumbnail('spec_thumb_rel_post'); ?></div>
                                                    <h4><a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="rel-posts-excerpt"><?php the_excerpt(); ?></div>
                                                    <div class="read-more-rel-post">
                                                        <a href="<? the_permalink() ?>" rel="bookmark"
                                                           title="READ MORE">READ
                                                            MORE</a></h3></div>
                                                </div>

                                                <?
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    $post = $orig_post;
                                    wp_reset_query();
                                    //end Related Posts by Category
                                    ?>
                                </div>
                                <?php
                                if (comments_open()) {
                                    comments_template();
                                } else {
                                    echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
                                }

                                ?>

                            </article>
                        </div>

                    <?php endwhile;

                endif;

                ?>

            </div>

            <div class="col-xs-12 col-sm-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>