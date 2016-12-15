<?php
function event_custom_post(){
    $labels = array(
      'name' => 'events',
      'singular_name' => 'Event'
    );

    $args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			),
			'menu_position' => 5,
			'exclude_from_search' => false
		);
  register_post_type('events', $args);

}
add_action('init','event_custom_post');


function location_custom_post(){
    $labels = array(
      'name' => 'Locations',
      'singular_name' => 'Location'
    );

    $args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'thumbnail'
			),
			'menu_position' => 6,
			'exclude_from_search' => true
		);
  register_post_type('location', $args);

}

add_action('init','location_custom_post');


function undertian_event_custom_taxonomies() {

	$labels = array(
		'name' => 'eventtypes',
		'singular_name' => 'Eventtype',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add new',
		'new_item_name' => 'New Type name',
		'menu_name' => 'Eventtypes'
	);

	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'eventtypes' )
	);

	register_taxonomy('eventtypes', array('events'), $args);

}
add_action( 'init' , 'undertian_event_custom_taxonomies' );

include_once 'event_meta_boxes.php';




?>
