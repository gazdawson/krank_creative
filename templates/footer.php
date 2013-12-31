<?php global $krank; // Global variable for custom options ?>

<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
	<?php echo do_shortcode('[address title=""]'); ?>
	<?php echo do_shortcode('[open-hours title=""]'); ?>
	<?php echo do_shortcode('[contact title=""]'); ?>
      <?php
        if (has_nav_menu('footer_navigation')) :
          wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav'));
        endif;
      ?><!--/#menu-footer-navigation-->
    </div>
  </div>
</footer>
<div class="copywrite container">
  &copy; <?php echo date('Y').' '.$krank['name']; ?> | <a href="http://www.krankcreative.co.uk" title="Krank Creative Web Design &amp; Development Services Kendal, Cumbria">Website Design by Krank Creative Kendal, Cumbria</a>
</div>

<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="contact-modal"><?php echo $krank['name']; ?> Contact Form</h4>
		<p>Use the contact form below to send us a message. We will do our best to get back to you as soon as we can.</p>
      </div>
      <div class="modal-body">
		  <?php echo do_shortcode('[contact-form-7 id="' . $krank['contact_7'] . '"]')?>
      </div>
      <div class="modal-footer">
		<p>Alternatively you can use any of our other forms of contact to get in touch.</p>
		<?php echo do_shortcode('[contact title=""]'); ?>
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#contact-modal .modal -->

<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<img src="" />
	</div><!-- /.modal-dialog -->
</div><!-- /#photo-modal .modal -->

<?php wp_footer(); ?>
