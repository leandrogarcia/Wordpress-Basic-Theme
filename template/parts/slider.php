<?php
$slideCateg = get_post_meta(get_the_ID(),'WBTSlide',true);
$slideTempo = get_post_meta(get_the_ID(),'WBTsliderTempo',true);

$sliderQuery = new WP_Query(
    array(
        'post_type' => 'slider',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'tax_query' => array(
            array(
                'taxonomy' => 'slider-categoria',
                'field'    => 'slug',
                'terms'    => $slideCateg
            )
        ),
    )
);
?>
<?php if ( $sliderQuery->have_posts() ) :?>
    <div class="slider">
        <div class="container">
            <div class="swiper" <?php echo (!empty($slideTempo)) ? 'data-slide-interval="'.$slideTempo.'"' : '';?>>
                <div class="swiper-wrapper">
                    <?php while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post(); ?>

                        <div class="swiper-slide">
                            <?php if(get_post_meta(get_the_ID(),'WBTlink',true)) {echo '<a href="'.get_post_meta(get_the_ID(),'WBTlink',true).'" target="'.get_post_meta(get_the_ID(),'BRDtarget',true).'">';} ?>
                                
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'slider', array('class' => 'w-100 h-auto'));?>
                            
                                <?php if(get_post_meta($args['id'],'exibeTexto',true) == 1){?>
                                    <div class="chamada">
                                        <h1><?php the_title();?></h1>
                                        <h2><?php echo get_post_meta(get_the_ID(),'WBTtexto',true);?></h2>
                                    </div>
                                <?php } ?>
                            <?php if(get_post_meta(get_the_ID(),'WBTlink',true)) {echo '</a>';} ?>
                        </div>

                        
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>