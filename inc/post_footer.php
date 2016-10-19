<?php if( is_single() ): ?>
	<hr class="post_separator">
<?php endif ?>
<div class="post_footer">
	<div class="post_date">
		<?= getTheDate($post->ID); ?>
	</div>
	<div class="post_share">
		<script type="text/javascript">
		<?php $link = get_permalink();?>
		document.write(VK.Share.button({url: "<?=$link?>"},{type: "custom", text: "<img src=\"http://vk.com/images/share_32_eng.png\" width=\"32\" height=\"32\" title=\"Поделиться\" />", eng: 1}));
		</script>
	</div>
</div>