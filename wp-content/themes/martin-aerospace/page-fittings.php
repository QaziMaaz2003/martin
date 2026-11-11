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
		<p class="lead"><?php echo esc_html( $contact['company'] ); ?> has such a wide variety of aerospace hardware that it can be tough knowing which parts to choose. This page describes the different product manufacturers that help supply the parts you need for your project. Choose from our large selection of military hardware — from terminals to nuts to handles to fasteners — we provide a large selection of MS, AN, &amp; NAS standard components. <?php echo esc_html( $contact['company'] ); ?> is an industry leader in providing for aerospace and military clientele.</p>

		<div class="card-grid" style="grid-template-columns: repeat(2, 1fr); margin-bottom: 8px;">
			<img src="<?php echo esc_url( $img_dir . 'fitttings-filtered-sm-img.jpg' ); ?>" alt="Aerospace fittings">
			<img src="<?php echo esc_url( $img_dir . 'feetings-filtered-sm-img.jpg' ); ?>" alt="Aerospace fittings detail">
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
