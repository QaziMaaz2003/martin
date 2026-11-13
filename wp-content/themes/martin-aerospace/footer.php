<?php
/**
 * Footer: contact block + footer nav + copyright.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$martin_data = martin_content_data();
$martin_contact = $martin_data['contact'];
?>
<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div>
				<h4><?php echo esc_html( $martin_contact['company'] ); ?></h4>
				<p><?php echo esc_html( $martin_contact['address'] ); ?></p>
				<p>TEL <?php echo esc_html( $martin_contact['phone'] ); ?> &nbsp; FAX <?php echo esc_html( $martin_contact['fax'] ); ?></p>
				<p><a href="mailto:<?php echo esc_attr( $martin_contact['rfq_email'] ); ?>"><?php echo esc_html( $martin_contact['rfq_email'] ); ?></a></p>
				<div class="footer-cert">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/as9100d-certified.png' ); ?>" alt="AS9100D Certified">
				</div>
			</div>
			<div>
				<h4>Navigate</h4>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'footer-nav',
					'fallback_cb'    => false,
				) );
				?>
			</div>
			<div>
				<h4>Products</h4>
				<ul class="footer-nav">
					<li><a href="<?php echo esc_url( home_url( '/fittings/' ) ); ?>">Hydraulic Fittings</a></li>
					<li><a href="<?php echo esc_url( home_url( '/chemicals/' ) ); ?>">Chemicals</a></li>
					<li><a href="<?php echo esc_url( home_url( '/fasteners-hardware/' ) ); ?>">Fasteners &amp; Hardware</a></li>
					<li><a href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Request a Quote</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-bottom">
			<span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $martin_contact['company'] ); ?> / <?php echo esc_html( $martin_contact['legal_name'] ); ?>. All rights reserved.</span>
			<span>Hydraulic Fittings · Chemicals · Fasteners &amp; Hardware</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
