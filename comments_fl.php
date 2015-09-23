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
	<h3 id="comments"><?php comments_number('暂无申请', '1个申请', '%个申请' );?></h3>
	<ol class="commentlist">
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
	<h3 id="addcomment">申请友链</h3>
	<div id="cancel-comment-reply"><?php cancel_comment_reply_link('取消') ?></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>你必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录后</a> 才能申请！</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p class="welcomeinfo">您现在是以 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> 的身份登录,<a href="			<?php echo wp_logout_url(get_permalink()) ?>" title="退出系统"> 点击退出系统 &raquo;</a></p>
<?php else : ?>
        <p>网站名称：<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /><em>* </em></p>
        <p>网站地址：<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="2" /><em>* </em></p>
        <p>电子邮箱：<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" /><em>* </em>(保密)</p>
<?php endif; ?>
        <!--<p class="cmthtml"><small><strong>XHTML:</strong> 您可以使用这些标签: <code><?php echo allowed_tags(); ?></code></small></p>-->
		<p><textarea name="comment" id="comment" tabindex="4">添加网站描述</textarea></p>
        <p class="input_submit"><input name="submit" type="submit" id="submit" tabindex="5" title="提交网站" value="提交网站" /><?php comment_id_fields(); ?><span class="repeattip">Ctrl+Enter 快捷提交</span></p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<!-- Add Comment end -->
<?php endif; // if you delete this the sky will fall on your head ?>
<script type="text/javascript">
	$('#comment').focus(
		function() {
			if($(this).val() == '添加网站描述') {
				$(this).val('').css({color:"#333"});
			}
		}
	).blur(
		function(){
			if($(this).val() == '') {
				$(this).val('添加网站描述').css({color:"#454545"});
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