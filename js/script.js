!function t(e,n,r){function i(s,c){if(!n[s]){if(!e[s]){var o="function"==typeof require&&require;if(!c&&o)return o(s,!0);if(a)return a(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var h=n[s]={exports:{}};e[s][0].call(h.exports,function(t){var n=e[s][1][t];return i(n?n:t)},h,h.exports,t,e,n,r)}return n[s].exports}for(var a="function"==typeof require&&require,s=0;s<r.length;s++)i(r[s]);return i}({1:[function(t,e,n){var r,i,a=function(t,e){return function(){return t.apply(e,arguments)}};r=jQuery,i=function(){function t(t){this.el=t,this.getPosts=a(this.getPosts,this),this.updateEvents=a(this.updateEvents,this),this.cacheDate=a(this.cacheDate,this),this.init=a(this.init,this),moment.locale("ru",{months:"Январь_Февраль_Март_Апрель_Май_Июнь_Июль_Август_Сентябрь_Октябрь_Ноябрь_Декабрь".split("_")}),this.cached=[],this.init()}return t.prototype.init=function(){return this.clndr=r("#calendar").clndr({template:r("#clndr-template").html(),startWithMonth:moment(),weekOffset:1,daysOfTheWeek:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],targets:{day:"clndr-day"},classes:{past:"clndr-past",today:"clndr-today",event:"clndr-event",adjacentMonth:"clndr-adjacent"},ready:function(t){return function(){return t.getPosts(moment()),t.cacheDate(moment())}}(this),clickEvents:{onMonthChange:function(t){return function(e){return t.getPosts(e),t.cacheDate(e)}}(this),click:function(t){var e,n,i;if(t.events.length)return n=r("#calendar-events"),e=r("#calendar"),i=_.template(r("#clndr-events-template").html())({events:t.events}),n.html(i),e.fadeOut(300),n.children("#calendar-event-close").click(function(){return e.fadeIn(300),n.html("")}),n.children("#calendar-events-list").simplebar()}}})},t.prototype.cacheDate=function(t){if(this.cached.indexOf(t.format("YYYY-MM"))===-1)return this.cached.push(t.format("YYYY-MM"))},t.prototype.updateEvents=function(t){return this.events=_.uniq(_.union(this.events,t),!1,function(t){return t.date}),this.clndr.setEvents(this.events)},t.prototype.getPosts=function(t){if(this.cached.indexOf(t.format("YYYY-MM"))===-1)return r.post({dataType:"json",data:{action:"calendar-events",date:t.format("YYYY-MM-DD")},url:ajaxUrl.url,success:function(t){return function(e){return t.updateEvents(e)}}(this)})},t}(),r(window).load(function(){return new i})},{}]},{},[1]);