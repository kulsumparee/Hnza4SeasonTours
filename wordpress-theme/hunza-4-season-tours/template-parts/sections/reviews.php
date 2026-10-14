<?php
/**
 * Testimonials carousel (ReviewsSection.tsx) powered by Embla - see
 * initReviewsCarousel() in assets/js/main.js.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_reviews = apply_filters(
	'h4s_reviews',
	array(
		array(
			'stars'  => 5,
			'review' => __( 'An absolutely magical experience! Our guide knew every hidden corner of Hunza and made our family trip unforgettable. Highly recommended!', 'hunza-4-season-tours' ),
			'name'   => 'Sarah & Ahmed Khan',
			'detail' => __( 'Family Tour · Summer 2024', 'hunza-4-season-tours' ),
			'avatar' => 'https://media.istockphoto.com/id/2148093594/photo/beautiful-young-girl-in-a-hat-stands-against-the-backdrop-of-the-kilimanjaro-volcano-and.jpg?s=612x612&w=0&k=20&c=yNt4wjt9CBgZXK2_eC7WOK6MLnPesJNkIiUyJNRaGuw=',
		),
		array(
			'stars'  => 5,
			'review' => __( 'We chose the photography tour and it exceeded every expectation. The autumn colors were beyond words. We came home with over 2,000 incredible photos.', 'hunza-4-season-tours' ),
			'name'   => 'James & Emily Chen',
			'detail' => __( 'Photography Tour · Autumn 2024', 'hunza-4-season-tours' ),
			'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg',
		),
		array(
			'stars'  => 5,
			'review' => __( "The most well-organized tour we've ever experienced. Every detail was handled — transport, hotels, permits, meals. The hospitality touched our hearts deeply.", 'hunza-4-season-tours' ),
			'name'   => 'The Rahman Family',
			'detail' => __( 'Custom Tour · Spring 2024', 'hunza-4-season-tours' ),
			'avatar' => 'https://img.magnific.com/free-photo/cheerful-indian-businessman-smiling-closeup-portrait-jobs-career-campaign_53876-129416.jpg?semt=ais_hybrid&w=740&q=80',
		),
		array(
			'stars'  => 5,
			'review' => __( 'Our driver was punctual, friendly, and clearly loved sharing the culture and history of the country. The Khunjerab Pass crossing was a once-in-a-lifetime moment.', 'hunza-4-season-tours' ),
			'name'   => 'Hana & Daniyal Iqbal',
			'detail' => __( 'Honeymoon Tour · Winter 2024', 'hunza-4-season-tours' ),
			'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFLJRK5_czH7ZoaD2TEN9ursY_N9CnNGj-c7InAt2f9A&s=10',
		),
		array(
			'stars'  => 5,
			'review' => __( 'Trekking to Deosai Plains with this team felt completely safe and well-paced. Worth every single rupee.', 'hunza-4-season-tours' ),
			'name'   => 'Markus Weber',
			'detail' => __( 'Trekking Tour · Summer 2024', 'hunza-4-season-tours' ),
			'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxdmpo8zF7VsbuLwCqCqyFa3jL8okzwXoT2O2KSrFpIg&s=10',
		),
	)
);

$h4s_nav_button = 'inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shrink-0 outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 size-8 rounded-full border shadow-xs bg-white/10 border-white/20 text-white hover:bg-warm-gold hover:text-mountain hover:border-warm-gold';
?>
<section id="reviews" class="section-padding bg-mountain relative overflow-hidden">
	<div class="pointer-events-none absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[600px] rounded-full bg-warm-gold/10 blur-3xl"></div>

	<div class="container-content relative">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'TESTIMONIALS', 'hunza-4-season-tours' ),
					'heading'        => __( 'What Our Guests Say', 'hunza-4-season-tours' ),
					'overline_color' => 'text-warm-gold',
					'heading_color'  => 'text-white',
				)
			);
			?>
		</div>

		<div class="mt-12" data-reveal="fade-up" data-reveal-delay="0.1">
			<div class="relative w-full" role="region" aria-roledescription="carousel" aria-label="<?php esc_attr_e( 'Guest reviews', 'hunza-4-season-tours' ); ?>" data-reviews-carousel>
				<div class="overflow-hidden" data-carousel-viewport>
					<div class="flex -ml-4 md:-ml-6 py-10">
						<?php foreach ( $h4s_reviews as $h4s_index => $h4s_review ) : ?>
							<div role="group" aria-roledescription="slide" class="min-w-0 shrink-0 grow-0 pl-4 md:pl-6 basis-[88%] sm:basis-[70%] md:basis-[52%] lg:basis-[40%]">
								<div class="<?php echo esc_attr( h4s_classes( 'review-card relative mx-auto max-w-md bg-white rounded-3xl pt-12 pb-8 px-6 md:px-8 shadow-2xl transition-all duration-500 ease-out', 0 === $h4s_index ? 'opacity-100 scale-100 blur-none' : 'opacity-40 scale-90 blur-[1px]' ) ); ?>" data-review-card>
									<img src="<?php echo esc_url( $h4s_review['avatar'] ); ?>" alt="<?php echo esc_attr( $h4s_review['name'] ); ?>" loading="lazy" class="absolute -top-8 left-1/2 -translate-x-1/2 w-16 h-16 rounded-full object-cover ring-4 ring-white shadow-lg">

									<div class="flex justify-center gap-1 mt-2">
										<?php for ( $h4s_i = 0; $h4s_i < (int) $h4s_review['stars']; $h4s_i++ ) : ?>
											<?php h4s_icon( 'star', 14, 'text-warm-gold fill-warm-gold' ); ?>
										<?php endfor; ?>
									</div>

									<p class="font-body text-[0.9375rem] text-mountain text-center leading-relaxed italic mt-4">
										"<?php echo esc_html( $h4s_review['review'] ); ?>"
									</p>

									<p class="mt-6 font-body font-semibold text-center text-mountain">
										<?php echo esc_html( $h4s_review['name'] ); ?>
									</p>
									<p class="font-body text-sm text-center text-emerald-green font-medium mt-0.5">
										<?php echo esc_html( $h4s_review['detail'] ); ?>
									</p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="flex justify-center gap-4 mt-4">
					<button type="button" class="<?php echo esc_attr( $h4s_nav_button ); ?>" data-carousel-prev>
						<?php h4s_icon( 'arrow-left', 16 ); ?>
						<span class="sr-only"><?php esc_html_e( 'Previous slide', 'hunza-4-season-tours' ); ?></span>
					</button>
					<button type="button" class="<?php echo esc_attr( $h4s_nav_button ); ?>" data-carousel-next>
						<?php h4s_icon( 'arrow-right', 16 ); ?>
						<span class="sr-only"><?php esc_html_e( 'Next slide', 'hunza-4-season-tours' ); ?></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
