<footer class="footer">
  <div class="container footer__container">
    <div class="footer-grid list-reset">
      <div class="footer-grid__item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icon.png" alt="logo" class="footer-grid__img">
      </div>
      <div class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('contacts'));?></div>
        <a href="tel:<?php if(!dynamic_sidebar('footer-contacts'));?>"><?php if(!dynamic_sidebar('footer-contacts'));?></a>
      </div>
      <div class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('pages'));?></div>
        <nav class="nav footer-nav">
          <?php wp_nav_menu(['container' => '', 'menu' => 'list-page', 'menu_class' => 'footer-menu list-reset', 'add_li_class'  => 'footer-menu__item']); ?> 
        </nav>
      </div>
      <div class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('resources'));?></div>
        <nav class="footer-nav">
          <?php wp_nav_menu([ 'container' => '', 
                              'menu' => 'footer-resources', 
                              'menu_class' => 'footer-menu list-reset', 
                              'add_li_class'  => 'footer-menu__item']); ?>
        </nav>
      </div>
  </div>
    <small class="footer__copy">ООО "Областные Сети" 2022</small>
  </div>
</footer>
<?php 
    if( is_404() or is_category() ){
     ?> 
     </div>
     <?php
    }
  ?>
  <h2 class="visually-hidden">Created by: Fastocher@yandex.ru</h2>
<?php wp_footer(); ?>
</body>

</html>