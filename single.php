<?php
  get_header(); ?>


    <main id="content_container">

        <?php
        if (have_posts()) :
        	while (have_posts()) : the_post(); ?>
        	<article class="post">
            <?php if ( has_post_thumbnail() ) {
              	the_post_thumbnail();
              }  ?>

        	<h2><?php the_title(); ?></h2>
        	<?php the_content();

           ?>
        	</article>
        	<?php endwhile;

        	else :
        		echo "<p>Det går inte att hitta sidor med dessa kriterier</p>";

        	endif;


           ?>

         </main>
        <?php get_footer(); ?>
