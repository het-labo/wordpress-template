<?php
	$classes 	= $args['classes'] 	?? 'header1';
	$label 		= $args['label'] 	?? '';
	$title 		= $args['title'] 	?? '';
	$content 	= $args['content'] 	?? '';
	$action 	= $args['action'] 	?? null;

	$action_classes = 'btn';

	if ( $action['class'] ) {
		$action_classes = $action['class'];
	}
?>

<header class="<?php echo $classes; ?>">
	<div class="flex flex-col max-w-[500px] lo--green-corner">
		<div class="flex flex-col">
			<div class="label opacity-75 pl-1"><?= esc_html($label); ?></div>
			<h2><?= esc_html($title); ?></h2>
			<div>
				<?= wp_kses( $content, ['p' => []] ); ?>
			</div>
		</div>
	</div>
	<?php if ( $action ) : ?>
		<div class="flex justify-end">
			<div>
				<a class="<?php echo $action_classes; ?>" href="<?php echo esc_url( $action['url'] ); ?>"><?php echo esc_html( $action['label'] ); ?></a>
			</div>
		</div>
	<?php endif; ?>
</header>