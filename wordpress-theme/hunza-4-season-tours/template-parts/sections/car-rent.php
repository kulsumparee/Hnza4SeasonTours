<?php
/**
 * Car rental (CarRentSection.tsx). "Reserve" buttons open WhatsApp with
 * the vehicle details - see initWhatsAppMessages() in assets/js/main.js.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_vehicles = apply_filters(
	'h4s_vehicles',
	array(
		array(
			'icon'        => 'car',
			'name'        => __( 'Car', 'hunza-4-season-tours' ),
			'price'       => __( 'From PKR 8,000/day', 'hunza-4-season-tours' ),
			'capacity'    => __( '4 Passengers', 'hunza-4-season-tours' ),
			'cartype'     => __( 'Luxury', 'hunza-4-season-tours' ),
			'image'       => 'https://northbackend.northonwheels.com/storage/uploads/image_6166.jpg',
			'description' => __( 'Comfortable, air-conditioned sedans perfect for city travel and short valley trips within Hunza.', 'hunza-4-season-tours' ),
			'features'    => array(
				__( 'Experienced driver included', 'hunza-4-season-tours' ),
				__( 'Air conditioning', 'hunza-4-season-tours' ),
				__( 'Fuel efficient', 'hunza-4-season-tours' ),
				__( 'Best for paved roads', 'hunza-4-season-tours' ),
			),
		),
		array(
			'icon'        => 'mountain',
			'name'        => __( 'Jeep', 'hunza-4-season-tours' ),
			'price'       => __( 'From PKR 15,000/day', 'hunza-4-season-tours' ),
			'capacity'    => __( '4-6 Passengers', 'hunza-4-season-tours' ),
			'cartype'     => __( 'Adventure', 'hunza-4-season-tours' ),
			'image'       => 'https://static.pakwheels.com/2018/02/jeeps.jpg',
			'description' => __( "Rugged 4x4 vehicles built for Hunza's mountain roads, off-road tracks, and high-altitude passes.", 'hunza-4-season-tours' ),
			'features'    => array(
				__( 'Experienced mountain driver', 'hunza-4-season-tours' ),
				__( 'Ideal for Khunjerab, Naltar & Passu', 'hunza-4-season-tours' ),
				__( 'Off-road capability', 'hunza-4-season-tours' ),
				__( '4-wheel drive', 'hunza-4-season-tours' ),
			),
		),
		array(
			'icon'        => 'users',
			'name'        => __( 'Hiace Van', 'hunza-4-season-tours' ),
			'price'       => __( 'From PKR 20,000/day', 'hunza-4-season-tours' ),
			'capacity'    => __( '6-10 Passengers', 'hunza-4-season-tours' ),
			'cartype'     => __( 'Luxury', 'hunza-4-season-tours' ),
			'image'       => 'https://rawalpindirenta.car.blog/wp-content/uploads/2023/09/img-20230315-wa00184349268153053958908.jpg?w=1024',
			'description' => __( 'Spacious vans perfect for families and small groups traveling together across the north.', 'hunza-4-season-tours' ),
			'features'    => array(
				__( 'Extra luggage space', 'hunza-4-season-tours' ),
				__( 'Comfortable seating', 'hunza-4-season-tours' ),
				__( 'AC & heater', 'hunza-4-season-tours' ),
				__( 'Driver included', 'hunza-4-season-tours' ),
			),
		),
		array(
			'icon'        => 'bus',
			'name'        => __( 'Coaster Bus', 'hunza-4-season-tours' ),
			'price'       => __( 'Custom Quote', 'hunza-4-season-tours' ),
			'capacity'    => __( '20+ Passengers', 'hunza-4-season-tours' ),
			'cartype'     => __( 'Luxury', 'hunza-4-season-tours' ),
			'image'       => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK1S200gmhhFwmdy4jCjp_MY_KkLsc3lh8n3vxVtQFDvnhHvPVH7AqVsI&s=10',
			'description' => __( 'Large group transport for tour groups, weddings, and corporate trips across Pakistan.', 'hunza-4-season-tours' ),
			'features'    => array(
				__( 'Group travel specialist', 'hunza-4-season-tours' ),
				__( 'Professional driver', 'hunza-4-season-tours' ),
				__( 'Long-distance ready', 'hunza-4-season-tours' ),
				__( 'Custom itineraries', 'hunza-4-season-tours' ),
			),
		),
	)
);

$h4s_trust_points = array(
	array( 'shield-check', __( 'Verified & Insured Vehicles', 'hunza-4-season-tours' ) ),
	array( 'map-pinned', __( 'Local Routes, Expert Drivers', 'hunza-4-season-tours' ) ),
	array( 'clock-3', __( '24/7 Booking Support', 'hunza-4-season-tours' ) ),
);
?>
<section id="car-rent" class="section-padding bg-mist">
	<div class="container-content">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'CAR RENTAL', 'hunza-4-season-tours' ),
					'heading'        => __( 'Rent a Car for Your Journey', 'hunza-4-season-tours' ),
					'subheading'     => __( 'Well maintained vehicles with experienced drivers, ready to take you across Hunza and beyond from city sedans to rugged 4x4 jeeps.', 'hunza-4-season-tours' ),
					'overline_color' => 'text-warm-gold',
				)
			);
			?>
		</div>

		<div class="flex flex-wrap items-center justify-center gap-4 sm:gap-8 mb-12">
			<?php foreach ( $h4s_trust_points as $h4s_point ) : ?>
				<div class="flex items-center gap-2.5">
					<?php h4s_icon( $h4s_point[0], 20, 'text-emerald-green flex-shrink-0' ); ?>
					<span class="font-body font-medium text-sm text-mountain"><?php echo esc_html( $h4s_point[1] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-5" data-reveal="stagger" data-reveal-children=".vehicle-card" data-reveal-stagger="0.12">
			<?php
			foreach ( $h4s_vehicles as $h4s_vehicle ) :
				$h4s_message = implode(
					"\n",
					array(
						'Car Rental Reservation',
						'Vehicle: ' . $h4s_vehicle['name'],
						'Price: ' . $h4s_vehicle['price'],
						'Capacity: ' . $h4s_vehicle['capacity'],
						'CarType: ' . $h4s_vehicle['cartype'],
						'Includes: ' . implode( ', ', $h4s_vehicle['features'] ),
					)
				);
				?>
				<div class="vehicle-card group bg-white rounded-2xl overflow-hidden shadow-card transition-all duration-300 hover:-translate-y-1.5 hover:shadow-card-hover">
					<div class="relative aspect-[4/3] overflow-hidden bg-mountain">
						<img src="<?php echo esc_url( $h4s_vehicle['image'] ); ?>" alt="<?php echo esc_attr( $h4s_vehicle['name'] ); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
						<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
						<span class="absolute top-4 left-4 inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm font-body font-medium text-xs text-mountain px-3 py-1.5 rounded-full">
							<?php h4s_icon( $h4s_vehicle['icon'], 14, 'text-emerald-green' ); ?>
							<?php echo esc_html( $h4s_vehicle['capacity'] ); ?>
						</span>
						<span class="absolute top-4 right-2 inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm font-body font-medium text-xs text-mountain px-3 py-1.5 rounded-full">
							<?php echo esc_html( $h4s_vehicle['cartype'] ); ?>
						</span>
						<h3 class="absolute bottom-4 left-2 font-display font-medium text-xl text-white drop-shadow-sm">
							<?php echo esc_html( $h4s_vehicle['name'] ); ?>
						</h3>
					</div>

					<div class="p-3 md:p-4">
						<p class="font-body font-semibold text-lg text-warm-gold"><?php echo esc_html( $h4s_vehicle['price'] ); ?></p>
						<p class="font-body font-light text-[0.9375rem] text-stone-color mt-3 leading-relaxed">
							<?php echo esc_html( $h4s_vehicle['description'] ); ?>
						</p>
						<ul class="mt-5 space-y-2.5">
							<?php foreach ( $h4s_vehicle['features'] as $h4s_feature ) : ?>
								<li class="flex items-center gap-2.5">
									<?php h4s_icon( 'check', 16, 'text-emerald-green flex-shrink-0' ); ?>
									<span class="font-body text-sm text-stone-color"><?php echo esc_html( $h4s_feature ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<a
							href="<?php echo esc_url( h4s_whatsapp_url( $h4s_message ) ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							class="block mt-7 w-full text-center font-body font-medium text-sm text-mountain border border-black/10 rounded-full py-3 transition-all duration-300 hover:bg-warm-gold hover:text-white hover:border-warm-gold"
						>
							<?php esc_html_e( 'Reserve This Vehicle', 'hunza-4-season-tours' ); ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="mt-12 flex flex-col items-center gap-4 text-center">
			<p class="font-body font-light text-sm text-stone-color max-w-xl">
				<?php esc_html_e( 'All rentals include a professional driver familiar with local routes. Rates vary by season, duration, and distance reach out for an exact quote.', 'hunza-4-season-tours' ); ?>
			</p>
			<?php h4s_whatsapp_button( __( 'Ask About Car Rental', 'hunza-4-season-tours' ), 'filled' ); ?>
		</div>
	</div>
</section>
