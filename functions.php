<?php
// --------------------------------------------------------
// Styles include
// --------------------------------------------------------
    function undertian_script_enqueue(){
      wp_enqueue_style('style', get_stylesheet_uri());
      wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/script/script.js');
      }
    add_action('wp_enqueue_scripts', 'undertian_script_enqueue', 15);

// --------------------------------------------------------
// Custom Post Type
// --------------------------------------------------------

include_once 'custom-post-type-menus.php';
// include_once 'custom-post-type-event.php';
include_once 'custom-post-type-recipe.php';


// --------------------------------------------------------
// Custom taxonomie for the recepies
// --------------------------------------------------------

include_once 'recipe-type-taxonomies.php';

// --------------------------------------------------------
// Menu functionality
// --------------------------------------------------------
function undertian_theme_functionality() {

	add_theme_support('menus');

	register_nav_menu('primary', 'Main Navigation');
	register_nav_menu('secondary', 'Footer Menu');

  add_theme_support( 'post-thumbnails' );
  add_theme_support('html5',array('search-form'));

}
add_action('init', 'undertian_theme_functionality');

// --------------------------------------------------------
// Customizer functionality
// --------------------------------------------------------

// Lägger till så att det går att ändra logotyp i customizer panelen

function  undertian_customizer_register($wp_customize){
	$wp_customize->add_section('undertian_logo', array(
		'title' => __('Logo', 'undertian'),
		'description' => 'Choose a logo here:'
		));
	$wp_customize->add_setting('undertia_logo', array(
		'default' => 'http://www.hsdtaxlaw.com/wp-content/uploads/2016/05/logo_placeholder.png',

		));
	$wp_customize->add_control(new wp_Customize_Image_Control($wp_customize, 'undertian_logo', array(
		'lable' => __('Edit Logo', 'undertian'),
		'section' => 'undertian_logo',
		'settings' => 'undertia_logo',
		)));
}
add_action('customize_register', 'undertian_customizer_register' );


// --------------------------------------------------------
// Meta boxes
// --------------------------------------------------------

include_once 'menu-meta-boxes.php';
include_once 'social-item-meta-boxes.php';
?>
