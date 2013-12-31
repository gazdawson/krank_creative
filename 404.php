<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'krank'); ?>
</div>

<p><?php _e('It looks like this was the result of either:', 'krank'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'krank'); ?></li>
  <li><?php _e('an out-of-date link', 'krank'); ?></li>
</ul>

<?php get_search_form(); ?>
