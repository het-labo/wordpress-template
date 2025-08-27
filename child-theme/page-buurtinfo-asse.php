<?php /* Template Name: Buurtinfo Asse */ ?>

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


<div class="bg-green py-24">
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
					consequat. Duis aute irure dolor in reprehenderit.</p>'
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



<?php
	get_template_part('template-parts/blocks/block', 'subscribe', array(
		'form_id' => '35f622d',
		'form_title' => 'Subscribe',
		'title' => 'Schrijf u in op onze nieuwsbrief en blijf op de hoogte van de laatste updates'
	));
?>


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
                            'title'  => 'Algemene info',
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




<?php get_template_part('template-parts/components/ui', 'img-fluid', array('cover' => 'https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg')); ?>







<div class="bg-green py-24">
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
					consequat. Duis aute irure dolor in reprehenderit.</p>'
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




<?php get_template_part('template-parts/blocks/block', 'footer-form'); ?>


<?php get_footer(); ?>