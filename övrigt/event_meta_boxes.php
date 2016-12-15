<?php

function event_info_add_meta_box() {
	add_meta_box( 'event_info', 'Event Info', 'event_info_html', 'events', 'normal', 'high');
}

add_action( 'add_meta_boxes', 'event_info_add_meta_box' );


function event_info_html( $post ) {

	$current_srt_date = get_post_meta( $post->ID, '_srt_date_event', true );
	$current_end_date = get_post_meta( $post->ID, '_end_date_event', true );
	$current_location = get_post_meta( $post->ID, '_event_info_location', true );
	$location = new Wp_Query( array(
								'post_type' => 'Location',
								'posts_per_page' => -1,
							));


	wp_nonce_field( 'event_info_nonce_'.$post->ID, 'event_info_nonce_input' );

	 ?>

	<p>
		<label for="srt_date_event">Start date</label><br/>
		<input type="datetime-local" name="srt_date_event" value="<?= $current_srt_date ?>">
	</p>
  <p>
		<label for="end_date_event">End Date</label><br/>
		<input type="datetime-local" name="end_date_event" value="<?= $current_end_date ?>">
	</p>
  <p>
		<select name="event_info_location">

			<option value="0">Select Location</option>

			<?php while( $location->have_posts() ): $location->the_post();

				$status = $current_location == get_the_id() ? 'selected' : ''; ?>

				<option <?= $status ?> value="<?php the_id(); ?>"><?php the_title(); ?> #<?php the_id(); ?></option>

			<?php endwhile; wp_reset_postdata(); ?>

		</select>
	</p>

<?php
 }



function event_info_save_data( $post_id ){

  if( !isset( $_POST['event_info_nonce_input']) || !wp_verify_nonce( $_POST['event_info_nonce_input'], 'event_info_nonce_'.$post_id ) ){
     return $post_id;
	}
$post_type_object = get_post_type_object( get_post_type( $post_id ) );

	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return $post_id;
	}
	$field = array('srt_date_event', 'end_date_event', 'event_info_location');

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
add_action('save_post', 'event_info_save_data');

 ?>
