<?php get_header();?>
<main>
    <div class="container">
        <h1>Notícias</h1>
        <?php if ( have_posts() ) : ?>
            <div class="container-news">
        
				<?php while ( have_posts() ) : the_post();?>
                    <?php get_template_part('template/parts/card','news', array('id' => get_the_ID()));?>
				<?php endwhile;?>

            </div>
            <?php 
                global $wp_query;
                
                if($wp_query->max_num_pages > 1){
                    ?>
                    <div class="load-more">
                        <a href="#" data-atual="1" data-total="<?php echo $wp_query->max_num_pages;?>">Carregar mais</a>
                    </div>
                    <?php
                }
            ?>
		<?php endif; ?>
    </div>
</main>
<?php get_footer();?>