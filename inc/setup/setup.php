<?php
function setupTheme(){

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_image_size( 'card-news', 400, 300, true );

    // Menu
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary menu', 'wordpress-basic-theme' ),
	) );
}

add_action( 'after_setup_theme', 'setupTheme' );


function WBTsidebars(){

    register_sidebar(
        array(
            'name' => 'Footer 1',
            'id' => 'footer-1',
            'description' => '',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );

	register_sidebar(
        array(
            'name' => 'Footer 2',
            'id' => 'footer-2',
            'description' => '',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
    
}

add_action( 'widgets_init', 'WBTsidebars', 11 );



function mytheme_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'mytheme_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'mytheme_customize_partial_blogdescription',
            )
        );
    }

    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Logo footer',
        'section' => 'title_tagline', 
        'settings' => 'footer_logo',
        'priority' => 8 
    )));
}
add_action( 'customize_register', 'mytheme_customize_register' );

?>