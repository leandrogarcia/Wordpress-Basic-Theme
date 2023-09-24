<?php

add_action( 'customize_register', 'WBT_customize_contatos' );
function WBT_customize_contatos( $wp_customize ) {
    //Contatos
    $wp_customize->add_section( 'wbt_contatos' , array(
        'title'      => 'Contatos'
    ));

    //Telefone
    $wp_customize->add_setting( 'wbt_contatos_telefone' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_telefone', array(
        'label' => 'Telefone',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_telefone',
        'type' => 'text'
    ));

    //email
    $wp_customize->add_setting( 'wbt_contatos_email' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_email', array(
        'label' => 'E-mail',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_email',
        'type' => 'text'
    ));

    //Instagram
    $wp_customize->add_setting( 'wbt_contatos_instagram' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_instagram', array(
        'label' => 'Instagram',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_instagram',
        'type' => 'text'
    ));

    //Facebook
    $wp_customize->add_setting( 'wbt_contatos_facebook' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_facebook', array(
        'label' => 'Facebook',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_facebook',
        'type' => 'text'
    ));

    //Twitter
    $wp_customize->add_setting( 'wbt_contatos_twitter' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_twitter', array(
        'label' => 'Twitter',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_twitter',
        'type' => 'text'
    ));

    //Youtube
    $wp_customize->add_setting( 'wbt_contatos_youtube' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_youtube', array(
        'label' => 'Youtube',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_youtube',
        'type' => 'text'
    ));

    //Linkedin
    $wp_customize->add_setting( 'wbt_contatos_linkedin' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_linkedin', array(
        'label' => 'Linkedin',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_linkedin',
        'type' => 'text'
    ));

    //Whatsapp
    $wp_customize->add_setting( 'wbt_contatos_whatsapp' , array(
        'default'     => ''
    ));

    $wp_customize->add_control( 'wbt_contatos_whatsapp', array(
        'label' => 'Whatsapp',
        'section' => 'wbt_contatos',
        'settings' => 'wbt_contatos_whatsapp',
        'type' => 'text'
    ));
}