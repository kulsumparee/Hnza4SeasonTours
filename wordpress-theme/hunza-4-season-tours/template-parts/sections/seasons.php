<?php
/**
 * Seasons cards (SeasonsSection.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_seasons = apply_filters(
	'h4s_seasons',
	array(
		array(
			'label'       => __( 'SPRING', 'hunza-4-season-tours' ),
			'title'       => __( 'Spring Across Pakistan', 'hunza-4-season-tours' ),
			'description' => __( 'March to May. From apricot and cherry blossoms in Hunza and Chitral to the tulip gardens of Islamabad, the whole country bursts into color against snow-capped peaks.', 'hunza-4-season-tours' ),
			'best_for'    => __( 'Blossoms & Mild Weather', 'hunza-4-season-tours' ),
			'image'       => h4s_img( 'spring.jpeg' ),
		),
		array(
			'label'       => __( 'SUMMER', 'hunza-4-season-tours' ),
			'title'       => __( 'Summer Across Pakistan', 'hunza-4-season-tours' ),
			'description' => __( 'June to August. Lush green northern valleys, crystal-clear lakes perfect for boating, and full access to high mountain passes. The ideal time for adventure and family trips.', 'hunza-4-season-tours' ),
			'best_for'    => __( 'Adventure & Family Tours', 'hunza-4-season-tours' ),
			'image'       => h4s_img( 'summer.jpg' ),
		),
		array(
			'label'       => __( 'AUTUMN', 'hunza-4-season-tours' ),
			'title'       => __( 'Autumn Across Pakistan', 'hunza-4-season-tours' ),
			'description' => __( 'September to November. Hunza and Swat transform into golden paradises as poplar and fruit trees turn amber, while historical cities enjoy the clearest skies for sightseeing.', 'hunza-4-season-tours' ),
			'best_for'    => __( 'Photography & Scenic Views', 'hunza-4-season-tours' ),
			'image'       => h4s_img( 'autumn.jpeg' ),
		),
		array(
			'label'       => __( 'WINTER', 'hunza-4-season-tours' ),
			'title'       => __( 'Winter Across Pakistan', 'hunza-4-season-tours' ),
			'description' => __( 'December to February. Snow-covered northern valleys and cozy hill stations up north, alongside mild, pleasant weather for exploring Lahore, Multan, and the historical south.', 'hunza-4-season-tours' ),
			'best_for'    => __( 'Peace & Snow Landscapes', 'hunza-4-season-tours' ),
			'image'       => h4s_img( 'winter.jpeg' ),
		),
	)
);
?>
<section id="seasons" class="section-padding bg-golden-glow">
	<div class="container-content">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'YEAR-ROUND BEAUTY', 'hunza-4-season-tours' ),
					'heading'        => __( 'Pakistan in Every Season', 'hunza-4-season-tours' ),
					'subheading'     => __( 'Each season paints Pakistan with its own magical colors. Discover which one calls to you.', 'hunza-4-season-tours' ),
					'overline_color' => 'text-warm-gold',
				)
			);
			?>
		</div>

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal="stagger" data-reveal-children=".season-card" data-reveal-stagger="0.15">
			<?php foreach ( $h4s_seasons as $h4s_season ) : ?>
				<div class="season-card bg-white rounded-2xl overflow-hidden shadow-card transition-all duration-300 hover:-translate-y-1 hover:shadow-card-hover group">
					<div class="aspect-[4/3] overflow-hidden">
						<img src="<?php echo esc_url( $h4s_season['image'] ); ?>" alt="<?php echo esc_attr( $h4s_season['title'] ); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.06]">
					</div>
					<div class="p-3">
						<p class="font-body font-medium text-xs uppercase tracking-[0.1em] text-warm-gold">
							<?php echo esc_html( $h4s_season['label'] ); ?>
						</p>
						<h3 class="font-display font-medium text-xl md:text-2xl text-mountain mt-2">
							<?php echo esc_html( $h4s_season['title'] ); ?>
						</h3>
						<p class="font-body text-[0.9375rem] text-stone-color mt-3 leading-relaxed">
							<?php echo esc_html( $h4s_season['description'] ); ?>
						</p>
						<span class="inline-block mt-4 bg-emerald-green/10 text-emerald-green font-body font-medium text-xs px-4 py-1.5 rounded-full">
							<?php echo esc_html( $h4s_season['best_for'] ); ?>
						</span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
