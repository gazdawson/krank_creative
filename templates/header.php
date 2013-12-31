<header class="banner container" role="banner">
  <div class="row">
    <div class="col-lg-12">
	  <a class="logo" href="<?php echo home_url(); ?>/"><img src="<?php echo $krank['logo']['url']; ?>" alt="<?php bloginfo('name'); ?>" class="logo" /></a>
      <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
	  <h1 class="tagline"><?php bloginfo('description'); ?></h1>
      <nav class="nav-main" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
          endif;
        ?>
      </nav>
    </div>
  </div>
</header>
<div class="container">
	<span class="tel">Contact Us Today! <a href="tel:<?php echo $krank['tel']; ?>" title="Call <?php echo $krank['name']; ?> Today" class="tel"><?php echo $krank['tel']; ?></a></span>
	<button class="btn btn-primary contact-modal" data-toggle="modal" data-target="#contact-modal">
	  Contact Us
	</button>
</div>
