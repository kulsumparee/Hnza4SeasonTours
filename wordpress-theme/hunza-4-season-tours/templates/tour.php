<?php
/**
 * Tour page: /tours/{slug} (pages/TourDetailPage.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_tour = h4s_get_tour_by_slug( get_query_var( 'h4s_tour' ) );

get_header();

if ( ! $h4s_tour ) {
	h4s_not_found( __( 'Tour not found', 'hunza-4-season-tours' ), h4s_home_link( 'tours' ), __( 'Back to Tours', 'hunza-4-season-tours' ) );
	get_footer();
	return;
}

$h4s_inquiry = implode(
	"\n",
	array(
		'Tour Inquiry',
		'Tour: ' . $h4s_tour['name'],
		'Duration: ' . $h4s_tour['duration'],
	)
);

$h4s_duration_html = '<div class="flex items-center gap-2 mt-5 text-white/85">'
	. h4s_icon( 'calendar', 16, 'text-warm-gold', false )
	. '<span class="font-body text-sm">' . esc_html( $h4s_tour['duration'] ) . '</span>'
	. '</div>';

h4s_detail_hero(
	array(
		'image'             => $h4s_tour['hero_image'],
		'alt'               => $h4s_tour['name'],
		'back_href'         => h4s_home_link( 'tours' ),
		'back_label'        => __( 'Back to Tours', 'hunza-4-season-tours' ),
		'overline'          => $h4s_tour['overline'],
		'title'             => $h4s_tour['name'],
		'tagline'           => $h4s_tour['tagline'],
		'tagline_max_width' => 'max-w-[620px]',
		'extra'             => $h4s_duration_html,
	)
);

$h4s_total = count( $h4s_tour['itinerary'] );
?>

<section class="section-padding bg-white">
	<div class="container-content max-w-[900px]">
		<p class="font-body text-base md:text-lg text-stone-color leading-relaxed mb-10">
			<?php echo esc_html( $h4s_tour['description'] ); ?>
		</p>

		<div class="flex flex-wrap gap-3 mb-16">
			<?php foreach ( $h4s_tour['highlights'] as $h4s_highlight ) : ?>
				<span class="inline-flex items-center gap-2 bg-emerald-green/10 text-emerald-green font-body text-sm px-4 py-2 rounded-full">
					<?php h4s_icon( 'map-pin', 14 ); ?>
					<?php echo esc_html( $h4s_highlight ); ?>
				</span>
			<?php endforeach; ?>
		</div>

		<h2 class="font-display font-medium text-2xl md:text-3xl text-mountain mb-8">
			<?php esc_html_e( 'Day-by-Day Itinerary', 'hunza-4-season-tours' ); ?>
		</h2>

		<div class="space-y-0">
			<?php foreach ( $h4s_tour['itinerary'] as $h4s_i => $h4s_item ) : ?>
				<div class="relative pl-10 pb-10 last:pb-0">
					<?php if ( $h4s_i !== $h4s_total - 1 ) : ?>
						<div class="absolute left-[11px] top-8 bottom-0 w-px bg-stone-color/15"></div>
					<?php endif; ?>
					<div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-warm-gold/15 border-2 border-warm-gold flex items-center justify-center">
						<div class="w-2 h-2 rounded-full bg-warm-gold"></div>
					</div>
					<p class="font-body font-medium text-xs uppercase tracking-[0.1em] text-warm-gold mb-1.5">
						<?php echo esc_html( $h4s_item['day'] ); ?>
					</p>
					<h3 class="font-display font-medium text-lg md:text-xl text-mountain mb-2">
						<?php echo esc_html( $h4s_item['title'] ); ?>
					</h3>
					<p class="font-body text-[0.9375rem] text-stone-color leading-relaxed">
						<?php echo esc_html( $h4s_item['details'] ); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="text-center border-t border-stone-color/10 pt-12 mt-8">
			<p class="font-body text-base text-stone-color mb-6">
				<?php
				printf(
					/* translators: %s: tour name */
					esc_html__( 'Ready to book the %s?', 'hunza-4-season-tours' ),
					esc_html( $h4s_tour['name'] )
				);
				?>
			</p>
			<div class="flex flex-wrap items-center justify-center gap-4">
				<?php
				h4s_gold_button(
					__( 'Inquire on WhatsApp', 'hunza-4-season-tours' ),
					array(
						'href'  => h4s_whatsapp_url( $h4s_inquiry ),
						'attrs' => array(
							'target' => '_blank',
							'rel'    => 'noopener noreferrer',
						),
					)
				);
				?>
				<a href="<?php echo esc_url( h4s_home_link( 'contact' ) ); ?>" class="inline-flex items-center justify-center font-body font-medium text-[0.9375rem] text-mountain border-2 border-mountain/20 rounded-full px-9 py-3.5 transition-all duration-300 hover:border-warm-gold hover:text-warm-gold">
					<?php esc_html_e( 'Get a Custom Quote', 'hunza-4-season-tours' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
