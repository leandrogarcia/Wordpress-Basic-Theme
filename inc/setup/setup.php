<?php
function setupTheme(){

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

    // Menu
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary menu', 'wordpress-basic-theme' ),
	) );
}

add_action( 'after_setup_theme', 'setupTheme' );
?>