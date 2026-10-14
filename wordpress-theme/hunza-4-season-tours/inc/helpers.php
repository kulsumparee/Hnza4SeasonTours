<?php
/**
 * Small helpers shared by templates: contact info, URLs, images, slugs.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default contact details (editable under Appearance > Customize > Contact Details).
 *
 * @return array<string,string>
 */
function h4s_contact_defaults() {
	return array(
		'guide_name' => 'Ibrahim Aliyar',
		'phone'      => '+923468486217',
		'whatsapp'   => '923468486217',
		'email'      => 'hunza4seasontour@gmail.com',
		'address'    => 'Nasirabad Hunza, Hunza Valley, Gilgit-Baltistan, Pakistan',
		'facebook'   => 'https://www.facebook.com/profile.php?id=61592243046320',
		'instagram'  => 'https://instagram.com',
		'map_embed'  => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16263.24538307594!2d74.6486111!3d36.3166667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e8a0b6c0e5c6b1%3A0x3e5c0c0c0c0c0c0c!2sKarimabad%2C%20Hunza%2C%20Gilgit-Baltistan%2C%20Pakistan!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s',
	);
}

/**
 * Read a contact detail, falling back to the hard-coded default.
 *
 * @param string $key Key from h4s_contact_defaults().
 * @return string
 */
function h4s_contact( $key ) {
	$defaults = h4s_contact_defaults();
	$value    = get_theme_mod( 'h4s_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
	$value    = is_string( $value ) ? trim( $value ) : '';

	if ( 'whatsapp' === $key ) {
		$value = preg_replace( '/\D+/', '', $value );
	}

	return $value;
}

/**
 * Build a wa.me link, optionally with a prefilled message.
 *
 * @param string $message Optional message.
 * @return string
 */
function h4s_whatsapp_url( $message = '' ) {
	$url = 'https://wa.me/' . h4s_contact( 'whatsapp' );
	if ( '' !== $message ) {
		$url .= '?text=' . rawurlencode( $message );
	}
	return $url;
}

/**
 * Phone number formatted for a tel: href.
 *
 * @return string
 */
function h4s_tel_href() {
	return 'tel:' . preg_replace( '/[^\d+]/', '', h4s_contact( 'phone' ) );
}

/**
 * URL of an image bundled with the theme.
 *
 * @param string $path Path relative to assets/images.
 * @return string
 */
function h4s_img( $path ) {
	return esc_url( H4S_URI . '/assets/images/' . ltrim( $path, '/' ) );
}

/**
 * Link to a section on the home page, e.g. h4s_home_link('contact') => /#contact.
 *
 * @param string $hash Section id without '#'.
 * @return string
 */
function h4s_home_link( $hash = '' ) {
	$url = home_url( '/' );
	return '' === $hash ? $url : $url . '#' . ltrim( $hash, '#' );
}

/**
 * Mirrors slugify() from regionsData.ts.
 *
 * @param string $name Human readable name.
 * @return string
 */
function h4s_slugify( $name ) {
	$slug = strtolower( $name );
	$slug = preg_replace( '/[^a-z0-9]+/', '-', $slug );
	return trim( $slug, '-' );
}

/**
 * Join Tailwind class fragments, dropping empties.
 *
 * @param string ...$classes Class fragments.
 * @return string
 */
function h4s_classes( ...$classes ) {
	$out = array();
	foreach ( $classes as $class ) {
		$class = trim( preg_replace( '/\s+/', ' ', (string) $class ) );
		if ( '' !== $class ) {
			$out[] = $class;
		}
	}
	return implode( ' ', $out );
}
