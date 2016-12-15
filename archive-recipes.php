<?php
  get_header();

  ?>
    <main id="content_container">
      <section class="top-recipes">
        <?php
        	if( have_posts() ):
              $i = 2;
              while( have_posts() ): the_post();

              if( $i):?>
                  <?php if ( has_post_thumbnail() ):?>
                      <figure class="top-recipe-img" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>');">
                  <?php else:?>
                        <figure class="top-recipe-img" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/no-image-box.png');">
                  <?php endif; ?>

                        <figcaption class="text">
                					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                        </figcaption>
                      </figure>


        			<?php
              $i--;
            else:
              break;
            endif;

          endwhile;

              ?>
        	<?php endif;

           ?>
      </section>

      <section class="recipe-show">
      <?php

            if( have_posts() ):
              while (have_posts()):the_post();?>

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


        <?php  endwhile;?>




    <?php

wp_reset_postdata();
$links = paginate_links( array(
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
    'next_text'          => __( 'Next page', 'twentyfifteen' ),
    'type' => 'list'
) );
   echo $links;
        endif;


        ?>
        </section>



    </main>

        <?php get_footer(); ?>
