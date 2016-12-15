<?php get_header();


 // $srt_date = new DateTime($srt_date);
 // $end_date = new DateTime($end_date);
 // $now = new DateTime();
 // $difference = $srt_date->diff($end_date);
 // $difference = $difference->format('%y år %m månad(er) %d dag(ar)');
// function time_diffrence_formating($difference){
//   $y = $difference->format('%y');
//   if($y) {
//
//   }
$srt_date_unix = strtotime($srt_date);
$srt_date = get_post_meta( get_the_id(), '_srt_date_event', true );


$event = new  Wp_Query(array(
    'post_type' =>  'events',
    'meta_value' => array(
        'key' => $srt_date_unix,
        'compare' => '>',
        'value' => $now
    ),
));

  if( $event->have_posts() ):
    while ($event-> have_posts()): $event->the_post();?>
    <?php

      ?>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('small');
      }  ?>
    <h1><?php the_title();?></h2>
    <p> <?php the_excerpt();?></p>
    <?php echo get_the_post_thumbnail($location);?>
    <?php $srt_date = get_post_meta( get_the_id(), '_srt_date_event', true );
    $end_date = get_post_meta( get_the_id(), '_end_date_event', true );
    $location = get_post_meta( get_the_id(), '_event_info_location', true );

    $now = strtotime('now'); ?>




<hr>

  <?php  endwhile;
    wp_reset_postdata();
  endif;


get_footer(); ?>
