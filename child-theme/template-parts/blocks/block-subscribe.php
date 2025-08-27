<?php
	$form_id 		= $args['form_id'] 		?? '';
	$form_title 	= $args['form_title'] 	?? '';
	$title 			= $args['title'] 	?? '';
?>

<section class="relative">
	<picuture class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_009.jpg');"></picuture>
	<div class="py-12 bg-black/30 backdrop-blur-sm">
		<div class="container">
			<div class="relative flex flex-col md:flex-row items-center gap-12 lg:gap-48">
				<div class="flex-1">
					<?php if ($title) : ?>
						<h5 class="text-white"><?= esc_html($title); ?></h5>
					<?php endif; ?>
				</div>
				<div class="flex-1">
					<?php if ($form_id && $form_title) : ?>
						<?= do_shortcode('[contact-form-7 id="' . esc_html($form_id) . '" title="' . esc_html($form_title) . '"]'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>