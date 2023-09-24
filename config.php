<?php
$TELEFONE = get_theme_mod( 'wbt_contatos_telefone');
if($TELEFONE == ''){
    define("TELEFONE", '');
}else{
    define("TELEFONE", $TELEFONE);
}

$EMAIL = get_theme_mod( 'wbt_contatos_email');
if($EMAIL == ''){
    define("EMAIL", '');
}else{
    define("EMAIL", $EMAIL);
}

$INSTAGRAM = get_theme_mod( 'wbt_contatos_instagram');
if($INSTAGRAM == ''){
    define("INSTAGRAM", '');
}else{
    define("INSTAGRAM", $INSTAGRAM);
}

$FACEBOOK = get_theme_mod( 'wbt_contatos_facebook');
if($FACEBOOK == ''){
    define("FACEBOOK", '');
}else{
    define("FACEBOOK", $FACEBOOK);
}

$TWITTER = get_theme_mod( 'wbt_contatos_twitter');
if($TWITTER == ''){
    define("TWITTER", '');
}else{
    define("TWITTER", $TWITTER);
}

$YOUTUBE = get_theme_mod( 'wbt_contatos_youtube');
if($YOUTUBE == ''){
    define("YOUTUBE", '');
}else{
    define("YOUTUBE", $YOUTUBE);
}

$LINKEDIN = get_theme_mod( 'wbt_contatos_linkedin');
if($LINKEDIN == ''){
    define("LINKEDIN", '');
}else{
    define("LINKEDIN", $LINKEDIN);
}

$WHATSAPP = get_theme_mod( 'wbt_contatos_whatsapp');
if($WHATSAPP == ''){
    define("WHATSAPP", '');
}else{
    define("WHATSAPP", $WHATSAPP);
}
?>