<?php
/*
Template Name: home
*/
?> 
 <?php get_header();?>
  <main class="main">
    <section class="content">
      <h2 class="visually-hidden">Intro</h2>     
      <div class="container content__container">
        <!-- <div class="block"> -->
          <section class="intro">
            <div class="intro__text">
              <div>
                <h1 class="intro__title">Областные Сети</h1>
              </div>
                <div class="intro__btns">
                  <a href="#contact-form" class="intro__btn">Подключайся</a>
                  <a href="https://lk.oblseti.ru" class="intro__btn btn_lk">Личный кабинет</a>
              </div>
            </div>
            <div class="col_1">
              <img src="<?php echo get_template_directory_uri(  );?>/assets/img/intro_new_400.png" alt="" class="intro-section__img">
            </div>
          </section>
        <!-- </div> -->
        <section class="tarifs block" id="tarifs">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_smart_2.png" alt="Тариф Смарт" class="tarif-grid__img" onclick="singup('Тариф Смарт')">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_start_2.png" alt="Тариф Старт" class="tarif-grid__img" onclick="singup('Тариф Старт')">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_norm_2.png" alt="Тариф Норм" class="tarif-grid__img" onclick="singup('Тариф Норм')">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_pro_2.png" alt="Тариф Про" class="tarif-grid__img" onclick="singup('Тариф Про')">
        </section>
        <section class="features block">
          <div class="features__img">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/features.png" alt="" class="features__img1">
          </div>
          <div class="features-list">
            <a href="#tarifs" class="features-list__link">Интернет</a>
            <a href="" class="features-list__link">IPTV</a>
            <a href="#cctv" class="features-list__link">Видеонаблюдение</a>
            <a href="" class="features-list__link">Дополнительные<br>услуги</a>
          </div>
        </section>
        <section class="cctv block" id="cctv">
          <div class="cctv__item">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/camera_light.png" alt="Камера лайт" class="cctv-grid__img" id="light" onclick="cctv_info(this)">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/camera_standart.png" alt="Камера стандарт" class="cctv-grid__img" id="standart" onclick="cctv_info(this)">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/camera_pro.png" alt="Камера про" class="cctv-grid__img" id="pro" onclick="cctv_info(this)">
          </div>
        </section>
        <?php
          $arr = [
            'posts_per_page' => 3,
            'orderby' => 'date'
          ];
          $recent = new WP_Query($arr);
          if ($recent->have_posts()) {
        ?>
            <div class="news block ">
              <div class="news-grid list-reset">
                <?php
                    
                    while ($recent->have_posts()) : $recent->the_post(); 
                ?>
                  <div class="news-post" style= "background:linear-gradient(90deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.3) 100%), url('<?php echo get_the_post_thumbnail_url();?>')";>   
                                <?php
                                    $category = get_the_category();
                                    $cat_link = get_category_link( $category[0] );
                                ?>
                                <a href="<?php echo $cat_link; ?>" class="news-post__category">
                                    <?php echo $category[0]->cat_name;?>
                                </a>
                                    <h3 class="news-post__title"><a href="<?php the_permalink(); ?>" class="news-post__link">
                                    <?php the_title();  ?> 
                                </a>
                            </h3>
                        <time class="news-post__date"><?php echo get_the_date('F jS')?></time>
                  </div>
                <?php endwhile?>
              </div>
            </div>
            <?php
          }
            ?>
        <section class="contact block">
          <form  action="<?php echo get_template_directory_uri(  );?>/telegram.php" class="contact-form" id="contact-form" method="POST">
          <div>
            <h3 class="contact-form__title">Введите имя</h3>
            <input type="text" name="real_name" required  class="contact-form__field" placeholder="Иванов Иван Иванович">
            <h3 class="contact-form__title field-title">Введите телефон</h3>
            <input type="tel" name="phone" required  class="contact-form__field" placeholder="+73832096201">
            <h3 class="contact-form__title field-title">Введите сообщение</h3>
            <textarea type="text" name="message" id="contact-form__textarea" required  class="contact-form__field contact-message"></textarea>
            <button  type="submit" class="g-recaptcha contact-form__btn btn-reset" id="rcaptcha"  data-sitekey="6Ld6Xc4aAAAAALXed_2rNMqfKIM2DQ0rSH1h21PW" data-size="invisible" data-callback="onSubmit">Отправить</button>
            <p id="status"></p>
          </div>
          </form>
        </section>
    </section>
  </main>
<?php get_footer();?>