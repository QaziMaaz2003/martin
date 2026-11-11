<?php
/**
 * 404 — on-brand, points to the two catalog pages most likely to have what they wanted.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<section class="not-found">
	<div class="container">
		<h1>404</h1>
		<h2>We Couldn't Find That Page.</h2>
		<p class="lead" style="margin: 0 auto 28px;">Try searching for a part number on our Fittings or Fasteners &amp; Hardware pages, or get in touch for a quote.</p>
		<div class="hero__actions" style="justify-content: center;">
			<a class="btn btn--outline-dark" href="<?php echo esc_url( home_url( '/fittings/' ) ); ?>">Fittings</a>
			<a class="btn btn--outline-dark" href="<?php echo esc_url( home_url( '/fasteners-hardware/' ) ); ?>">Fasteners &amp; Hardware</a>
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Request a Quote</a>
		</div>
	</div>
</section>
<?php get_footer(); ?>
