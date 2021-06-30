<?php

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= $_SERVER["REQUEST_URI"];
  return $url; 
}

//------------------menu---------------------------------
function register_my_menus() {
register_nav_menus(array( 'header-menu' => __( 'Header Menu' )));
}

add_action( 'init', 'register_my_menus' );


//----------------thumbnails-----------------------------
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 260, 246 );
add_image_size( 'single-post', 260, 246 ); 
add_image_size( 'news', 80, 80 ); 

function sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Sidebar', 'poofpoof' ),
            'id' => 'sidebar',
            'description' => __( 'Sidebar', 'poofpoof' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'sidebar' );


?>