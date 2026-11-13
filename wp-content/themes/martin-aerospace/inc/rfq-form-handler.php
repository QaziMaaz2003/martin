<?php
/**
 * Request-a-Quote form handler.
 * Stateless: no DB storage, no plugin dependency. wp_mail() + nonce + honeypot.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function martin_rfq_handle_submission() {
	if ( empty( $_POST['martin_rfq_submit'] ) ) {
		return null;
	}

	if ( ! isset( $_POST['martin_rfq_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['martin_rfq_nonce'] ) ), 'martin_rfq_submit' ) ) {
		return array( 'success' => false, 'message' => 'Your session expired. Please try submitting the form again.' );
	}

	// Honeypot: real users never fill this hidden field.
	if ( ! empty( $_POST['martin_rfq_hp'] ) ) {
		return array( 'success' => false, 'message' => 'Submission rejected.' );
	}

	$name    = isset( $_POST['rfq_name'] ) ? sanitize_text_field( wp_unslash( $_POST['rfq_name'] ) ) : '';
	$company = isset( $_POST['rfq_company'] ) ? sanitize_text_field( wp_unslash( $_POST['rfq_company'] ) ) : '';
	$email   = isset( $_POST['rfq_email'] ) ? sanitize_email( wp_unslash( $_POST['rfq_email'] ) ) : '';
	$phone   = isset( $_POST['rfq_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['rfq_phone'] ) ) : '';
	$parts   = isset( $_POST['rfq_parts'] ) ? sanitize_textarea_field( wp_unslash( $_POST['rfq_parts'] ) ) : '';
	$qty     = isset( $_POST['rfq_qty'] ) ? sanitize_text_field( wp_unslash( $_POST['rfq_qty'] ) ) : '';
	$message = isset( $_POST['rfq_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['rfq_message'] ) ) : '';

	if ( empty( $name ) || empty( $email ) || ! is_email( $email ) || empty( $parts ) ) {
		return array( 'success' => false, 'message' => 'Please fill in your name, a valid email, and the part number(s) or description you need a quote for.' );
	}

	$data = martin_content_data();
	$to   = $data['contact']['rfq_email'];

	$subject = sprintf( '[RFQ] %s: %s', $company ?: $name, wp_trim_words( $parts, 8 ) );

	$body  = "New Request a Quote submission:\n\n";
	$body .= "Name: {$name}\n";
	$body .= "Company: {$company}\n";
	$body .= "Email: {$email}\n";
	$body .= "Phone: {$phone}\n";
	$body .= "Quantity: {$qty}\n";
	$body .= "Part Number(s) / Description:\n{$parts}\n\n";
	$body .= "Message:\n{$message}\n";

	$headers = array( 'Reply-To: ' . $email );

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( $sent ) {
		return array( 'success' => true, 'message' => 'Thank you. Your quote request has been sent. We will get back to you shortly.' );
	}

	return array( 'success' => false, 'message' => 'Something went wrong sending your request. Please try again or email us directly at ' . $to . '.' );
}
