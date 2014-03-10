<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            <?php wp_title(''); ?>
        </title>
        
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/cutback.css">
        
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); bg_image($post_id); ?>>
        
        <div id="fb-root"></div>
        
        <div id="wrapper" class="wrapper">
            
            <div id="main">
            
            <div id="header">
                <div id="logo">
                       <a href="<?php bloginfo('siteurl'); ?>" title="Home"><span class="offscreen">Return to Home</span></a>
                </div>
                <div id="tagline">
                        <p><?php echo get_tagline($post_id); ?></p>
                </div>
            </div>
            
            <?php
                wp_nav_menu(array('menu' => 'Main Menu', 'container' => 'nav','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'.nav_social()));
            ?>
            
            <?php
            if(is_front_page() || is_page('watch') || is_page('stories')) {
               ?>
               <h1 class="offscreen"><?php echo the_title(); ?></h1>
               <?php 
            }
            ?>
            
            