<?php
/**
 * Generic fallback template (blog index, archives, search).
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section-padding bg-white pt-32 md:pt-40">
	<div class="container-content max-w-[900px]">
		<?php if ( have_posts() ) : ?>
			<?php if ( ! is_front_page() ) : ?>
				<h1 class="font-display font-medium text-3xl md:text-5xl text-mountain mb-12">
					<?php
					if ( is_home() ) {
						single_post_title();
					} elseif ( is_search() ) {
						/* translators: %s: search query */
						printf( esc_html__( 'Search results for "%s"', 'hunza-4-season-tours' ), esc_html( get_search_query() ) );
					} else {
						the_archive_title();
					}
					?>
				</h1>
			<?php endif; ?>

			<div class="space-y-12">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'border-b border-stone-color/10 pb-12 last:border-0' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="block aspect-[16/9] rounded-2xl overflow-hidden mb-6 shadow-card">
								<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
							</a>
						<?php endif; ?>
						<p class="font-body font-medium text-xs uppercase tracking-[0.12em] text-warm-gold mb-2"><?php echo esc_html( get_the_date() ); ?></p>
						<h2 class="font-display font-medium text-2xl md:text-3xl text-mountain mb-4">
							<a href="<?php the_permalink(); ?>" class="hover:text-warm-gold transition-colors"><?php the_title(); ?></a>
						</h2>
						<div class="font-body text-base text-stone-color leading-relaxed prose-content">
							<?php the_excerpt(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="mt-12 font-body text-sm text-stone-color flex justify-between">
				<?php the_posts_pagination( array( 'prev_text' => '&larr; ' . __( 'Newer', 'hunza-4-season-tours' ), 'next_text' => __( 'Older', 'hunza-4-season-tours' ) . ' &rarr;' ) ); ?>
			</div>
		<?php else : ?>
			<h1 class="font-display font-medium text-3xl text-mountain mb-6"><?php esc_html_e( 'Nothing found', 'hunza-4-season-tours' ); ?></h1>
			<p class="font-body text-base text-stone-color">
				<a href="<?php echo esc_url( h4s_home_link() ); ?>" class="text-emerald-green hover:underline">&larr; <?php esc_html_e( 'Back to Home', 'hunza-4-season-tours' ); ?></a>
			</p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
