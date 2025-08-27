<?php
	$the_ID				= $args['id']				?? '';
	$classes 			= $args['classes'] 			?? '';
	$cover 				= $args['cover'] 			?? '';
	$title 				= $args['title'] 			?? '';
	$content 			= $args['content'] 			?? '';
	$permalink 			= $args['permalink'] 		?? '';
	$permalink_label 	= $args['permalink_label'] 	?? 'Meer info';
?>

<article class="relative flex bg-white mod--ext" id="<?= esc_html($the_ID); ?>">

	<picture class="flex-1 relative">
		<img class="opacity-0 pointer-events-none" src="<?= esc_html($cover); ?>">
		<div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?= esc_html($cover); ?>');"></div>
	</picture>
    
    <div class="flex-2">
    	<div class="flex flex-col gap-6 p-6 md:p-12">
			<header class="flex flex-col gap-1">
				<h3><a class="mod--ext-a" href="<?= esc_html($permalink); ?>"><?= esc_html($title); ?></a></h3>
			</header>
			<div>
				<?= esc_html($content); ?>
			</div>
		</div>
		<footer class="flex justify-end overflow-hidden md:mt-6">
			<a class="btn3" href="<?= esc_html($permalink); ?>">
				<svg viewBox="0 0 20 40" xmlns="http://www.w3.org/2000/svg" version="1.1">
				 	<polygon points="0,40 20,40 20,0"></polygon>
				</svg>
				<span><?= esc_html($permalink_label); ?></span>
			</a>
		</footer>
	</div>

</article>