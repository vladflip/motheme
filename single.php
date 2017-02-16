<?php get_header(); ?>

<meta property="og:url" content="<?=get_permalink()?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?=get_bloginfo('name')?>" />
<meta property="og:description" content="<?=get_bloginfo('description')?>" />
<meta property="og:image" content="<?=bloginfo('template_url')?>/img/logo-new.png" />

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