<?php

function social_item_add_meta_box() {
	global $post;
   $frontpage_id = get_option('page_on_front');
   if($post->ID == $frontpage_id):
	add_meta_box( 'social_icons_meta', 'Social Icon', 'social_icon_html', 'page', 'normal', 'high');
endif;
}

add_action( 'add_meta_boxes', 'social_item_add_meta_box' );


function social_icon_html( $post ) {

	$facbookLink = get_post_meta( $post->ID, '_facebook_link', true );
  $instaLink = get_post_meta( $post->ID, '_instagram_link', true );
  $koket = get_post_meta( $post->ID, '_koket_link', true );



	wp_nonce_field( 'social_icon_nonce_'.$post->ID, 'social_icon_nonce_input' );

	 ?>

	 <p><strong>Facebook</strong></p>
	 <input type="text" value="<?= $facbookLink ?>" name="facebook_link" style="width: 100%;"/>
	 <p><strong>Instagram</strong></p>
	 <input type="text" value="<?= $instaLink ?>" name="instagram_link" style="width: 100%;"/>
	 <p><strong>Recept.nu</strong></p>
	 <input type="text" value="<?= $koket ?>" name="koket_link" style="width: 100%;"/>



<?php
 }



function social_icon_save_data( $post_id ){

  if( !isset( $_POST['social_icon_nonce_input']) || !wp_verify_nonce( $_POST['social_icon_nonce_input'], 'social_icon_nonce_'.$post_id ) ){
     return $post_id;
	}
$post_type_object = get_post_type_object( get_post_type( $post_id ) );

	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return $post_id;
	}
	$field = array('facebook_link', 'instagram_link', 'koket_link');

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
add_action('save_post', 'social_icon_save_data');

 ?>
