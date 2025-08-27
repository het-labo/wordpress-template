<?php
	$label			= $args['label']	?? '';
	$title 			= $args['title'] 	?? '';
	$content 		= $args['content'] 	?? '';
	$classes 		= $args['classes'] 	?? '';

	$class = 'relaitve p-6 rounded-lg border border-green ';

	$classList = preg_split('/\s+/', trim($classes));

	if (in_array('bg-white', $classList)) {
	    $class .= 'bg-white';
	}
	else {
		$class .= 'bg-green';
	}
?>

<article class="<?= esc_html($class); ?>">
	<header>
		<div class="label"><?= $label; ?></div>
		<h3><?= $title; ?></h3>
	</header>
	<div class="">
		<?= wp_kses( $content, ['p' => []] ); ?>
	</div>
</article>