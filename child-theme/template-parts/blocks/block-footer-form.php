<div class="flex flex-col lg:flex-row bg-green-soft">
	<picture class="flex-1 bg-cover bg-center bg-no-repeat" style="background-image:url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg');">
		<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg" alt="">
	</picture>
	<div class="flex-1">
		<div class="p-6 sm:p-12 lg:p-24">

			<div class="mb-12">
				<?php 
					get_template_part(
						'template-parts/components/ui', 'section-header', 
						array(
						    'label' => 'Contact',
						    'title'  => 'Blijf op de hoogte',
						    'content' => '<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at..</p>'
						)
					);
				?>
			</div>

			<?php
				get_template_part(
					'template-parts/single/single', 'form', 
					array(
					    'id' => '95f79d4',
					    'title'  => 'Contact',
					)
				);
			?>
		</div>
	</div>
</div>