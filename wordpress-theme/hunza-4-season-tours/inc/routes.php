<?php
/**
 * Virtual routes mirroring the React Router config:
 *
 *   /destinations/{slug}              -> templates/region.php
 *   /destinations/{slug}/{placeSlug}  -> templates/place.php
 *   /tours/{slug}                     -> templates/tour.php
 *
 * The content comes from the PHP data arrays in inc/data-*.php, so no posts
 * or pages need to be created for these URLs to work.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register rewrite rules.
 */
function h4s_rewrite_rules() {
	add_rewrite_rule( '^destinations/([^/]+)/([^/]+)/?$', 'index.php?h4s_region=$matches[1]&h4s_place=$matches[2]', 'top' );
	add_rewrite_rule( '^destinations/([^/]+)/?$', 'index.php?h4s_region=$matches[1]', 'top' );
	add_rewrite_rule( '^tours/([^/]+)/?$', 'index.php?h4s_tour=$matches[1]', 'top' );
}
add_action( 'init', 'h4s_rewrite_rules' );

/**
 * Whitelist our query vars.
 *
 * @param array $vars Public query vars.
 * @return array
 */
function h4s_query_vars( $vars ) {
	$vars[] = 'h4s_region';
	$vars[] = 'h4s_place';
	$vars[] = 'h4s_tour';
	return $vars;
}
add_filter( 'query_vars', 'h4s_query_vars' );

/**
 * Rewrite rules are cached; refresh them when the theme is (de)activated.
 */
function h4s_flush_rewrite_rules() {
	h4s_rewrite_rules();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'h4s_flush_rewrite_rules' );
add_action( 'switch_theme', 'flush_rewrite_rules' );

/**
 * Which virtual route (if any) is being requested.
 *
 * @return string '' | 'region' | 'place' | 'tour'
 */
function h4s_current_route() {
	if ( '' !== get_query_var( 'h4s_tour', '' ) ) {
		return 'tour';
	}
	if ( '' !== get_query_var( 'h4s_region', '' ) ) {
		return '' !== get_query_var( 'h4s_place', '' ) ? 'place' : 'region';
	}
	return '';
}

/**
 * Does the requested virtual route point at existing data?
 *
 * @return bool
 */
function h4s_route_exists() {
	switch ( h4s_current_route() ) {
		case 'region':
			return null !== h4s_get_region_by_slug( get_query_var( 'h4s_region' ) );
		case 'place':
			return null !== h4s_get_place_by_slug( get_query_var( 'h4s_region' ), get_query_var( 'h4s_place' ) );
		case 'tour':
			return null !== h4s_get_tour_by_slug( get_query_var( 'h4s_tour' ) );
	}
	return false;
}

/**
 * Send the right status for virtual routes: WordPress would otherwise 404
 * them on a site with no posts, and unknown slugs should really be 404s.
 */
function h4s_route_status() {
	if ( '' === h4s_current_route() ) {
		return;
	}

	global $wp_query;
	$wp_query->is_home = false;

	if ( h4s_route_exists() ) {
		$wp_query->is_404 = false;
		status_header( 200 );
		return;
	}

	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
}
add_action( 'template_redirect', 'h4s_route_status' );

/**
 * Load our templates for the virtual routes.
 *
 * @param string $template Template WordPress resolved.
 * @return string
 */
function h4s_template_include( $template ) {
	$route = h4s_current_route();
	if ( '' === $route ) {
		return $template;
	}

	$file = H4S_DIR . '/templates/' . $route . '.php';
	return file_exists( $file ) ? $file : $template;
}
add_filter( 'template_include', 'h4s_template_include' );

/**
 * Page titles for the virtual routes.
 *
 * @param array $parts Title parts.
 * @return array
 */
function h4s_document_title( $parts ) {
	switch ( h4s_current_route() ) {
		case 'region':
			$region = h4s_get_region_by_slug( get_query_var( 'h4s_region' ) );
			$parts['title'] = $region ? $region['name'] : __( 'Region not found', 'hunza-4-season-tours' );
			break;
		case 'place':
			$result         = h4s_get_place_by_slug( get_query_var( 'h4s_region' ), get_query_var( 'h4s_place' ) );
			$parts['title'] = $result ? $result['place']['name'] . ' - ' . $result['region']['name'] : __( 'Place not found', 'hunza-4-season-tours' );
			break;
		case 'tour':
			$tour           = h4s_get_tour_by_slug( get_query_var( 'h4s_tour' ) );
			$parts['title'] = $tour ? $tour['name'] : __( 'Tour not found', 'hunza-4-season-tours' );
			break;
	}
	return $parts;
}
add_filter( 'document_title_parts', 'h4s_document_title' );

/**
 * Body class for the virtual routes.
 *
 * @param array $classes Body classes.
 * @return array
 */
function h4s_route_body_class( $classes ) {
	$route = h4s_current_route();
	if ( '' !== $route ) {
		$classes[] = 'h4s-' . $route;
	}
	return $classes;
}
add_filter( 'body_class', 'h4s_route_body_class' );

/**
 * Pretty or query-string URL depending on the permalink setting.
 *
 * @param string $path Pretty path, e.g. destinations/skardu.
 * @param array  $args Query args used when pretty permalinks are off.
 * @return string
 */
function h4s_route_url( $path, $args ) {
	if ( get_option( 'permalink_structure' ) ) {
		return home_url( user_trailingslashit( $path ) );
	}
	return add_query_arg( $args, home_url( '/' ) );
}

/**
 * URL of a region page.
 *
 * @param string $slug Region slug.
 * @return string
 */
function h4s_region_url( $slug ) {
	return h4s_route_url( 'destinations/' . $slug, array( 'h4s_region' => $slug ) );
}

/**
 * URL of a place page.
 *
 * @param string $region_slug Region slug.
 * @param string $place_name  Place name (slugified here).
 * @return string
 */
function h4s_place_url( $region_slug, $place_name ) {
	$place_slug = h4s_slugify( $place_name );
	return h4s_route_url(
		'destinations/' . $region_slug . '/' . $place_slug,
		array(
			'h4s_region' => $region_slug,
			'h4s_place'  => $place_slug,
		)
	);
}

/**
 * URL of a tour page.
 *
 * @param string $slug Tour slug.
 * @return string
 */
function h4s_tour_url( $slug ) {
	return h4s_route_url( 'tours/' . $slug, array( 'h4s_tour' => $slug ) );
}
