<?php
	$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$categories = get_the_category();
?>

<article class="relative flex bg-white mod--ext" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ($image_url) : ?>
		<picture class="flex-1 relative">
			<img class="opacity-0 pointer-events-none" src="<?php echo esc_url($image_url); ?>">
			<div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
		</picture>
    <?php else : ?>

    <?php endif; ?>
    <div class="flex-2">
		<header class="flex flex-col gap-1 p-6 md:p-12">
			<div class="flex gap-2 opacity-75">
				<?php if ( ! empty( $categories ) ) : ?>
						<div class="label">
							<?php echo esc_html( implode( ', ', wp_list_pluck( $categories, 'name' ) ) ); ?>
						</div>
					<div class="label">—</div>
				<?php endif; ?>
				<div class="label"><?php echo get_the_date( 'j F Y' ); ?></div>
			</div>
			<?php the_title( '<h3><a class="mod--ext-a" href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
		</header>
		<footer class="flex justify-end overflow-hidden md:mt-6">
			<a class="btn3" href="<?php the_permalink(); ?>">
				<svg  
					viewBox="0 0 20 40" 
			    	xmlns="http://www.w3.org/2000/svg"
			    	version="1.1"
			    >
				 	<polygon points="0,40 20,40 20,0" />
				</svg>
				<span>Lees meer</span>
			</a>
		</footer>
	</div>
</article>