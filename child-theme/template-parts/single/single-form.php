<?php
	$id 		= $args['id'] 		?? '';
	$title 		= $args['title'] 	?? '';
?>

<?php 
	if ($id && $title) : 
		echo do_shortcode('[contact-form-7 id="' . esc_html($id) . '" title="' . esc_html($title) . '"]');
	endif;
?>