<?php

// Contact Form

//remove p and br from Contact Form
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/(size|rows|cols)="\d+"/i', '', $content);
	return $content;
});