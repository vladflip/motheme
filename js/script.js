!function e(t,n,r){function a(d,l){if(!n[d]){if(!t[d]){var o="function"==typeof require&&require;if(!l&&o)return o(d,!0);if(c)return c(d,!0);var s=new Error("Cannot find module '"+d+"'");throw s.code="MODULE_NOT_FOUND",s}var i=n[d]={exports:{}};t[d][0].call(i.exports,function(e){var n=t[d][1][e];return a(n?n:e)},i,i.exports,e,t,n,r)}return n[d].exports}for(var c="function"==typeof require&&require,d=0;d<r.length;d++)a(r[d]);return a}({1:[function(e,t,n){var r;r=jQuery,r(window).load(function(){return moment.locale("ru",{months:"Январь_Февраль_Март_Апрель_Май_Июнь_Июль_Август_Сентябрь_Октябрь_Ноябрь_Декабрь".split("_")}),r("#calendar").clndr({template:r("#clndr-template").html(),startWithMonth:moment(),weekOffset:1,daysOfTheWeek:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],targets:{day:"clndr-day"},classes:{past:"clndr-past",today:"clndr-today",event:"clndr-event",adjacentMonth:"clndr-adjacent"},events:[{date:"2016-11-04",name:"The best event",excerpt:"Come here and be the best",link:"vk.com"},{date:"2016-10-31",name:"The best event",excerpt:"Come here and be the best",link:"vk.com"},{date:"2016-11-15",name:"The best event",excerpt:"Come here and be the best",link:"vk.com"},{date:"2016-11-15",name:"The best event",excerpt:"Come here and be the best",link:"vk.com"},{date:"2016-11-15",name:"The best event",excerpt:"Come here asd asdf and be the best",link:"vk.com"},{date:"2016-11-15",name:"The best event",excerpt:"Come here asd asdf and be the best",link:"vk.com"},{date:"2016-11-15",name:"The best event",excerpt:"Come here asd asdf and be the best",link:"vk.com"}],clickEvents:{click:function(e){var t,n,a;if(e.events.length)return n=r("#calendar-events"),t=r("#calendar"),a=_.template(r("#clndr-events-template").html())({events:e.events}),n.html(a),t.fadeOut(300),n.children("#calendar-event-close").click(function(){return t.fadeIn(300),n.html("")}),n.children("#calendar-events-list").simplebar()}}})})},{}]},{},[1]);