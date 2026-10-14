<?php
/**
 * Search widget (SearchWidget.tsx). Submitting opens WhatsApp with the
 * selected values - see initSearchWidget() in assets/js/main.js.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$h4s_places = apply_filters(
	'h4s_search_places',
	array(
		'Islamabad, Pakistan',
		'Lahore, Pakistan',
		'Karachi, Pakistan',
		'Hunza Valley',
		'Skardu',
		'Gilgit',
		'Swat Valley',
		'Naran Kaghan',
		'Chitral',
		'Fairy Meadows',
		'Murree',
	)
);

$h4s_input_class = 'w-full font-body text-sm text-mountain bg-transparent outline-none placeholder:text-stone-color';
$h4s_date_class  = 'font-body text-sm text-mountain bg-transparent outline-none min-w-0 flex-1';
?>
<div class="relative z-20 -mt-8 md:-mt-10 px-4 sm:px-6">
	<form class="max-w-5xl mx-auto bg-white rounded-2xl md:rounded-full shadow-2xl p-3 md:p-2 flex flex-col md:flex-row items-stretch md:items-center gap-2 md:gap-0" data-search-widget novalidate>
		<div class="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2 md:border-r border-black/10">
			<?php h4s_icon( 'map-pin', 16, 'text-warm-gold flex-shrink-0' ); ?>
			<input type="text" name="from" list="search-widget-places" placeholder="<?php esc_attr_e( 'From', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_input_class ); ?>" autocomplete="off">
		</div>

		<div class="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2 md:border-r border-black/10">
			<?php h4s_icon( 'map-pin', 16, 'text-warm-gold flex-shrink-0' ); ?>
			<input type="text" name="to" list="search-widget-places" placeholder="<?php esc_attr_e( 'To', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_input_class ); ?>" autocomplete="off">
		</div>

		<datalist id="search-widget-places">
			<?php foreach ( $h4s_places as $h4s_place ) : ?>
				<option value="<?php echo esc_attr( $h4s_place ); ?>"></option>
			<?php endforeach; ?>
		</datalist>

		<div class="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2 md:border-r border-black/10">
			<button type="button" aria-label="<?php esc_attr_e( 'Open check-in calendar', 'hunza-4-season-tours' ); ?>" class="flex-shrink-0" data-open-picker="checkin">
				<?php h4s_icon( 'calendar', 16, 'text-warm-gold' ); ?>
			</button>
			<input type="date" name="checkin" id="search-checkin" aria-label="<?php esc_attr_e( 'Check-in date', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_date_class ); ?>" data-date="checkin">
			<span class="text-stone-color/40">-</span>
			<input type="date" name="checkout" id="search-checkout" aria-label="<?php esc_attr_e( 'Check-out date', 'hunza-4-season-tours' ); ?>" class="<?php echo esc_attr( $h4s_date_class ); ?>" data-date="checkout">
		</div>

		<div class="flex-1 flex items-center gap-1.5 px-4 py-1 md:py-2">
			<?php h4s_icon( 'users', 16, 'text-warm-gold flex-shrink-0' ); ?>
			<select name="guests" aria-label="<?php esc_attr_e( 'Guests', 'hunza-4-season-tours' ); ?>" class="w-full font-body text-sm bg-transparent outline-none appearance-none text-mountain">
				<option value="" disabled selected hidden class="text-stone-color"><?php esc_html_e( 'Guests', 'hunza-4-season-tours' ); ?></option>
				<option><?php esc_html_e( '1 Guest', 'hunza-4-season-tours' ); ?></option>
				<option><?php esc_html_e( '2 Guests', 'hunza-4-season-tours' ); ?></option>
				<option><?php esc_html_e( '3-5 Guests', 'hunza-4-season-tours' ); ?></option>
				<option><?php esc_html_e( '6+ Guests', 'hunza-4-season-tours' ); ?></option>
			</select>
		</div>

		<button type="submit" aria-label="<?php esc_attr_e( 'Search tours on WhatsApp', 'hunza-4-season-tours' ); ?>" class="flex-shrink-0 flex items-center justify-center gap-2 bg-warm-gold hover:brightness-110 transition-all rounded-xl md:rounded-full w-full md:w-14 h-12 md:h-14">
			<?php h4s_icon( 'search', 20, 'text-white' ); ?>
			<span class="font-body font-medium text-sm text-white md:hidden"><?php esc_html_e( 'Search', 'hunza-4-season-tours' ); ?></span>
		</button>
	</form>
</div>
