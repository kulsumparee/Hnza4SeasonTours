<?php
/**
 * Floating WhatsApp button (FloatingWhatsApp.tsx).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<a
	href="<?php echo esc_url( h4s_whatsapp_url() ); ?>"
	target="_blank"
	rel="noopener noreferrer"
	aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'hunza-4-season-tours' ); ?>"
	class="group fixed bottom-6 right-6 z-[900] hidden md:flex items-center justify-start w-[55px] hover:w-[170px] h-[55px] rounded-full hover:rounded-[40px] bg-[#25D366] overflow-hidden shadow-xl transition-all duration-300 hover:shadow-2xl"
	data-floating-whatsapp
>
	<div class="flex items-center justify-center w-full group-hover:w-[30%] transition-all duration-300">
		<?php h4s_whatsapp_icon( 'w-[25px] h-[25px] fill-white' ); ?>
	</div>
	<span class="absolute right-0 w-0 opacity-0 group-hover:w-[70%] group-hover:opacity-100 text-white text-base font-semibold whitespace-nowrap transition-all duration-300">
		<?php esc_html_e( 'WhatsApp', 'hunza-4-season-tours' ); ?>
	</span>
</a>
