<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,700" rel="stylesheet">

  <?php wp_head(); ?>
  <title><?php bloginfo('description'); ?></title>
</head>
<body>
  <header><div id="header_content">
<a href="<?php echo home_url(); ?>" id="logo_link"><img src="<?php echo get_theme_mod('undertia_logo'); ?>" class="logo" alt="logotype"></a>

<?php wp_nav_menu(array(
    'theme_location' => 'primary',
    'container' => 'nav',
    'container_class' => 'top-menu',
  ));
 ?>
 </div>
 </header>
