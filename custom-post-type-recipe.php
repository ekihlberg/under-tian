<?php
// --------------------------------------------------------
// Custom Post Type Recipe
// --------------------------------------------------------
function recipe_custom_post(){
    $labels = array(
      'name' => 'Recipes',
      'singular_name' => 'Recipes',
      'add_new' => 'Add new Recipe',
      'all_items' => 'Show all Recipes',
      'add_new_item' => 'Add Recipe',
      'edit_item' => 'Edit Recipe',
      'new_items' => 'New Recipe',
      'view_item' => 'View Recipe',
      'search_item' => 'Search Recipe',
      'not_found' => 'No Recipes Found',
			'not_found_in_trash' => 'No Recipes Found',
			'parent_item_colon' => 'Parent quote'

    );
    $args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
      'menu_icon'   => 'dashicons-carrot',
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
        'comments'
			),
			// 'taxonomies' => array( 'category', 'post_tag' ), // add default post categories and tags
			'menu_position' => 5,
			'exclude_from_search' => false
		);
  register_post_type('recipes', $args);

}
add_action('init','recipe_custom_post');

?>
