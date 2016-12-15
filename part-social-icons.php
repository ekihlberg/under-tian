<div class="social-icons">


  <?php

  $facbookLink = get_post_meta( $post->ID, '_facebook_link', true );
  $instaLink = get_post_meta( $post->ID, '_instagram_link', true );
  $koket = get_post_meta( $post->ID, '_koket_link', true );
  if ($facbookLink): ?>
  <a href="<?= $facbookLink ?>" id="facebook"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png" alt="facebook" /></a>

  <?php endif;
  if ($instaLink): ?>
  <a href="<?= $instaLink ?>" id="instagram"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/instagram.png" alt="instagram" /></a>
<?php endif;

if ($instaLink): ?>
<a href="<?= $koket ?>" id="kokets"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/chef-hat.png" alt="kokets" /></a>
<?php endif; ?>
</div>
