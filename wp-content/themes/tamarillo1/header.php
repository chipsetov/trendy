<!doctype html>
<html>
<head>
    <title><?php wp_get_document_title();?></title>
    <?php wp_head();?>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 col-sm-6">
<!--                <a href="#" id="templatemo_logo"><img src="images/templatemo_logo_2.png" alt="tamarillo"></a>-->
                <div id="templatemo_logo">
                <?php echo the_custom_logo(); ?>
                </div>
            </div>
            <div class="col-md-3 hidden-xs"></div>
            <div class="col-xs-3 col-xs-offset-20 visible-xs">
                <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-align-justify"></span></a>
            </div>
            <div class="col-xs-24 visible-xs" id="mobile_menu_list">
              <?php  wp_nav_menu( array(
                'theme_location'  => '',
                'menu'            => 'primary',
                'container'       => 'div',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="glyphicon glyphicon-align-justify">%3$s</ul>',
                'depth'           => 0,
                'walker'          => '',
                ) );
?>
            </div>
            <div class="col-md-16 col-sm-18 hidden-xs" id="templatemo-nav-bar">
                <?php  wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'primary',
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="nav navbar-right">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ) );
                ?>
            </div>
        </div>
    </div>
</header><!-- end of templatemo_header -->