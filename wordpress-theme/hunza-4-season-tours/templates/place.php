<?php
/**
 * Place page: /destinations/{slug}/{placeSlug} (pages/PlaceDetailPage.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_result = h4s_get_place_by_slug( get_query_var( 'h4s_region' ), get_query_var( 'h4s_place' ) );

get_header();

if ( ! $h4s_result ) {
	h4s_not_found( __( 'Place not found', 'hunza-4-season-tours' ), h4s_home_link(), __( 'Back to Home', 'hunza-4-season-tours' ) );
	get_footer();
	return;
}

$h4s_region = $h4s_result['region'];
$h4s_place  = $h4s_result['place'];

$h4s_description = ! empty( $h4s_place['description'] )
	? $h4s_place['description']
	: sprintf(
		/* translators: 1: place name, 2: region name, 3: place subtitle (lower-case) */
		__( '%1$s is one of the must-visit places in %2$s, known for %3$s. Ask us about including it in your custom itinerary.', 'hunza-4-season-tours' ),
		$h4s_place['name'],
		$h4s_region['name'],
		function_exists( 'mb_strtolower' ) ? mb_strtolower( $h4s_place['subtitle'] ) : strtolower( $h4s_place['subtitle'] )
	);

$h4s_gallery = ! empty( $h4s_place['gallery'] ) ? (array) $h4s_place['gallery'] : array();

h4s_detail_hero(
	array(
		'image'      => $h4s_place['image'],
		'alt'        => $h4s_place['name'],
		'back_href'  => h4s_region_url( $h4s_region['slug'] ),
		/* translators: %s: region name */
		'back_label' => sprintf( __( 'Back to %s', 'hunza-4-season-tours' ), $h4s_region['name'] ),
		'overline'   => $h4s_region['overline'],
		'title'      => $h4s_place['name'],
		'tagline'    => $h4s_place['subtitle'],
	)
);
?>

<section class="section-padding bg-white">
	<div class="container-content max-w-[900px]">
		<p class="font-body text-base md:text-lg text-stone-color leading-relaxed mb-12">
			<?php echo esc_html( $h4s_description ); ?>
		</p>

		<?php if ( ! empty( $h4s_gallery ) ) : ?>
			<h2 class="font-display font-medium text-xl md:text-2xl text-mountain mb-6">
				<?php esc_html_e( 'More Photos', 'hunza-4-season-tours' ); ?>
			</h2>
			<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-16">
				<?php foreach ( $h4s_gallery as $h4s_i => $h4s_src ) : ?>
					<div class="aspect-square rounded-xl overflow-hidden shadow-card">
						<img src="<?php echo esc_url( $h4s_src ); ?>" alt="<?php echo esc_attr( $h4s_place['name'] . ' ' . ( $h4s_i + 2 ) ); ?>" class="w-full h-full object-cover" loading="lazy">
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="text-center border-t border-stone-color/10 pt-12">
			<p class="font-body text-base text-stone-color mb-6">
				<?php
				printf(
					/* translators: %s: place name */
					esc_html__( 'Want to include %s in your itinerary?', 'hunza-4-season-tours' ),
					esc_html( $h4s_place['name'] )
				);
				?>
			</p>
			<?php h4s_gold_button( __( 'Plan Your Trip', 'hunza-4-season-tours' ), array( 'href' => h4s_home_link( 'contact' ) ) ); ?>
		</div>
	</div>
</section>

<?php
get_footer();
