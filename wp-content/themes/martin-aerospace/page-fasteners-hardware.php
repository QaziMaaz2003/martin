<?php
/**
 * Fasteners & Hardware page — category list + manufacturers.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$data          = martin_content_data();
$contact       = $data['contact'];
$categories    = $data['fastener_categories'];
$manufacturers = $data['fastener_manufacturers'];
?>
<div class="page-header">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-red-light);">Products</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p class="lead"><?php echo esc_html( $contact['legal_name'] ); ?> is a leading global distributor of fasteners to the aerospace industry. We provide competitive pricing, part availability and world-class delivery and performance to OEMs and after-market customers in military, commercial, air transport and regional and business aviation applications worldwide.</p>

		<h3>Fastener Types Offered</h3>
		<div class="category-grid">
			<?php foreach ( $categories as $category => $items ) : ?>
				<div class="category-card">
					<h3><?php echo esc_html( $category ); ?></h3>
					<ul>
						<?php foreach ( $items as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--offwhite">
	<div class="container">
		<h3>Manufacturers Represented</h3>
		<ul class="manufacturer-grid">
			<?php foreach ( $manufacturers as $name ) : ?>
				<li><?php echo esc_html( $name ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php get_footer(); ?>
