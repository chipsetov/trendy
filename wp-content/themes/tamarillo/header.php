<!DOCTYPE html>
<html>
<head>
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <h3>LOGO</h3>
                    </a>
                </div>
                <?php
                wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker())
                );
                ?>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-5 col-md-push-1 col-sm-6">
                <a href="" id="templatemo_logo">
               <?php $logo_img = '';
               if( $custom_logo_id = get_theme_mod('custom_logo') ){
                   $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                       'class'    => 'custom-logo',
                       'itemprop' => 'logo',
                   ) );
               }
               echo $logo_img;
               ?>
                </a>
            </div>
            <div class="col-md-3 hidden-xs"></div>
            <div class="col-xs-3 col-xs-offset-20 visible-xs">
                <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-align-justify"></span></a>
            </div>

           <!-- <div class="col-xs-24 visible-xs" id="mobile_menu_list">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'primary',
                    'menu_class'      => 'menu',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ) );
                ?>
            </div>
            <div class="col-md-16 col-sm-18 hidden-xs" id="templatemo-nav-bar">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'primary',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s nav navbar-right">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ) );
                ?>
            </div>-->


        </div>
    </div>
</header><!-- end of templatemo_header -->
