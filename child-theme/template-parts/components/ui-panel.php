<?php
	$label			= $args['label']	?? '';
	$title 			= $args['title'] 	?? '';
	$content 		= $args['content'] 	?? '';
	$classes 		= $args['classes'] 	?? '';

        $class = 'relative p-6 rounded-lg border border-green ';

	$classList = preg_split('/\s+/', trim($classes));

	if (in_array('bg-white', $classList)) {
	    $class .= 'bg-white';
	}
	else {
		$class .= 'bg-green';
	}
?>

<article class="<?= esc_attr($class); ?>">
        <header>
                <div class="label"><?= esc_html($label); ?></div>
                <h3><?= esc_html($title); ?></h3>
        </header>
        <div class="">
                <?= wp_kses( $content, ['p' => []] ); ?>
        </div>
</article>