<?php
/**
 * Menu walker that applies Tailwind classes to menu links and can render
 * bare <a> tags (no <li>) for the flex-based desktop/mobile navigation.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class H4S_Tailwind_Menu_Walker
 */
class H4S_Tailwind_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Classes for each link.
	 *
	 * @var string
	 */
	private $link_class;

	/**
	 * Render <a> tags only (no <li> wrappers).
	 *
	 * @var bool
	 */
	private $bare;

	/**
	 * Constructor.
	 *
	 * @param string $link_class Classes for each <a>.
	 * @param bool   $bare       Skip the <li> wrapper.
	 */
	public function __construct( $link_class = '', $bare = false ) {
		$this->link_class = $link_class;
		$this->bare       = $bare;
	}

	/**
	 * Start element.
	 *
	 * @param string   $output Output buffer.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Depth.
	 * @param stdClass $args   Args.
	 * @param int      $id     Item id.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$attrs = array(
			'href'   => ! empty( $item->url ) ? $item->url : '',
			'class'  => $this->link_class,
			'target' => ! empty( $item->target ) ? $item->target : '',
			'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
			'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
		);
		if ( in_array( 'current-menu-item', (array) $item->classes, true ) ) {
			$attrs['aria-current'] = 'page';
		}

		$attr_html = '';
		foreach ( $attrs as $name => $value ) {
			if ( '' === $value ) {
				continue;
			}
			$value      = 'href' === $name ? esc_url( $value ) : esc_attr( $value );
			$attr_html .= sprintf( ' %s="%s"', $name, $value );
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$link  = '<a' . $attr_html . '>' . esc_html( $title ) . '</a>';

		$output .= $this->bare ? $link : '<li>' . $link;
	}

	/**
	 * End element.
	 *
	 * @param string   $output Output buffer.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Depth.
	 * @param stdClass $args   Args.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= $this->bare ? '' : '</li>';
	}

	/**
	 * No submenus are rendered.
	 *
	 * @param string   $output Output buffer.
	 * @param int      $depth  Depth.
	 * @param stdClass $args   Args.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {}

	/**
	 * No submenus are rendered.
	 *
	 * @param string   $output Output buffer.
	 * @param int      $depth  Depth.
	 * @param stdClass $args   Args.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
}
