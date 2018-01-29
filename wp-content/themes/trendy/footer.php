<footer>
    <div class="col-xs-12 top_footer">
        <div class="col-xs-12 container footer-head footer_inner">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-5')) ?>
        </div>
        <div class="container wrapper three-block">
            <div class="row">
                <div class="col-xs-12 col-sm-4 menu_info footer_inner">
                    <div class="col-xs-2 footer-icon">
                        <i class="fa fa-phone fa-3" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-10 footer-widget">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-1')) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 contact footer_inner">
                    <div class="col-xs-2 footer-icon">
                        <i class="fa fa-map-marker fa-3" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-10 footer-widget">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-2')) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 twitter footer_inner">
                    <div class="col-xs-2 footer-icon">
                        <i class="fa fa-envelope fa-3" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-10 footer-widget">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-3')) ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="bottom_footer">
        <div class="container">
            <div class="col-xs-12 col-md-6 copyrights">

                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-2-1')) ?>

            </div>
            <div class="col-xs-12 col-md-6 footer_social">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-2-2')) ?>

            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>