<?php
  get_header(); ?>


    <main id="content_container">


          <?php $menues = new WP_Query(array(
            'post_type' => 'Menu',
            'posts_per_page' => -1,
          )

          );
          if ($menues-> have_posts()):

            while($menues->have_posts()):$menues->the_post(); ?>
            <article class="post">
              <section class="fp-menu">
                <?php if ( has_post_thumbnail() ):?>
                    <div class="fp-menu-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' );?>');"></div>
                <?php else:?>
                      <div class="fp-menu-image" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/no-image-box.png');"></div>
                <?php endif; ?>




                <div class="fp-menu-text">
                  <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt();?>
                  <a href="<?php the_permalink() ?>"><div class="button">Till Menyn</div></a>

                </div>
              </section>
              </article>
          <?php
           endwhile;
          endif;


           ?>



         </main>
        <?php get_footer(); ?>
