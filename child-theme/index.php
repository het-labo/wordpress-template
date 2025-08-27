<?php get_header(); ?>

<?php if ( get_header_image() ) : ?>
    <?php $custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' ); ?>
    <figure class="site-cover mb-12">
        <?php
            $custom_header = get_custom_header();
            $attrs         = array(
                'alt'    => get_bloginfo( 'name', 'display' ),
                'sizes'  => $custom_header_sizes,
                'height' => $custom_header->height,
                'width'  => $custom_header->width,
            );
            the_header_image_tag( $attrs );
        ?>
    </figure>
<?php endif; ?>

<section class="container-narrow">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="mb-12"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page', 'twentysixteen' ),
					'next_text'          => __( 'Next page', 'twentysixteen' ),
					/* translators: Hidden accessibility text. */
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
				)
			);
            ?>
            <?php // If no content, include the "No posts found" template. ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>

</section>

<?php get_footer(); ?>