<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
                <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                        <span class="sticky-post"><?php _e( 'Featured', 'childtheme' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>

        <?php twentysixteen_excerpt(); ?>

	<figure class="max-w-[400px]">
	    <?php twentysixteen_post_thumbnail(); ?>
    </figure>

	<div class="content content-big-intro">
		<?php
			the_content(
				sprintf(
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'childtheme' ),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'childtheme' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'childtheme' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
	</div>

	<footer>
                <?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
                                        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'childtheme' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
	</footer>
</article>
