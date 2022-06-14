<footer class="footer">
  <div class="container footer__container">
    <ul class="footer-grid list-reset">
      <li class="footer-grid__item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo" class="footer-grid__img">
      </li>
      <li class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('contacts'));?></div>
        <a href="tel:<?php if(!dynamic_sidebar('footer-contacts'));?>"><?php if(!dynamic_sidebar('footer-contacts'));?></a>
      </li>
      <li class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('pages'));?></div>
        <nav class="nav footer-nav">
          <?php wp_nav_menu(['container' => '', 'menu' => 'list-page', 'menu_class' => 'footer-menu list-reset', 'add_li_class'  => 'footer-menu__item']); ?> 
        </nav>
      </li>
      <li class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('resources'));?></div>
        <nav class="footer-nav">
          <?php wp_nav_menu([ 'container' => '', 
                              'menu' => 'footer-resources', 
                              'menu_class' => 'footer-menu list-reset', 
                              'add_li_class'  => 'footer-menu__item']); ?>
        </nav>
      </li>
    </ul>
    <small class="footer__copy">ООО "Областные Сети" 2022</small>
  </div>
</footer>
<?php 
    if( is_404() ){
     ?> 
     </div>
     <?php
    }
  ?>
<?php wp_footer(); ?>
</body>

</html>