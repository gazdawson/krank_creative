<?php
/**
 * Krank Custom Posts
 *
 * @package Krank
 */

// Custom Posts
function krank_custom_post(){
	$labels = array(
		'name'               => _x( 'Custom Post', 'post type general name' ),
		'singular_name'      => _x( 'Custom Post', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Item' ),
		'add_new_item'       => __( 'Add New Custom Post' ),
		'edit_item'          => __( 'Edit Custom Post' ),
		'new_item'           => __( 'New Custom Post' ),
		'all_items'          => __( 'All Custom Post' ),
		'view_item'          => __( 'View Custom Post' ),
		'search_items'       => __( 'Search Custom Posts' ),
		'not_found'          => __( 'No Custom Post Items found' ),
		'not_found_in_trash' => __( 'No Custom Post Items found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Custom Posts'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Custom Posts',
		'public'        => true,
		'menu_position' => 5,
		'menu_icon' 	=> admin_url() . 'images/media-button-image.gif',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ), 
		// ('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
		'has_archive'   => true,
		'hierarchical'  => true,
	);
	register_post_type( 'custom', $args );	
}
add_action( 'init', 'krank_custom_post' );

?>