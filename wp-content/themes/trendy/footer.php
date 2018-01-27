<footer>
    <div class="top_footer">
        <div class="container twitterr footer_inner">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-5')) ?>
        </div>
        <div class="container wrapper">
            <div class="row">
            <div class="col-xs-12 col-sm-4 menu_info footer_inner">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-1')) ?>
            </div>
            <div class="col-xs-12 col-sm-4 contact footer_inner">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-2')) ?>
            </div>
            <div class="col-xs-12 col-sm-4 twitter footer_inner">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-f-3')) ?>
            </div>
            </div>
        </div>

    </div>

    <div class="bottom_footer">
        <div class="wrapper">
            <div class="copyrights">

                &copy; <?php _e('2016 All Rights Reserved “Iglesia” ', 'aletheme') ?>

            </div>
            <div class="footer_social">
                bchgfhfh

            </div>
        </div>
    </div>
</footer>
<div class="row">
    <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
    <div class="col-sm-4" style="background-color:lavenderblush;">.col-sm-4</div>
    <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
</div>
<?php wp_footer(); ?>
</body>
</html>