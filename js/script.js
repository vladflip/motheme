!function e(t,r,n){function a(d,c){if(!r[d]){if(!t[d]){var l="function"==typeof require&&require;if(!c&&l)return l(d,!0);if(o)return o(d,!0);var u=new Error("Cannot find module '"+d+"'");throw u.code="MODULE_NOT_FOUND",u}var i=r[d]={exports:{}};t[d][0].call(i.exports,function(e){var r=t[d][1][e];return a(r?r:e)},i,i.exports,e,t,r,n)}return r[d].exports}for(var o="function"==typeof require&&require,d=0;d<n.length;d++)a(n[d]);return a}({1:[function(e,t,r){var n;n=jQuery,n(window).load(function(){return moment.locale("ru",{months:"Январь_Февраль_Март_Апрель_Май_Июнь_Июль_Август_Сентябрь_Октябрь_Ноябрь_Декабрь".split("_")}),n("#calendar").clndr({template:n("#clndr-template").html(),startWithMonth:moment(),weekOffset:1,daysOfTheWeek:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],targets:{day:"clndr-day"},classes:{past:"clndr-past",today:"clndr-today",event:"clndr-event",adjacentMonth:"clndr-adjacent"},events:[{date:"2016-11-04"},{date:"2016-10-31"},{date:"2016-11-15"}]})})},{}]},{},[1]);