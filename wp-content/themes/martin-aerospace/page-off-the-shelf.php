<?php
/**
 * Off the Shelf page — kept minimal, matching the original site (no fabricated listings).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$data    = martin_content_data();
$contact = $data['contact'];
?>
<div class="page-header">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-red-light);">Off the Shelf</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p class="lead"><?php echo esc_html( $contact['company'] ); ?> is the market leader in supplying aviation chemicals and associated materials to the Aerospace and engineering industries. Supplying the right product, at the right price, in the right place at the right time. We manufacture hydraulic fittings in accordance with a variety of qualified procurement specifications.</p>
		<h3>Standard Description</h3>
		<p style="color: var(--color-grey);">Off-the-shelf stock details are available on request — <a href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">request a quote</a> for current availability.</p>
	</div>
</section>
<?php get_footer(); ?>
