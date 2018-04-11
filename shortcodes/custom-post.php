<?php

//Slider Custom register function
function thenobility_theme_custom_post()
{
 
    //Testimonials Custom Post
    register_post_type('testi-slider', array(
        'label' => 'testi',
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'testimonial'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-images-alt',
        'show_ui' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'excerpt'
        )
    ));
    
}
add_action('init', 'thenobility_theme_custom_post');