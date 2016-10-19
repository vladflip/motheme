<?php

define('THEME_URI', get_template_directory_uri());

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

add_filter('wp_nav_menu','change_submenu_class'); 
add_filter('show_admin_bar', '__return_false');

add_action('init', 'include_scripts_and_styles');
add_action('init', 'register_custom_posts');
add_action('init', 'registerMenu');

// ---------------------------------------------
// CREATE CUSTOM POSTS
// ---------------------------------------------

function register_custom_posts() {

	register_post_type( 'usefull-links',
		array(
			'label' => 'Ссылки',
			'public' => true,
			'menu_position' => 15,
			'menu_icon' => 'dashicons-images-alt',
			'supports' => array( 'title', 'custom-fields', 'thumbnail')
		)
	);

	register_post_type( 'social-links',
		array(
			'label' => 'Social',
			'public' => true,
			'menu_position' => 16,
			'menu_icon' => 'dashicons-networking',
			'supports' => array( 'title', 'custom-fields')
		)
	);

	register_post_type( 'insta-links',
		array(
			'label' => 'Instagram',
			'public' => true,
			'menu_position' => 17,
			'menu_icon' => 'dashicons-format-image',
			'supports' => array( 'title', 'custom-fields', 'thumbnail')
		)
	);

}

// ---------------------------------------------
// CREATE CUSTOM POSTS
// ---------------------------------------------

function check_link($id){
	$link = get_post_custom($id);

	if( ! array_key_exists('link', $link))
		return '#';

	return $link['link'][0];
}

function change_submenu_class($menu) {  
	$menu = preg_replace('/ class="sub-menu"/','/ class="menu_sub" /',$menu);  
	return $menu;  
} 

function registerMenu() {
	$args = array('header_menu' => __('Главное меню'));
	register_nav_menus($args);
}

function include_scripts_and_styles(){

	wp_enqueue_script('stickyjs', THEME_URI . '/js/vendor/jquery.sticky.js',
		array('jquery'), '1', true);

	wp_enqueue_script('smoothscroll', THEME_URI . '/js/vendor/smoothscroll.min.js',
		array('jquery'), '1', true);

	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array(
		'jquery',
		'stickyjs'
	), '1', true);

	wp_register_style('main-style', 
		THEME_URI.'/css/style.css' );

}

function getThumbSrc($id) {

	return wp_get_attachment_url( get_post_thumbnail_id($id) );

}

function getTheDate($id) {

	$date = get_the_date('j n Y', $id);

	$date = explode(' ', $date);

	$day = $date[0];
	$month = $date[1];
	$year = $date[2];

	$months = array(
		'Января',
		'Февраля',
		'Марта',
		'Апреля',
		'Мая',
		'Июня',
		'Июля',
		'Августа',
		'Сентября',
		'Октября',
		'Ноября',
		'Декабря'
	);

	$dayFormatted = '<span class="post_date--large">' . $day . '</span>';

	return $dayFormatted . ' ' . $months[$month-1] . ' <span class="post_date--large">' . $year . '</span>';
}