<?php
function undertian_custom_taxonomies() {

	$labels = array(
		'name' => 'Recipetypes',
		'singular_name' => 'Recipetype',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add new',
		'new_item_name' => 'New Type name',
		'menu_name' => 'Recepetypes'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'Recipetype' )
	);

	register_taxonomy('type', array('recipes'), $args);

}
add_action( 'init' , 'undertian_custom_taxonomies' );
 ?>
