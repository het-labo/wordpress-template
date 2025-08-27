<?php
	$cover = $args['cover'] ?? '';
?>

<?php if ( !empty($cover) ) : ?>
	<picture class="block min-h-[200px] max-h-[600px] h-full overflow-hidden bg-center bg-cover" style="background-image:url('<?= esc_html($cover); ?>');">
		<img class="opacity-0 pointer-events-none" src="<?= esc_html($cover); ?>" alt="">
	</picture>
<?php else : ?>

<?php endif; ?>