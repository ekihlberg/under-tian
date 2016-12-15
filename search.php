<?php
  get_header();
?>
<main id="content_container">
<section class="post">


<?php
  if (have_posts()):?>
    <h2>Recept</h2>
    <?php while(have_posts()):the_post();
            if (get_post_type() == 'recipes'):
      ?>
              <h3> <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a></h3>
    <?php
            endif;

     ?>
    <?php
          endwhile;
   endif;

  rewind_posts();

  if (have_posts()):?>
    <h2>Menyer</h2>
    <?php while(have_posts()):the_post();
    if (get_post_type() == 'menu'):?>
      <h3> <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a></h3>
  <?php
    endif; ?>

  <?php
    endwhile;
  endif;
 rewind_posts();

 if (have_posts()):
   ?>
   <h2>Övrigt</h2>
   <?php
   while(have_posts()):the_post();

   if (!(get_post_type() == 'menu') && !(get_post_type() == 'recipes')):?>


     <h3> <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a></h3>

 <?php
endif;

?>
 <?php endwhile;
endif;
   ?>
  </section>
 </main>
 <?php get_footer(); ?>
