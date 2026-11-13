<?php
/**
 * Careers page — real job posting, apply via mailto (matching the original site's pattern).
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
		<span class="eyebrow" style="color:var(--color-red-light);">Careers</span>
		<h1>Job Opportunities</h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="job-card">
			<span class="eyebrow">Open Position</span>
			<h2>Sales / Purchasing / Customer Service, Aerospace Industry</h2>
			<h4>About the Job</h4>
			<p>An established leader in the aerospace industry is seeking an ambitious, disciplined, career-minded dynamic person who is looking for a great opportunity in Sales, Purchasing &amp; Customer Service.</p>
			<ul>
				<li>3+ years of inside sales</li>
				<li>Experience in chemical sales is a plus</li>
				<li>Customer service experience</li>
				<li>Professional telephone manner</li>
				<li>Excellent organization skills</li>
				<li>Problem-solving abilities</li>
				<li>Detail-oriented, must have a high degree of accuracy</li>
				<li>Team player</li>
				<li>This is a full-time position</li>
				<li>Must have experience in the aerospace industry</li>
			</ul>
			<p>For more information and to apply for this job, please contact Daniel at <a href="mailto:<?php echo esc_attr( $contact['careers_email'] ); ?>?subject=Apply%20for%20job%20on%20the%20Martin%20Aerospace%20website"><?php echo esc_html( $contact['careers_email'] ); ?></a>.</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>
