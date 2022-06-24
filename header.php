<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Областные Сети</title>
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
  <?php wp_head()?>

  <?php
    if (is_singular( 'post' )) {
        echo '<link rel="stylesheet" href="'.get_template_directory_uri( ).'/assets/css/post.css">';
    }
  ?>
  <?php 
    if( is_category() ){
      echo '<link rel="stylesheet" href="'.get_template_directory_uri( ).'/assets/css/category.css">';
    }
  ?>
  <?php 
    if( is_404() ){
      echo '<link rel="stylesheet" href="'.get_template_directory_uri( ).'/assets/css/404.css">';
    }
  ?>
  <?php 
    if( is_page_template('requisites.php') ){
      echo '<link rel="stylesheet" href="'.get_template_directory_uri( ).'/assets/css/requisites.css">';
    }
  ?>
</head>
<body>
  <?php 
    if( is_404() or is_category() ){
     ?> 
     <div class="footer-bottom">
     <?php
    }
  ?>
  <header class="header">
    <div class="container header__container">
        <?php
            if( is_front_page() ){
                ?>
                    <a class="logo header__logo">
                        <img src="<?php echo get_template_directory_uri(  );?>/assets/img/logo.png" alt="">
                    </a>
                    
                <?php
            }
            else {
                ?>
                    <a href="<?php echo home_url(); ?>" class="logo header__logo">
                        <img src="<?php echo get_template_directory_uri(  );?>/assets/img/logo.png" alt="">
                    </a>
                <?php    
            }
        ?>
        
      <div class="header__right">

      
        <nav class="nav menu-nav">
            <?php wp_nav_menu( ['container' => '', 'menu' => 'main','add_li_class'  => 'header-menu__item noselect', 'add_li_class_sub' => 'sub-class']);?> 
        </nav>
      </div>
    </div>
  </header>