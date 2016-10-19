<?php get_header(); ?>

<div class="page">
	<div class="container">
		
		<div class="post">
			<div class="post_wp-content">
				<?php 
					the_post();
					the_content();
					get_template_part('inc/post_footer');
				?> 
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>