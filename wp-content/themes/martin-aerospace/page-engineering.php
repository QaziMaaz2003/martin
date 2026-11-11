<?php
/**
 * Engineering page.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$img_dir = get_template_directory_uri() . '/assets/images/';
?>
<div class="page-header">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-red-light);">Engineering</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="split">
			<div>
				<p>Martin's has a comprehensive range of engineering machinery and processes, enabling us to provide a wide range of services and solutions for our customers. Our development has been enhanced by its ability to quickly design and manufacture custom or modified fittings in accordance with applicable specifications and standards.</p>
				<p>The engineering staff at Martin's is available for customer interaction in the development and definition of product requirements. Compliance with customer requests, through stringent documentation specifications, is accomplished by Martin's engineering department.</p>
				<p>Product controls are also defined for the production of finished goods. Material, manufacturing and finish processing specifications and standards are coordinated within all Martin's fabrication processes, which ensures quality is built into the product at the time of manufacture. Martin's Engineering team will work with customers in development of Key Characteristics on products to be manufactured, monitored using SPC methods during fabrication.</p>
				<p>We also believe in investing in the very best machinery — we are constantly updating our equipment, so please get in touch with us should you have any queries.</p>
			</div>
			<div>
				<img src="<?php echo esc_url( $img_dir . 'engineer-img-big.jpg' ); ?>" alt="Martin Aerospace engineering">
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
