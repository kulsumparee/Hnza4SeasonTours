<?php
/**
 * Single post / page template.
 *
 * @package Hunza4SeasonTours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<?php if ( has_post_thumbnail() ) : ?>
		<section class="relative min-h-[50vh] flex items-end overflow-hidden">
			<?php the_post_thumbnail( 'full', array( 'class' => 'absolute inset-0 w-full h-full object-cover' ) ); ?>
			<div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.85) 100%);"></div>
			<div class="relative z-10 container-content pb-12 pt-32">
				<h1 class="font-display font-medium text-white leading-[1.05] tracking-[-0.02em] text-4xl md:text-6xl"><?php the_title(); ?></h1>
			</div>
		</section>
	<?php endif; ?>

	<section class="section-padding bg-white <?php echo has_post_thumbnail() ? '' : 'pt-32 md:pt-40'; ?>">
		<div class="container-content max-w-[900px]">
			<?php if ( ! has_post_thumbnail() ) : ?>
				<h1 class="font-display font-medium text-3xl md:text-5xl text-mountain mb-10"><?php the_title(); ?></h1>
			<?php endif; ?>

			<article <?php post_class( 'prose-content font-body text-base md:text-lg text-stone-color leading-relaxed' ); ?>>
				<?php the_content(); ?>
			</article>

			<?php
			if ( comments_open() || get_comments_number() ) {
				echo '<div class="mt-16">';
				comments_template();
				echo '</div>';
			}
			?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
