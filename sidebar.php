<?php
	$args = array(
		'post_type' => 'usefull-links'
	);

	$links = get_posts($args);

?>

<div class="sidebar">

	<div class="sidebar_widget">
		
		<h3 class="sidebar_header">Наши события</h3>

		<div class="sidebar_content clndr-content">

			<div class="events" id="calendar-events"></div>
			
			<div id="calendar"></div>

		</div>

	</div>
			
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

<script id="clndr-template" type="text/template">
	<div class="clndr-controls">
		<div class="clndr-previous-button">&lsaquo;</div>
		<div class="clndr-month"><%= month %></div>
		<div class="clndr-next-button">&rsaquo;</div>
	</div>
	
	<div class="clndr-grid">
		<div class="clndr-weekdays">
			<% _.each(daysOfTheWeek, function (day) { %>
				<div class="clndr-weekday"><%= day %></div>
			<% }); %>
		</div>
		<div class="clndr-days">
		<% _.each(days, function (day) { %>
			<div class="<%= day.classes %>"><%= day.day %></div>
		<% }); %>
		</div>
	</div>
</script>

<script id="clndr-events-template" type="text/template">
	<div id="calendar-event-close" class="event-close">&#10007;</div>
	<div id="calendar-events-list" class="simplebar events-list">
		<% _.each(events, function (event) { %>
			<a href="<%= event.link %>" target="_blank">
				<div class="event">
					<div class="event-header">
						<%= event.name %>
					</div>
					<div class="event-excerpt">
						<%= event.excerpt %>
					</div>
				</div>
			</a>
		<% }); %>
	</div>
</script>