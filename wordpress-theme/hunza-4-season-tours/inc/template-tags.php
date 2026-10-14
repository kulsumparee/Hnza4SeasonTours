<?php
/**
 * Reusable markup helpers - PHP counterparts of the small React components
 * (GoldButton, WhatsAppButton, SectionHeader).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * GoldButton.
 *
 * @param string $label Button text (already translated).
 * @param array  $args  {
 *     @type string $href       Render as a link when set.
 *     @type string $type       'button' or 'submit' (when no href).
 *     @type bool   $full_width Stretch to full width.
 *     @type string $class      Extra classes.
 *     @type array  $attrs      Extra attributes (name => value).
 * }
 */
function h4s_gold_button( $label, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'href'       => '',
			'type'       => 'button',
			'full_width' => false,
			'class'      => '',
			'attrs'      => array(),
		)
	);

	$classes = h4s_classes(
		'inline-flex items-center justify-center',
		'bg-warm-gold text-white font-body font-medium text-[0.9375rem] tracking-[0.02em]',
		'p-3 md:px-9 py-3.5 rounded-full',
		'shadow-gold',
		'transition-all duration-300 ease-out',
		'hover:shadow-gold-hover hover:scale-[1.02] hover:brightness-110',
		'active:scale-[0.98]',
		$args['full_width'] ? 'w-full' : '',
		$args['class']
	);

	$attrs = '';
	foreach ( (array) $args['attrs'] as $name => $value ) {
		$attrs .= sprintf( ' %s="%s"', esc_attr( $name ), esc_attr( $value ) );
	}

	if ( '' !== $args['href'] ) {
		printf(
			'<a href="%s" class="%s"%s>%s</a>',
			esc_url( $args['href'] ),
			esc_attr( $classes ),
			$attrs, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
			esc_html( $label )
		);
		return;
	}

	printf(
		'<button type="%s" class="%s"%s>%s</button>',
		'submit' === $args['type'] ? 'submit' : 'button',
		esc_attr( $classes ),
		$attrs, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
		esc_html( $label )
	);
}

/**
 * WhatsAppButton.
 *
 * @param string $label   Button text.
 * @param string $variant 'filled' | 'outlined' | 'small'.
 * @param array  $args    { @type string $href, @type string $class }.
 */
function h4s_whatsapp_button( $label = '', $variant = 'filled', $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'href'  => h4s_whatsapp_url(),
			'class' => '',
		)
	);

	$variants = array(
		'filled'   => 'bg-[#25D366] text-white px-7 py-3.5 text-[0.9375rem] hover:bg-[#1da851]',
		'outlined' => 'bg-transparent border-2 border-[#25D366] text-[#25D366] px-7 py-3 text-sm hover:bg-[#25D366] hover:text-white',
		'small'    => 'bg-[#25D366] text-white px-5 py-2.5 text-sm hover:bg-[#1da851]',
	);
	if ( ! isset( $variants[ $variant ] ) ) {
		$variant = 'filled';
	}

	$classes = h4s_classes(
		'inline-flex items-center justify-center gap-2',
		'font-body font-medium rounded-full',
		'transition-all duration-300 ease-out',
		'hover:scale-[1.02] active:scale-[0.98]',
		$variants[ $variant ],
		$args['class']
	);

	if ( '' === $label ) {
		$label = __( 'Contact on WhatsApp', 'hunza-4-season-tours' );
	}

	printf(
		'<a href="%s" target="_blank" rel="noopener noreferrer" class="%s">%s%s</a>',
		esc_url( $args['href'] ),
		esc_attr( $classes ),
		h4s_whatsapp_icon( 'small' === $variant ? 'w-4 h-4 fill-white' : 'w-5 h-5 fill-white', false ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_html( $label )
	);
}

/**
 * SectionHeader.
 *
 * @param array $args {
 *     @type string $overline
 *     @type string $heading
 *     @type string $subheading
 *     @type string $overline_color
 *     @type string $heading_color
 *     @type string $subheading_color
 *     @type string $class
 * }
 */
