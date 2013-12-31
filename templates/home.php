<?php
/**
 * Template Name: Home
 * @package Krank Theme
 */
?>

<?php
	if($krank['home_slides_switch'] != 0):
		krank_carousel('home_slides', 'home-carousel', true, true);
	endif;
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.carousel').carousel({
		  interval: '<?php echo $krank['carousel_speed']*1000; ?>'
		})
	})
</script>