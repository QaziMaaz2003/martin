<?php
/**
 * Request a Quote page — real working RFQ form (wp_mail, nonce + honeypot).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$result = martin_rfq_handle_submission();

get_header();
$data    = martin_content_data();
$contact = $data['contact'];
?>
<div class="page-header">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-red-light);">Get a Quote</span>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="rfq-layout">
			<div class="contact-block">
				<h3>Contact Details</h3>
				<dl>
					<dt>Address</dt>
					<dd><?php echo esc_html( $contact['address'] ); ?></dd>
					<dt>Phone</dt>
					<dd><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['phone'] ) ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></dd>
					<dt>Fax</dt>
					<dd><?php echo esc_html( $contact['fax'] ); ?></dd>
					<dt>Email</dt>
					<dd><a href="mailto:<?php echo esc_attr( $contact['rfq_email'] ); ?>"><?php echo esc_html( $contact['rfq_email'] ); ?></a></dd>
				</dl>
			</div>

			<div>
				<h3>Request a Quote</h3>

				<?php if ( $result ) : ?>
					<div class="form-notice <?php echo $result['success'] ? 'form-notice--success' : 'form-notice--error'; ?>">
						<?php echo esc_html( $result['message'] ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! $result || ! $result['success'] ) : ?>
				<form method="post" action="">
					<?php wp_nonce_field( 'martin_rfq_submit', 'martin_rfq_nonce' ); ?>
					<input type="hidden" name="martin_rfq_submit" value="1">

					<div class="form-field hp-field">
						<label for="rfq_hp">Leave this field empty</label>
						<input type="text" id="rfq_hp" name="martin_rfq_hp" tabindex="-1" autocomplete="off">
					</div>

					<div class="form-field">
						<label for="rfq_name">Name *</label>
						<input type="text" id="rfq_name" name="rfq_name" required>
					</div>

					<div class="form-field">
						<label for="rfq_company">Company</label>
						<input type="text" id="rfq_company" name="rfq_company">
					</div>

					<div class="form-field">
						<label for="rfq_email">Email *</label>
						<input type="email" id="rfq_email" name="rfq_email" required>
					</div>

					<div class="form-field">
						<label for="rfq_phone">Phone</label>
						<input type="tel" id="rfq_phone" name="rfq_phone">
					</div>

					<div class="form-field">
						<label for="rfq_qty">Quantity</label>
						<input type="text" id="rfq_qty" name="rfq_qty">
					</div>

					<div class="form-field">
						<label for="rfq_parts">Part Number(s) / Description *</label>
						<textarea id="rfq_parts" name="rfq_parts" rows="4" required></textarea>
					</div>

					<div class="form-field">
						<label for="rfq_message">Message</label>
						<textarea id="rfq_message" name="rfq_message" rows="4"></textarea>
					</div>

					<button type="submit" class="btn btn--primary">Submit Request</button>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
