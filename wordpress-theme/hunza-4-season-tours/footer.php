<?php
/**
 * Site footer (Footer.tsx) + floating WhatsApp button.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_quick_links = array(
	array( __( 'Destinations', 'hunza-4-season-tours' ), h4s_home_link( 'destinations' ) ),
	array( __( 'Tour Packages', 'hunza-4-season-tours' ), h4s_home_link( 'tours' ) ),
	array( __( 'Gallery', 'hunza-4-season-tours' ), h4s_home_link( 'gallery' ) ),
	array( __( 'Reviews', 'hunza-4-season-tours' ), h4s_home_link( 'reviews' ) ),
	array( __( 'FAQ', 'hunza-4-season-tours' ), h4s_home_link( 'faq' ) ),
	array( __( 'Contact', 'hunza-4-season-tours' ), h4s_home_link( 'contact' ) ),
);
?>
</main>

<footer class="bg-mountain text-white">
	<div class="max-w-content mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-10">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">
			<div>
				<img src="<?php echo h4s_img( 'logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-16 w-auto mb-4 rounded-full">
				<p class="font-body font-light text-base text-stone-300 mb-6">
					<?php esc_html_e( 'Discover Pakistan in Every Season', 'hunza-4-season-tours' ); ?>
				</p>
				<?php get_template_part( 'template-parts/components/social-links' ); ?>
			</div>

			<div>
				<h4 class="font-display text-lg mb-6"><?php esc_html_e( 'Explore', 'hunza-4-season-tours' ); ?></h4>
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'space-y-3',
							'depth'          => 1,
							'link_before'    => '',
							'walker'         => new H4S_Tailwind_Menu_Walker( 'font-body text-sm text-stone-300 hover:text-white transition-colors duration-300' ),
						)
					);
				} else {
					?>
					<ul class="space-y-3">
						<?php foreach ( $h4s_quick_links as $h4s_link ) : ?>
							<li>
								<a href="<?php echo esc_url( $h4s_link[1] ); ?>" class="font-body text-sm text-stone-300 hover:text-white transition-colors duration-300">
									<?php echo esc_html( $h4s_link[0] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php
				}
				?>
			</div>

			<div>
				<h4 class="font-display text-lg mb-6"><?php esc_html_e( 'Contact Us', 'hunza-4-season-tours' ); ?></h4>
				<ul class="space-y-3 font-body text-sm text-stone-300">
					<li>
						<span class="text-white"><?php esc_html_e( 'Phone:', 'hunza-4-season-tours' ); ?></span>
						<a href="<?php echo esc_attr( h4s_tel_href() ); ?>" class="hover:text-white transition-colors">
							<?php echo esc_html( h4s_contact( 'phone' ) ); ?>
						</a>
					</li>
					<li>
						<span class="text-white"><?php esc_html_e( 'WhatsApp:', 'hunza-4-season-tours' ); ?></span>
						<a href="<?php echo esc_url( h4s_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">
							+<?php echo esc_html( h4s_contact( 'whatsapp' ) ); ?>
						</a>
					</li>
					<li>
						<span class="text-white"><?php esc_html_e( 'Email:', 'hunza-4-season-tours' ); ?></span>
						<a href="mailto:<?php echo esc_attr( h4s_contact( 'email' ) ); ?>" class="hover:text-white transition-colors">
							<?php echo esc_html( h4s_contact( 'email' ) ); ?>
						</a>
					</li>
					<li>
						<span class="text-white"><?php esc_html_e( 'Address:', 'hunza-4-season-tours' ); ?></span>
						<br>
						<?php echo esc_html( h4s_contact( 'address' ) ); ?>
					</li>
				</ul>
			</div>
		</div>

		<div class="border-t border-white/10 pt-8 mt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
			<p class="font-body text-xs text-stone-color">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'hunza-4-season-tours' ); ?>
			</p>
			<p class="font-body text-xs text-stone-color">
				<?php esc_html_e( 'Designed with love for the love of Pakistan', 'hunza-4-season-tours' ); ?>
			</p>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/components/floating-whatsapp' ); ?>

<?php wp_footer(); ?>
</body>
</html>
