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
          <article class="intro">
            <div class="intro__text">
              <h1 class="intro__title">Областные Сети</h1>
              <a href="#contact-form" class="intro__btn">Подключайся</a>
              <a href="https://lk.oblseti.ru" class="intro__btn btn_lk">Личный кабинет</a>
            </div>
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/intro_new_400.png" alt="" class="intro-article__img">
          </article>
        <!-- </div> -->
        <article class="tarifs block" id="tarifs">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_smart_2.png" alt="Тариф Смарт" class="tarif-grid__img" onclick="singup('Тариф Смарт')">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_start_2.png" alt="Тариф Старт" class="tarif-grid__img" onclick="singup('Тариф Старт')">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_norm_2.png" alt="Тариф Норм" class="tarif-grid__img" onclick="singup('Тариф Норм')">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/tarifs_pro_2.png" alt="Тариф Про" class="tarif-grid__img" onclick="singup('Тариф Про')">
        </article>
        <article class="features block">
          <img src="<?php echo get_template_directory_uri(  );?>/assets/img/features.png" alt="" class="features__img">
          <ul class="features-list list-reset">
            <li class="features-list__item"><a href="#tarifs" class="features-list__link">Интернет</a></li>
            <li class="features-list__item"><a href="" class="features-list__link">IPTV</a></li>
            <li class="features-list__item"><a href="#cctv" class="features-list__link">Видеонаблюдение</a></li>
            <li class="features-list__item"><a href="" class="features-list__link">Дополнительные услуги</a></li>
          </ul>
        </article>
        <article class="cctv block" id="cctv">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/camera_light.png" alt="Камера лайт" class="cctv-grid__img" id="light" onclick="cctv_info(this)">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/camera_standart.png" alt="Камера стандарт" class="cctv-grid__img" id="standart" onclick="cctv_info(this)">
            <img src="<?php echo get_template_directory_uri(  );?>/assets/img/camera_pro.png" alt="Камера про" class="cctv-grid__img" id="pro" onclick="cctv_info(this)">
        </article>
        <div class="news block">
          <ul class="news-grid list-reset">
            <?php
                $arr = [
                    'posts_per_page' => 3,
                    'orderby' => 'date'
                ];
                $recent = new WP_Query($arr);
                while ($recent->have_posts()) : $recent->the_post(); 
            ?>
            <li class="news-grid__item">
                <article class="news-post"style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>') ;"> 
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
                </article>
            </li>
            <?php endwhile?>
          </ul>
        </div>
        <div class="contact block">
          <form action="<?php echo admin_url( 'admin-ajax.php?action=callback_mail' )?>" class="contact-form" id="contact-form" >
          <h3 class="contact-form__title">Введите имя</h3>
          <input type="text" name="real_name" id="" class="contact-form__field" placeholder="Иванов Иван Иванович">
          <h3 class="contact-form__title field-title">Введите телефон</h3>
          <input type="tel" name="phone" id="" class="contact-form__field" placeholder="+79994674765">
          <h3 class="contact-form__title field-title">Введите сообщение</h3>
          <textarea type="text" name="message" id="contact-form__textarea" class="contact-form__field contact-message"></textarea>
          <button class="contact-form__btn btn-reset">Отправить</button>
          </form>
        </div>
    </section>
  </main>
<?php get_footer();?>