<?php wp_reset_query(); ?>
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<?php $comments = array_reverse($comments) ?>
	<h3 id="comments">网友留言<span>已有<strong><?php comments_number('', '1', '%' );?></strong>条留言, <a href="#respond" class="underline">我也要留言</a></span></h3>
	<ol id="commentlist" class="commentlist">
		<?php wp_list_comments('callback=custom_comment');?>
	</ol>
    <?php
		// 如果用户在后台选择要显示评论分页
		if (get_option('page_comments')) {
			// 获取评论分页的 HTML
			$comment_pages = paginate_comments_links('echo=0');
			// 如果评论分页的 HTML 不为空, 显示导航式分页
			if ($comment_pages) {
	?>
		<div class="comment_navi">
			<span class="cpt">留言分页:</span> <?php echo $comment_pages; ?>
		</div>
	<?php
			}
		}
	?>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<div class="clear"></div>

<?php if ('open' == $post->comment_status) : ?>
<!-- Add Comment begin -->
<div id="respond">
	<h3 id="addcomment">发表留言</h3>
	<div id="cancel-comment-reply"><?php cancel_comment_reply_link('取消回复') ?></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>你必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录后</a> 才能评论！</p>
<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
	<div class="memberinfo">
    	<a href="<?php global $current_user; get_currentuserinfo(); echo $current_user->user_url; ?>" target="_blank" title="<?php global $current_user; get_currentuserinfo(); echo $current_user->display_name; ?>"><?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '28' ); }?></a>
    <strong><a href="<?php global $current_user; get_currentuserinfo(); echo $current_user->user_url; ?>" title="个人网站" target="_blank"><?php echo $user_identity; ?></a></strong> <span>[会员]</span><br /><?php if (get_option('users_can_register')) { ?><a href="<?php bloginfo('siteurl');?>/wp-admin/profile.php" title="个人中心" class="underline">个人中心</a><?php }?> | <a href="<?php global $current_user; get_currentuserinfo(); echo $current_user->user_url; ?>" title="个人网站" class="underline" target="_blank">个人网站</a> | <a href="<?php echo wp_logout_url(get_permalink()) ?>" title="退出系统" class="underline">退出</a>
    </div>
    
<?php else : ?>
	<p class="welcome_author">
		<?php if(isset($_COOKIE['comment_author_'.COOKIEHASH])) {
			$lastCommenter = $_COOKIE['comment_author_'.COOKIEHASH];
		?> 
            <div class="memberinfo">
                <a href="<?php echo $comment_author_url; ?>" target="_blank" title="<?php echo "$lastCommenter"; ?>"><?php if (function_exists('get_avatar')) { echo get_avatar( $comment_author_email , '28' ); }?></a>
            <strong><a href="<?php echo $comment_author_url; ?>" title="个人网站"><?php echo "$lastCommenter"; ?></a></strong> <span>[游客]</span><br /><?php if (get_option('users_can_register')) { ?>
            <a href="javascript:void(0)" title="注册会员" id="userregister" class="underline">注册会员</a> | <a href="javascript:void(0)" title="会员登录" id="userlogin" class="underline">会员登录</a> | <label id='moidfy_info' title="修改资料">修改资料</label><?php }?>
            </div>
            <div id="userform" class="hidform">
            	<h4><strong>修改资料</strong><a href="javascript:void(0)" title="关闭" class="closelayer">关闭</a></h4>
                <p><label>用户名：</label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /> <em>* </em></p>
                <p><label>电子邮箱：</label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /> <em>* </em>(保密)</p>
                <p><label>网站网址：</label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>
            	<p><label> </label><a href="javascript:void(0)" title="确认修改" id="submit_modify" class="btn_closelayer" />确认修改</a></p>
            </div>
		<?php } else { ?><?php if (get_option('users_can_register')) { ?><p><a href="<?php echo site_url('wp-login.php?action=register', 'login') ?>" class="underline">快速注册</a> | <a href="<?php echo bloginfo("url"); ?>/wp-login.php" class="underline">会员登录</a> <span id='infotips'>友情提示: 非会员填写以下评论信息, 再次访问参与评论时就不需要重复输入了! </span></p><?php } ?>
            <div id="userform">
                <p><label>用户名：</label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /> <em>* </em></p>
                <p><label>电子邮箱：</label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /> <em>* </em>(保密)</p>
                <p><label>网站网址：</label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>
            	<div class="foravatar">
                	<a href="http://en.gravatar.com/" target="_blank"><?php echo get_avatar( $comment, $size = '68'); ?></a><br /><a href="http://en.gravatar.com/" target="_blank">申请头像</a>
                </div>
            </div>
		<?php } ?>
    </p>
<?php endif; ?>
        <!--<p class="cmthtml"><small><strong>XHTML:</strong> 您可以使用这些标签: <code><?php echo allowed_tags(); ?></code></small></p>-->
		<?php if ( get_option('wpyou_if_face') == '0' ) { ?><?php wp_smilies();?><?php } ?>
        <p><textarea name="comment" id="comment" tabindex="4">添加留言内容</textarea></p>
        <p class="input_submit"><input name="submit" type="submit" id="submit" tabindex="5" title="提交留言" value="提交留言" /><?php comment_id_fields(); ?><span class="repeattip">Ctrl+Enter 快捷回复</span></p>

<?php do_action('comment_form', $post->ID); ?>

</form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
<div id="userloginform" class="hidform">
	<h4><strong>会员登录</strong><a href="javascript:void(0)" title="关闭" class="closelayer">关闭</a></h4>
    <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
        <p><label>用户名：</label><input type="text" name="log" id="user_log" class="txtlong" title="用户名" value="" size="20" /></p>
        <p><label>密 码：</label><input type="password" name="pwd" id="user_pwd" class="txtlong" title="密码" value="" size="20" /></p>
        <p><label> </label><input type="submit" name="submit" id="logincmt" title="立即登录" value="立即登录" /> <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />记住我 <a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" target="_blank">忘记密码</a></p>
        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    </form>
</div>
<div id="userregisterform" class="hidform">
	<h4><strong>注册会员</strong><a href="javascript:void(0)" title="关闭" class="closelayer">关闭</a></h4>
    <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
        <p><label>用户名：</label><input type="text" name="user_login" value="" id="user_login" class="txtlong" size="20" /></p>
        <p><label>电子邮箱：</label><input type="text" name="user_email" value="" id="user_email" class="txtlong" size="20"  /></p>
        <p><label> </label><input type="submit" title="立即注册" value="立即注册" id="register" /><?php do_action('register_form'); ?></p>
        <p class="statement"><label> </label>小提示: 您的密码会通过填写的"电子邮箱"发送给您.</p>
    </form>
</div>
</div>
<!-- Add Comment end -->
<script type="text/javascript">
	$('#comment').focus(
		function() {
			if($(this).val() == '添加留言内容') {
				$(this).val('').css({color:"#333"});
			}
		}
	).blur(
		function(){
			if($(this).val() == '') {
				$(this).val('添加留言内容').css({color:"#454545"});
			}
		}
	);
	///Ctrl+Enter快捷回复
	$(document).keypress(function(e){
        if(e.ctrlKey && e.which == 13 || e.which == 10) { 
                $("#submit").click();
                document.body.focus();
        } else if (e.shiftKey && e.which==13 || e.which == 10) {
                $("#submit").click();
        }          
 })
</script>