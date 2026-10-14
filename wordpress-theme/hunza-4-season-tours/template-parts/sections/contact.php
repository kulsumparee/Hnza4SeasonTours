<?php
/**
 * Contact form + info + map (ContactSection.tsx). The form is validated in
 * the browser and opens WhatsApp with the inquiry - see initContactForm()
 * in assets/js/main.js.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_tour_options = apply_filters(
	'h4s_tour_options',
	array(
		__( 'Family Tour', 'hunza-4-season-tours' ),
		__( 'Couple Tour', 'hunza-4-season-tours' ),
		__( 'Adventure Tour', 'hunza-4-season-tours' ),
		__( 'Photography Tour', 'hunza-4-season-tours' ),
		__( 'Custom Tour', 'hunza-4-season-tours' ),
		__( 'Car Rental', 'hunza-4-season-tours' ),
	)
);

$h4s_input_class = 'w-full px-4 py-3.5 border border-black/10 rounded-[10px] bg-white font-body text-base text-mountain placeholder:text-stone-color/50 focus:border-emerald-green focus:outline-none focus:ring-[3px] focus:ring-emerald-green/10 transition-all';
$h4s_label_class = 'font-body font-medium text-sm text-mountain mb-2 block';
$h4s_error_class = 'text-red-500 text-xs mt-1 font-body hidden';
?>
<section id="contact" class="section-padding bg-white">
	<div class="container-content">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'GET IN TOUCH', 'hunza-4-season-tours' ),
					'heading'        => __( 'Start Your Pakistan Adventure', 'hunza-4-season-tours' ),
					'subheading'     => __( "Tell us about your dream trip and we'll craft the perfect experience for you. No obligation, just a friendly conversation.", 'hunza-4-season-tours' ),
					'overline_color' => 'text-warm-gold',
				)
			);
			?>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
			<div data-reveal="fade-up" data-reveal-delay="0.1">
				<div class="bg-mist rounded-2xl p-3 md:p-12">
					<form class="space-y-5" data-contact-form novalidate>
						<div>
							<label for="contact-name" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Your Name', 'hunza-4-season-tours' ); ?></label>
							<input type="text" id="contact-name" name="name" placeholder="<?php esc_attr_e( 'Enter your full name', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_input_class ); ?>" data-required data-error-message="<?php esc_attr_e( 'Please enter your name', 'hunza-4-season-tours' ); ?>">
							<p class="<?php echo esc_attr( $h4s_error_class ); ?>" data-error-for="name"></p>
						</div>

						<div>
							<label for="contact-email" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Email Address', 'hunza-4-season-tours' ); ?></label>
							<input type="email" id="contact-email" name="email" placeholder="your@email.com" class="<?php echo esc_attr( $h4s_input_class ); ?>" data-required data-error-message="<?php esc_attr_e( 'Please enter your email', 'hunza-4-season-tours' ); ?>" data-invalid-message="<?php esc_attr_e( 'Please enter a valid email', 'hunza-4-season-tours' ); ?>">
							<p class="<?php echo esc_attr( $h4s_error_class ); ?>" data-error-for="email"></p>
						</div>

						<div>
							<label for="contact-phone" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Phone / WhatsApp', 'hunza-4-season-tours' ); ?></label>
							<input type="tel" id="contact-phone" name="phone" placeholder="+92 300 1234567" class="<?php echo esc_attr( $h4s_input_class ); ?>" data-required data-error-message="<?php esc_attr_e( 'Please enter your phone number', 'hunza-4-season-tours' ); ?>">
							<p class="<?php echo esc_attr( $h4s_error_class ); ?>" data-error-for="phone"></p>
						</div>

						<div>
							<label for="contact-tour-type" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Interested In', 'hunza-4-season-tours' ); ?></label>
							<select id="contact-tour-type" name="tourType" class="<?php echo esc_attr( $h4s_input_class ); ?>" data-required data-error-message="<?php esc_attr_e( 'Please select a tour type', 'hunza-4-season-tours' ); ?>">
								<option value=""><?php esc_html_e( 'Select a tour type', 'hunza-4-season-tours' ); ?></option>
								<?php foreach ( $h4s_tour_options as $h4s_option ) : ?>
									<option value="<?php echo esc_attr( $h4s_option ); ?>"><?php echo esc_html( $h4s_option ); ?></option>
								<?php endforeach; ?>
							</select>
							<p class="<?php echo esc_attr( $h4s_error_class ); ?>" data-error-for="tourType"></p>
						</div>

						<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
							<div>
								<label for="contact-dates" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Preferred Travel Dates', 'hunza-4-season-tours' ); ?></label>
								<input type="text" id="contact-dates" name="travelDates" placeholder="<?php esc_attr_e( 'e.g., July 15-22, 2025', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_input_class ); ?>">
							</div>
							<div>
								<label for="contact-group-size" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Number of Travelers', 'hunza-4-season-tours' ); ?></label>
								<input type="number" id="contact-group-size" name="groupSize" placeholder="<?php esc_attr_e( 'e.g., 4', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_input_class ); ?>">
							</div>
						</div>

						<div>
							<label for="contact-message" class="<?php echo esc_attr( $h4s_label_class ); ?>"><?php esc_html_e( 'Tell Us About Your Trip', 'hunza-4-season-tours' ); ?></label>
							<textarea id="contact-message" name="message" rows="5" placeholder="<?php esc_attr_e( 'Share your interests, must-see places, special requirements...', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_input_class ); ?>"></textarea>
						</div>

						<?php
						h4s_gold_button(
							__( 'Send Inquiry', 'hunza-4-season-tours' ),
							array(
								'type'       => 'submit',
								'full_width' => true,
							)
						);
						?>
					</form>

					<div class="text-center py-8 hidden" data-contact-success>
						<?php h4s_icon( 'check-circle', 48, 'text-emerald-green mx-auto mb-4' ); ?>
						<h3 class="font-display font-medium text-2xl text-mountain mb-2">
							<?php esc_html_e( 'Thank You!', 'hunza-4-season-tours' ); ?>
						</h3>
						<p class="font-body text-base text-stone-color mb-6">
							<?php esc_html_e( "We've received your inquiry and will get back to you within 24 hours.", 'hunza-4-season-tours' ); ?>
						</p>
						<?php h4s_whatsapp_button( __( 'Chat on WhatsApp', 'hunza-4-season-tours' ), 'small', array( 'class' => 'mx-auto' ) ); ?>
					</div>
				</div>
			</div>

			<div class="space-y-8" data-reveal="fade-up" data-reveal-delay="0.2">
				<div class="bg-[#25D366]/[0.08] border border-[#25D366]/20 rounded-2xl p-8">
					<div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#25D366] mb-4">
						<?php h4s_whatsapp_icon( 'w-[25px] h-[25px] fill-white' ); ?>
					</div>
					<h4 class="font-body font-semibold text-lg text-mountain mb-1">
						<?php esc_html_e( 'Chat on WhatsApp', 'hunza-4-season-tours' ); ?>
					</h4>
					<p class="font-body text-base text-stone-color mb-4">+<?php echo esc_html( h4s_contact( 'whatsapp' ) ); ?></p>
					<?php h4s_whatsapp_button( __( 'Chat Now', 'hunza-4-season-tours' ), 'filled' ); ?>
				</div>

				<div class="flex items-start gap-4">
					<?php h4s_icon( 'phone', 24, 'text-emerald-green flex-shrink-0 mt-0.5' ); ?>
					<div>
						<h4 class="font-body font-semibold text-base text-mountain"><?php esc_html_e( 'Call Us', 'hunza-4-season-tours' ); ?></h4>
						<a href="<?php echo esc_attr( h4s_tel_href() ); ?>" class="font-body text-[0.9375rem] text-stone-color hover:text-emerald-green transition-colors">
							<?php echo esc_html( h4s_contact( 'phone' ) ); ?>
						</a>
					</div>
				</div>

				<div class="flex items-start gap-4">
					<?php h4s_icon( 'mail', 24, 'text-emerald-green flex-shrink-0 mt-0.5' ); ?>
					<div>
						<h4 class="font-body font-semibold text-base text-mountain"><?php esc_html_e( 'Email Us', 'hunza-4-season-tours' ); ?></h4>
						<a href="mailto:<?php echo esc_attr( h4s_contact( 'email' ) ); ?>" class="font-body text-[0.9375rem] text-stone-color hover:text-emerald-green transition-colors">
							<?php echo esc_html( h4s_contact( 'email' ) ); ?>
						</a>
					</div>
				</div>

				<div class="flex items-start gap-4">
					<?php h4s_icon( 'map-pin', 24, 'text-emerald-green flex-shrink-0 mt-0.5' ); ?>
					<div>
						<h4 class="font-body font-semibold text-base text-mountain"><?php esc_html_e( 'Find Us', 'hunza-4-season-tours' ); ?></h4>
						<p class="font-body text-[0.9375rem] text-stone-color">
							<?php echo esc_html( h4s_contact( 'address' ) ); ?>
						</p>
					</div>
				</div>

				<div class="flex items-start gap-4">
					<?php h4s_icon( 'clock', 24, 'text-emerald-green flex-shrink-0 mt-0.5' ); ?>
					<div>
						<h4 class="font-body font-semibold text-base text-mountain"><?php esc_html_e( 'Response Time', 'hunza-4-season-tours' ); ?></h4>
						<p class="font-body text-[0.9375rem] text-stone-color">
							<?php esc_html_e( 'We typically respond within 2-4 hours during business hours.', 'hunza-4-season-tours' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<?php if ( '' !== h4s_contact( 'map_embed' ) ) : ?>
			<div class="mt-16 rounded-2xl overflow-hidden">
				<iframe
					src="<?php echo esc_url( h4s_contact( 'map_embed' ) ); ?>"
					width="100%"
					height="400"
					style="border: 0;"
					allowfullscreen
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					title="<?php esc_attr_e( 'Hunza Valley Location', 'hunza-4-season-tours' ); ?>"
					class="rounded-2xl"
				></iframe>
			</div>
		<?php endif; ?>
	</div>
</section>
