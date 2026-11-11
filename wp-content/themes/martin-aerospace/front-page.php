<?php
/**
 * Front page — hero, product lines, about, quality, trust signal, careers.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$data    = martin_content_data();
$contact = $data['contact'];
$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<section class="hero">
	<div class="container">
		<div class="hero__content">
			<span class="eyebrow">Aerospace Fittings · Chemicals · Fasteners</span>
			<h1><?php echo esc_html( $contact['company'] ); ?> is a leading manufacturer &amp; distributor to the aerospace industry.</h1>
			<p class="lead">Providing quality products and competitive prices for over 19 years — the right product, at the right price, in the right place at the right time.</p>
			<div class="hero__actions">
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Request a Quote</a>
				<a class="btn btn--outline" href="#products">View Product Lines</a>
			</div>
		</div>
		<div class="hero__stats">
			<div class="stat"><span class="stat__num">19+</span><span class="stat__label">Years in Business</span></div>
			<div class="stat"><span class="stat__num">24+</span><span class="stat__label">Years Manufacturing Precision Fittings</span></div>
			<div class="stat"><span class="stat__num">5</span><span class="stat__label">Qualified Procurement Specs</span></div>
			<div class="stat"><span class="stat__num">6</span><span class="stat__label">Approved-Supplier Organizations</span></div>
		</div>
	</div>
</section>

<section class="section" id="products">
	<div class="container">
		<span class="eyebrow">What We Supply</span>
		<h2>Three Product Lines, One Trusted Source.</h2>
		<p class="lead">From precision hydraulic fittings to aviation chemicals and a full range of military-standard fasteners — <?php echo esc_html( $contact['company'] ); ?> keeps aerospace programs supplied and moving.</p>

		<div class="card-grid">
			<div class="product-card">
				<div class="product-card__img"><img src="<?php echo esc_url( $img_dir . 'box-af-img-01.jpg' ); ?>" alt="Aerospace Fittings"></div>
				<div class="product-card__body">
					<h3>Aerospace Fittings</h3>
					<p>Such a wide variety of aerospace hardware that it can be tough knowing which parts to choose — we help you find exactly the MS, AN &amp; NAS standard components you need.</p>
					<a class="product-card__link" href="<?php echo esc_url( home_url( '/fittings/' ) ); ?>">View Fittings</a>
				</div>
			</div>
			<div class="product-card">
				<div class="product-card__img"><img src="<?php echo esc_url( $img_dir . 'box-ac-img-01.jpg' ); ?>" alt="Aerospace Chemicals"></div>
				<div class="product-card__body">
					<h3>Aerospace Chemicals</h3>
					<p>Market leader in supplying aviation chemicals and associated materials to the aerospace and engineering industries, often below usual factory minimums.</p>
					<a class="product-card__link" href="<?php echo esc_url( home_url( '/chemicals/' ) ); ?>">View Chemicals</a>
				</div>
			</div>
			<div class="product-card">
				<div class="product-card__img"><img src="<?php echo esc_url( $img_dir . 'box-aph-img-01.jpg' ); ?>" alt="Aerospace Parts and Hardware"></div>
				<div class="product-card__body">
					<h3>Aerospace Parts &amp; Hardware</h3>
					<p>A leading global distributor of fasteners to the aerospace industry — competitive pricing, part availability, and world-class delivery.</p>
					<a class="product-card__link" href="<?php echo esc_url( home_url( '/fasteners-hardware/' ) ); ?>">View Fasteners &amp; Hardware</a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="image-band">
	<img src="<?php echo esc_url( $img_dir . 'fastener-a.jpg' ); ?>" alt="">
	<div class="container image-band__stat">
		<span class="stat__num">24+ Years</span>
		<span class="stat__label">Manufacturing Precision Hydraulic Tube Fittings</span>
	</div>
</div>

<section class="section section--offwhite">
	<div class="container">
		<div class="split">
			<div>
				<span class="eyebrow">About Us</span>
				<h2>Supplying the Right Product, Right Place, Right Time.</h2>
				<p><?php echo esc_html( $contact['company'] ); ?> is the market leader in supplying aviation chemicals and associated materials to the Aerospace and engineering industries. We manufacture hydraulic fittings in accordance with a variety of qualified procurement specifications.</p>
				<a class="btn btn--outline-dark" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">More About Us</a>
			</div>
			<div>
				<h4>Manufactured &amp; Certified To</h4>
				<ul class="checklist">
					<?php foreach ( $data['specs'] as $spec ) : ?>
						<li><?php echo esc_html( $spec ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<span class="eyebrow">Why Martin Aerospace</span>
		<h2>Built on Certification, Experience &amp; Trust.</h2>
		<div class="feature-grid">
			<div class="feature-item"><h4>Certified Quality System</h4><p>Quality control certified to MIL-I-45208A, with inspection per ANSI/ASQC Z1.4-1993.</p></div>
			<div class="feature-item"><h4>DSCC / ARP Approved</h4><p>Approved supplier under the Defense Logistics Agency's Alternate Release Procedure program.</p></div>
			<div class="feature-item"><h4>24+ Years Manufacturing</h4><p>Precision hydraulic tube fittings manufactured in-house for over two decades.</p></div>
			<div class="feature-item"><h4>Approved by Industry Leaders</h4><p>Trusted supplier to Lockheed-Martin, Boeing, Honeywell, and NASA facilities nationwide.</p></div>
			<div class="feature-item"><h4>Custom Fitting Engineering</h4><p>In-house engineering to design and manufacture custom or modified fittings to spec.</p></div>
			<div class="feature-item"><h4>Below-Minimum Chemical Pricing</h4><p>Our distributor status often allows chemicals pricing and quantities below usual factory minimums.</p></div>
		</div>
	</div>
</section>

<section class="section section--dark">
	<div class="container">
		<span class="eyebrow">Industries We Serve</span>
		<h2>Military, Commercial &amp; Business Aviation.</h2>
		<p class="lead">Competitive pricing, part availability and world-class delivery to OEMs and after-market customers worldwide.</p>
		<div class="tag-grid">
			<span class="tag-chip">Aerospace OEMs</span>
			<span class="tag-chip">Military / DoD</span>
			<span class="tag-chip">Commercial Aviation</span>
			<span class="tag-chip">Air Transport</span>
			<span class="tag-chip">Regional &amp; Business Aviation</span>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<span class="eyebrow">How It Works</span>
		<h2>Getting a Quote Is Simple.</h2>
		<div class="process-grid">
			<div class="process-step"><span class="process-step__num">01</span><h4>Find Your Part</h4><p>Search our Fittings, Chemicals, or Fasteners &amp; Hardware catalogs by part number or category.</p></div>
			<div class="process-step"><span class="process-step__num">02</span><h4>Submit an RFQ</h4><p>Send us your part numbers, quantities, and specs through our Request a Quote form.</p></div>
			<div class="process-step"><span class="process-step__num">03</span><h4>Receive a Quote</h4><p>Our team responds with competitive pricing and availability.</p></div>
			<div class="process-step"><span class="process-step__num">04</span><h4>Confirm &amp; Ship</h4><p>Approve the quote and we handle packaging and on-time delivery.</p></div>
		</div>
	</div>
</section>

<section class="section section--dark">
	<div class="container">
		<span class="eyebrow">Quality</span>
		<h2>Reliable, Safe Hydraulic Fittings — Every Time.</h2>
		<p class="lead">The successful operation of our quality system relies on the cooperation of personnel at every level, ensuring full customer satisfaction through on-time delivery and the highest quality consistent with cost and specification.</p>
		<ul class="checklist">
			<li>Certified quality system</li>
			<li>Gage and inspection system to NIST standard</li>
			<li>Document control systems and traceability</li>
			<li>Preventive and corrective action systems</li>
		</ul>
		<div class="badge-row">
			<span class="badge">MIL-I-45208A</span>
			<span class="badge">ANSI/ASQC Z1.4-1993</span>
			<span class="badge">DSCC / ARP Approved</span>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<span class="eyebrow">Approved Supplier</span>
		<h2>Trusted at Facilities Across the Industry.</h2>
		<p class="lead"><?php echo esc_html( $contact['company'] ); ?> is an approved supplier of stainless steel tube fittings to the following facilities:</p>
		<div class="trust-list" style="background:var(--color-black); padding:28px; border-radius:2px;">
			<?php foreach ( $data['approved_facilities'] as $facility ) : ?>
				<span class="trust-chip"><?php echo esc_html( $facility ); ?></span>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section careers-band">
	<div class="container">
		<span class="eyebrow" style="color:var(--color-black);">We're Hiring</span>
		<h2>Join the Martin Aerospace Team.</h2>
		<p>Sales / Purchasing / Customer Service — Aerospace Industry. Experience in the aerospace industry required.</p>
		<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/careers/' ) ); ?>">View Opening</a>
	</div>
</section>

<?php get_footer(); ?>
