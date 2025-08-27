<?php get_header(); ?>




<div class="relative">
	<div class="relative flex items-end justify-center min-h-[500px] lg:min-h-[900px]">

		<div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg');"></div>

		<div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40"></div>
		
		<div class="relative max-w-[800px] text-center text-white mb-6 px-6">
			<h1>Een nieuw kloppend dorpshart voor Asse</h1>
		</div>
	</div>
	<div class="flex justify-center">
		<img width="80" height="72" src="/wp-content/themes/hopmarkt/assets/img/core/logo-hop.svg">
	</div>
</div>

<div class="container-narrow">
	<div class="text-center mb-12">
		<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at lorem ipsum dolor, vitae faucibus eros mollis.</p>
		<p>Cras sed pharetra ante. Etiam at massa at enim congue congue id id tortor. Sed maximus justo nisi, rutrum pretium justo viverra molestie. Aenean sed dui molestie, accumsan dui eget, pulvinar lacus. Integer in rutrum magna. Etiam fringilla lorem vel nisl mollis, vitae faucibus eros mollis.</p>
	</div>
</div>



<div class="py-24">
	<div class="container">
		
		<?php
            $terms = get_terms([
                'taxonomy' => 'vastgoed_type',
                'hide_empty' => false
            ]);
        ?>
        
        <div class="flex flex-col lg:flex-row gap-6">
	        <?php foreach ($terms as $term) : ?>
	        	<?php
					$image_id = get_field('featured_image', 'vastgoed_type_' . $term->term_id);
					$title = get_field('meervoud', 'vastgoed_type_' . $term->term_id);
					$permalink = $term->slug;

					if ($image_id) {
					    $image_src = wp_get_attachment_image_url($image_id, 'full');
					}

					get_template_part(
						'template-parts/components/ui', 'card', 
						array(
							'classes' => 'foo bar',
						    'cover' => $image_src,
						    'title'  => $title,
						    'content' => esc_html($term->description),
						    'permalink' => 'aanbod?type=' . $permalink . '#aanbod',
						    'permalink_label' => $title . ' info'
						)
					);
				?>
	        <?php endforeach; ?>
		</div>


	</div>
</div>







<div class="bg-green py-24">
	<div class="container">
		<div class="flex flex-col gap-6 max-w-[900px] mx-auto lo--green-corner">
			<?php set_query_var('id', 1); get_template_part('template-parts/single/single', 'post'); ?>
		</div>
	</div>
</div>






<div class="bg-white py-24">
	<div class="container">

		<div class="flex flex-col-reverse md:flex-row gap-4 md:gap-12 mb-12">
			<div class="flex-1">

				<?php 
					get_template_part(
						'template-parts/components/ui', 'section-header', 
						array(
							'classes' => 'header2',
						    'label' => 'Praktisch',
						    'title'  => 'Buurtinfo',
						    'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit.</p>',
						    'action' => array(
						    	'label' => 'Meer over buurtinfo',
						    	'url' => '/foo/bar',
						    	'class' => 'btn'
						    )
						)
					);
				?>

			</div>
			<div class="flex-1">
				
				<img src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg" alt="">

			</div>
		</div>

		<div class="flex flex-col md:flex-row gap-6">

			<?php
				$panels = [
					['Ullamco', 'Quis nostrud exercitation', 'content'], 
					['Lorem ipsum', 'Ullamco laboris nisi', 'content'], 
					['Duis aute', 'Aliquip ex ea commodo', 'content'], 
					['Exercitation', 'Duis aute irure dolor in reprehenderit', 'content']
				];
			?>

			<?php foreach($panels as $panel) : ?>
				<?php 
					get_template_part(
						'template-parts/components/ui', 'panel', 
						array(
						    'label' => $panel[0],
						    'title'  => $panel[1],
						    'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>',
						)
					);
				?>
			<?php endforeach; ?>

		</div>
	</div>
</div>






<div class="bg-green py-24">
	<div class="container">

		<div class="flex flex-col lg:flex-row gap-12">

			<div class="flex-2">

				<div class="mb-12">
					<?php 
						get_template_part(
							'template-parts/components/ui', 'section-header', 
							array(
							    'label' => 'Actua',
							    'title'  => 'Nieuws',
							    'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit.</p>',
							    'action' => array(
							    	'label' => 'Nieuwsoverzicht',
							    	'url' => '/foo/bar',
							    	'class' => 'btn2'
							    )
							)
						);
					?>
				</div>

				<div class="flex flex-col gap-4">

					<?php
						$latest = new WP_Query([
						  'post_type'           => 'post',
						  'posts_per_page'      => 3,
						  'post_status'         => 'publish',
						  'orderby'             => 'date',
						  'order'               => 'DESC',
						  'ignore_sticky_posts' => 1,
						  'no_found_rows'       => true, // perf: disables pagination count
						]);
					?>

					<?php if ( $latest->have_posts() ) : ?>
						<?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
							<?php get_template_part( 'template-parts/loop/loop', 'post' ); ?>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php endif; ?>
				
				</div>

			</div>

			<picture class="flex-1 bg-cover bg-center bg-no-repeat" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_009.jpg');">
				
				<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_009.jpg">		

			</picture>			

		</div>

	</div>
