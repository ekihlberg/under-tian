<?php
function undertian_add_meta_boxes() {
  add_meta_box( 'undertian_recipe_meta', 'Recipe Info', 'undertian_recipe_meta_callback', 'Recipes', 'no', 'high');

}

add_action('add_meta_boxes', 'undertian_add_meta_boxes');

function undertian_recipe_meta_callback()
{

}
 ?>
