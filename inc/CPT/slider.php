<?php
add_action( 'init', 'create_post_type_slider' );
function create_post_type_slider() {
    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => __('Adicionar novo','bird'),
        'add_new_item' => __('Adicionar novo item','bird'),
        'edit_item' => __('Editar item','bird'),
        'new_item' => __('Novo item','bird'),
        'all_items' => __('Todos','bird'),
        'view_item' => __('Ver item','bird'),
        'search_items' => __('Procurar itens','bird'),
        'not_found' =>  __('Nada encontrado encontrado','bird'),
        'not_found_in_trash' => __('Nada encontrado encontrado na lixeira','bird'),
        'parent_item_colon' => '',
        'menu_name' => 'Slider'
    );
    
    register_post_type( 'slider',
        array(
            'labels' => $labels,
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'rewrite' => array(
                 'slug' => 'slider',
                 'with_front' => false,
            ),
            'capability_type' => 'page',
            'menu_icon' => 'dashicons-images-alt',
            'has_archive' => false,
            'hierarchical' => true,
            'supports' => array('title','thumbnail','page-attributes','custom-fields')
        )
    );

    //Taxonomia
    $labels = array(
        'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Categorias', 'text_domain' ),
        'all_items'                  => __( 'Todos os itens', 'text_domain' ),
        'parent_item'                => __( 'Item pai', 'text_domain' ),
        'parent_item_colon'          => __( 'Item pai:', 'text_domain' ),
        'new_item_name'              => __( 'Nova Categoria', 'text_domain' ),
        'add_new_item'               => __( 'Adicionar nova Categoria', 'text_domain' ),
        'edit_item'                  => __( 'Editar Item', 'text_domain' ),
        'update_item'                => __( 'Atualizar Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separar com virgulas', 'text_domain' ),
        'search_items'               => __( 'Buscar Categorias', 'text_domain' ),
        'add_or_remove_items'        => __( 'Adicionar ou remover edições', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                       => 'slider-categoria',
        'with_front'                 => false,
        'hierarchical'               => true,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'query_var'                  => 'slider-categoria',
        'rewrite'                    => $rewrite
    );
    register_taxonomy( 'slider-categoria', array( 'slider' ), $args );
}


add_action( 'add_meta_boxes', 'wbt_slider_box' );
function wbt_slider_box(){
    add_meta_box( 'wbt_slider_box_detalhes', 'Detalhes', 'wbt_slider_box_detalhes', 'slider', 'normal', 'high' );   
    add_meta_box( 'wbt_slider_pages', 'Slider', 'wbt_slider_pages', 'page', 'normal', 'high' );
}


function wbt_slider_box_detalhes(){
    global $post;
    $values  = get_post_custom( $post->ID );
    $link    = isset( $values['WBTlink'] ) ? $values['WBTlink'][0] : '';
    $texto   = isset( $values['WBTtexto'] ) ? $values['WBTtexto'][0] : '';
    $url     = isset( $values['WBTurl'] ) ? $values['WBTurl'] : '';
    $target  = isset( $values['WBTtarget'] ) ? $values['WBTtarget'][0] : '';

    echo '
    <p>
        Link<br />
        <input type="text" name="WBTlink" value="'.$link.'" style="width:100%" />
    </p>
    <p>
        Texto<br />
        <textarea name="WBTtexto" style="width:100%;height:100px;">'.$texto.'</textarea>
    </p>
    <p>
        Abrir link em outra janela?<br />
        <select name="WBTtarget">
            <option value="_self">Não</option>
            <option value="_blank" '.(($target =="_blank") ? "selected": "").'>Sim</option>
        </select>
    </p>
    ';
}

add_action( 'save_post', 'wbt_slider_box_detalhes_save' );
function wbt_slider_box_detalhes_save($post_id){

    if( isset( $_POST['WBTlink'] ) ){
        update_post_meta( $post_id, 'WBTlink',  $_POST['WBTlink'] );
    }
    if( isset( $_POST['WBTtexto'] ) ){
        update_post_meta( $post_id, 'WBTtexto',  $_POST['WBTtexto'] );
    }
    if( isset( $_POST['WBTurl'] ) ){
        update_post_meta( $post_id, 'WBTurl',  $_POST['WBTurl'] );
    }
    if( isset( $_POST['WBTtarget'] ) ){
        update_post_meta( $post_id, 'WBTtarget',  $_POST['WBTtarget'] );
    }

}



function wbt_slider_pages(){
    global $post;
    $values  = get_post_custom( $post->ID );
    $slide    = isset( $values['WBTSlide'] ) ? $values['WBTSlide'] : '';
    $exibeTexto     = isset( $values['WBTexibe'] ) ? $values['WBTexibe'] : '';
    $sliderTempo     = isset( $values['WBTsliderTempo'] ) ? $values['WBTsliderTempo'] : '';
    
    $taxonomies = array( 'slider-categoria');
    $args = array(
        'orderby'           => 'name', 
        'order'             => 'ASC',
        'hide_empty'        => false, 
        'exclude'           => array(), 
        'exclude_tree'      => array(), 
        'include'           => array(),
        'number'            => '', 
        'fields'            => 'all', 
        'slug'              => '', 
        'parent'            => '',
        'hierarchical'      => true, 
        'child_of'          => 0, 
        'get'               => '', 
        'name__like'        => '',
        'description__like' => '',
        'pad_counts'        => false, 
        'offset'            => '', 
        'search'            => '', 
        'cache_domain'      => 'core'
    ); 
    $terms = get_terms($taxonomies, $args);

    $options = '<option value="">Nenhum</option>';
    foreach ($terms as $term) {
        if($slide && $slide[0] == $term->slug){
            $options .= '<option value="'.$term->slug.'" selected>'.$term->name.'</option>';
        }else{
            $options .= '<option value="'.$term->slug.'">'.$term->name.'</option>';
        }
        
    }

    echo '
    <p>
        Sliders<br />
        <select name="WBTSlide" style="width:100%">
            '.$options.'
        </select>
    </p>
    <p>
        Exibe texto<br />
        <select name="exibeTexto">
            <option value="0">Não</option>
            <option value="1" '.((isset($exibeTexto[0]) && $exibeTexto[0] =="1") ? "selected": "").'>Sim</option>
        </select>
    </p>
    <p>
        Escreva o tempo em milisegundos caso queira que o slider seja automático<br>
        <input name="WBTsliderTempo" value="'.($sliderTempo[0] ?? "").'">
    </p>
    ';
}
add_action( 'save_post', 'wbt_slider_pages_save' );
function wbt_slider_pages_save($post_id){


    if( isset( $_POST['WBTSlide'] ) ){
        update_post_meta( $post_id, 'WBTSlide',  $_POST['WBTSlide'] );
    }

    if( isset( $_POST['exibeTexto'] ) ){
        update_post_meta( $post_id, 'exibeTexto',  $_POST['exibeTexto'] );
    }

    if( isset( $_POST['WBTsliderTempo'] ) ){
        update_post_meta( $post_id, 'WBTsliderTempo',  $_POST['WBTsliderTempo'] );
    }

}

?>