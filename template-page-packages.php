<?php 
// Template Name: Packages Page
?>
<?php get_header(); ?>
	<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?>">
        <div class="inner-page-content">						

            <?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>

                <?php 
                // Banner
                get_template_part('template-parts/pages/homepage/banner');

                // Packages
                get_template_part('template-parts/pages/packages/packages');
                ?>

            <?php endwhile; endif; ?>

        </div><?php // .inner-page-content ?>
	</div><?php // #main ?>
<?php get_footer(); ?>
