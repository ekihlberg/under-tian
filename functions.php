<?php
// --------------------------------------------------------
// Styles include
// --------------------------------------------------------
    function undertian_script_enqueue(){
      wp_enqueue_style('style', get_stylesheet_uri());
      }
    add_action('wp_enqueue_scripts', 'undertian_script_enqueue', 15);

// --------------------------------------------------------
// Custom Post Type
// --------------------------------------------------------

function recipe_custom_post(){
    $labels = array(
      'name' => 'Recipes',
      'singular_name' => 'Recipes',
      'add_new' => 'Add New Recipe',
      'all_items' => 'Show All Recipes',
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
				'revisions'
			),
			'taxonomies' => array( 'category', 'post_tag' ), // add default post categories and tags
			'menu_position' => 5,
			'exclude_from_search' => false
		);
  register_post_type('recipes', $args);

}
add_action('init','recipe_custom_post');

// --------------------------------------------------------
// Menu functionality
// --------------------------------------------------------
function undertian_theme_functionality() {

	add_theme_support('menus');

	register_nav_menu('primary', 'Main Navigation');
	register_nav_menu('secondary', 'Footer Menu');

  add_theme_support( 'post-thumbnails' );

}
add_action('init', 'undertian_theme_functionality');

// --------------------------------------------------------
// Customizer functionality
// --------------------------------------------------------

// Lägger till så att det går att ändra logotyp i customizer panelen

function  undertian_customizer_register($wp_customize){
	$wp_customize->add_section('undertian_colours', array(
		'title' => __('Colors', 'undertian'),
		'description' => 'Modify the theme colour'
		));
	$wp_customize->add_setting('header_colors', array(
		'default' => '#000066',
		'transport' => 'refresh'
		));
	$wp_customize->add_control(new wp_customize_color_control($wp_customize, 'header_colors', array(
		'lable' => __('Edit background color', 'undertian'),
		'section' => 'undertian_colours',
		'settings' => 'header_colors',
		)));
	$wp_customize->add_section('undertian_logo', array(
		'title' => __('Logo', 'undertian'),
		'description' => 'Choose a logo here:'
		));
	$wp_customize->add_setting('undertia_logo', array(
		'default' => 'http://localhost:8888/wp-content/uploads/2016/06/HISHOP-logo-1.png',

		));
	$wp_customize->add_control(new wp_Customize_Image_Control($wp_customize, 'undertian_logo', array(
		'lable' => __('Edit Logo', 'undertian'),
		'section' => 'undertian_logo',
		'settings' => 'undertia_logo',
		)));
}
add_action('customize_register', 'undertian_customizer_register' );


?>
