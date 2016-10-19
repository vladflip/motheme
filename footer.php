<?php
	$args = array(
		'post_type' => 'social-links'
	);

	$socials = get_posts($args);

	$args = array(
		'post_type' => 'insta-links',
		'posts_per_page' => 4
	);

	$instas = get_posts($args);

	// var_dump($instas);
?>	
		<div class="footer">
			<div class="footer_top">
				<div class="container">
					<div class="footer_logo"></div>
					<div class="footer_instagram">
						<h3 class="footer_title">Instagram</h3>
						<ul class="footer_insta-list">
							<?php 
								foreach($instas as $insta):
								$link = check_link($insta->ID);
								$src = wp_get_attachment_url(get_post_thumbnail_id($insta->ID));
							?>
								<li style="background-image:url(<?=$src?>)">
									<a href="<?=$link?>" target="_blank"></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer_bottom">
				<div class="container">
					<div class="footer_copyrights">
						© 2016 Молодежная Организация ХНЕУ им. Семена Кузнеца
					</div>
					<div class="footer_socials">
						<?php 
							foreach($socials as $social): 
							$link = check_link($social->ID)
						?>
								
							<a href="<?=$link?>">
								<span class="fa fa-<?=$social->post_title?>"></span>
							</a>
								
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>

	</body>

</html>	