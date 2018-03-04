<?php get_header(); ?>

<section id="designing">
    <div class="container">

        <div class="titles">

            <h1>We are</h1>
            <hr />
            <h1>designing</h1>
            <p>And We Are Doing It Well</p>

        </div>
        <div class="buttonblock">
        <a href="#" class="button"><i class="fa fa-angle-down"></i></a>
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
