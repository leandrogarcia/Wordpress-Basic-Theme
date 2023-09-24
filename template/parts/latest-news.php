<?php
    $latestQuery = new WP_Query(
        array(
            'post_type' => 'post',
            'posts_per_page' => 3
        )
    );
?>
<?php if ( $latestQuery->have_posts() ) :?>
    <div class="latest-news">
        <div class="container">
            <h2>Últimas notícias</h2>
            <div class="news">
                <?php while ( $latestQuery->have_posts() ) : $latestQuery->the_post(); ?>
                    <?php get_template_part('template/parts/card','news', array('id' => get_the_ID()));?>
                <?php endwhile;?>
            </div>
            <div class="all">
                <a href="<?php echo home_url();?>/noticias">Todas as notícias</a>
            </div>
        </div>
    </div>
    <?php wp_reset_query();?>
<?php endif;?>