function h4s_section_header( $args ) {
	$args = wp_parse_args(
		$args,
		array(
			'overline'         => '',
			'heading'          => '',
			'subheading'       => '',
			'overline_color'   => 'text-emerald-green',
			'heading_color'    => 'text-mountain',
			'subheading_color' => 'text-stone-color',
			'class'            => '',
		)
	);
	?>
	<div class="<?php echo esc_attr( h4s_classes( 'text-center mb-12 lg:mb-16', $args['class'] ) ); ?>">
		<p class="<?php echo esc_attr( h4s_classes( 'font-body font-medium text-sm uppercase tracking-[0.1em] mb-4', $args['overline_color'] ) ); ?>">
			<?php echo esc_html( $args['overline'] ); ?>
		</p>
		<h2 class="<?php echo esc_attr( h4s_classes( 'font-display font-medium text-3xl md:text-4xl lg:text-[clamp(2rem,4vw,3.5rem)] leading-tight', $args['heading_color'] ) ); ?>">
			<?php echo esc_html( $args['heading'] ); ?>
		</h2>
		<?php if ( '' !== $args['subheading'] ) : ?>
			<p class="<?php echo esc_attr( h4s_classes( 'font-body font-light text-lg md:text-xl mt-4 max-w-xl mx-auto leading-relaxed', $args['subheading_color'] ) ); ?>">
				<?php echo esc_html( $args['subheading'] ); ?>
			</p>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Hero banner shared by the region, place and tour detail pages.
 *
 * @param array $args {
 *     @type string $image      Image URL.
 *     @type string $alt        Image alt text.
 *     @type string $back_href  Back link URL.
 *     @type string $back_label Back link label.
 *     @type string $overline
 *     @type string $title
 *     @type string $tagline
 *     @type string $min_height Tailwind min-height classes.
 *     @type string $tagline_max_width Tailwind max-width class for the tagline.
 *     @type string $extra      Extra HTML appended after the tagline (already escaped).
 * }
 */
function h4s_detail_hero( $args ) {
	$args = wp_parse_args(
		$args,
		array(
			'image'             => '',
			'alt'               => '',
			'back_href'         => h4s_home_link(),
			'back_label'        => '',
			'overline'          => '',
			'title'             => '',
			'tagline'           => '',
			'min_height'        => 'min-h-[50vh] md:min-h-[60vh]',
			'tagline_max_width' => 'max-w-[560px]',
			'extra'             => '',
		)
	);
	?>
	<section class="<?php echo esc_attr( h4s_classes( 'relative flex items-end overflow-hidden', $args['min_height'] ) ); ?>">
		<img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['alt'] ); ?>" class="absolute inset-0 w-full h-full object-cover">
		<div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.85) 100%);"></div>
		<div class="relative z-10 container-content pb-12 pt-32">
			<a href="<?php echo esc_url( $args['back_href'] ); ?>" class="inline-flex items-center gap-2 font-body text-sm text-white/80 hover:text-warm-gold transition-colors mb-6">
				<?php h4s_icon( 'arrow-left', 16 ); ?>
				<?php echo esc_html( $args['back_label'] ); ?>
			</a>
			<p class="font-body font-medium text-xs md:text-sm uppercase tracking-[0.12em] text-warm-gold mb-3">
				<?php echo esc_html( $args['overline'] ); ?>
			</p>
			<h1 class="font-display font-medium text-white leading-[1.05] tracking-[-0.02em] text-4xl md:text-6xl">
				<?php echo esc_html( $args['title'] ); ?>
			</h1>
			<p class="<?php echo esc_attr( h4s_classes( 'font-body font-light text-white/85 text-lg mt-4', $args['tagline_max_width'] ) ); ?>">
				<?php echo esc_html( $args['tagline'] ); ?>
			</p>
			<?php echo $args['extra']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- caller escapes. ?>
		</div>
	</section>
	<?php
}

/**
 * "Not found" state used by the detail templates.
 *
 * @param string $title      Heading.
 * @param string $back_href  Back link.
 * @param string $back_label Back link text.
 */
function h4s_not_found( $title, $back_href, $back_label ) {
	?>
	<section class="section-padding text-center min-h-[60vh] flex flex-col items-center justify-center gap-6">
		<h1 class="font-display text-3xl text-mountain"><?php echo esc_html( $title ); ?></h1>
		<a href="<?php echo esc_url( $back_href ); ?>" class="font-body text-emerald-green hover:underline">
			&larr; <?php echo esc_html( $back_label ); ?>
		</a>
	</section>
	<?php
}
