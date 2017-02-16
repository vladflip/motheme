<?php get_header(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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