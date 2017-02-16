<?php
	$args = array(
		'theme_location' => 'header_menu',
		'container' => false,
		'menu_id' => '',
		'menu_class' => 'menu_list'

	);

	$socargs = array(
		'post_type' => 'social-links'
	);

	$socials = get_posts($socargs);

	$title = '';
	$description = '';

	if(is_single()){
		$title = get_the_title();
		$description = strip_tags(get_the_excerpt($post->ID));
	}
	elseif(is_page()){
		$title = get_the_title('') . ' - '; 
		$title .= get_bloginfo('name');
		$description = get_bloginfo('description');
	}
	else{
		$title = get_bloginfo('name');
		$description = get_bloginfo('description');
	}
?>

<!DOCTYPE html>
<html lang="ru">

	<head>
		<meta charset="UTF-8">
		<title><?= $title; ?></title>

		<meta name="Description" content="<?= $description ?>">

		<?php wp_enqueue_style('main-style'); ?>
		<?php wp_enqueue_style('simplebar'); ?>
		<?php wp_head(); ?>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="shortcut icon" href="<?=get_bloginfo('template_directory')?>/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?=get_bloginfo('template_directory')?>/favicon.ico" type="image/x-icon">
	</head>

	<body>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div id="header" class="header">

			<div class="container">
			
				<div class="menu">
					<?php wp_nav_menu($args); ?>
				</div>

				<ul class="header_socials">

					<?php 
						foreach($socials as $social): 
						$link = check_link($social->ID)
					?>

						<li>
							<a href="<?=$link?>">
								<span class="fa fa-<?=$social->post_title?>"></span>
							</a>
						</li>

					<?php endforeach; ?>

				</ul>
			</div>

		</div>

		<div class="logo"></div>


		<script type="text/javascript" src="http://vk.com/js/api/share.js?93" charset="windows-1251"></script>