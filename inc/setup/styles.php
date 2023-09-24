<?php
function setStyles() {
    /*CSSs*/
    
	//Main Style
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/css/style.css', array(), getThemeVersion() );
    
    /*Scripts*/        
    //Main Script
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/dist/main.min.js', array(), getThemeVersion(), true );
}

add_action( 'wp_enqueue_scripts', 'setStyles' );


function getThemeVersion(){
	$theme = wp_get_theme();
	return $theme->version;
}