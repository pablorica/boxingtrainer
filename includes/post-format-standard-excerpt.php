
<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package     LPD ABCPersonal
 * @author      Pablo Rica <pablo@codigo.co.uk>
 * @since       1.1.0
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!-- lpd-abcpersonal/includes/post-format-standard-excerpt.php -->
 <div class="post-wrap">
        <div class="post-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
        <?php get_template_part('includes/post-format-post-meta');?>
        <div class="post-content">
            <?php the_excerpt(); ?>
        </div>
    </div>
<!-- End lpd-abcpersonal/includes/post-format-standard-excerpt.php -->