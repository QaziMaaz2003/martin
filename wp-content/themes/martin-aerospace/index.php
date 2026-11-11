<?php
/**
 * Fallback template (required by WordPress for every classic theme).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<div class="page-header">
	<div class="container">
		<h1><?php is_home() ? single_post_title() : the_title(); ?></h1>
	</div>
</div>
<section class="section">
	<div class="container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</article>
				<?php
			endwhile;
		else :
			echo '<p>Nothing found.</p>';
		endif;
		?>
	</div>
</section>
<?php get_footer(); ?>
