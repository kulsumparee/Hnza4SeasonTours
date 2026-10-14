<?php
/**
 * About / guide intro + stats (AboutSection.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_stats = apply_filters(
	'h4s_about_stats',
	array(
		array( 'shield', 25, '+', __( 'Years Experience', 'hunza-4-season-tours' ) ),
		array( 'users', 2000, '+', __( 'Happy Travelers', 'hunza-4-season-tours' ) ),
		array( 'map', 500, '+', __( 'Destinations', 'hunza-4-season-tours' ) ),
		array( 'heart', 4, '', __( 'Seasons of Tours', 'hunza-4-season-tours' ) ),
	)
);
?>
<section id="about" class="section-padding bg-white" data-about>
	<div class="container-content">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
			<div class="order-2 lg:order-1 flex gap-4 items-end">
				<div class="w-[58%] aspect-[3/4] rounded-2xl overflow-hidden opacity-0" data-about-img-left>
					<img src="<?php echo h4s_img( 'about11.jpg' ); ?>" alt="<?php esc_attr_e( 'Badshahi Mosque, Lahore', 'hunza-4-season-tours' ); ?>" class="w-full h-full object-cover">
				</div>
				<div class="w-[38%] aspect-[4/5] rounded-2xl overflow-hidden mb-8 opacity-0" data-about-img-right>
					<img src="<?php echo h4s_img( 'client1.png' ); ?>" alt="<?php esc_attr_e( 'Rakaposhi peak', 'hunza-4-season-tours' ); ?>" class="w-full h-full object-cover">
				</div>
			</div>

			<div class="order-1 lg:order-2 text-center lg:text-left" data-about-text>
				<p class="reveal-item font-body font-medium text-sm uppercase tracking-[0.12em] text-emerald-green mb-4">
					<?php esc_html_e( 'Your Local Guide', 'hunza-4-season-tours' ); ?>
				</p>

				<h2 class="reveal-item font-display font-medium text-3xl md:text-4xl lg:text-5xl leading-tight text-mountain mb-6">
					<?php
					printf(
						/* translators: %s: guide name */
						esc_html__( "I'm %s", 'hunza-4-season-tours' ),
						'<span class="text-warm-gold">' . esc_html( h4s_contact( 'guide_name' ) ) . '</span>'
					);
					?>
					<br>
					<?php esc_html_e( 'Your Expert Local Guide', 'hunza-4-season-tours' ); ?>
				</h2>

				<div class="reveal-item w-12 h-0.5 bg-warm-gold mb-6"></div>

				<p class="reveal-item font-body text-base text-stone-color leading-relaxed mb-4">
					<?php esc_html_e( "Born and raised in the mountains of Hunza, I've spent over a decade sharing the hidden wonders of Pakistan with travelers from around the world from the Karakoram's icy peaks to the Mughal monuments of Lahore and the ancient ruins of the Indus Valley. What started as a passion for my homeland became a mission to show visitors the Pakistan that only locals know.", 'hunza-4-season-tours' ); ?>
				</p>

				<p class="reveal-item font-body text-base text-stone-color leading-relaxed mb-10">
					<?php esc_html_e( 'I handle all logistics transport, permits, accommodations so you can simply immerse yourself in the beauty and history of the country. Safety, comfort, and authentic connections are at the heart of every tour.', 'hunza-4-season-tours' ); ?>
				</p>

				<div class="reveal-item">
					<?php h4s_gold_button( __( 'Plan Your Journey', 'hunza-4-season-tours' ), array( 'href' => '#contact' ) ); ?>
				</div>
			</div>
		</div>

		<div class="grid grid-cols-4 gap-8 mt-9 md:mt-20 pt-12 border-t border-stone-color/10" data-about-stats>
			<?php foreach ( $h4s_stats as $h4s_stat ) : ?>
				<div class="stat-item opacity-0 flex flex-col items-center text-center gap-3">
					<div class="md:w-12 md:h-12 w-8 h-8 rounded-full bg-emerald-green/8 flex items-center justify-center">
						<?php h4s_icon( $h4s_stat[0], 22, 'text-emerald-green' ); ?>
					</div>
					<p class="font-display font-semibold text-2xl md:text-4xl text-mountain">
						<span data-counter data-counter-end="<?php echo (int) $h4s_stat[1]; ?>" data-counter-suffix="<?php echo esc_attr( $h4s_stat[2] ); ?>">0<?php echo esc_html( $h4s_stat[2] ); ?></span>
					</p>
					<p class="font-body text-[12px] md:text-sm text-stone-color"><?php echo esc_html( $h4s_stat[3] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
