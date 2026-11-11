<?php
/**
 * About Us page.
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
		<span class="eyebrow" style="color:var(--color-red-light);">About Us</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p class="lead">Originally founded as Martin Aerospace Corporation, <?php echo esc_html( $contact['company'] ); ?> is a small business manufacturing facility manufacturing precision hydraulic tube fittings for over twenty-four years.</p>

		<p>We manufacture hydraulic fittings in accordance with a variety of qualified procurement specifications. These include but are not limited to the MiI-F-5509; The Society of Automotive Engineers' Surface Vehicle Standard, SAE-J514; The Aerospace Industries Association National Aerospace Standards; The NASA Engineering Standards per KSC-F-124; and Mil-F-18866. Our quality control system is certified to MiI-I-45208A. We perform our inspection procedures in accordance with ANS/ASQC Z1.4-1993.</p>

		<p>Our facility is an approved supplier to the Defense Logistics Agency's Defense Supply Construction Center (DSCC) in Columbus, Ohio. DSCC has approved our participation in the Alternate Release Procedure program. Approval for ARP means that our competitive pricing, excellent quality, and timely delivery enable us to provide our products to the DoD while bypassing source inspection at our facility.</p>

		<h3>Approved Supplier To</h3>
		<p>In addition, <?php echo esc_html( $contact['company'] ); ?> is an approved supplier of stainless steel tube fittings to the following facilities:</p>
		<ul class="checklist">
			<?php foreach ( $data['approved_facilities'] as $facility ) : ?>
				<li><?php echo esc_html( $facility ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php get_footer(); ?>
