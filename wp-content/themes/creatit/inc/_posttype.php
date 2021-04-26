<?php
/**
 * post type 
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


	//adding custom post-type and taxonomy
function template_custom_post_type (){

	//Restaraunt
	$labels = array(
		'name' => 'Restaraunts',
		'singular_name' => 'Restaraunt',
		'add_new' => 'Add Restaraunt',
		'all_items' => 'All Restaraunts',
		'add_new_item' => 'Add Restaraunt',
		'edit_item' => 'Edit Restaraunt',
		'new_item' => 'New Restaraunt',
		'view_item' => 'Show Restaraunts',
		'search_item' => 'Search Restaraunt',
		'not_found' => 'Restaraunt not found',
		'not_found_in_trash' => 'No Restaraunt in trash',
		'parent_item_colon' => 'Parent Restaraunt'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'show_in_rest' => true,
		'supports' => array(
			'title'
		),
		'menu_position' => 6,
		'exclude_from_search' => false
	);
	register_post_type('restaraunt',$args);
}
add_action('init','template_custom_post_type');