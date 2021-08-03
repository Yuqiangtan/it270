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
    'tour'=> 'Tours Menu',
'footer' => 'Footer Menu',
    'hotels' => 'Hotel Menu'
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
add_filter('widget_text','do_shortcode');


//This will let wordpress know that we are linking to astuteo's jquery!!!

function my_theme_scripts() {
wp_enqueue_script( 'astuteo', get_template_directory_uri() . '/js/astuteo.js', '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// the world of widgets!!!
// in order the widget to appear on the dashboard under appearance, it must be registered in function.php

function site1_widgets_init(){
    register_sidebar(
        array(
            'name'=> esc_html__( 'Sidebar Blog', 'site1' ),
            'id' => 'sidebar-blog',
            'description' => esc_html__( 'Our blog widget', 'site1' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' =>'</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )

    );

    register_sidebar(
        array(
            'name'=> esc_html__( 'Sidebar Tours', 'site1' ),
            'id' => 'sidebar-tours',
            'description' => esc_html__( 'Our tours widget', 'site1' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' =>'</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )

    );

    register_sidebar(
        array(
            'name'=> esc_html__( 'Sidebar About', 'site1' ),
            'id' => 'sidebar-about',
            'description' => esc_html__( 'Our about widget', 'site1' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' =>'</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )

    );

    register_sidebar(
        array(
            'name'=> esc_html__( 'Sidebar Buy', 'site1' ),
            'id' => 'sidebar-buy',
            'description' => esc_html__( 'Our about widget', 'site1' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' =>'</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )

    );
    
    register_sidebar(
        array(
            'name'=> esc_html__( 'Sidebar footer content', 'site1' ),
            'id' => 'sidebar-footer-content',
            'description' => esc_html__( 'Our footer content widget', 'site1' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' =>'</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )

    );
    

}
    add_action('widgets_init', 'site1_widgets_init' );


//  Functions to display a list of all the shortcodes
function diwp_get_list_of_shortcodes(){
 
    // Get the array of all the shortcodes
    global $shortcode_tags;
     
    $shortcodes = $shortcode_tags;
     
    // sort the shortcodes with alphabetical order
    ksort($shortcodes);
     
    $shortcode_output = "<ul>";
     
    foreach ($shortcodes as $shortcode => $value) {
        $shortcode_output = $shortcode_output.'<li>['.$shortcode.']</li>';
    }
     
    $shortcode_output = $shortcode_output. "</ul>";
     
    return $shortcode_output;
 
}
add_shortcode('get-shortcode-list', 'diwp_get_list_of_shortcodes');


function covid_disclaimer(){
    return '<small> Before you purchase your tickets, check with everyone that you can think of to make sure that you are good to go, because these tickets are not refundable</small>';
}

add_shortcode('disclaimer', 'covid_disclaimer');

function specials(){
    //adding a switch
    if(isset($_GET['today'])){
        $today = $_GET['today'];
    }else{
        $today = date('l');
    }
    
switch($today){
    case 'Sunday':
        $content = 'Today\'s special takes us to Alaska Glaciers!Let\'s add some information about Glaciers! To learn more about our our Glacier Specials, click <a href="">here</a>';
    break;
        
    case 'Monday':
        $content = 'Today\'s special is Mt Denali!Let\'s add some information about Alaska and Anchorage! To learn more about our Cool Specials, click <a href="">here</a>';
    break;
        
    case 'Tuesday':
        $content = ''.$Today.'\'s special is bring us to another Glacier!Let\'s add some information about Glacier Park! To learn more about our Montana Specials, click <a href="">here</a>';
    break;
        
    case 'Wednesday':
        $content = 'Today\'s special is good old yellowstone!Let\'s add some information about Yellowstone! To learn more about our Yellowstone Specials, click <a href="">here</a>';
    break;
    
    case 'Thursday':
        $content = 'Today\'s special is good old yellowstone!Let\'s add some information about Yellowstone! To learn more about our Yellowstone Specials, click <a href="">here</a>';
    break;
    
    case 'Friday':
        $content = 'Today\'s special is good New York City!Let\'s add some information about Metropolitan Opera! To learn more about our New York City Specials, click <a href="">here</a>';
    break;
}
    return $content;
}

add_shortcode('today_specials','specials');

function today_date(){
    return date("l\, F jS Y ");
}

add_shortcode('current_date', 'today_date');

function year(){
    return date('Y');
}

add_shortcode('current_year', 'year');

remove_filter('the_content','wpautop');