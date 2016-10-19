<?php
	$args = array(
		'post_type' => 'usefull-links'
	);

	$links = get_posts($args);

?>

<div class="sidebar">
			
	<div class="sidebar_widget">
		
		<h3 class="sidebar_header">Полезные ссылки</h3>

		<div class="sidebar_content">
			
			<?php foreach($links as $link): ?>

				<?php 
					$src = wp_get_attachment_url( get_post_thumbnail_id($link->ID) );  
					$link = check_link($link->ID);
				?>

				<div class="sidebar_link"
				style="background-image:url(<?= $src ?>);">
					<a target="_blank" href="<?= $link ?>"></a>
				</div>

			<?php endforeach; ?>

		</div>

	</div>
		
</div>