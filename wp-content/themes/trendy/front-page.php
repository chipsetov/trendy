<?php get_header(); ?>



<div class="video-section">
    <video id="video-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
        <source src="<? echo get_template_directory_uri() . "/video/video.mp4" ?>" type="video/mp4">
        Video not supported
    </video>

    <div class="video-overlay">
        <h1>This Is A Video Overlay</h1>
    </div>
</div>


<div id="contact-us">

</div>

<?php get_footer(); ?>
