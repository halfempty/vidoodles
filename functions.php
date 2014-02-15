<?php

function enqueue_theme_scripts() {

    $themeStyle = get_bloginfo('stylesheet_directory') . '/style.css';
    wp_register_style('themeStyle',$themeStyle);
    wp_enqueue_style( 'themeStyle');

	wp_enqueue_script( 'jquery');

	// Media Element
    $mediaelementjs = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelement-and-player.min.js';
	wp_register_script('mediaelementjs',$mediaelementjs);
	wp_enqueue_script( 'mediaelementjs',array('jquery'));

    $mediaStyle = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelementplayer.css';
    wp_register_style('mediaStyle',$mediaStyle);
   wp_enqueue_style( 'mediaStyle');

	// Theme JS
    $onoderajs = get_bloginfo('stylesheet_directory') . '/js/vidoodles.js';
	wp_register_script('onoderajs',$onoderajs);
	wp_enqueue_script( 'onoderajs',array('jquery','mediaelementjs'));

}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');



function get_ID_by_slug($page_slug) {

	global $wpdb;

	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;

}



?>