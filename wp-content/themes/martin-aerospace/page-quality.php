<?php
/**
 * Quality page.
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
		<span class="eyebrow" style="color:var(--color-red-light);">Quality</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p class="lead"><?php echo esc_html( $contact['legal_name'] ); ?> specializes in the manufacture and supply of high quality, reliable and safe hydraulic fittings.</p>

		<p>The successful operation of the company's quality system relies upon the cooperation and involvement of personnel at all levels. Management and associates as a team will make every effort to ensure full customer satisfaction through on-time deliveries while achieving the highest quality consistent with cost, product specifications, and customer requirements. In addition our commitment and consistent execution of the company's continuous improvement efforts will be a key to our success.</p>

		<ul class="checklist">
			<li>Certified quality system</li>
			<li>Gage and inspection system to NIST standard</li>
			<li>Document control systems and traceability</li>
			<li>Preventive and corrective action systems</li>
		</ul>

		<div class="badge-row">
			<span class="badge badge--dark">MIL-I-45208A</span>
			<span class="badge badge--dark">ANSI/ASQC Z1.4-1993</span>
		</div>
	</div>
</section>
<?php get_footer(); ?>
