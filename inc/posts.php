<?php
	while (have_posts()): 
	the_post();
?>

	<div class="post">
		
		<div class="post_thumbnail">
			<img src="<?= getThumbSrc($post->ID)?>" alt="">
		</div>

		<div class="post_header">
			<div class="post_title">
				<a href="<?= get_permalink($post->ID); ?>">
					<?= $post->post_title ?>
				</a>
			</div>
		</div>

		<div class="post_excerpt">
			<?= $post->post_excerpt; ?>
		</div>

		<div class="post_button">
			<a href="<?= get_permalink($post->ID); ?>">читать</a>
		</div>

		<?php get_template_part('inc/post_footer'); ?>

	</div>

<?php 
	endwhile;
?>