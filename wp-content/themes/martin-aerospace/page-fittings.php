<?php
/**
 * Fittings page — full AN/AS/MS cross-reference table.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$data    = martin_content_data();
$contact = $data['contact'];
$rows    = $data['fittings_crossref'];
$img_dir = get_template_directory_uri() . '/assets/images/';
?>
<div class="page-header">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-red-light);">Products</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p class="lead">Made to order hydraulic fittings. AS, MS, AN, NAS, or custom fittings, with a print, anything is possible.</p>
		<p><?php echo esc_html( $contact['company'] ); ?> offers a large selection of military hardware, from terminals and nuts to handles and fasteners, including MS, AN, and NAS standard components. <?php echo esc_html( $contact['company'] ); ?> is an industry leader in providing for aerospace and military clientele.</p>

		<div class="card-grid" style="grid-template-columns: 1fr; margin-bottom: 8px; max-width: 420px;">
			<img src="<?php echo esc_url( $img_dir . 'product-fittings.jpg' ); ?>" alt="Hydraulic Fittings">
		</div>

		<h3>Part Number Cross-Reference</h3>
		<div class="table-scroll">
			<table class="data-table">
				<thead>
					<tr>
						<th>Part #</th>
						<th>Cross Ref.</th>
						<th>2nd Cross Ref.</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['part'] ); ?></td>
							<td><?php echo esc_html( $row['cross1'] ); ?></td>
							<td><?php echo esc_html( $row['cross2'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<p style="margin-top: 24px;">Don't see the part you're looking for? <a href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Request a quote</a> and we'll help track it down.</p>
	</div>
</section>
<?php get_footer(); ?>
