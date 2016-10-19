<?php 
	/*
		Template Name: news
	*/

	get_header();

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = [
		'posts_per_page' => '15',
		'post_type' => 'post',
		'paged' => $paged
	];

	query_posts($args);

?>

<div class="home">
		
	<div class="container">
		
		<div class="home_posts">

			<?php require_once('inc/posts.php'); ?>

			<div class="pagination">	
				<?php wp_pagenavi(); ?>
			</div>
		
		</div>
		
		<?php get_sidebar('sidebar'); ?>

	</div>

</div>

<?php get_footer(); ?>