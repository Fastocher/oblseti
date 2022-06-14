<?php

function oblseti_assets() {
    wp_enqueue_style( 'normalize', get_template_directory_uri(  ). '/assets/css/normalize.css' );

    wp_enqueue_style( 'style', get_template_directory_uri(  ). '/assets/css/style.css' );

    wp_enqueue_script('script', get_template_directory_uri(  ).'/assets/js/script.js', '20151215', true );
}

add_action( 'wp_enqueue_scripts', 'oblseti_assets' );

show_admin_bar( false );

add_theme_support( 'post-thumbnails' );

function posts_link_next_class($format){
    $format = str_replace('href=', 'class="post-links__link post-links__link--next" href=', $format);
    return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
    $format = str_replace('href=', 'class="post-links__link post-links__link--prev" href=', $format);
    return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');

add_theme_support('menus');


add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu() {
	register_nav_menu( 'footer-column-2', 'list-page' );
	register_nav_menu( 'footer-column-3', 'resources' );
	register_nav_menu( 'footer-column-1', 'footer menu' );
    register_nav_menu( 'main', 'main menu' );
}






add_action( 'phpmailer_init', 'smtp_phpmailer_init' );

function smtp_phpmailer_init( $phpmailer ){

	$phpmailer->IsSMTP();

	$phpmailer->CharSet    = 'UTF-8';

	$phpmailer->Host       = 'smtp.yandex.ru';
	$phpmailer->Username   = 'info-oblseti@yandex.ru';
	$phpmailer->Password   = 'brusilov1916gg';
	$phpmailer->SMTPAuth   = true;
	$phpmailer->SMTPSecure = 'ssl';

	$phpmailer->Port       = 465;
	$phpmailer->From       = 'info-oblseti@yandex.ru';
	$phpmailer->FromName   = 'oblseti';

	$phpmailer->isHTML( true );
   
}

add_action('wp_ajax_nopriv_callback_mail', 'callback_mail');
add_action('wp_ajax_callback_mail', 'callback_mail');

function callback_mail() {

	$name = $POST['name'];
	$phone = $POST['phone'];
	$message = $POST['message'];

	$to = 'info-oblseti@yandex.ru';
	$subject = 'asd';
	$message = 'asd';

	remove_all_filters( 'wp_mail_from' );
	remove_all_filters( 'wp_mail_from_name' );
	 
	$headers = array(
		'From: Me Myself <me@example.net>',
		'content-type: text/html',
		'Cc: John Q Codex <jqc@wordpress.org>',
		'Cc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
	);



	wp_mail( $to, $subject, $message, $headers );
	wp_die( );
}


function custom_pagination() {
	ob_start();
	?>
		<div class="pages clearfix">
			<?php
				global $wp_query;
				$current = max( 1, absint( get_query_var( 'paged' ) ) );
				$pagination = paginate_links( array(
					'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
					'format' => '?paged=%#%',
					'current' => $current,
					'total' => $wp_query->max_num_pages,
					'type' => 'array',
					'prev_text' => null,
					'next_text' => null,
				) ); ?>
			<?php if ( ! empty( $pagination ) ) : ?>
				<ul class="pagination list-reset">
					<?php foreach ( $pagination as $key => $page_link ) : ?>
						<li class="pagination__item<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' pagination__item--current'; } ?>"><?php echo $page_link ?></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		</div>
	<?php
	$links = ob_get_clean();
	return apply_filters( 'sa_bootstap_paginate_links', $links );
}


remove_filter( 'the_excerpt', 'wpautop' );

add_filter('the_excerpt', 'custom_excerpt_length');

function custom_excerpt_length($excerpt){
	$characters = 200; // Количество символов
	if (strlen($excerpt) > $characters) {
		return substr($excerpt, 0, strpos($excerpt, ' ', $characters));
	}
	return $excerpt;
}




add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){

	register_sidebar( array(
		'name'          => esc_html__('contacts', 'ob'),
		'id'            => 'footer-column_1',
		'description'   => '',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
	) );
	register_sidebar( array(
		'name'          => esc_html__('Pages', 'ob'),
		'id'            => 'footer-column_2',
		'description'   => '',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
	) );
	register_sidebar( array(
		'name'          => esc_html__('resources', 'ob'),
		'id'            => 'footer-column_3',
		'description'   => '',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
	) );
	register_sidebar( array(
		'name'          => esc_html__('footer-contacts', 'ob'),
		'id'            => 'footer-contacts',
		'description'   => '',
		'class'         => '',
		'before_widget' => null,
		'after_widget'  => null,
	) );
}

remove_filter('widget_text_content', 'wpautop');


add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}

// add_filter('nav_menu_submenu_css_class', 'add_additional_class_on_li_sub', 1, 3);
// function add_additional_class_on_li_sub($classes, $item, $args) {
//     if(isset($args->add_li_class)) {
//         $classes[] = $args->add_li_class;
//     }
//     return $classes;
// }

add_filter( 'nav_menu_css_class', '__return_empty_array' );
// function wpdocs_custom_dropdown_class( $classes ) {
//     $classes[] = 'dropdown';
//     return $classes;
// }
 
// add_filter( 'nav_menu_submenu_css_class', 'wpdocs_custom_dropdown_class' );




add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

function change_wp_nav_menu( $classes, $args, $depth ) {
	foreach ( $classes as $key => $class ) {
		if ( $class == 'sub-menu' ) {
			$classes[ $key ] = 'sub-menu list-reset';
		}
	}

	return $classes;
}
