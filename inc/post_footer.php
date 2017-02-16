<?php if( is_single() ): ?>
	<hr class="post_separator">
<?php endif ?>
<div class="post_footer">

	<div class="post_data">
		<div class="post_views" title="Просмотры"><?= pvc_get_post_views() ?></div>
		<div class="post_date">
			<?= getTheDate($post->ID); ?>
		</div>
	</div>

	<div class="post_socials">
		<div class="post_share">
			<script type="text/javascript">
			<?php $link = get_permalink();?>
			document.write(VK.Share.button({url: "<?=$link?>"},{type: "custom", text: "<img src=\"http://vk.com/images/share_32_eng.png\" width=\"32\" height=\"32\" title=\"Поделиться\" />", eng: 1}));
			</script>
		</div>
		<div class="post_share">
			<div class="fb-share-button" data-href="<?=$link?>" data-layout="button" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($link)?>">Share</a></div>
		</div>
	</div>

</div>