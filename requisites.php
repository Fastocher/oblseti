<?php
/*
Template Name: requisites
*/
?> 

       

<?php get_header();?>
  <main class="main">
    <section class="requisites-content">
      <h2 class="visually-hidden">Реквизиты</h2>     
        <div class="container content__container">
            <div class="requisites">
                <?php if(!dynamic_sidebar('requisites'));?>
            </div>
        </div>
    </section>
  </main>
<?php get_footer();?>