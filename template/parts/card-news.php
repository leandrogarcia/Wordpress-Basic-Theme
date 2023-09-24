<div class="card-news">
    <a href="<?php echo get_permalink($args['id']);?>">
        <figure>
            <?php the_post_thumbnail('card-news', ['class' => 'w-100 h-auto', 'loading' => 'lazy']);?>
        </figure>
        <h3><?php the_title();?></h3>
    </a>
</div>