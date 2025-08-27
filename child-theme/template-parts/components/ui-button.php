<?php
	$label 		= $args['label'] 	?? 'Submit';
	$href 		= $args['href'] 	?? '#';
	$class 		= $args['class']	?? 'btn';
?>

<a href="<?= esc_url($href); ?>" class="<?= esc_attr($class); ?>">
    <?= esc_html($label); ?>
</a>