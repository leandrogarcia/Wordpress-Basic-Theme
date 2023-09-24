<?php get_header();?>
<main>
    <div class="container">
        <div class="the-content">
            <?php while ( have_posts() ) : the_post();?>
                <h1><?php the_title();?></h1>
                <?php the_content();?>
            <?php endwhile;?>
        </div>
    </div>
</main>
<?php get_footer();?>