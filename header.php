<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> dir="ltr">
	<header>
		<div class="container">
			<figure id="logo">
				<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				?>
				<a href="<?php echo home_url();?>">
					<?php if($image) :?>
						<img src="<?php echo $image[0];?>" alt="logo <?php wp_title(''); ?>" />
					<?php else : ?>
						<?php echo get_bloginfo( 'name' ); ?>
					<?php endif;?>
				</a>
			</figure>
			<div class="menu-area">
				<button class="mobile d-md-none" aria-label="Abrir menu">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="open"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="close"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
				</button>
				<div class="mnu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'container_class' => 'primary-menu'
						) );
					?>

					<button class="search">
						<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
					</button>
				</div>
			</div>
		</div>
	</header>
	<div class="form-search">
		<div class="container">
			<form role="search" method="get" class="search-form" action="/">
				<label>
					<input type="search" class="search-field" placeholder="O que você gostaria de encontrar?" name="s">
				</label>
				<button class="d-md-none search-mobile"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></button>
				<input type="submit" class="d-none d-md-block search-submit" value="Pesquisar">
				<button class="close-search">
					Cancelar
				</button>
			</form>
		</div>
	</div>
	<?php 
		if (has_post_thumbnail( get_the_ID() ) ){
			get_template_part('template/parts/hero');
		}elseif(!empty(get_post_meta(get_the_ID(),'WBTSlide',true))){
			get_template_part('template/parts/slider', null, array('id' => get_the_ID()));
		}
	?>