<?php get_header(); ?>


<!-- Load page -->
<div class="animationload">
    <div class="loader">
    </div>
</div>
<!-- End load page -->

<!-- Content Wrapper -->
<div id="wrapper">
    <div class="container">
        <!-- Switcher -->
        <div class="switcher">
            <input id="sw" type="checkbox" class="switcher-value">
            <label for="sw" class="sw_btn"></label>
            <div class="bg"></div>
            <div class="text"><span class="text-l">On</span><span class="text-d">Off</span><br />light</div>
        </div>
        <!-- End Switcher -->

        <!-- Dark version -->
        <div id="dark" class="row text-center">
            <div class="info">
                <img src="<? echo get_template_directory_uri() . "/images/404.png" ?>" alt="404 error" />
            </div>
        </div>
        <!-- End Dark version -->

        <!-- Light version -->
        <div id="light" class="row text-center">
            <!-- Info -->
            <div class="info">

                <img src="<? echo get_template_directory_uri() . "/images/404.gif" ?>" alt="404 error" />

                <h4>The page you are looking for was moved, removed,
                    renamed or never existed.</h4>
                <a href="/" class="btn">Home</a>
                <a href="/contact" class="btn btn-brown">Contact</a>
            </div>
            <!-- end Info -->
        </div>
        <!-- End Light version -->

    </div>
    <!-- end container -->
</div>
<!-- end Content Wrapper -->

<?php get_footer(); ?>
