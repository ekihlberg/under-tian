<?php
  get_header(); ?>


    <main id="content_container">

        <?php
        $mandag = get_post_meta( $post->ID, '_mandag_menu_item', true );
        $tisdag = get_post_meta( $post->ID, '_tisdag_menu_item', true );
        $onsdag = get_post_meta( $post->ID, '_onsdag_menu_item', true );
        $torsdag = get_post_meta( $post->ID, '_torsdag_menu_item', true );
        $fredag = get_post_meta( $post->ID, '_fredag_menu_item', true );
        $lordag = get_post_meta( $post->ID, '_lordag_menu_item', true );
        $sondag = get_post_meta( $post->ID, '_sondag_menu_item', true );
        if (have_posts()) :
        	while (have_posts()) : the_post(); ?>
        <article class="post">



        	<h2> <?php the_title(); ?></h2>
        	<?php the_content();


          ?>



          <div id="meny">
            <?php
                  ?>
                  <div>
                  <h3>Måndag</h3>
                  <a href="<?php echo get_post_permalink($mandag); ?>"><?php echo get_the_post_thumbnail($mandag, 'thumbnail'); ?></a>
                  </div>
                  <div>
                  <h3>Tisdag</h3>
                  <a href="<?php echo get_post_permalink($tisdag); ?>"><?php echo get_the_post_thumbnail($tisdag, 'thumbnail'); ?></a>
                  </div>
                  <div>
                  <h3>Onsdag</h3>
                  <a href="<?php echo get_post_permalink($onsdag); ?>"><?php echo get_the_post_thumbnail($onsdag, 'thumbnail'); ?></a>
                  </div>
                  <div>
                  <h3>Torsdag</h3>
                  <a href="<?php echo get_post_permalink($torsdag); ?>"><?php echo get_the_post_thumbnail($torsdag, 'thumbnail'); ?></a>
                  </div>
                  <div>
                  <h3>Fredag</h3>
                  <a href="<?php echo get_post_permalink($fredag); ?>"><?php echo get_the_post_thumbnail($fredag, 'thumbnail'); ?></a>
                  </div>
                  <div>
                  <h3>Lördag</h3>
                  <a href="<?php echo get_post_permalink($lordag); ?>"><?php echo get_the_post_thumbnail($lordag, 'thumbnail'); ?></a>
                  </div>
                  <div>
                  <h3>Söndag</h3>
                  <a href="<?php echo get_post_permalink($sondag); ?>"><?php echo get_the_post_thumbnail($sondag, 'thumbnail'); ?></a>
                  </div>
                  <?php



             ?>
          </div>


         </article>
        	<?php endwhile;

        	else :
        		echo "<p>Det går inte att hitta sidor med dessa kriterier</p>";

        	endif;


           ?>

         </main>
        <?php get_footer(); ?>
