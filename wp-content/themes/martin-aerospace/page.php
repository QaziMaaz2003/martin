<?php
/**
 * Generic page fallback.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<div class="page-header">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<section class="section">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</div>
</section>
<?php get_footer(); ?>
