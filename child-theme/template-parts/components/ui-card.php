<?php
	$the_ID				= $args['id']				?? '';
	$classes 			= $args['classes'] 			?? '';
	$cover 				= $args['cover'] 			?? '';
	$title 				= $args['title'] 			?? '';
	$content 			= $args['content'] 			?? '';
	$permalink 			= $args['permalink'] 		?? '';
	$permalink_label 	= $args['permalink_label'] 	?? 'Meer info';
?>

<article 
	class="relative flex flex-col justify-between bg-green mod--ext <?php echo esc_html($classes); ?>" 
	<?php if ($id) : ?>id="post-<?= esc_html($id); ?>"<?php endif; ?>
>

	<?php if ($cover) : ?>
		<picture class="relative min-h-[200px] pointer-events-none">
			<img class="opacity-0 pointer-events-none" src="<?php echo esc_url($cover); ?>">
			<div class="absolute inset-0 bg-cover bg-center pointer-events-none" style="background-image: url('<?php echo esc_url($cover); ?>');"></div>
			<svg class="absolute bottom-0 left-0 right-0 w-full h-6 fill-green" viewBox="0 0 100 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><polygon points="0,0 100,24 0,24" /></svg>
		</picture>
    <?php else : ?>

    <?php endif; ?>

    <div>
    	<div class="px-8 py-4">
			<header class="flex flex-col gap-1">
				<h3><a class="mod--ext-a" href="<?= $permalink ?>"><?= $title; ?></a></h3>
			</header>
			<div>
				<?= $content; ?>
			</div>
		</div>
		<footer class="flex justify-end overflow-hidden mt-6">
			<a class="btn3" href="<?= $permalink ?>">
				<svg viewBox="0 0 20 40" xmlns="http://www.w3.org/2000/svg" version="1.1">
					<polygon points="0,40 20,40 20,0" fill="#87A06C" />
				</svg>
				<span><?= $permalink_label; ?></span>
			</a>
		</footer>
	</div>
	
</article>