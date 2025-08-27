<?php
	$title 		= $args['title'] 	?? '';
	$content 	= $args['content']	?? '';

	$action 	= $args['action'] 	?? null;
	$action_classes = 'btn';

	if ( $action['class'] ) {
		$action_classes = $action['class'];
	}
?>

<header class="flex flex-col md:flex-row items-end gap-6">
	<div class="flex-1">
		<ul class="flex items-center gap-1">
			<li class="inline-flex"><a class="link2" href="#">Home</a></li>
			<span>
				<img width="16" height="16" src="/wp-content/themes/hopmarkt/assets/icons/feather/chevron-right.svg" alt="">
			</span>
			<li class="inline-flex"><a class="link2" href="#">Aanbod</a></li>
		</ul>
		<div>
			<h1><?= esc_html($title); ?></h1>
		</div>
		<?php if ($content) : ?>
			<div class="p-lead">
				<?= $content; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="flex-1">
		<?php if ( $action ) : ?>
			<div class="flex justify-end">
				<div>
					<a class="<?php echo $action_classes; ?>" href="<?php echo esc_url( $action['url'] ); ?>"><?php echo esc_html( $action['label'] ); ?></a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</header>