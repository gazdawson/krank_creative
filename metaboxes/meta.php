<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'krank_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function krank_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_krank_';

	$meta_boxes[] = array(
		'id'         => 'page_design',
		'title'      => 'Page Design Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'side',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Remove Container',
				'desc' => 'Check if you wish the page container to be removed from this page.',
				'id'   => $prefix . 'container',
				'type' => 'checkbox',
			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'page_lead',
		'title'      => 'Page Sub Heading',
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'core',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Page Sub Header',
				'desc' => '',
				'id'   => $prefix . 'page_lead',
				'type' => 'text',
			),
		),
	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
