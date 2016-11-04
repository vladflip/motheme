$ = jQuery

$(window).load ->

	moment.locale 'ru',
		months: 'Январь_Февраль_Март_Апрель_Май_Июнь_Июль_Август_Сентябрь_Октябрь_Ноябрь_Декабрь'.split('_')

	$('#calendar').clndr
		template: $('#clndr-template').html()
		startWithMonth: moment()
		weekOffset: 1

		daysOfTheWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']

		targets:
			day: 'clndr-day'
		classes:
			past: 'clndr-past'
			today: 'clndr-today'
			event: 'clndr-event'
			adjacentMonth: 'clndr-adjacent'

		events: [
			{
				date: '2016-11-04'
				name: 'The best event'
				excerpt: 'Come here and be the best'
				link: 'vk.com'
			}
			{
				date: '2016-10-31'
				name: 'The best event'
				excerpt: 'Come here and be the best'
				link: 'vk.com'
			}
			{
				date: '2016-11-15'
				name: 'The best event'
				excerpt: 'Come here and be the best'
				link: 'vk.com'
			}
			{
				date: '2016-11-15'
				name: 'The best event'
				excerpt: 'Come here and be the best'
				link: 'vk.com'
			}
			{
				date: '2016-11-15'
				name: 'The best event'
				excerpt: 'Come here asd asdf and be the best'
				link: 'vk.com'
			}
			{
				date: '2016-11-15'
				name: 'The best event'
				excerpt: 'Come here asd asdf and be the best'
				link: 'vk.com'
			}
			{
				date: '2016-11-15'
				name: 'The best event'
				excerpt: 'Come here asd asdf and be the best'
				link: 'vk.com'
			}
		]

		clickEvents:

			click: (o) ->
				if not o.events.length then return

				events = $('#calendar-events')
				calendar = $('#calendar')

				t = _.template($('#clndr-events-template').html())({events: o.events})

				events.html(t)

				calendar.fadeOut(300)

				events.children('#calendar-event-close').click ->
					calendar.fadeIn(300)
					events.html('')

				events.children('#calendar-events-list').simplebar()