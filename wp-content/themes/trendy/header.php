<!doctype html>
<html>
<head>
    
    <meta charset="utf-8">
    <title><?php echo wp_get_document_title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

</head>

<body>
<?php //echo print_menu(build_tree_menu(wp_get_nav_menu_items(2)));?>
<?php //wp_nav_menu(array('theme_location'=>'primary')); ?>

<!-- header -->
<header>
    <div class="container-fluid">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
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
    </div>
</header>




