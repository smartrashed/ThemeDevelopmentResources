<?php
/**
 * burder functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package burder
 */

define( 'BURDER_ASSETS' , get_template_directory_uri() . '/assets' );

/**
 * Load Core
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/static.php';
require get_template_directory() . '/inc/dynamic-fonts.php';


require get_template_directory() . '/inc/includes/comment-template.php';
require get_template_directory() . '/inc/includes/pagination.php';
require get_template_directory() . '/inc/includes/woocommerce_hooks.php';


/* Tgm Plugin */
require get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm-plugin-activation/tgm-plugin-setup.php';

/*Nav Walker */
require get_template_directory() . '/inc/burder_multi_page_navwalker.php';
require get_template_directory() . '/inc/burder_one_page_bootstrap_navwalker.php';

/*Widgets */
require_once get_template_directory(). '/inc/widgets/widget.php';







if (defined('FW')):

/*framework */	

/*require get_template_directory() . '/framework-customizations/shortcodes/shortcodes';*/
require get_template_directory() . '/framework-customizations/config/theme_config.php';
require get_template_directory() . '/framework-customizations/theme/config.php';
require get_template_directory() . '/framework-customizations/theme/manifest.php';
require get_template_directory() . '/framework-customizations/theme/options/settings.php';
require get_template_directory() . '/framework-customizations/theme/options/posts/page.php';
require get_template_directory() . '/framework-customizations/theme/options/posts/price_table.php';
require get_template_directory() . '/framework-customizations/theme/options/posts/projects.php';
require get_template_directory() . '/framework-customizations/theme/options/posts/team.php';
require get_template_directory() . '/framework-customizations/theme/options/posts/testimonial.php';

endif;

/*Widgets */
function burder_custom_widgets() {
	register_widget( 'Widget_Categories' );
	register_widget( 'Burder_Right_Sidebar_Recent_Posts' );
}

add_action( 'widgets_init', 'burder_custom_widgets' );

require_once get_template_directory(). '/inc/widgets/burder-categories.php';
require_once get_template_directory(). '/inc/widgets/right-sidebar-recent-post.php';
