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
            echo the_title('<span class="team-member-name">','</span>', true) . " / " . "<span class='team-member-position'>" . $stripped . "</span>" ;
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


<div id="contact-us">

</div>

<?php get_footer(); ?>
