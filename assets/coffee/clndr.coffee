class Clndr
	constructor: (@el) ->
		moment.locale 'ru',
			months: 'Январь_Февраль_Март_Апрель_Май_Июнь_Июль_Август_Сентябрь_Октябрь_Ноябрь_Декабрь'.split('_')

		@cached = []

		do @init

	init: =>
		@clndr = $('#calendar').clndr
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

			ready: =>
				@getPosts moment()
				@cacheDate moment()

			clickEvents:

				onMonthChange: (d) =>
					@getPosts d
					@cacheDate d

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

	cacheDate: (date) =>
		if @cached.indexOf(date.format('YYYY-MM')) isnt -1 then return
		@cached.push date.format('YYYY-MM')

	updateEvents: (events) =>
		@events = _.uniq _.union(@events, events), false, (i) -> i.date
		@clndr.setEvents @events

	getPosts: (date) =>
		if @cached.indexOf(date.format('YYYY-MM')) isnt -1 then return
		$.post
			dataType: 'json'
			data:
				action: 'calendar-events'
				date: date.format('YYYY-MM-DD')
			url: ajaxUrl.url
			success: (res) =>
				@updateEvents(res)

module.exports = Clndr