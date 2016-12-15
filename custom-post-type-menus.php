<?php
function menu_custom_post(){
    $labels = array(
      'name' => 'Menu',
      'singular_name' => 'Menu',
      
    );
    $args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
      'menu_icon'   => 'dashicons-media-spreadsheet',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
        'excerpt',
			),
			'menu_position' => 6,
			'exclude_from_search' => false
		);
  register_post_type('Menu', $args);

}
add_action('init','menu_custom_post');
?>
