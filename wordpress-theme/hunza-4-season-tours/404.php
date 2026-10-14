<?php
/**
 * 404 template.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

h4s_not_found( __( 'Page not found', 'hunza-4-season-tours' ), h4s_home_link(), __( 'Back to Home', 'hunza-4-season-tours' ) );

get_footer();
