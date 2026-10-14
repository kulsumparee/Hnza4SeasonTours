<?php
/**
 * Destinations grid (DestinationsSection.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="destinations" class="section-padding bg-ice">
	<div class="container-content">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'PLACES TO VISIT', 'hunza-4-season-tours' ),
					'heading'        => __( 'Explore Pakistan, Region by Region', 'hunza-4-season-tours' ),
					'subheading'     => __( 'From the peaks of the Karakoram to the historic streets of Lahore, pick a region to discover its places.', 'hunza-4-season-tours' ),
					'overline_color' => 'text-emerald-green',
				)
			);
			?>
		</div>

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4" data-reveal="stagger" data-reveal-children=".region-card" data-reveal-stagger="0.1">
			<?php foreach ( h4s_get_regions() as $h4s_region ) : ?>
				<a href="<?php echo esc_url( h4s_region_url( $h4s_region['slug'] ) ); ?>" class="region-card group relative block aspect-[4/5] rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-shadow duration-300">
					<img src="<?php echo esc_url( $h4s_region['hero_image'] ); ?>" alt="<?php echo esc_attr( $h4s_region['name'] ); ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.08]" loading="lazy">
					<div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.35) 55%, rgba(0,0,0,0.85) 100%);"></div>
					<div class="absolute bottom-0 left-0 right-0 p-6 md:p-7">
						<p class="font-body font-medium text-xs uppercase tracking-[0.12em] text-warm-gold mb-1">
							<?php echo esc_html( $h4s_region['overline'] ); ?>
						</p>
						<h3 class="font-display font-medium text-2xl md:text-[1.75rem] text-white">
							<?php echo esc_html( $h4s_region['name'] ); ?>
						</h3>
						<p class="font-body font-light text-sm text-white/80 mt-1 mb-5">
							<?php echo esc_html( $h4s_region['tagline'] ); ?>
						</p>
						<span class="inline-flex items-center gap-2 font-body font-medium text-sm text-white border border-white/40 rounded-full py-2.5 px-5 transition-all duration-300 group-hover:bg-warm-gold group-hover:border-warm-gold group-hover:text-mountain">
							<?php esc_html_e( 'Discover More', 'hunza-4-season-tours' ); ?>
							<?php h4s_icon( 'arrow-right', 16, 'transition-transform duration-300 group-hover:translate-x-1' ); ?>
						</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
