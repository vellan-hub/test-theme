<?php

//Actions

//Scripts & Styles in Head
add_action('wp_enqueue_scripts', 'theme_styles');
//Scripts & Styles in Footer
add_action('wp_footer', 'theme_scripts');
//Register Menus
add_action('after_setup_theme', 'theme_register_nav_menu');
//Theme Advanced Features
add_action('after_setup_theme', 'theme_advanced_features');

//Include theme files
include(get_template_directory() . '/inc/theme-files.php');
include(get_template_directory() . '/inc/theme-menus.php');
include(get_template_directory() . '/inc/theme-advanced-features.php');
include(get_template_directory() . '/inc/theme-plugins.php');
include(get_template_directory() . '/inc/blocks.php');

//forms

add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');

function delete_intermediate_image_sizes($sizes)
{
  return array_diff($sizes, [
    'medium_large',
    'medium',
    'large',
    'woocommerce_thumbnail',
    '1536x1536',
    '2048x2048',
  ]);
}
