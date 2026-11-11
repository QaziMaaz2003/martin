<?php
/**
 * Header: utility bar + sticky nav.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$martin_data = martin_content_data();
$martin_contact = $martin_data['contact'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="utility-bar">
	<div class="container">
		<div class="utility-bar__item">
			<span>📞 <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $martin_contact['phone'] ) ); ?>"><?php echo esc_html( $martin_contact['phone'] ); ?></a></span>
			<span>FAX <?php echo esc_html( $martin_contact['fax'] ); ?></span>
		</div>
		<div class="utility-bar__item">
			<span><?php echo esc_html( $martin_contact['address'] ); ?></span>
		</div>
		<div class="utility-bar__item">
			<a href="mailto:<?php echo esc_attr( $martin_contact['rfq_email'] ); ?>"><?php echo esc_html( $martin_contact['rfq_email'] ); ?></a>
		</div>
	</div>
</div>

<header class="site-header">
	<div class="container">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.jpg' ); ?>" alt="<?php echo esc_attr( $martin_contact['company'] ); ?>">
			<?php endif; ?>
		</a>

		<button class="nav-toggle" id="martin-nav-toggle" aria-expanded="false" aria-controls="martin-primary-nav">Menu</button>

		<nav class="primary-nav" id="martin-primary-nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => '',
				'fallback_cb'    => false,
			) );
			?>
			<a class="btn btn--primary nav-cta" href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Request a Quote</a>
		</nav>
	</div>
</header>
