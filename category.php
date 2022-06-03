<?php get_header(); ?>
<main class="main">
    <section class="content">
        <h2 class="visually-hidden">Новости по рубрикам</h2>
        <div class="container content__container">
            <div class="category">
                <ul class="category-grid list-reset">
                    <?php
                    // проверяем есть ли посты в глобальном запросе - переменная $wp_query
                    if (have_posts()) {
                        // перебираем все имеющиеся посты и выводим их
                        while (have_posts()) {
                            the_post();
                    ?>
                            <li class="category-grid__item">
                                <article class="category-post" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>') ;">
                                    <?php
                                    $category = get_the_category();
                                    $cat_link = get_category_link($category[0]);
                                    ?>
                                    <a href="<?php echo $cat_link; ?>" class="category-post__category news-post__category">
                                        <?php echo $category[0]->cat_name; ?>
                                    </a>
                                    <h3 class="category-post__title">
                                        <a href="<?php the_permalink(); ?>" class="category-post__link">
                                            <?php the_title();  ?>
                                        </a>
                                    </h3>
                                    <p class="category-post_descr"><?php echo custom_excerpt_length(the_excerpt()); ?></p>
                                    <time class="category-post__date news-post__date"><?php echo get_the_date('F jS') ?></time>
                                </article>
                            </li>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    // постов нет
                    else {
                        echo "<h2>Записей нет.</h2>";
                    } ?>
                </ul>
                <?php echo custom_pagination(); ?>
            </div>
    </section>
</main>
<?php get_footer(); ?>