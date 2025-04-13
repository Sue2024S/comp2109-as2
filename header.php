<!doctype html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <!-- add JS -->
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha"></script> -->
        <!-- add custom CSS file -->
         <link rel="stylesheet" href="<?php echo esc_url( home_url('wp-content/themes/customtheme-as2/css/as2-style.css')); ?>">
        <!-- add custom font  -->
    </head>

    <body <?php body_class(); ?>>
    <header class="default-header">
        <div class="logo">
            <a href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo esc_url(home_url('wp-content/uploads/2025/as2/logo.png'))?>" alt="header logo">
            </a>
        </div>
        <nav>
            <?php 
                wp_nav_menu(array(
                    'menu'           => 'main',
                    'theme_location' => '',
                    'depth'          => 2,                           
                    'fallback_cb'    => false
                )); 
            ?>
        </nav>
    </header>