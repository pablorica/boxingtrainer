<?php 
// Template Name: Gift Page
?>
<?php get_header(); ?>
	<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?>">
        <div class="inner-page-content">						

            <?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>

                <?php 
                // Banner
                get_template_part('template-parts/pages/gift-page/banner');

                // Text Section 1
                get_template_part('template-parts/pages/gift-page/text-section-1');

                // Text Section 2
                get_template_part('template-parts/pages/gift-page/text-section-2');
                ?>

            <?php endwhile; endif; ?>

        </div><?php // .inner-page-content ?>
	</div><?php // #main ?>
<?php get_footer(); ?>
