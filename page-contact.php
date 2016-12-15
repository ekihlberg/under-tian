<?php
/**
 * Template name: Kontakt Sidan
 */

  get_header(); ?>


    <main  class="contact-page" id="content_container">

        <?php
        if (have_posts()) :
        	while (have_posts()) : the_post(); ?>
        	<article class="contact-content">


            <?php if ( has_post_thumbnail() ):?>
                <div class="contact-deco-img" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>');">
            <?php else:?>
                  <div class="contact-deco-img" style="background-image: url('http://localhost:8888/wpinstall/wp-content/uploads/2016/10/no-image-box.png');">
            <?php endif; ?>


            </div>
            <div class="contact-content-text">
        	<h2> <?php the_title(); ?></h2>
        	<p><?php the_content(); ?></p>

          <form action="">
            <input type="text" placeholder="Namn:" name="name" value="">
            <input type="email" placeholder="Din Email:"name="name" value="">
            <textarea name="message" placeholder="Meddelande:"></textarea>
            <input type="submit" name="name" value="Skicka">
          </form>


          </div>
        	</article>

        	<?php endwhile;

        	else :
        		echo "<p>Det går inte att hitta sidor med dessa kriterier</p>";

        	endif;


           ?>
         </main>
        <?php get_footer(); ?>