</div>





<?php get_template_part('template-parts/components/ui', 'img-fluid', array('cover' => 'https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg')); ?>













<div class="bg-white py-24">
	<div class="container">

		<div class="mb-12">
			<?php 
				get_template_part(
					'template-parts/components/ui', 'section-header', 
					array(
					    'label' => 'Omgeving',
					    'title'  => 'Persona\'s',
					    'content' => '<p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit.</p>'
					)
				);
			?>
		</div>

		<div class="flex flex-col sm:flex-row items-start gap-6">
			<?php
				$args = [
				    'post_type'   => 'persona',
				    'posts_per_page' => 2,
				    'post_status' => 'publish'
				];
				$query = new WP_Query($args);
			?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'template-parts/single/single', 'persona' ); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>









<div class="bg-green py-24">
	<div class="container">

		<div class="mb-12">
			<?php 
				get_template_part(
					'template-parts/components/ui', 'section-header', 
					array(
					    'label' => 'Omgeving',
					    'title'  => 'Aanbod',
					    'content' => '<p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit.</p>'
					)
				);
			?>
		</div>



		
		<?php
            $terms = get_terms([
                'taxonomy' => 'vastgoed_type',
                'hide_empty' => false
            ]);
        ?>
        
        <div class="flex flex-col gap-6">
	        <?php foreach ($terms as $term) : ?>
	        	<?php
					$image_id = get_field('featured_image', 'vastgoed_type_' . $term->term_id);
					$title = get_field('meervoud', 'vastgoed_type_' . $term->term_id);
					$permalink = $term->slug;

					if ($image_id) {
					    $image_src = wp_get_attachment_image_url($image_id, 'full');
					}

					get_template_part(
						'template-parts/components/ui', 'item', 
						array(
							'classes' => 'foo bar',
						    'cover' => $image_src,
						    'title'  => $title,
						    'content' => esc_html($term->description),
						    'permalink' => 'aanbod?type=' . $permalink . '#aanbod',
						    'permalink_label' => $title . ' info'
						)
					);
				?>
	        <?php endforeach; ?>
		</div>

	</div>
</div>





<?php get_template_part('template-parts/components/ui', 'img-fluid', array('cover' => 'https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg')); ?>





<div class="bg-green py-24">
	<div class="container">

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
			<div class="relative lg:row-span-2 flex items-end overflow-hidden rounded-md lg:h-[600px]">
				<div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg');"></div>
				<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
			</div>
			<div class="lg:row-span-2 text-white flex flex-col justify-end">
				<div class="p-8 bg-darkgreen rounded-md">
					<h2>Project Hopmarkt</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p><p>Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit.</p>
				</div>
			</div>
			<div class="relative lg:row-span-2 flex items-end overflow-hidden rounded-md">
				<div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_008.jpg');"></div>
				<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
			</div>
			<div class="flex flex-col items-center justify-center bg-white rounded-md lg:h-[400px] p-12 text-center">
				<div class="text-6xl">124</div>
				<div>
					<p class="m-0">Appartementen, huizen & handelsruimtes</p>
				</div>
			</div>
			<div class="relative overflow-hidden rounded-md lg:h-[400px]">
				<div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_009.jpg');"></div>
				<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
			</div>
			<div class="flex flex-col items-center justify-center bg-white rounded-md lg:h-[400px] p-12 text-center">
				<div class="text-6xl">945m²</div>
				<div>
					<p class="m-0">Natuur & park</p>
				</div>
			</div>
			<div class="relative lg:row-span-2 overflow-hidden rounded-md lg:h-[600px]">
				<div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_010.jpg');"></div>
				<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
			</div>
			<div class="flex flex-col items-center justify-center bg-white rounded-md lg:h-[400px] p-12 text-center">
				<div class="text-6xl">98%</div>
				<div>
					<p class="m-0">Energiebesparend</p>
				</div>
			</div>
			<div class="relative overflow-hidden rounded-md lg:h-[400px]">
				<div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg');">
					<div class="absolute right-0 bottom-0 text-[0px]">
						<a class="btn3" href="<?php the_permalink(); ?>">
							<svg viewBox="0 0 20 40" xmlns="http://www.w3.org/2000/svg" version="1.1">
								<polygon points="0,40 20,40 20,0" fill="#87A06C" />
							</svg>
							<span>Ontdek project hopmarkt</span>
						</a>
					</div>
				</div>
				<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
			</div>
		</div>

	</div>
</div>




<?php get_template_part('template-parts/blocks/block', 'footer-form'); ?>



<?php get_footer(); ?>