<?php
/**
 * Template name: Stånde bild
 */

  get_header(); ?>


    <main  class="contact-page st_page" id="content_container">

        <?php
        if (have_posts()) :
        	while (have_posts()) : the_post(); ?>
        	<article class="contact-content">


            <?php if ( has_post_thumbnail() ):?>
                <div class="contact-deco-img" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>');">
            <?php else:?>
                  <div class="contact-deco-img" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/no-image-box.png');">
            <?php endif; ?>


            </div>
            <div class="contact-content-text">
        	<h2> <?php the_title(); ?></h2>
        	<p><?php the_content(); ?></p>

          </div>
        	</article>

        	<?php endwhile;

        	else :
        		echo "<p>Det går inte att hitta sidor med dessa kriterier</p>";

        	endif;


           ?>
         </main>
        <?php get_footer(); ?>
