<?php

function social_icons_list_boxes() {

      add_meta_box('social_icons_list', 'Social Icons', 'social_icons_html', 'page' );
  //  endif;
}

add_action('add_meta_boxes', 'social_icons_list_boxes');

function social_icons_html( $post ){



	$facbookLink = get_post_meta( $post->ID, '_facebook_link', true );
  $instaLink = get_post_meta( $post->ID, '_instagram_link', true );
  $koket = get_post_meta( $post->ID, '_facebook_link', true );

	wp_nonce_field('social_icon_list_'.$post->ID, 'social_icon_input') ?>

	<p><strong>Facebook</strong></p>
	<input type="text" value="<?= $facbookLink ?>" name="facebook_link" style="width: 100%;"/>
  <p><strong>Instagram</strong></p>
	<input type="text" value="<?= $instaLink ?>" name="instagram_link" style="width: 100%;"/>
  <p><strong>Recept.nu</strong></p>
	<input type="text" value="<?= $koket ?>" name="koket_link" style="width: 100%;"/>

<?php };


function save_social_icon_meta_data( $post_id ) {


	if( !isset($_POST['social_icon_input']) || !wp_verify_nonce( $_POST['social_icon_input'], 'social_icon_list_'.$post_id )  ) {
		return $post_id;
	}

	$post_type_object = get_post_type_object( get_post_type( $post_id ) );

	// if the user has capability to save this post?
		if ( ! current_user_can( 'edit_post', $post_id ) ){
		return $post_id;
	}

	$field = array('facebook_link', 'instagram_link', 'koket_link');

	for ($i=0; $i < count($field); $i++) {

		// look at the data from the form and compare it to the old data

		$key = '_'.$field[$i];
		$old = get_post_meta( $post_id, $key, true );
		$new = isset($_POST[$field[$i]]) ? $_POST[$field[$i]] : '';

		// do we need to add a row?
		if( !$old && $new ) {
			add_post_meta( $post_id, $key, $new, true );
		} elseif( $old && $new && $old != $new ) {
			// do we nned to update a row?
			update_post_meta( $post_id, $key, $new, $old );
		} elseif( $old && !$new ) {
			// do we need to delete a row?
			delete_post_meta( $post_id, $key, $old );
		}

	}

}

add_action('save_page', 'save_social_icon_meta_data');
?>
