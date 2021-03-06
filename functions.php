<?php

define('THEME_URI', get_template_directory_uri());

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

add_filter('wp_nav_menu','change_submenu_class'); 
add_filter('show_admin_bar', '__return_false');

add_action('init', 'include_scripts_and_styles');
add_action('init', 'register_custom_posts');
add_action('init', 'registerMenu');

// Allow editors to see Appearance menu
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );
function hide_menu() {
 
    // Hide theme selection page
    remove_submenu_page( 'themes.php', 'themes.php' );
 
    // Hide widgets page
    remove_submenu_page( 'themes.php', 'widgets.php' );
 
    // Hide customize page
    global $submenu;
    unset($submenu['themes.php'][6]);
 
}
 
add_action('admin_head', 'hide_menu');

// ---------------------------------------------
// CREATE CUSTOM POSTS
// ---------------------------------------------

function register_custom_posts() {

	register_post_type( 'events',
		array(
			'label' => 'Events',
			'public' => true,
			'menu_position' => 15,
			'menu_icon' => 'dashicons-calendar-alt',
			'supports' => array( 'title', 'custom-fields', 'excerpt')
		)
	);

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

	wp_enqueue_script('underscore', 'https://unpkg.com/underscore@1.8.3/underscore-min.js',
		[], false, true
	);
	wp_enqueue_script('moment', 'https://unpkg.com/moment@2.15.2/min/moment.min.js',
		[], false, true
	);

	wp_enqueue_script('clndr', THEME_URI . '/js/vendor/clndr.js', array(
		'jquery', 'underscore',
		'moment'
	), false, true);

	wp_enqueue_script('smoothscroll', THEME_URI . '/js/vendor/smoothscroll.min.js',
		array('jquery'), '1', true);

	wp_enqueue_script('simplebar', THEME_URI . '/js/vendor/simplebar.min.js',
		array('jquery'), '1', true);

	wp_enqueue_script('main-script', THEME_URI . '/js/script.js', array(
		'jquery'
	), false, true);

	wp_register_style('main-style', THEME_URI.'/css/style.css' );
	wp_register_style('simplebar', THEME_URI.'/css/simplebar.css' );

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

add_action('wp_enqueue_scripts', 'localize_my_url');
add_action('wp_ajax_calendar-events', 'get_calendar_events');
add_action('wp_ajax_nopriv_calendar-events', 'get_calendar_events');

function localize_my_url(){
	wp_localize_script('main-script', 'ajaxUrl',['url' => admin_url('admin-ajax.php')]);
}

function get_calendar_events(){

	$date = $_POST['date'];

	$from = date('Y-m-d', strtotime($date." last day of -2 month"));

	$to = date('Y-m-d', strtotime($date." first day of +1 month"));

	$posts = get_posts([
		'category' => get_cat_ID('Event'),
		'numberposts' => -1,
		'meta_query' => [
			'relation' => 'AND',
			[
				'key' => 'date',
				'value' => [$from, $to],
				'compare' => 'BETWEEN',
				'type' => 'DATE'
			]
		]
	]);

	$customs = get_posts([
		'post_type' => 'events',
		'numberposts' => -1,
		'meta_query' => [
			'relation' => 'AND',
			[
				'key' => 'date',
				'value' => [$from, $to],
				'compare' => 'BETWEEN',
				'type' => 'DATE'
			]
		]
	]);

	$result = [];

	foreach ($posts as $post) {
		$res = [];
		$res['date'] = get_post_meta($post->ID, 'date', true);
		$res['name'] = get_post_meta($post->ID, 'name', true);
		$res['excerpt'] = get_post_meta($post->ID, 'desc', true);
		$res['link'] = get_permalink($post->ID);
		$result[] = $res;
	}

	foreach ($customs as $post) {
		$res = [];
		$res['date'] = get_post_meta($post->ID, 'date', true);
		$res['name'] = get_the_title($post->ID);
		$res['excerpt'] = get_the_excerpt($post->ID);
		$res['link'] = get_permalink($post->ID);
		$result[] = $res;
	}

	echo json_encode($result);

	wp_die();
}