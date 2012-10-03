<?php
function my_js()
{
	//jquery desde google cdn
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1', true);

	//scripts del footer
	wp_enqueue_script('plugins', get_bloginfo('template_directory').'/js/plugins.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_bloginfo('template_directory').'/js/main.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'my_js');
