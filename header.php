<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="masthead" class="site-header">
    <div class="container">
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <!-- Menu Toggle Button for Mobile -->
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="menu-line"></span>
            <span class="menu-line"></span>
            <span class="menu-line"></span>
        </button>
        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container_class' => 'primary-menu-container',
                'menu_class'     => 'primary-menu-class',
            ));
            ?>
        </nav>
    </div>
</header><!-- #masthead -->

<div id="content" class="site-content">
