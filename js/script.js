!function t(e,n,r){function i(s,a){if(!n[s]){if(!e[s]){var o="function"==typeof require&&require;if(!a&&o)return o(s,!0);if(c)return c(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var h=n[s]={exports:{}};e[s][0].call(h.exports,function(t){var n=e[s][1][t];return i(n?n:t)},h,h.exports,t,e,n,r)}return n[s].exports}for(var c="function"==typeof require&&require,s=0;s<r.length;s++)i(r[s]);return i}({1:[function(t,e,n){var r,i=function(t,e){return function(){return t.apply(e,arguments)}};r=function(){function t(t){this.el=t,this.getPosts=i(this.getPosts,this),this.updateEvents=i(this.updateEvents,this),this.cacheDate=i(this.cacheDate,this),this.init=i(this.init,this),moment.locale("ru",{months:"Январь_Февраль_Март_Апрель_Май_Июнь_Июль_Август_Сентябрь_Октябрь_Ноябрь_Декабрь".split("_")}),this.cached=[],this.init()}return t.prototype.init=function(){return this.clndr=$("#calendar").clndr({template:$("#clndr-template").html(),startWithMonth:moment(),weekOffset:1,daysOfTheWeek:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],targets:{day:"clndr-day"},classes:{past:"clndr-past",today:"clndr-today",event:"clndr-event",adjacentMonth:"clndr-adjacent"},ready:function(t){return function(){return t.getPosts(moment())}}(this),clickEvents:{onMonthChange:function(t){return function(e){return t.getPosts(e)}}(this),click:function(t){var e,n,r;if(t.events.length)return n=$("#calendar-events"),e=$("#calendar"),r=_.template($("#clndr-events-template").html())({events:t.events}),n.html(r),e.fadeOut(300),n.children("#calendar-event-close").click(function(){return e.fadeIn(300),n.html("")}),n.children("#calendar-events-list").simplebar()}}})},t.prototype.cacheDate=function(t){if(this.cached.indexOf(t.format("YYYY-MM"))===-1)return this.cached.push(t.format("YYYY-MM"))},t.prototype.updateEvents=function(t){return this.events=_.uniq(_.union(this.events,t),!1,function(t){return t.name}),this.clndr.setEvents(this.events)},t.prototype.getPosts=function(t){if(this.cached.indexOf(t.format("YYYY-MM"))===-1)return $.post({dataType:"json",data:{action:"calendar-events",date:t.format("YYYY-MM-DD")},url:ajaxUrl.url,success:function(e){return function(n){return console.log(n),e.updateEvents(n),e.cacheDate(t)}}(this)})},t}(),e.exports=r},{}],2:[function(t,e,n){var r,i;r=jQuery,i=t("./clndr"),r(document).ready(function(){return new i})},{"./clndr":1}]},{},[2]);