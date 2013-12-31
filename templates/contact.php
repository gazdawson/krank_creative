<?php
/**
 * Template For Custom Homepage
 *
 * Template Name: Contact
 * @package Krank Theme
 */
global $krank;
?>
<?php get_template_part('templates/page', 'header'); //Page Header ?>
<?php get_template_part('templates/content', 'page'); // Page Content?>

<div class="contact-info row">
	<div class="business-info">
		<?php echo do_shortcode('[address title=""]'); ?>
		<?php echo do_shortcode('[open-hours title=""]'); ?>
		<?php echo do_shortcode('[contact title=""]'); ?>
	</div>
	<div class="contact-form">
		<h3 class="contact-title">Send Us a Message</h3>
		<?php echo do_shortcode('[contact-form-7 id="' . $krank['contact_7'] . '"]')?>
	</div><!--/.contact-form-->
	<div class="map">
		<h3 class="contact-title">Where We Are</h3>
		<div id="map" class="google-map"></div>
	</div><!--/.business-info-->
</div>

<?php foreach ($krank['page_sidebar'] as $page):
		$side_pages .= $page.',';
	endforeach;
	echo $side_pages;
	?>

<script type="text/javascript">
	$(document).ready(function(){
		newGoogleMap ( new google.maps.LatLng( <?php echo $krank['location']; ?> ), '<?php get_template_directory(); ?>');
	});
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>