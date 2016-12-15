<?php

function foodmenu_add_meta_box() {
	add_meta_box( 'foodmenu_meta', 'Menu', 'food_meta_html', 'Menu', 'normal', 'high');
}

add_action( 'add_meta_boxes', 'foodmenu_add_meta_box' );


function food_meta_html( $post ) {

	$menu_mandag = get_post_meta( $post->ID, '_mandag_menu_item', true );
  $menu_tisdag = get_post_meta( $post->ID, '_tisdag_menu_item', true );
  $menu_onsdag = get_post_meta( $post->ID, '_onsdag_menu_item', true );
  $menu_torsdag = get_post_meta( $post->ID, '_torsdag_menu_item', true );
  $menu_fredag = get_post_meta( $post->ID, '_fredag_menu_item', true );
  $menu_lordag = get_post_meta( $post->ID, '_lordag_menu_item', true );
  $menu_sondag = get_post_meta( $post->ID, '_sondag_menu_item', true );

	$recipes = new Wp_Query( array(
								'post_type' => 'Recipes',
								'posts_per_page' => -1,
							));


	wp_nonce_field( 'foodmenu_nonce_'.$post->ID, 'foodmenu_nonce_input' );

	 ?>
  <p>Måndag</p>
		<select name="mandag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_mandag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
    <p>Tisdag</p>
    <select name="tisdag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_tisdag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
    <p>Onsdag</p>
    <select name="onsdag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_onsdag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
    <p>Torsdag</p>
    <select name="torsdag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_torsdag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
    <p>Fredag</p>
    <select name="fredag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_fredag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?> </option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
    <p>Lördag</p>
    <select name="lordag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_lordag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
    <p>Söndag</p>
    <select name="sondag_menu_item">

			<option value="0">Select Dish</option>

			<?php while( $recipes->have_posts() ): $recipes->the_post();

				$status = $menu_sondag == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>


<?php
 }



function foodmenu_save_data( $post_id ){

  if( !isset( $_POST['foodmenu_nonce_input']) || !wp_verify_nonce( $_POST['foodmenu_nonce_input'], 'foodmenu_nonce_'.$post_id ) ){
     return $post_id;
	}
$post_type_object = get_post_type_object( get_post_type( $post_id ) );

	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return $post_id;
	}
	$field = array('mandag_menu_item', 'tisdag_menu_item', 'onsdag_menu_item', 'torsdag_menu_item', 'fredag_menu_item', 'lordag_menu_item', 'sondag_menu_item');

		for ($i=0; $i < count($field); $i++) {


			$key = '_'.$field[$i];
			$old = get_post_meta( $post_id, $key, true );
			$new = isset($_POST[$field[$i]]) ? $_POST[$field[$i]] : '';

			if( !$old && $new ) {
				 add_post_meta( $post_id, $key, $new, true );
			} elseif( $old && $new && $old != $new ) {
				 update_post_meta( $post_id, $key, $new, $old );
			} elseif ($old && !$new ) {
				delete_post_meta( $post_id, $key, $old);
			}
		}
}
add_action('save_post', 'foodmenu_save_data');

 ?>
