<?php /* Template Name: Investeerders */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php 
        get_template_part('template-parts/components/ui', 'page-cover', 
            array(
                'cover' => get_the_post_thumbnail_url(get_the_ID(), 'full')
            )
        ); 
    ?>

    <div class="py-12">
        <div class="container">
            <?php 
                get_template_part('template-parts/components/ui', 'page-header', 
                    array(
                        'title' => get_the_title(),
                        'content' => get_the_content()
                    )
                ); 
            ?>
        </div>
    </div>

<?php endwhile; ?>



<div class="py-12 bg-green">
	<div class="container">
		
		<div class="flex flex-col">
			<div class="flex flex-col md:flex-row">
				<div class="flex flex-col lg:flex-row flex-1 items-start gap-6 py-6 md:p-12 md:border-r border-b border-green">
					<img src="/wp-content/themes/hopmarkt/assets/icons/home.svg" alt="">
					<div class="flex flex-col">
						<h4>Lorem ipsum dolor</h4>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					</div>
				</div>
				<div class="flex flex-col lg:flex-row flex-1 items-start gap-6 py-6 md:p-12 border-b border-green">
					<img src="/wp-content/themes/hopmarkt/assets/icons/home.svg" alt="">
					<div class="flex flex-col">
						<h4>Lorem ipsum dolor</h4>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					</div>
				</div>
			</div>
			<div class="flex flex-col md:flex-row">
				<div class="flex flex-col lg:flex-row flex-1 items-start gap-6 py-6 md:p-12 md:border-r border-b md:border-b-0 border-green">
					<img src="/wp-content/themes/hopmarkt/assets/icons/home.svg" alt="">
					<div class="flex flex-col">
						<h4>Lorem ipsum dolor</h4>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					</div>
				</div>
				<div class="flex flex-col lg:flex-row flex-1 items-start gap-6 py-6 md:p-12 border-green">
					<img src="/wp-content/themes/hopmarkt/assets/icons/home.svg" alt="">
					<div class="flex flex-col">
						<h4>Lorem ipsum dolor</h4>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<div class="bg-white py-24">
	<div class="container">

		<div class="flex flex-col md:flex-row gap-4 md:gap-12 mb-12">
			<div class="flex-1">
				<?php 
					get_template_part(
						'template-parts/components/ui', 'section-header', 
						array(
							'classes' => 'header2',
						    'label' => 'Praktisch',
						    'title'  => 'Lorem ipsum',
						    'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit.</p>',
						    'action' => array(
						    	'label' => 'Download brochure',
						    	'url' => '/foo/bar',
						    	'class' => 'btn'
						    )
						)
					);
				?>
				<div class="mt-12">
					<picuter class="block mb-6">
						<img src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg" alt="">
					</picuter>
					<h4>Nullam gravida lobortis</h4>
					<p>Nullam gravida lobortis turpis nec placerat. Nulla ac dolor at nunc porttitor tincidunt sed vitae ipsum.</p>
					<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
				</div>
			</div>
			<div class="flex-1">
				<div class="mt-12">
					<picuter class="block mb-6">
						<img src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg" alt="">
					</picuter>
					<h4>Nullam gravida lobortis</h4>
					<p>Nullam gravida lobortis turpis nec placerat. Nulla ac dolor at nunc porttitor tincidunt sed vitae ipsum.</p>
					<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
				</div>
			</div>
		</div>

	</div>
</div>



<section class="relative">
	<picuture class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_009.jpg');"></picuture>
	<div class="py-12 bg-black/30 backdrop-blur-sm">
		<div class="container">
			<div class="relative flex flex-col md:flex-row items-center gap-12 lg:gap-48">
				<div class="flex-1">
					<h5 class="text-white">Schrijf u in op onze nieuwsbrief en blijf op de hoogte van de laatste updates</h5>
				</div>
				<div class="flex-1">
					<div class="flex gap-6">
						<input class="input w-full" type="text" placeholder="Uw email adres" name="">
						<button class="btn" type="submit">Inschrijven</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="bg-white py-24">
	<div class="container">
		<div class="relative">
			<picuter class="md:absolute flex justify-end pb-6 md:pb-48 h-full">
				<div class="md:w-[55%] bg-cover bg-center bg-no-repear" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg');">
					<img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg" alt="">
				</div>
			</picuter>
			<div class="flex flex-col gap-6 md:gap-12">
				<div class="md:w-[35%]">
					<?php 
						get_template_part(
							'template-parts/components/ui', 'section-header', 
							array(
								'classes' => 'header2',
							    'label' => 'Praktisch',
							    'title'  => 'Lorem ipsum',
							    'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>'
							)
						);
					?>
				</div>
				<div class="relative p-12 bg-green md:w-[65%]">
					<header>
						<div class="label">Info</div>
						<h4>Lorem ipsum</h4>
					</header>
					<div class="">
						<p>Vivamus ullam gravida lobortis turpis nec placerat. Nulla ac dolor at nunc porttitor tincidunt sed vitae ipsum.</p>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
						<p>Nullam gravida lobortis turpis nec placerat. Nulla ac dolor at nunc porttitor tincidunt sed vitae ipsum.</p>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
						<p>Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php get_template_part('template-parts/blocks/block', 'footer-form'); ?>



<?php get_footer(); ?>