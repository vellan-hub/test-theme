<?php

//Styles

function theme_styles()
{

}

//Scripts

function theme_scripts()
{
	
	wp_enqueue_style('style', get_stylesheet_uri());
	
}

add_action('wp_default_scripts', 'include_jquery_into_footer');

function include_jquery_into_footer($wp_scripts)
{

	if (is_admin()) {
		return;
	}

	$wp_scripts->add_data('jquery', 'group', 1);
	$wp_scripts->add_data('jquery-core', 'group', 1);
	$wp_scripts->add_data('jquery-migrate', 'group', 1);
}
