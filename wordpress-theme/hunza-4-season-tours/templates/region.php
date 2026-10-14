<?php
/**
 * Region page: /destinations/{slug} (pages/RegionPage.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_region = h4s_get_region_by_slug( get_query_var( 'h4s_region' ) );

get_header();

if ( ! $h4s_region ) {
	h4s_not_found( __( 'Region not found', 'hunza-4-season-tours' ), h4s_home_link(), __( 'Back to Home', 'hunza-4-season-tours' ) );
	get_footer();
	return;
}

h4s_detail_hero(
	array(
		'image'      => $h4s_region['hero_image'],
		'alt'        => $h4s_region['name'],
		'back_href'  => h4s_home_link( 'destinations' ),
		'back_label' => __( 'Back to Destinations', 'hunza-4-season-tours' ),
		'overline'   => $h4s_region['overline'],
		'title'      => $h4s_region['name'],
		'tagline'    => $h4s_region['tagline'],
		'min_height' => 'min-h-[55vh] md:min-h-[65vh]',
	)
);
?>

<section class="section-padding bg-white">
	<div class="container-content">
		<div class="flex flex-col justify-center items-center">
			<h2 class="font-display font-medium text-2xl md:text-4xl text-mountain mb-8 text-center">
				<?php
				printf(
					/* translators: %s: region name */
					esc_html__( 'Places to Visit in %s', 'hunza-4-season-tours' ),
					'<span>' . esc_html( $h4s_region['name'] ) . '</span>'
				);
				?>
			</h2>

			<p class="font-body text-base md:text-lg text-stone-color leading-relaxed max-w-[760px] mb-14 text-center">
				<?php echo esc_html( $h4s_region['description'] ); ?>
			</p>
		</div>

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal="stagger" data-reveal-children=".place-card" data-reveal-stagger="0.08">
			<?php foreach ( $h4s_region['places'] as $h4s_place ) : ?>
				<div class="place-card group relative aspect-[3/4] rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-shadow duration-300">
					<img src="<?php echo esc_url( $h4s_place['image'] ); ?>" alt="<?php echo esc_attr( $h4s_place['name'] ); ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.08]" loading="lazy">
					<div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 40%, rgba(0,0,0,0.75) 100%);"></div>
					<div class="absolute bottom-0 left-0 right-0 p-6">
						<h3 class="font-display font-medium text-xl text-white">
							<?php echo esc_html( $h4s_place['name'] ); ?>
						</h3>
						<p class="font-body font-light text-sm text-white/80 mt-1 mb-3">
							<?php echo esc_html( $h4s_place['subtitle'] ); ?>
						</p>
						<a href="<?php echo esc_url( h4s_place_url( $h4s_region['slug'], $h4s_place['name'] ) ); ?>" class="inline-block font-body font-medium text-xs text-white border border-white/40 rounded-full py-2 px-4 transition-all duration-300 hover:bg-warm-gold hover:border-warm-gold hover:text-mountain">
							<?php esc_html_e( 'More Details', 'hunza-4-season-tours' ); ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="text-center mt-16">
			<p class="font-body text-base text-stone-color mb-6">
				<?php
				printf(
					/* translators: %s: region name */
					esc_html__( 'Ready to explore %s with a local guide?', 'hunza-4-season-tours' ),
					esc_html( $h4s_region['name'] )
				);
				?>
			</p>
			<?php h4s_gold_button( __( 'Plan Your Trip', 'hunza-4-season-tours' ), array( 'href' => h4s_home_link( 'contact' ) ) ); ?>
		</div>
	</div>
</section>

<?php
get_footer();
