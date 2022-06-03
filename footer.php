<footer class="footer">
  <div class="container footer__container">
    <ul class="footer-grid list-reset">
      <li class="footer-grid__item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo" class="footer-grid__img">
      </li>
      <li class="footer-grid__item">
        <div class="footer-grid__title">Контакты</div>
        <nav class="nav footer-nav">
          <?php wp_nav_menu(['container' => '', 'menu' => 'footer']); ?>
        </nav>
      </li>
      <li class="footer-grid__item">
        <div class="footer-grid__title"><?php if(!dynamic_sidebar('sidebar-1'));?></div>
        <nav class="nav footer-nav">
          <?php wp_nav_menu(['container' => '', 'menu' => 'footer']); ?> 
        </nav>
      </li>
      <li class="footer-grid__item">
        <div class="footer-grid__title">заголовок2</div>
        <nav class="nav footer-nav">
          <?php wp_nav_menu(['container' => '', 'menu' => 'footer']); ?>
        </nav>
      </li>
    </ul>
    <small class="footer__copy">ООО "Областные Сети" 2022</small>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>