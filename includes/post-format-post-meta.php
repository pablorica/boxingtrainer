

<?php
/**
 * Post rendering meta content according to caller of get_template_part.
 *
 * @package     LPD ABCPersonal
 * @author      Pablo Rica <pablo@codigo.co.uk>
 * @since       1.1.0
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!-- lpd-abcpersonal/includes/post-format-post-meta.php -->
<div class="post-meta">
    <ul>
        <?php if (lpd_abcpersonal_front_functions::lpd_abcpersonal_get_categories()) {?>
        <li><i class="material-icons">&#xE893;</i><?php echo lpd_abcpersonal_front_functions::lpd_abcpersonal_get_categories();?></li>
        <?php }?>
        <?php /* ?>
        <li><i class="material-icons">&#xE7FD;</i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></li>
        <li><i class="material-icons">&#xE0BF;</i><?php comments_popup_link( '0', '1', '%', 'comments-link', esc_html__('Comments are off for this post', 'lpd-abcpersonal')); ?></li>
        <?php */ ?>
    </ul>
</div>
<!-- End lpd-abcpersonal/includes/post-format-post-meta.php -->