<?php
	$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$categories = get_the_category();

	$aankoopprijs = get_field('prijs');
	$huurprijs = get_field('huurprijs');
	$oppervlakte = get_field('oppervlakte');
	$aantal_slaapkamers = get_field('slaapkamers');

	$type = get_the_terms(get_the_ID(), 'vastgoed_type');
    $type_name = $type[0]->name ?? '';
    $slug = $type[0]->slug ?? '';
?>


<article class="unit-<?php echo esc_attr($slug); ?> relative flex bg-white mod--ext" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($image_url) : ?>
		<picture class="flex-1 relative">
			<img class="opacity-0 pointer-events-none" src="<?php echo esc_url($image_url); ?>">
			<div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
		</picture>
    <?php else : ?>
    	<picture class="flex-1 flex items-center justify-center relative bg-darkestgreen">
    		<img style="max-width: 120px;" src="/wp-content/themes/hopmarkt/assets/img/core/logo-white.png" alt="">
    	</picture>
    <?php endif; ?>

    <div class="flex-2">

    	<div class="relative flex justify-end overflow-hidden z-10">
    		<a class="btn4" href="#plannen-downloaden">Printen</a>
    		<a class="btn4" href="#plannen-downloaden">Delen</a>
    	</div>

    	<div class="flex flex-col gap-4 p-12">
			<header class="flex flex-col items-start gap-1">

				<span class="badge">Onder optie</span>

				<?php if ( !empty($type_name) ) : ?><div class="label"><?= esc_html($type_name); ?></div><?php endif; ?>

				<?php the_title( '<h3 class="mb-4"><a class="mod--ext-a" href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>

				 <div class="flex border border-black">
	                <?php if ( !empty($aankoopprijs) ) : ?>
	                    <div class="p-2 pr-4 border border-black flex items-center gap-1">
	                    	<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M16.9577 4.40323C15.9886 3.93099 14.8999 3.66602 13.7493 3.66602C9.69924 3.66602 6.41602 6.94926 6.41602 10.9993C6.41602 15.0495 9.69924 18.3327 13.7493 18.3327C14.8999 18.3327 15.9886 18.0677 16.9577 17.5955" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M4.58398 9.16602H14.6673" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M4.58398 12.834H14.6673" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<span><?= $aankoopprijs; ?></span>
						</div>
	                <?php endif; ?>

	                <?php if ( !empty($huurprijs) ) : ?>
	                    <div class="p-2 pr-4 border border-black flex items-center gap-1">
	                    	<span>Huur: <?= $huurprijs; ?></span>
	                    </div>
	                <?php endif; ?>

	                <?php if ( !empty($oppervlakte) ) : ?>
	                    <div class="p-2 pr-4 border border-black flex items-center gap-1">
	                    	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_715_4086)">
									<path d="M2.5 17.5V3C2.5 2.72386 2.72386 2.5 3 2.5H17.5" stroke="black" stroke-width="1.4"/>
									<path d="M14.166 17.4993H16.9993C17.2755 17.4993 17.4993 17.2755 17.4993 16.9993V14.166" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M17.5 5.83398V7.50065" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M17.5 10V11.6667" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M5.83398 17.5H7.50065" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M10 17.5H11.6667" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M2.49935 3.33268C2.95958 3.33268 3.33268 2.95958 3.33268 2.49935C3.33268 2.03912 2.95958 1.66602 2.49935 1.66602C2.03912 1.66602 1.66602 2.03912 1.66602 2.49935C1.66602 2.95958 2.03912 3.33268 2.49935 3.33268Z" fill="black" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M2.49935 18.3327C2.95958 18.3327 3.33268 17.9596 3.33268 17.4993C3.33268 17.0391 2.95958 16.666 2.49935 16.666C2.03912 16.666 1.66602 17.0391 1.66602 17.4993C1.66602 17.9596 2.03912 18.3327 2.49935 18.3327Z" fill="black" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M17.4993 3.33268C17.9596 3.33268 18.3327 2.95958 18.3327 2.49935C18.3327 2.03912 17.9596 1.66602 17.4993 1.66602C17.0391 1.66602 16.666 2.03912 16.666 2.49935C16.666 2.95958 17.0391 3.33268 17.4993 3.33268Z" fill="black" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
								</g>
								<defs>
									<clipPath id="clip0_715_4086">
										<rect width="20" height="20" fill="white"/>
									</clipPath>
								</defs>
							</svg>
							<span><?= $oppervlakte; ?></span>
						</div>
	                <?php endif; ?>

	                <?php if ( !empty($aantal_slaapkamers) ) : ?>
	                    <div class="p-2 pr-4 border border-black flex items-center gap-1">
	                    	<span>Slaapkamers: <?= $aantal_slaapkamers; ?></span>
	                   	</div>
	                <?php endif; ?>
	            </div>


			</header>
			<div>
				<h6>Omschrijving</h6>
				<p>Etiam ullamcorper elit ex, quis elementum nibh laoreet at. Vivamus maximus dolor nibh, quis rutrum sem dignissim hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
	        	<?php the_content(); ?>
	        </div>
		</div>

		<footer class="flex justify-end overflow-hidden mt-6">
			<a class="btn4" href="#plannen-downloaden">Plannen downloaden</a>
			<a class="btn3" href="#info-aanvragen">
				<svg
					viewBox="0 0 20 40" 
			    	xmlns="http://www.w3.org/2000/svg"
			    	version="1.1"
			    >
				 	<polygon points="0,40 20,40 20,0" />
				</svg>
				<span>Info aanvragen</span>
			</a>
		</footer>
	</div>

</article>
