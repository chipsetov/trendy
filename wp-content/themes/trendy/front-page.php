<?php get_header(); ?>

<section id="designing">
    <div class="container">

        <div class="titles">

            <h1>We are</h1>
            <hr/>
            <h1>designing</h1>
            <p>And We Are Doing It Well</p>

        </div>
        <div class="buttonblock">
            <a href="#" class="button"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>

</section>
<section id="about-us">
    <section id="cd-timeline" class="cd-container">
        <!--<div id="ajax-posts" class="row">-->
        <?php
        $postsPerPage = 3;
        $args = array(
            'post_type' => 'history',
            'posts_per_page' => $postsPerPage,
//        'cat' => 18
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()) :
            $loop->the_post();
            ?>


            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2><?php the_title();?></h2>
                    <p><?php the_content(); ?></p>
                    <span class="cd-date">Jan 24</span>
                </div> <!-- cd-timeline-content -->
            </div>



            <!--        <div class="small-12 large-4 columns">-->
            <!--            <h1>--><?php //the_title(); ?><!--</h1>-->
            <!--            <p>--><?php //the_content(); ?><!--</p>-->
            <!--        </div>-->

            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </section>
    <!--</div>-->
    <div class="container loadmore-btn-on-main">
    <div id="more_posts">Load More</div>
    </div>


<section id="ourteam">
    <div class="container">
        <div class="row">
            <?php
            $query = new WP_Query(array('post_type' => 'team_member', 'posts_per_page' => 4, 'orderby' => array('date' => 'DESC')));
            while ($query->have_posts()) {
                echo "<div class=\"col-md-3\">";
                echo '<div class="team-member-person">';
                $query->the_post();
                the_post_thumbnail(array(150, 198));
                echo '<div class="team-member-bio">';
                echo '<div class="team-member-row">';
                $imageContent = get_the_content();
                $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                echo the_title('<span class="team-member-name">', '</span>', true) . " / " . "<span class='team-member-position'>" . $stripped . "</span>";
                echo "</div>";
                $true_baz = get_post_meta($query->post->ID, '_global_notice')[0];

//            if (!empty($true_baz = get_post_meta($query->post->ID, '_global_notice')[0])) {
//                echo $true_baz;
//            }
                echo '<div class="team-member-social">';
                if (!empty($true_baz = get_post_meta($query->post->ID, '_fb')[0])) {
                    echo "<a href=\"$true_baz\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></a>";
                }

                if (!empty($true_baz = get_post_meta($query->post->ID, '_tw')[0])) {
                    echo "<a href=\"$true_baz\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></a>";
                }

                if (!empty($true_baz = get_post_meta($query->post->ID, '_gp')[0])) {
                    echo "<a href=\"$true_baz\"><i class=\"fa fa-google-plus\" aria-hidden=\"true\"></i></a>";
                }

                if (!empty($true_baz = get_post_meta($query->post->ID, '_in')[0])) {
                    echo "<a href=\"$true_baz\"><i class=\"fa fa-linkedin\" aria-hidden=\"true\"></i></a>";
                }

                if (!empty($true_baz = get_post_meta($query->post->ID, '_pin')[0])) {
                    echo "<a href=\"$true_baz\"><i class=\"fa fa-pinterest\" aria-hidden=\"true\"></i></a>";
                }
                echo "</div>";

//var_dump($true_baz);
//            if($true_baz== "_global_notice") {
//                echo "success";
//            } else {
//                //error
//                echo "error";
//            }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

    </div>
</section>
<section class="pricing-table">
    <div class="container">
        <div class="col-md-3">
            <?php echo do_shortcode('[price_basic name="starter" price="15" term="mounth" advantage1="Premium Quality" advantage2="24/7 Support" advantage3="Great Results" advantage4="Happy Clients" advantage5="High Performance" linkname="grab now" href="#"]'); ?>
        </div>
        <div class="col-md-3">
            <?php echo do_shortcode('[price_basic name="starter" price="15" term="mounth" advantage1="Premium Quality" advantage2="24/7 Support" advantage3="Great Results" advantage4="Happy Clients" advantage5="High Performance" linkname="grab now" href="#"]'); ?>
        </div>
        <div class="col-md-3">
            <?php echo do_shortcode('[price_best name="starter" price="15" term="mounth" advantage1="Premium Quality" advantage2="24/7 Support" advantage3="Great Results" advantage4="Happy Clients" advantage5="High Performance" linkname="grab now" href="#"]'); ?>
        </div>
        <div class="col-md-3">
            <?php echo do_shortcode('[price_basic name="starter" price="15" term="mounth" advantage1="Premium Quality" advantage2="24/7 Support" advantage3="Great Results" advantage4="Happy Clients" advantage5="High Performance" linkname="grab now" href="#"]'); ?>
            <?php echo do_shortcode('[testimonials]'); ?>
        </div>
    </div>
</section>

<section class="video-section">
    <video id="video-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
        <source src="<? echo get_template_directory_uri() . "/video/video.mp4" ?>" type="video/mp4">
        Video not supported
    </video>

    <div class="video-overlay">
        <h1>CATCHY SENTANCE
            WITH VIDEO BACKGROUND</h1>

    </div>
</section>
<section id="ourclients">
    <div class="container">
        <div class="rowr">
            <div class="your-class">
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/client-logo-03.jpg"></div>

            </div>
        </div>
    </div>

</section>
<section class="some-cool-facts">
    <div class="container">
        <div class="title">

            <h1>SOME COOL FACTS</h1>
            <p>Duis vitae velit mollis, congue nisi dignissim, pellentesque lorem</p>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="equal-height-container">
                        <div class="first">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="second">
                            <span class="second-a count">120</span>
                            <div class="second-b">HAPPY CLIENTS</div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="equal-height-container">
                        <div class="first">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="second">
                            <span class="second-a count">551</span>
                            <div class="second-b">AWESOME PROJECTS</div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="equal-height-container">
                        <div class="first">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <div class="second">
                            <div class="second-a">
                                <span class="count">95</span>K
                            </div>
                            <div class="second-b">WORKING HOURS</div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="equal-height-container">
                        <div class="first">
                            <i class="fa fa-coffee"></i>
                        </div>
                        <div class="second">
                            <span class="second-a count" id="decimal"></span>
                            <div class="second-b">COFFEES DRINKED</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<section id="contact-us">
    <div class="container">
        <?php echo do_shortcode('[contactus-display-form]'); ?>
    </div>
</section>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.your-class').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            prevArrow: false,
            nextArrow: false,
        });
    });


</script>
<?php get_footer(); ?>
