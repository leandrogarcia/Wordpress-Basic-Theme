<?php get_header();?>
<main>
    <div class="container">
        <div class="the-content">
            <?php while ( have_posts() ) : the_post();?>
                <?php the_content();?>
            <?php endwhile;?>
        </div>
    </div>
</main>
<?php get_footer();?>