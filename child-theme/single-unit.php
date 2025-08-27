<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div class="py-12">
		    <div class="container">

		    	<article class="unit unit-<?php the_ID(); ?>">
			        <?php 
			            get_template_part('template-parts/components/ui', 'page-header', 
			                array(
			                    'title' => get_the_title(),
			                    'content' => get_the_content()
			                )
			            ); 
			        ?>

			        <?php
						$type = get_the_terms(get_the_ID(), 'vastgoed_type');
						$type_slug = $type[0]->slug ?? '';
						$aankoopprijs = get_field('prijs');
						$huurprijs = get_field('huurprijs');
						$oppervlakte = get_field('oppervlakte');
						$aantal_slaapkamers = get_field('slaapkamers');
					?>

					
				    <div class="mt-12 p-12 bg-green">
					    <?php if ( $aankoopprijs ) : ?>
					    	<p>Aankoopprijs: <?php echo $aankoopprijs; ?></p>
					    <?php endif; ?>

					    <?php if ( $huurprijs ) : ?>
					    	<p>Huurprijs: <?php echo $huurprijs; ?></p>
					    <?php endif; ?>

					    <?php if ( $oppervlakte ) : ?>
					    	<p>Oppervlakte: <?php echo $oppervlakte; ?></p>
					    <?php endif; ?>

					    <?php if ( $aantal_slaapkamers ) : ?>
					    	<p>Aantal slaapkamers: <?php echo $aantal_slaapkamers; ?></p>
					    <?php endif; ?>
					</div>

			    </article>

		    </div>
		</div>


	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
