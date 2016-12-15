<?php
  get_header();

  ?>


  <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="fp-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' );?>');">
      <div class="fp-image-text">
        <h1><?php the_title(); ?> </h1>
        <?php the_content(); ?>
        <a href="<?php echo get_post_type_archive_link( 'recipes' ); ?>">Se alla recept</a>
      </div>
    </div>
    <main id="content_container">

    <?php endwhile; ?>
<?php endif; ?>
        <?php



          $latest = new Wp_Query(array(
        		'posts_per_page' => 4,
            'post_type' =>  'Recipes'
        	));
        	if( $latest->have_posts() ): ?>

        		<section class="latest-recipe">
        			<h2>Senaste Recepten</h2>
        			<?php while( $latest->have_posts() ): $latest->the_post(); ?>



                <div class="latest-recipe-show">


                  <?php if ( has_post_thumbnail() ):
                    	?>
                      <div class="latest-recipe-img" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>');">
                    <?php
                  else:
                    ?>
                    <div class="latest-recipe-img" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/no-image-box.png');">
                    <?php

                  endif; ?>
                  <div class="latest-recipe-img-text">
          					<h3>
                      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </h3>
                  </div>
                </div>
                </div>
        			<?php endwhile;
              wp_reset_postdata();?>
        		</section>

        	<?php endif;

           ?>
           <?php get_template_part('part', 'social-icons'); ?>

           <ul class="category">

             <?php
            wp_list_categories( array(
              'taxonomy' => 'type',
              'orderby'    => 'count',
              'order' => 'DESC',
              'title_li' => false,
));?>




           </ul>

          <?php $menues = new WP_Query(array(
            'post_type' => 'Menu',
            'posts_per_page' => 1,
          )

        );
        if ($menues-> have_posts()):
            while($menues->have_posts()):$menues->the_post(); ?>
              <section class="fp-menu">
                <?php if ( has_post_thumbnail() ):?>
                <div class="fp-menu-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' );?>');"></div>
                <?php
              else:
                ?>
                <div class="fp-menu-image" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/no-image-box.png');">
                <?php

              endif; ?>

                <div class="fp-menu-text">
                  <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt();?>
                  <a href="<?php the_permalink() ?>"><div class="button">Till veckan meny</div></a>

                </div>
              </section>
<?php
           endwhile;
        endif;


           ?>



         </main>

        <?php get_footer(); ?>
