<?php
add_action('wp_ajax_loadMore','loadMore');
add_action('wp_ajax_nopriv_loadMore','loadMore');
function loadMore(){
    
    $paged = $_REQUEST['paged'];

    $the_query = new WP_Query(
        array(
            'post_type' => 'post',
            'paged' => $paged
        )
    );

    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $id = get_the_ID();
            get_template_part('template/parts/card','news', array('id' => get_the_ID()));
        endwhile;
    }

    die();
}
?>