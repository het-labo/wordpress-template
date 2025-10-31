<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<?php the_title( '<h1 class="mb-4">', '</h1>' ); ?>
	</header>

    <figure class="max-w-[400px]">
	    <?php twentysixteen_post_thumbnail(); ?>
    </figure>

	<div class="content content-big-intro">
		<?php the_content(); ?>

        <?php
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

</article>
