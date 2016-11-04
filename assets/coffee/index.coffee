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
			}
			{
				date: '2016-10-31'
			}
			{
				date: '2016-11-15'
			}
		]
