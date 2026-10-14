<?php
/**
 * Customizer: contact details that were hard-coded in the React app.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the "Contact Details" section.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function h4s_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'h4s_contact',
		array(
			'title'       => __( 'Contact Details', 'hunza-4-season-tours' ),
			'description' => __( 'Phone, WhatsApp, email and social links shown across the site.', 'hunza-4-season-tours' ),
			'priority'    => 30,
		)
	);

	$defaults = h4s_contact_defaults();

	$fields = array(
		'guide_name' => array( __( 'Guide name', 'hunza-4-season-tours' ), 'text', 'sanitize_text_field' ),
		'phone'      => array( __( 'Phone number', 'hunza-4-season-tours' ), 'text', 'sanitize_text_field' ),
		'whatsapp'   => array( __( 'WhatsApp number (digits only, with country code)', 'hunza-4-season-tours' ), 'text', 'h4s_sanitize_digits' ),
		'email'      => array( __( 'Email address', 'hunza-4-season-tours' ), 'email', 'sanitize_email' ),
		'address'    => array( __( 'Address', 'hunza-4-season-tours' ), 'textarea', 'sanitize_textarea_field' ),
		'facebook'   => array( __( 'Facebook URL', 'hunza-4-season-tours' ), 'url', 'esc_url_raw' ),
		'instagram'  => array( __( 'Instagram URL', 'hunza-4-season-tours' ), 'url', 'esc_url_raw' ),
		'map_embed'  => array( __( 'Google Maps embed URL', 'hunza-4-season-tours' ), 'url', 'esc_url_raw' ),
	);

	foreach ( $fields as $key => $field ) {
		list( $label, $type, $sanitize ) = $field;

		$wp_customize->add_setting(
			'h4s_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'h4s_' . $key,
			array(
				'label'   => $label,
				'section' => 'h4s_contact',
				'type'    => $type,
			)
		);
	}
}
add_action( 'customize_register', 'h4s_customize_register' );

/**
 * Keep only digits (for the WhatsApp number).
 *
 * @param string $value Raw value.
 * @return string
 */
function h4s_sanitize_digits( $value ) {
	return preg_replace( '/\D+/', '', (string) $value );
}
