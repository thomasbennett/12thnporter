<?php

automatic_feed_links();

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 135, 9999, true ); // Normal post thumbnails
    add_image_size( 'front-page-flyer', 135, 9999 ); // Permalink thumbnail size
