<?php


function my_excerpt_length($length){
    return 35;
}

add_filter('excerpt_length', 'my_excerpt_length', 999);

set_post_thumbnail_size(150, 150);
add_theme_support('post-thumbnails') ;

//register our navigations!
register_nav_menus(array(
'primary' => 'Primary Menu',
'footer' => 'Footer Menu'
));

//Page Slug Body Class
function add_slug_body_class( $classes ){
global $post;
if ( isset($post)){
    $classes[] = $post->post_type . '-' . $post->post_name;
}
    return $classes;
}
add_filter('body_class','add_slug_body_class');


//This will let wordpress know that we are linking to astuteo's jquery!!!

function my_theme_scripts() {
wp_enqueue_script( 'astuteo', get_template_directory_uri() . '/js/astuteo.js', '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );