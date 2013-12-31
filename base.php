<?php 
	global $post; // Global variable for custom metaboxes
	global $krank; // Global variable for custom options
?>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'krank'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>
  
  <?php // Container Class
  	$container_class = get_post_meta($post->ID, '_krank_container', true);
	
	if ($container_class == false) :
		$container = " container";
	endif;
  ?>
  
  <?php // Column Classes
  	$main_class = $krank['main_class'];
	$sidebar_class = $krank['sidebar_class'];
	
	if($main_class == ""): 
	    $main_class = 'col-sm-8';
	endif;
	if(krank_display_sidebar() == false):
		$main_class = 'col-sm-12';
   	endif;
	if($sidebar_class == ""): 
	   $sidebar_class = 'col-sm-4';
	endif;
  ?>

  <div class="wrap<?php echo $container ?>" role="document">
    <div class="content row">
      <div class="main <?php echo $main_class; ?>" role="main">
        <?php include krank_template_path(); ?>
      </div><!-- /.main -->
      <?php if (krank_display_sidebar()) : ?>
        <aside class="sidebar <?php echo $sidebar_class; ?>" role="complementary">
          <?php include krank_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
