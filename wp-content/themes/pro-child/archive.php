<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package WordPress
 * @subpackage Themeco pro
 * @since Themeco pro 1.0
 */

get_header();
$description = get_the_archive_description();


?>

<style>
	section.test {
  		background-color: blue;
	}
	header.page-header {
		text-align : center;
	}

</style>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
		
		<section class="test">
			<p><?php the_title(); ?></p>
		</section>


	<?php endwhile; ?>



<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
