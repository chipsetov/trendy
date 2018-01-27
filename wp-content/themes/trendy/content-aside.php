<div class="thumb-post-img"><?php the_post_thumbnail('spec_thumb_post'); ?></div>
<div class="post-title-blog-post"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
<?php echo get_the_author(); ?></p>
<?php the_category(); ?>
<?php
$comments_count = wp_count_comments( get_the_ID() );
echo $comments_count->approved . " comments";
?>
<small>Posted on: <?php the_time('d M'); ?></small>
<?php the_excerpt(); ?>
<div class="post-read-more-blog-post"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">READ MORE</a></div>
<hr>