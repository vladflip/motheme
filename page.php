<?php get_header(); ?>

<div class="page">
	<div class="container">
		
		<div class="page_content">
			<?php 
				the_post();
				the_content();
			?> 
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>