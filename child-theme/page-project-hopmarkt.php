<?php /* Template Name: Project Hopmarkt */ ?>


<?php
    $is_ajax = isset($_GET['ajax']) && $_GET['ajax'] == 1;
    $query   = hopmarkt_get_units_query();

    // Handle AJAX early
    if ($is_ajax) {
        get_template_part('template-parts/filter/filter', 'results', ['query' => $query]);
        exit;
    }
?>




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



<div class="py-24 bg-green">
    <div class="container">

        <?php get_template_part('template-parts/filter/filter', 'form'); ?>

        <div id="units-results">
            <?php get_template_part('template-parts/filter/filter', 'results', ['query' => $query]); ?>
        </div>

        <?php get_template_part('template-parts/filter/filter', 'script'); ?>

    </div>
</div>




<div class="bg-white py-24">
    <div class="container">
        <div class="flex flex-col-reverse md:flex-row items-center gap-4 md:gap-12 ">
            <picture class="flex-1">
                <img src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg" alt="">
            </picture>
            <div class="flex-1">
                <?php 
                    get_template_part(
                        'template-parts/components/ui', 'section-header', 
                        array(
                            'classes' => 'header2',
                            'label' => 'Praktisch',
                            'title'  => 'Locatie',
                            'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit.</p>'
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</div>





<div class="bg-green py-24">
    <div class="container">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div class="text-white flex flex-col justify-end">
                <div class="p-8 pt-48 bg-darkgreen rounded-md">
                    <h2>USP's</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p><p>Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit.</p>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-md">
                <div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg');"></div>
                <img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="flex flex-col text-white text-center lo--usp-bubble">
                        <h2>Test</h2>
                        <div>Lorem ipsum</div>
                    </div>
                </div>
            </div>
            
            <div class="relative overflow-hidden rounded-md">
                <div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_008.jpg');"></div>
                <img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
            </div>
            <div class="relative overflow-hidden rounded-md">
                <div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_009.jpg');"></div>
                <img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
            </div>
            <div class="relative overflow-hidden rounded-md">
                <div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_010.jpg');"></div>
                <img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
            </div>

            <div class="relative overflow-hidden rounded-md">
                <div class="absolute inset-0 bg-no-repeat bg-cover" style="background-image: url('https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg');"></div>
                <img class="opacity-0 pointer-events-none" src="https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_012.jpg">
            </div>
        </div>

    </div>
</div>





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
                                'label' => 'Omgeving',
                                'title'  => 'Persona',
                                'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p><p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>'
                            )
                        );
                    ?>
                </div>
                <div class="relative p-12 bg-green md:w-[65%]">
                    <header>
                        <div class="label">foobar</div>
                        <h4>Lorme ipsum</h4>
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