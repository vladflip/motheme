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
?>

<!DOCTYPE html>
<html lang="ru">

	<head>
		<meta charset="UTF-8">
		<title>Молодежная организация | ХНЭУ</title>
		<link rel="shortcut icon" href="<?=THEME_URI?>/img/favicon.png" type="image/x-icon">
		<?php wp_enqueue_style('main-style'); ?>
		<?php wp_head(); ?>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<script type="text/javascript" src="http://vk.com/js/api/share.js?93" charset="windows-1251"></script>
	</head>

	<body>
		
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

		<div class="title">
			<div class="title_big">Молодежная Организация</div>
			<div class="title_small">ХНЭУ имени С. Кузнеца</div>
		</div>