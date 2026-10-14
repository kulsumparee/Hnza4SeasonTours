<?php
/**
 * Hero (HeroSection.tsx). Background rotation, intro timeline and parallax
 * are driven by assets/js/main.js via the data-hero* attributes.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_backgrounds = apply_filters(
	'h4s_hero_backgrounds',
	array(
		'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=1920&q=85',
		'https://upload.wikimedia.org/wikipedia/commons/c/c8/Badshahi_Mosque_front_picture.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/4/4f/Lahore_Fort_view_from_Baradari.jpg',
		'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1920&q=85',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Ali_Mujtaba_WLM2017_FAISAL_MOSQUE_019.jpg/1920px-Ali_Mujtaba_WLM2017_FAISAL_MOSQUE_019.jpg',
	)
);
?>
<section id="hero" class="relative md:min-h-[100dvh] flex items-center justify-center overflow-hidden" data-hero>
	<div
		class="absolute inset-0 z-0"
		style="background-image: url('<?php echo esc_url( $h4s_backgrounds[0] ); ?>'); background-size: cover; background-position: center; transition: background-image 1s ease-in-out;"
		data-hero-bg
		data-backgrounds="<?php echo esc_attr( wp_json_encode( array_values( $h4s_backgrounds ) ) ); ?>"
	>
		<div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(0,0,0,0.35) 0%, rgba(0,0,0,0.55) 70%, rgba(0,0,0,0.8) 100%);"></div>
	</div>

	<div class="relative z-10 text-center max-w-[900px] mx-auto px-4 sm:px-6 pt-20">
		<p class="font-body font-medium text-[10px] md:text-[12px] uppercase tracking-[0.12em] text-warm-gold mb-6 opacity-0" data-hero-overline>
			<?php esc_html_e( 'PREMIUM PRIVATE TOURS · ACROSS PAKISTAN', 'hunza-4-season-tours' ); ?>
		</p>

		<h1 class="font-display font-medium text-white leading-[1.05] tracking-[-0.02em] mb-6" style="font-size: clamp(2.5rem, 6vw, 5.5rem);" data-hero-headline>
			<?php
			printf(
				/* translators: %s: highlighted country name */
				esc_html__( 'Explore the Beauty & History of %s', 'hunza-4-season-tours' ),
				'<span class="text-warm-gold">' . esc_html__( 'Pakistan', 'hunza-4-season-tours' ) . '</span>'
			);
			?>
		</h1>

		<p class="font-body font-light md:text-lg text-white/85 max-w-[600px] mx-auto mb-10 leading-relaxed opacity-0" data-hero-sub>
			<?php
			printf(
				/* translators: %s: guide name */
				esc_html__( 'Personalized tours crafted by %s - Your local guide', 'hunza-4-season-tours' ),
				esc_html( h4s_contact( 'guide_name' ) )
			);
			?>
		</p>

		<div class="flex flex-wrap items-center justify-center gap-4 pb-10" data-hero-cta>
			<?php h4s_gold_button( __( 'Book Your Tour', 'hunza-4-season-tours' ), array( 'href' => '#contact' ) ); ?>
			<a
				href="<?php echo esc_url( h4s_whatsapp_url() ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				class="inline-flex items-center gap-2 bg-[#25D366] text-white font-body font-medium text-[0.9375rem] p-3 md:px-7 md:py-3.5 rounded-full transition-all duration-300 hover:scale-[1.02] hover:bg-[#1da851] opacity-0"
			>
				<?php h4s_whatsapp_icon( 'w-[25px] h-[25px] fill-white' ); ?>
				<?php esc_html_e( 'WhatsApp', 'hunza-4-season-tours' ); ?>
			</a>
		</div>
	</div>

	<button type="button" class="absolute bottom-4 left-1/2 -translate-x-1/2 z-10 cursor-pointer opacity-0" aria-label="<?php esc_attr_e( 'Scroll down', 'hunza-4-season-tours' ); ?>" data-hero-scroll>
		<?php h4s_icon( 'chevron-down', 24, 'text-white/60 animate-float' ); ?>
	</button>
</section>
