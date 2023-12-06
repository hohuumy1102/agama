<?php
function footer_social_widget()
{

    
    $args = array(
        'id' => 'footer_social_widget',
        'name' => __('Footer socials', 'affiliate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        
        'after_widget' => '</div>',
    );
    register_sidebar($args);

}
add_action('widgets_init', 'footer_social_widget');


function footer_company_information_widget()
{

    
    $args = array(
        'id' => 'footer_company_information_widget',
        'name' => __('Footer company information', 'affiliate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        
        'after_widget' => '</div>',
    );
    register_sidebar($args);

}
add_action('widgets_init', 'footer_company_information_widget');