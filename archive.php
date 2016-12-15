<?php
  get_header();

  ?>

    <main id="content_container">
      <section class="recipe-show">
    <!-- <h1><?php var_dump(get_query_var('paged'));?></h1> -->
      <?php

        if( have_posts() ):
          while (have_posts()): the_post();?>

          <div class="recipes">
            <?php if ( has_post_thumbnail() ):?>
              <figure>
                <a href="<?php the_permalink() ?>"><div class="recipe-img" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>');">
            <?php else:?>
                <a href="<?php the_permalink() ?>"><div class="recipe-img" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/no-image-box.png');">
            <?php endif; ?>
          </div></>
              <figcaption><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></figcaption>
            </figure>
          </div>


        <?php  endwhile;

          	the_posts_pagination(array(
          		'mid_size' => 4,
          		'prev_text' => 'More recent',
          		'next_text' => 'Older',
          	));


        endif;

        ?>
      </section>


    </main>

        <?php get_footer(); ?>
