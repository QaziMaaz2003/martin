<?php
/**
 * Chemicals page — brand/category grid.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$data       = martin_content_data();
$contact    = $data['contact'];
$categories = $data['chemicals_categories'];
?>
<div class="page-header">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-red-light);">Products</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p class="lead"><?php echo esc_html( $contact['company'] ); ?> is the market leader in supplying aviation chemicals and associated materials to the aerospace and engineering industries. Supplying the right product, at the right price, in the right place at the right time. Our status as a distributor often allows us to sell these products at prices and quantities well below the usual factory minimum.</p>
		<p>We also have extensive research capabilities and numerous industry contacts for the hard-to-find chemical. We have substantial experience and expertise in the packaging and shipment of hazardous and non-hazardous chemicals. You can rely on us to ship your chemicals to you safely and on time. We stock a full portfolio of chemical and related materials from the world's most respected suppliers, as well as specialist lines from smaller manufacturers.</p>

		<div class="category-grid">
			<?php foreach ( $categories as $category => $brands ) : ?>
				<div class="category-card">
					<h3><?php echo esc_html( $category ); ?></h3>
					<ul>
						<?php foreach ( $brands as $brand ) : ?>
							<li><?php echo esc_html( $brand ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
