<?php
function setStyles() {
    /*CSSs*/
    
	//Main Style
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), getThemeVersion() );
	wp_enqueue_style( 'colors-style', get_template_directory_uri() . '/assets/css/colors.min.css', array(), getThemeVersion() );
    
    /*Scripts*/        
    //Main Script
	//wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/dist/js/main.js', array('jquery','swiper'), getThemeVersion(), true );
}

add_action( 'wp_enqueue_scripts', 'setStyles' );


function getThemeVersion(){
	$theme = wp_get_theme();
	return $theme->version;
}