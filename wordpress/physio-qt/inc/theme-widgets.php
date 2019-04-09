<?php
/**
 * Get all the custom widgets for the Theme
 *
 * @package pysio-qt
 */

/* Icon Box Widget */
require get_theme_file_path( '/inc/widgets/widget-icon-box.php' );

/* Opening Hours Widget */
require get_theme_file_path( '/inc/widgets/widget-opening-hours.php' );

/* Featured Page Widget */
require get_theme_file_path( '/inc/widgets/widget-featured-page.php' );

/* Social Icons Widget */
require get_theme_file_path( '/inc/widgets/widget-social-icons.php' );

/* Testimonials Widget */
require get_theme_file_path( '/inc/widgets/widget-testimonials.php' );

/* Call To Action Banner Widget */
require get_theme_file_path( '/inc/widgets/widget-cta-banner.php' );

/* Counter Box Widget */
require get_theme_file_path( '/inc/widgets/widget-counter.php' );

/* Recent Post Block Widget */
require get_theme_file_path( '/inc/widgets/widget-recent-posts-block.php' );

/* Brochure Widget */
require get_theme_file_path( '/inc/widgets/widget-brochure.php' );

/* Facebook Page Box Widget */
require get_theme_file_path( '/inc/widgets/widget-facebook.php' );

/* Team Member Widget */
require get_theme_file_path( '/inc/widgets/widget-team-member.php' );

/* Register all widgets */
function physio_qt_register_widget() {

	// Define all theme widgets
	$physio_qt_widget_names = array(
		'QT_Brochure',
		'QT_Counter',
		'QT_Call_To_Action',
		'QT_Facebook',
		'QT_Feature_Page',
		'QT_Icon_Box',
		'QT_Opening_Hours',
		'QT_Recent_Posts_Block',
		'QT_Social_Icons',
		'QT_Team_Member',
		'QT_Testimonials'
	);

	foreach ( $physio_qt_widget_names as $widget_names ) {
		register_widget( $widget_names );
	}
}
add_action( 'widgets_init', 'physio_qt_register_widget' );