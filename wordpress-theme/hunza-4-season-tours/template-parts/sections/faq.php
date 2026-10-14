<?php
/**
 * FAQ accordion (FAQSection.tsx) - toggled by initFaq() in assets/js/main.js.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_faqs = apply_filters(
	'h4s_faqs',
	array(
		array(
			__( 'How do I book a tour with Hunza 4 Season Tours?', 'hunza-4-season-tours' ),
			sprintf(
				/* translators: %s: WhatsApp phone number */
				__( "Simply contact us via WhatsApp at %s, call us directly, or fill out the inquiry form below. We'll discuss your preferences and create a custom itinerary for you.", 'hunza-4-season-tours' ),
				'+' . h4s_contact( 'whatsapp' )
			),
		),
		array(
			__( 'What is the best time to visit Pakistan?', 'hunza-4-season-tours' ),
			__( 'Pakistan is beautiful year-round! Spring (Mar-May) offers cherry blossoms in the north, summer (Jun-Aug) has lush greenery and lake activities, autumn (Sep-Nov) brings golden colors, and winter (Dec-Feb) is ideal for exploring the historical south. Summer is the most popular season for the northern areas.', 'hunza-4-season-tours' ),
		),
		array(
			__( 'How much does a typical tour cost?', 'hunza-4-season-tours' ),
			__( 'Our tours start from PKR 25,000 per person for family tours. Prices vary based on group size, duration, accommodation type, destinations, and season. Contact us for a detailed, no-obligation quote.', 'hunza-4-season-tours' ),
		),
		array(
			__( 'Is Pakistan safe for tourists?', 'hunza-4-season-tours' ),
			__( 'Yes, the regions we operate in — from the northern valleys to the major historical cities — are welcoming and well-travelled by tourists. The local community is incredibly hospitable. We ensure all safety measures are in place for transport, accommodations, and activities.', 'hunza-4-season-tours' ),
		),
		array(
			__( 'Do you provide transport and accommodation?', 'hunza-4-season-tours' ),
			__( 'Absolutely. We arrange comfortable private transport (Prado, Coaster, or car based on group size) and quality hotel accommodations throughout your trip.', 'hunza-4-season-tours' ),
		),
		array(
			__( 'Can I customize my tour itinerary?', 'hunza-4-season-tours' ),
			__( 'Yes! All our tours are fully customizable. Whether you want to focus on photography, trekking, cultural experiences, or a relaxed family trip — we design it around your interests.', 'hunza-4-season-tours' ),
		),
		array(
			__( 'Do you offer tours for international tourists?', 'hunza-4-season-tours' ),
			__( 'Yes, we warmly welcome international guests. We can assist with travel planning from Islamabad, including flights to Gilgit if needed. English-speaking guides are available.', 'hunza-4-season-tours' ),
		),
	)
);
?>
<section id="faq" class="section-padding bg-ice">
	<div class="max-w-[800px] mx-auto px-4 sm:px-6">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'COMMON QUESTIONS', 'hunza-4-season-tours' ),
					'heading'        => __( 'Frequently Asked Questions', 'hunza-4-season-tours' ),
					'overline_color' => 'text-emerald-green',
				)
			);
			?>
		</div>

		<div class="space-y-3" data-faq data-reveal="stagger" data-reveal-children=".faq-item" data-reveal-stagger="0.08">
			<?php foreach ( $h4s_faqs as $h4s_index => $h4s_faq ) : ?>
				<div class="faq-item bg-white rounded-xl shadow-card overflow-hidden">
					<button type="button" class="w-full flex items-center justify-between px-3 md:px-7 py-5 text-left hover:bg-emerald-green/[0.03] transition-colors" aria-expanded="false" aria-controls="faq-answer-<?php echo (int) $h4s_index; ?>" data-faq-toggle>
						<span class="font-body font-medium text-base text-mountain pr-4">
							<?php echo esc_html( $h4s_faq[0] ); ?>
						</span>
						<?php h4s_icon( 'chevron-down', 20, 'text-stone-color flex-shrink-0 transition-transform duration-300' ); ?>
					</button>
					<div id="faq-answer-<?php echo (int) $h4s_index; ?>" class="overflow-hidden transition-[max-height] duration-400 ease-in-out" style="max-height: 0px;" data-faq-answer>
						<p class="font-body text-[0.9375rem] text-stone-color leading-relaxed px-6 md:px-7 pb-5">
							<?php echo esc_html( $h4s_faq[1] ); ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
