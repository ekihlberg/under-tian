<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
  <title><?php bloginfo('description'); ?></title>
</head>
<body <?php body_class(); ?>>
<header>
  <div class="searchbar" id="hide">
    <?php get_search_form(); ?>
  </div>
  <div id="header_content">
    <a href="<?php echo home_url(); ?>" id="logo_link">
      <img src="<?php echo get_theme_mod('undertia_logo'); ?>" class="logo" alt="logotype">
    </a>
    <div class="header-menu">
      <?php
        wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'nav',
        'container_class' => 'top-menu',
        'fallback_cb'=> true,
        ));

        ?>
        <div class="searchbutton" id="searchify" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/sok.png')">


        </div>


     </div>
    </div>

 </header>
