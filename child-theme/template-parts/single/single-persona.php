<?php
	$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<article class="relative flex flex-col justify-between bg-green mod--ext" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ($image_url) : ?>
		<picture class="relative h-1/3">
			<img class="opacity-0 pointer-events-none" src="<?php echo esc_url($image_url); ?>">
			<div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>

			<svg class="absolute bottom-0 left-0 right-0 w-full h-6 fill-green" viewBox="0 0 100 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><polygon points="0,0 100,24 0,24" /></svg>
		</picture>
    <?php else : ?>

    <?php endif; ?>
    <div class="relative">
    	<div class="px-8 py-4">
			<header class="flex flex-col gap-1">
				<?php the_title( '<h3><a class="mod--ext-a" href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
			</header>
			<div>
				<?php the_content(); ?>
			</div>
		</div>
		<footer class="flex justify-end overflow-hidden mt-6">
			<a class="btn3" href="<?php the_permalink(); ?>">
				<svg viewBox="0 0 20 40" xmlns="http://www.w3.org/2000/svg" version="1.1">
					<polygon points="0,40 20,40 20,0" fill="#87A06C" />
				</svg>
				<span>Meer over dit verhaal</span>
			</a>
		</footer>
	</div>
</article>