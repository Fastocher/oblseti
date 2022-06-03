<?php get_header( );?>

<?php if (have_posts()) { while (have_posts(  )) { the_post(  );?>


    <main class="main">
    <div class="post-banner">
        <div class="container post-banner__container" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
    </div>
    <section class="post-content">
      <div class="container post-content__container">
        <div class="post-wrapper">
            <div class="post">
                <div class="post-meta">
                    <?php
                        $category = get_the_category();
                        $cat_link = get_category_link( $category[0] );
                    ?>
                    <a href="<?php echo $cat_link; ?>" class="post-category">
                        <?php echo $category[0]->cat_name;?>
                    </a>
                    <time class="post-date"><?php the_date('j F')?></time>
                </div>
                <h1 class="post-title">    <?php the_title(); ?></h1>
                <?php the_content( '', true ); ?>
            </div>
            <div class="post-links">
                <?php previous_post_link('%link','Предыдущая новость', true);?>
                <?php next_post_link('%link','Следующая новость', true);?>
            </div>
        </div>
    </section>
  </main>




<?php } } else {?>
<?php }?>


<?php get_footer( );?>