<?php
/**
 * Multi-day signature tours grid (ToursSection.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="tours" class="section-padding bg-white">
	<div class="container-content">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'         => __( 'FIXED ITINERARIES', 'hunza-4-season-tours' ),
					'heading'          => __( 'Multi-Day Signature Tours', 'hunza-4-season-tours' ),
					'subheading'       => __( 'Pick a ready-made itinerary and click through for the full day-by-day plan.', 'hunza-4-season-tours' ),
					'overline_color'   => 'text-warm-gold',
					'heading_color'    => 'text-mountain',
					'subheading_color' => 'text-stone-color',
				)
			);
			?>
		</div>

		<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8 md:mx-20" data-reveal="stagger" data-reveal-children=".tour-card" data-reveal-stagger="0.12">
			<?php foreach ( h4s_get_tours() as $h4s_tour ) : ?>
				<a href="<?php echo esc_url( h4s_tour_url( $h4s_tour['slug'] ) ); ?>" class="tour-card group relative aspect-[3/4] rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1.5">
					<img src="<?php echo esc_url( $h4s_tour['card_image'] ); ?>" alt="<?php echo esc_attr( $h4s_tour['name'] ); ?>" loading="lazy" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
					<div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-black/10"></div>
					<div class="absolute top-4 left-4 inline-flex items-center gap-1.5 bg-white/15 backdrop-blur-sm text-white font-body font-medium text-xs px-3 py-1.5 rounded-full">
						<?php h4s_icon( 'calendar', 12 ); ?>
						<?php echo esc_html( $h4s_tour['duration'] ); ?>
					</div>
					<div class="absolute bottom-0 left-0 right-0 p-6">
						<p class="font-body font-medium text-xs uppercase tracking-[0.1em] text-warm-gold mb-2">
							<?php echo esc_html( $h4s_tour['overline'] ); ?>
						</p>
						<h3 class="font-display font-medium text-2xl text-white"><?php echo esc_html( $h4s_tour['name'] ); ?></h3>
						<p class="font-body font-light text-sm text-white/75 mt-1.5 mb-4">
							<?php echo esc_html( $h4s_tour['tagline'] ); ?>
						</p>
						<span class="inline-flex items-center gap-2 font-body font-medium text-sm text-white border border-white/40 rounded-full py-2.5 px-5 transition-all duration-300 group-hover:bg-warm-gold group-hover:border-warm-gold">
							<?php esc_html_e( 'View Itinerary', 'hunza-4-season-tours' ); ?>
							<?php h4s_icon( 'arrow-right', 15 ); ?>
						</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
