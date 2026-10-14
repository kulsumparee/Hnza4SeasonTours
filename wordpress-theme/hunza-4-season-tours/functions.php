<?php
/**
 * Hunza 4 Season Tours theme bootstrap.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'H4S_VERSION', '1.0.0' );
define( 'H4S_DIR', get_template_directory() );
define( 'H4S_URI', get_template_directory_uri() );

require H4S_DIR . '/inc/helpers.php';
require H4S_DIR . '/inc/icons.php';
require H4S_DIR . '/inc/template-tags.php';
require H4S_DIR . '/inc/class-menu-walker.php';
require H4S_DIR . '/inc/data-regions.php';
require H4S_DIR . '/inc/data-tours.php';
require H4S_DIR . '/inc/routes.php';
require H4S_DIR . '/inc/customizer.php';

/**
 * Theme supports.
 */
function h4s_setup() {
	load_theme_textdomain( 'hunza-4-season-tours', H4S_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 112,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'hunza-4-season-tours' ),
			'footer'  => __( 'Footer Explore Links', 'hunza-4-season-tours' ),
		)
	);
}
add_action( 'after_setup_theme', 'h4s_setup' );

/**
 * Front-end assets.
 */
function h4s_enqueue_assets() {
	wp_enqueue_style(
		'h4s-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Inter:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'h4s-main', H4S_URI . '/assets/css/main.css', array( 'h4s-fonts' ), H4S_VERSION );

	wp_enqueue_script( 'gsap', H4S_URI . '/assets/vendor/gsap.min.js', array(), '3.15.0', true );
	wp_enqueue_script( 'gsap-scrolltrigger', H4S_URI . '/assets/vendor/ScrollTrigger.min.js', array( 'gsap' ), '3.15.0', true );
	wp_enqueue_script( 'lenis', H4S_URI . '/assets/vendor/lenis.min.js', array(), '1.3.25', true );
	wp_enqueue_script( 'embla-carousel', H4S_URI . '/assets/vendor/embla-carousel.umd.js', array(), '8.6.0', true );

	wp_enqueue_script(
		'h4s-main',
		H4S_URI . '/assets/js/main.js',
		array( 'gsap', 'gsap-scrolltrigger', 'lenis', 'embla-carousel' ),
		H4S_VERSION,
		true
	);

	wp_localize_script(
		'h4s-main',
		'H4S',
		array(
			'whatsapp' => h4s_contact( 'whatsapp' ),
			'homeUrl'  => home_url( '/' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'h4s_enqueue_assets' );

/**
 * Add preconnect hints for Google Fonts.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type.
 * @return array
 */
function h4s_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'h4s_resource_hints', 10, 2 );

/**
 * Body classes from the React layout wrapper.
 *
 * @param array $classes Body classes.
 * @return array
 */
function h4s_body_class( $classes ) {
	$classes[] = 'font-body';
	$classes[] = 'text-mountain';
	$classes[] = 'bg-white';
	return $classes;
}
add_filter( 'body_class', 'h4s_body_class' );

/**
 * Meta description used on index.html of the original app.
 */
function h4s_meta_description() {
	if ( ! is_front_page() ) {
		return;
	}
	$description = get_bloginfo( 'description' );
	if ( '' === $description ) {
		$description = __( 'Hunza 4 Season Tours - personalized private tours across Pakistan. Explore historical landmarks and breathtaking natural beauty, from Hunza Valley and Skardu to Lahore, Swat, and Mohenjo-daro.', 'hunza-4-season-tours' );
	}
	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
}
add_action( 'wp_head', 'h4s_meta_description', 1 );
