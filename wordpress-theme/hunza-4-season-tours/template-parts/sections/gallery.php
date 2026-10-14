<?php
/**
 * Masonry-style gallery with "See More" (GallerySection.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_gallery = apply_filters(
	'h4s_gallery_images',
	array(
		array( 'gallery/gallery2.jpeg', __( 'Karimabad Village Beneath the Karakoram Peaks', 'hunza-4-season-tours' ), 'col-span-2 row-span-2' ),
		array( 'gallery/gallery44.jpeg', __( 'Rakaposhi Peak in Spring Bloom', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery13.jpeg', __( 'Passu Cones Along the Karakoram Highway', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery16.jpeg', __( 'Suspension Bridge Over the Hunza River', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery33.jpeg', __( 'Meeting a Hunza Elder', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/galler3.jpeg', __( 'Camping on the Glacier', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery22.jpeg', __( 'Khunjerab Pass, Pak-China Border', 'hunza-4-season-tours' ), 'col-span-2 row-span-1' ),
		array( 'gallery/gallery5.jpeg', __( 'Trekking to Passu Cones', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery17.jpeg', __( 'Exploring a Traditional Hunza Home', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery9.jpeg', __( 'Girls in Traditional Hunza Dress', 'hunza-4-season-tours' ), 'col-span-2 row-span-1' ),
		array( 'gallery/gallery66.jpeg', __( 'Cultural Festival Attire', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery18.jpeg', __( 'Snowfall on the Mountain Pass', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery12.jpeg', __( 'Driving the Karakoram Highway', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
		array( 'gallery/gallery19.jpeg', __( 'River Rocks in Gojal Valley', 'hunza-4-season-tours' ), 'col-span-1 row-span-1' ),
	)
);

// Fills the first 3 rows of the 4-column grid.
$h4s_initial_visible = 8;
?>
<section id="gallery" class="section-padding bg-white">
	<div class="container-content">
		<div data-reveal="fade-up">
			<?php
			h4s_section_header(
				array(
					'overline'       => __( 'VISUAL JOURNEY', 'hunza-4-season-tours' ),
					'heading'        => __( 'Moments from Pakistan', 'hunza-4-season-tours' ),
					'overline_color' => 'text-emerald-green',
				)
			);
			?>
		</div>

		<div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]" data-gallery data-reveal="stagger" data-reveal-children=".gallery-item:not(.hidden)" data-reveal-stagger="0.08">
			<?php foreach ( $h4s_gallery as $h4s_index => $h4s_image ) : ?>
				<div class="<?php echo esc_attr( h4s_classes( 'gallery-item group relative overflow-hidden rounded-xl', $h4s_image[2], $h4s_index >= $h4s_initial_visible ? 'hidden' : '' ) ); ?>" <?php echo $h4s_index >= $h4s_initial_visible ? 'data-gallery-hidden' : ''; ?>>
					<img src="<?php echo h4s_img( $h4s_image[0] ); ?>" alt="<?php echo esc_attr( $h4s_image[1] ); ?>" loading="lazy" class="absolute inset-0 w-full h-full object-cover transition-transform duration-600 group-hover:scale-[1.06]">
					<div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-end">
						<span class="font-body font-medium text-sm text-white p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
							<?php echo esc_html( $h4s_image[1] ); ?>
						</span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( count( $h4s_gallery ) > $h4s_initial_visible ) : ?>
			<div class="mt-10 text-center" data-gallery-more-wrap>
				<button type="button" class="inline-flex items-center gap-2 font-body font-medium text-sm text-white bg-emerald-green rounded-full py-3 px-9 transition-all duration-300 hover:bg-warm-gold" data-gallery-more>
					<?php esc_html_e( 'See More', 'hunza-4-season-tours' ); ?>
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>
