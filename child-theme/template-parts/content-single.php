<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <header>
		<?php the_title( '<h1 class="mb-4">', '</h1>' ); ?>
	</header>

	<?php twentysixteen_excerpt(); ?>

	<figure class="max-w-[400px]">
	    <?php twentysixteen_post_thumbnail(); ?>
    </figure>

	<div class="content content-big-intro">
		<?php
			the_content();

                        wp_link_pages(
                                array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'childtheme' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                        /* translators: Hidden accessibility text. */
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'childtheme' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                )
                        );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div>

	<footer>
		<?php twentysixteen_entry_meta(); ?>
	</footer>
    
</article>
