<?php

//Slider Custom register function
function thenobility_theme_custom_post()
{
    
    //Thenobility Main Slider
    register_post_type('thenobility-slide', array(
        'label' => 'slides',
        'labels' => array(
            'name' => 'Slides',
            'singular_name' => 'slide'
        ),
        'public' => false,
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
    //Testimonials Custom Post Slider
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