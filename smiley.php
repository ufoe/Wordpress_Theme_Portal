<script type="text/javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
            document.getElementById("smiley").style.display="none"
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
            document.getElementById("smiley").style.display="none"
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
            document.getElementById("smiley").style.display="none"
    	}
    }
/* ]]> */
</script>
<a href="javascript:grin(':大眼:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/1.gif" alt="" /></a>
<a href="javascript:grin(':可爱:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/2.gif" alt="" /></a>
<a href="javascript:grin(':大笑:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/3.gif" alt="" /></a>
<a href="javascript:grin(':坏笑:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/4.gif" alt="" /></a>
<a href="javascript:grin(':害羞:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/5.gif" alt="" /></a>
<a href="javascript:grin(':发怒:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/6.gif" alt="" /></a>
<a href="javascript:grin(':折磨:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/7.gif" alt="" /></a>
<a href="javascript:grin(':快哭了:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/8.gif" alt="" /></a>
<a href="javascript:grin(':大哭:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/9.gif" alt="" /></a>
<a href="javascript:grin(':白眼:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/10.gif" alt="" /></a>
<a href="javascript:grin(':晕:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/11.gif" alt="" /></a>
<a href="javascript:grin(':流汗:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/12.gif" alt="" /></a>
<a href="javascript:grin(':困:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/13.gif" alt="" /></a>
<a href="javascript:grin(':腼腆:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/14.gif" alt="" /></a>
<a href="javascript:grin(':惊讶:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/15.gif" alt="" /></a>
<a href="javascript:grin(':憨笑:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/16.gif" alt="" /></a>
<a href="javascript:grin(':色:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/17.gif" alt="" /></a>
<a href="javascript:grin(':得意:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/18.gif" alt="" /></a>
<a href="javascript:grin(':骷髅:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/19.gif" alt="" /></a>
<a href="javascript:grin(':囧:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/20.gif" alt="" /></a>
<a href="javascript:grin(':睡觉:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/21.gif" alt="" /></a>
<a href="javascript:grin(':眨眼:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/22.gif" alt="" /></a>
<a href="javascript:grin(':亲亲:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/23.gif" alt="" /></a>
<a href="javascript:grin(':疑问:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/24.gif" alt="" /></a>
<a href="javascript:grin(':闭嘴:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/25.gif" alt="" /></a>
<a href="javascript:grin(':难过:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/26.gif" alt="" /></a>
<a href="javascript:grin(':淡定:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/27.gif" alt="" /></a>
<a href="javascript:grin(':抗议:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/28.gif" alt="" /></a>
<a href="javascript:grin(':鄙视:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/29.gif" alt="" /></a>
<a href="javascript:grin(':猪头:')"><img src="<?php bloginfo('template_directory'); ?>/img/smilies/30.gif" alt="" /></a>