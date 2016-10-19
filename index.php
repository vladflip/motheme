<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = [
		'posts_per_page' => '7',
		'post_type' => 'post',
		'paged' => $paged
	];

	query_posts($args);
?>

<?php get_header(); ?>

<?php echo do_shortcode('[slider]'); ?>

<div class="home">
		
	<div class="container">
		
		<div class="home_posts">

			<?php require_once('inc/posts.php'); ?>

			<div class="home_more-posts">
				<a href="<?=site_url();?>/news">Остальные новости</a>
			</div>
		
		</div>
		
		<?php get_sidebar('sidebar'); ?>

	</div>

</div>

<?php get_footer(); ?>