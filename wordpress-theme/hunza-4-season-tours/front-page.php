<?php
/**
 * Home page (pages/Home.tsx).
 *
 * Sections can be re-ordered or removed via the `h4s_home_sections` filter.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$h4s_sections = apply_filters(
	'h4s_home_sections',
	array(
		'sections/hero',
		'components/search-widget',
		'sections/destinations',
		'sections/about',
		'sections/tours',
		'sections/car-rent',
		'sections/seasons',
		'sections/gallery',
		'sections/reviews',
		'sections/faq',
		'sections/contact',
	)
);

foreach ( $h4s_sections as $h4s_section ) {
	get_template_part( 'template-parts/' . $h4s_section );
}

get_footer();
