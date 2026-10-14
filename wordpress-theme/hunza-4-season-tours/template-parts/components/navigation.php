<?php
/**
 * Fixed top navigation + mobile overlay (Navigation.tsx).
 *
 * Uses the "primary" menu location when one is assigned; otherwise falls back
 * to the original hard-coded anchor links.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_nav_links = array(
	array( __( 'Destinations', 'hunza-4-season-tours' ), h4s_home_link( 'destinations' ) ),
	array( __( 'AboutUs', 'hunza-4-season-tours' ), h4s_home_link( 'about' ) ),
	array( __( 'Itineraries', 'hunza-4-season-tours' ), h4s_home_link( 'tours' ) ),
	array( __( 'Car Rent', 'hunza-4-season-tours' ), h4s_home_link( 'car-rent' ) ),
	array( __( 'Gallery', 'hunza-4-season-tours' ), h4s_home_link( 'gallery' ) ),
	array( __( 'Reviews', 'hunza-4-season-tours' ), h4s_home_link( 'reviews' ) ),
);

$h4s_desktop_link_class = 'font-display text-mountain transition-colors duration-300 hover:text-warm-gold';
$h4s_mobile_link_class  = 'font-display text-2xl text-mountain hover:text-warm-gold transition-colors';

if ( ! function_exists( 'h4s_print_nav_links' ) ) :
/**
 * Print the nav links either from the WP menu or the fallback list.
 *
 * @param string $link_class Classes for each <a>.
 * @param array  $fallback   Fallback links.
 */
function h4s_print_nav_links( $link_class, $fallback ) {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'depth'          => 1,
				'walker'         => new H4S_Tailwind_Menu_Walker( $link_class, true ),
			)
		);
		return;
	}

	foreach ( $fallback as $link ) {
		printf(
			'<a href="%s" class="%s">%s</a>',
			esc_url( $link[1] ),
			esc_attr( $link_class ),
			esc_html( $link[0] )
		);
	}
}
endif;
?>

<nav id="site-nav" class="fixed top-0 left-0 right-0 z-[1000] bg-white h-16 md:h-20 transition-all duration-400 bg-transparent" data-nav>
	<div class="max-w-content mx-auto h-full flex items-center justify-between px-4 sm:px-6 lg:px-8">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center" aria-label="<?php bloginfo( 'name' ); ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( 'class' => 'h-12 md:h-14 w-auto' ) ); ?>
			<?php else : ?>
				<img src="<?php echo h4s_img( 'logo1.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-12 md:h-14 w-auto">
			<?php endif; ?>
		</a>

		<div class="hidden lg:flex items-center gap-8">
			<?php h4s_print_nav_links( $h4s_desktop_link_class, $h4s_nav_links ); ?>
		</div>

		<div class="hidden lg:block">
			<?php
			h4s_gold_button(
				__( 'Book Your Tour', 'hunza-4-season-tours' ),
				array(
					'href'  => h4s_home_link( 'contact' ),
					'class' => 'text-sm py-2.5 px-6',
				)
			);
			?>
		</div>

		<button type="button" class="lg:hidden p-2 text-mountain transition-colors hover:text-warm-gold" aria-label="<?php esc_attr_e( 'Toggle menu', 'hunza-4-season-tours' ); ?>" aria-expanded="false" aria-controls="mobile-menu" data-nav-toggle>
			<?php h4s_icon( 'menu', 24, '' ); ?>
			<?php h4s_icon( 'x', 24, 'hidden' ); ?>
		</button>
	</div>
</nav>

<div id="mobile-menu" class="fixed inset-0 z-[999] bg-white transition-transform duration-400 lg:hidden translate-x-full" data-mobile-menu>
	<div class="flex flex-col items-center justify-center pt-10 h-full gap-5">
		<?php h4s_print_nav_links( $h4s_mobile_link_class, $h4s_nav_links ); ?>
		<?php
		h4s_gold_button(
			__( 'Book Your Tour', 'hunza-4-season-tours' ),
			array(
				'href'  => h4s_home_link( 'contact' ),
				'class' => 'mt-4',
			)
		);
		?>
	</div>
</div>
