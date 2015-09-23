<?php
function wpyou_options() {;echo '<div class="wrap">
	<div class="icon32" id="icon-themes"><br></div>
	<h2>Nocower-Portal 主题中央集控台</h2>
    <h3 class="wpyounavi"><span class="mouseover">基本设置</span><span>首页设置</span><span>广告设置</span><span>SEO设置</span><span>推送配置说明</span></h3><script type="text/javascript" src="wp-content/themes/Nocower-Portal/js/jquery.js"></script>
	<form method="post" action="options.php">
		';settings_fields('wpyou-settings');;echo '        <!--====================== General-Options begin ======================-->
		<div id="general-options" class="wpyoufunction">
            <div class="clearfix"></div>
            <table class="form-table wpyou-form">
                <tr valign="top">
                    <th scope="row"><label>是否开启自定义菜单<span class="description"></span></label></th>
                    <td>
                        <input type="checkbox" name="wpyou_if_custom_menus" value="1" ';if (get_option('wpyou_if_custom_menus') == '1') {echo 'checked="checked"';};echo ' /><label class="description"> 选中为开启 (默认为不开启, 显示分类列表)</label>
                        <br />
                        <span class="description">启用后，您需要在<a href=\'nav-menus.php\'>【外观 - 菜单(导航菜单)】里设置菜单内容</a></span>
                    </td>
                </tr>
            <tr valign="top">
               <th scope="row"><label>选择网站配色<span class="description"></span></label></th>
                <td>
                    <select name="wpyou_style_mode">
                    	<option value="-1">选择网站配色</option>
<option value="0" ';if (get_option('wpyou_style_mode') == '0') {echo 'selected="selected"';};echo '>清新活力绿</option>
<option value="1" ';if (get_option('wpyou_style_mode') == '1') {echo 'selected="selected"';};echo '>清新活力绿</option>
<option value="2" ';if (get_option('wpyou_style_mode') == '2') {echo 'selected="selected"';};echo '>简约时尚红</option>
<option value="3" ';if (get_option('wpyou_style_mode') == '3') {echo 'selected="selected"';};echo '>奢华内含咖</option>
<option value="4" ';if (get_option('wpyou_style_mode') == '4') {echo 'selected="selected"';};echo '>高端大气黑</option>
</select>
<span class="description">在这里选择您的网站配色，主题提供了5种不同的颜色风格供您选择（默认为第一种配色）。</span>
                </td>
        	</tr>
                <tr valign="top">
                      <th scope="row"><label>Feed 订阅地址<span class="description">(URL)</span></label></th>
                    <td>
                        <input class="regular-text" style="width:35em;" type="text" value="';echo get_option('wpyou_feed_url');;echo '" name="wpyou_feed_url"/>
                        <br />
                        <span class="description">自定义网站订阅地址(留空则输出WordPress默认Feed地址)；在网站顶部左上角以及文章页面有订阅按钮</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><strong>【全站文章列表】数目</strong><span class="description">(数值)</span></label></th>
                    <td>
                        <input class="regular-text" style="width:35em;" type="text" value="';echo get_option('wpyou_exptitlecats_perpage');;echo '" name="wpyou_exptitlecats_perpage"/>
                        <br />
                        <span class="description">设置所有网站能够出现的文章列表[标签文章列表，默认分类列表]的的文章数目(即每页显示的文章数, 默认为13, 建议数字不要低于13)</span>
                    </td>
                </tr>
                <tr valign="top" class="alt">
                    <th scope="row"><label><strong>友情链接默认全站显示</strong><br /><span class="description"></span></label></th>
                    <td>
                        <span class="description"><a tabindex="1" href="/wp-admin/nav-menus.php?action=locations">点击此处去设置友情链接</a>，新建一个菜单，选择【友情链接】即可
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>底部内容设置<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_footer"/>';echo get_option('wpyou_footer');;echo '</textarea>
                        <br />
                       <span class="description">设置网站最底部要显示的内容(底部友情链接以下的部分, 支持HTML，可以是悬浮广告代码，可以是分享代码，统计代码，版权声明信息都可以，此处内容可以在全站显示)</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <input type="submit" name="save" id="button-primary" class="button-primary" value="';_e('Save Changes') ;echo '" />
                    </td>
                </tr>
            </table>
        </div>
        <!--====================== Homepage-Options begin ======================-->
        <div id="homepage-options" class="wpyoufunction">
            <div class="allcatsid">
                <ul>
                     <li><strong>分类名称</strong><br /><b>分类ID</b></li>
                ';
$categories = get_categories('hide_empty=0&orderby=id');
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
;echo '                    <li>';echo $wp_cats[$category_list->cat_ID];;echo '<br />';echo $category_list->cat_ID;;echo '</li>
                ';};echo '                </ul>
            </div>
            <div class="clearfix"></div>
<div>
            <div id="home_left_column" class="setcolumn">
            <table class="form-table wpyou-form">
                <tr valign="top">
                    <th scope="row"><label class="columntitle">左侧栏目设置<span class="description"></span></label></th>
                    <td><span class="description">网站首页左侧栏目设置, 可设置3个不同的栏目(不设置则不显示), 对应的栏目顺序自上而下..<br /> <strong>分类ID可在上面的列表中获取</strong></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>左侧栏目1<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_leftcat01');;echo '" name="wpyou_homepage_leftcat01"/>
                        <br />
                        <span class="description">设置网站首页左侧第1个栏目ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>左侧栏目2<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_leftcat02');;echo '" name="wpyou_homepage_leftcat02"/>
                        <br />
                        <span class="description">设置网站首页左侧第2个栏目ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>左侧栏目3<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_leftcat03');;echo '" name="wpyou_homepage_leftcat03"/>
                        <br />
                        <span class="description">设置网站首页左侧第3个栏目ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <input type="submit" name="save" id="button-primary" class="button-primary" value="';_e('Save Changes') ;echo '" />
                    </td>
                </tr>
            </table>
            </div>
            <!-- LeftColumn end -->
            <!-- MiddleColumn begin -->
            <div class="setcolumn">
            <table class="form-table wpyou-form">
                <tr valign="top">
                    <th scope="row"><label class="columntitle">右侧栏目设置<span class="description"></span></label></th>
                       <td><span class="description">网站首页右侧栏目设置, 可设置3个不同的栏目(不设置则不显示), 对应的栏目顺序自上而下..<br /><strong>分类ID可在上面的列表中获取</strong></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>右侧栏目1<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_midcat01');;echo '" name="wpyou_homepage_midcat01"/>
                        <br />
                        <span class="description">设置网站首页右侧第1个栏目ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>右侧栏目2<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_midcat02');;echo '" name="wpyou_homepage_midcat02"/>
                        <br />
                       <span class="description">设置网站首页右侧第2个栏目ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>右侧栏目3<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_midcat03');;echo '" name="wpyou_homepage_midcat03"/>
                        <br />
                        <span class="description">设置网站首页右侧第3个栏目ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <input type="submit" name="save" id="button-primary" class="button-primary" value="';_e('Save Changes') ;echo '" />
                    </td>
                </tr>
            </table>
            </div>

            <!-- MiddleColumn end -->


<div class="setcolumn">
            <table class="form-table wpyou-form">
                <tr valign="top">
                    <th scope="row"><label class="columntitle">底部大图栏目设置<span class="description"></span></label></th>
                    <td><span class="description">网站首页最下方的大图模块，需要指定分类<br /><strong>▪ 分类ID可在上面的列表中获取</strong></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>底部图片<span class="description"></span></label></th>
                    <td>
                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_midcat04');;echo '" name="wpyou_homepage_midcat04"/>
                        <br />
                        <span class="description">设置网站首页底部第4个栏目ID</span>
                    </td>
                </tr>
 <tr valign="top">
                    <th scope="row"><label class="columntitle">首页二维码下模块<span class="description"></span></label></th>
                     <td><span class="description">网站首页中部右侧二维码下的模块，需要指定分类<br /><strong>分类ID可在上面的列表中获取</strong></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>二维码下<span class="description"></span></label></th>
                    <td>

                        <label class="catid-text-lb">分类ID: </label><input class="regular-text catid-text" type="text" value="';echo get_option('wpyou_homepage_midcat05');;echo '" name="wpyou_homepage_midcat05"/>
                        <br />
                        <span class="description">设置首页二维码下的小模块ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <input type="submit" name="save" id="button-primary" class="button-primary" value="';_e('Save Changes') ;echo '" />
                    </td>
                </tr>
            </table>
            </div>
            </div>
        </div>
        <!--====================== AD-Options begin ======================-->
        <div id="ad-options" class="wpyoufunction">
            <table class="form-table wpyou-form">
            	<tr valign="top">
                     <th scope="row"><label id="site_full_ad" class="columntitle">全站广告位设置<span class="description"></span></label></th>
                    <td><span class="description">以下为全站显示广告位设置, 将您的广告代码添加到对应的表单, 保存即可.</span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>页尾通栏广告<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_pagefooterbanner"/>';echo get_option('wpyou_ad_pagefooterbanner');;echo '</textarea>
                        <br />
                         <span class="description">显示在全站最底部 【全站通用！】(宽度 <=980, 高度<=90, 支持自己编写HTML)</span>
                    </td>
                </tr>
                
                <tr valign="top">
                      <th scope="row"><label id="site_home_ad" class="columntitle">首页广告位设置<span class="description"></span></label></th>
                    <td><span class="description">以下为首页广告位设置, 所有的广州只显示在首页，将您的广告代码添加到对应的表单, 保存即可.</span></td>
                </tr>
                 <tr valign="top">
                    <th scope="row"><label>首页热点中心广告<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_logobanner"/>';echo get_option('wpyou_ad_logobanner');;echo '</textarea>
                        <br />
                        <span class="description">显示在全站最醒目的的热点广告 (宽度 <=400, 高度 <=100, 支持HTML代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                   <th scope="row"><label>首页导航栏下通栏广告<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_topfullbanner"/>';echo get_option('wpyou_ad_topfullbanner');;echo '</textarea>
                        <br />
                        <span class="description">显示在全站导航菜单下面最醒目的通栏广告 (宽度 <=980, 高度<=90, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                      <th scope="row"><label>首页通栏广告1<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_homepage01">';echo get_option('wpyou_ad_homepage01');;echo '</textarea>
                        <br />
                        <span class="description">显示在首页 CMS模块中间 (宽度 <=980, 高度不限, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                   <th scope="row"><label>首页通栏广告2 <span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_homepage02">';echo get_option('wpyou_ad_homepage02');;echo '</textarea>
                        <br />
                          <span class="description">显示在首页 CMS模块中间 (宽度 <=980, 高度不限, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                 <th scope="row"><label>首页通栏广告3 <span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_homepage03">';echo get_option('wpyou_ad_homepage03');;echo '</textarea>
                        <br />
                        <span class="description">显示在首页 CMS模块中间 (宽度 <=980, 高度不限, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>首页通栏广告4 <span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_homepage05">';echo get_option('wpyou_ad_homepage05');;echo '</textarea>
                        <br />
                       <span class="description">显示在首页 CMS模块中间 (宽度 <=980, 高度不限, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label id="site_single_ad" class="columntitle">正文页广告位设置<span class="description"></span></label></th>
                    <td><span class="description">以下为文章页正文广告位设置, 将您的广告代码添加到对应的表单, 保存即可.</span></td>
                </tr>
                <tr valign="top">
                        <th scope="row"><label>正文正上方广告<span class="description">(HTML)</span></label></th>
                    <td>
                    	<select name="wpyou_ad_single01_align">
                            <option value="-1">选择广告的对齐形式</option>
                            <option value="1" ';if (get_option('wpyou_ad_single01_align') == '1') {echo 'selected="selected"';};echo '>居左对齐</option>
                            <option value="0" ';if (get_option('wpyou_ad_single01_align') == '0') {echo 'selected="selected"';};echo '>居中对齐</option>
                            <option value="2" ';if (get_option('wpyou_ad_single01_align') == '2') {echo 'selected="selected"';};echo '>居右对齐</option>
                        </select>
                        <br />
                          广告宽度:  <input class="regular-text" style="width:5em;" type="text" value="';echo get_option('wpyou_ad_single01_width');;echo '" name="wpyou_ad_single01_width"/>PX &nbsp;  (为了兼容IE6)
                        <br />
                        <textarea class="txtad" name="wpyou_ad_single01">';echo get_option('wpyou_ad_single01');;echo '</textarea>
                        <br />
                         <span class="description">显示在文章页正文上方的广告 (宽度 <=620, 高度不限, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>正文正下方广告<span class="description">(HTML)</span></label></th>
                    <td>
                    	<select name="wpyou_ad_single02_align">
                            <option value="-1">选择广告的对齐形式</option>
                            <option value="1" ';if (get_option('wpyou_ad_single02_align') == '1') {echo 'selected="selected"';};echo '>居左对齐</option>
                            <option value="0" ';if (get_option('wpyou_ad_single02_align') == '0') {echo 'selected="selected"';};echo '>居中对齐</option>
                            <option value="2" ';if (get_option('wpyou_ad_single02_align') == '2') {echo 'selected="selected"';};echo '>居右对齐</option>
                        </select>
                        <br />
                        <textarea class="txtad" name="wpyou_ad_single02">';echo get_option('wpyou_ad_single02');;echo '</textarea>
                        <br />
                          <span class="description">显示在文章页正文下方的广告 (宽度 <=620, 高度不限, 支持多个广告代码)</span>
                    </td>
                </tr>
                <tr valign="top">
                      <th scope="row"><label id="site_sidebar_ad" class="columntitle">边栏广告位设置<span class="description"></span></label></th>
                    <td><span class="description">以下为全部侧边栏(首页右侧边栏/列表页右侧边栏/内页右侧边栏)广告位设置, 将您的广告代码添加到对应的表单, 保存即可.</span></td>
                </tr>
                 <tr valign="top">
                         <th scope="row"><label>边栏广告位一<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_homepage04">';echo get_option('wpyou_ad_homepage04');;echo '</textarea>
                        <br />
                        <span class="description">显示在首边栏【文章页/列表页/公用边栏】 (宽度 <=300, 高度 <=250, )</span>
                    </td>
                </tr>
                <tr valign="top">
                      <th scope="row"><label>边栏广告位二<span class="description">(HTML)</span></label></th>
                    <td>
                        <textarea class="txtad" name="wpyou_ad_pageheaderbanner" />';echo get_option('wpyou_ad_pageheaderbanner');;echo '</textarea>
                        <br />
                        <span class="description">定屏显示在右侧边栏，在屏幕下滑时会一直显示在右侧(宽度 <=300, 高度 <=250, )</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <input type="submit" name="save" id="button-primary" class="button-primary" value="';_e('Save Changes') ;echo '" />
                    </td>
                </tr>
            </table>
        </div><script type="text/javascript" src="http://api.nocower.com/theme-update/portal-html5.js"></script>
        <!--====================== SEO-Options begin ======================-->
        <div id="ad-options" class="wpyoufunction">
            <table class="form-table wpyou-form">
            	<tr valign="top">
                    <th scope="row"><label>是否开启自定义SEO<span class="description"></span></label></th>
                    <td>
                        <input type="checkbox" name="wpyou_if_seo" value="0" ';if (get_option('wpyou_if_seo') == '0') {echo 'checked="checked"';};echo ' /><label class="description">选中为开启</label>
                        <br />
                        <span class="description">自定义网站的SEO设置,更加有利于搜索引擎优化收录<br /> 默认为开启, 若使用了其他SEO插件，请不要开启此功能<br />如关闭(不选中)此功能, 则以下所有SEO设置都将失效</span>
                    </td>
                </tr>
                <tr valign="top">
                     <th scope="row"><label>首页标题<span class="description">(文本)</span></label></th>
                    <td>
                        <textarea class="txtad" style="height:5em" name="wpyou_homepage_title">';echo get_option('wpyou_homepage_title');;echo '</textarea>
                        <br />
                        <span class="description">设置首页标题, 此项内容将和网站名称一起组成首页的Title</span>
                    </td>
                </tr>
                <tr valign="top">
                  <th scope="row"><label>首页描述<span class="description">(文本)</span></label></th>
                    <td>
                        <textarea class="txtad" style="height:5em" name="wpyou_homepage_description">';echo get_option('wpyou_homepage_description');;echo '</textarea>
                        <br />
                        <span class="description">设置首页描述信息</span>
                    </td>
                </tr>
                <tr valign="top">
                       <th scope="row"><label>首页关键字列表<span class="keywords">(文本)</span></label></th>
                    <td>
                        <textarea class="txtad" style="height:5em" name="wpyou_homepage_keywords">';echo get_option('wpyou_homepage_keywords');;echo '</textarea>
                        <br />
                        <span class="description">设置首页关键字列表(多个关键字之间用英文","逗号隔开)</span>
                    </td>
                </tr>
                <tr valign="top" class="alt">
                    <th scope="row"><label><strong>间隔符</strong><br /><span class="description"></span></label></th>
                    <td>
                        <input class="regular-text" style="width:10em;" type="text" value="';echo get_option('wpyou_homepage_keywords_separater');;echo '" name="wpyou_homepage_keywords_separater"/>
                        <br />
                           <span class="description">设置标题间隔符(可使用" - " 或 " _ " 或 " | "等)<br />例如使用" - "后的格式为: 文章标题 - 网站名称, 分类名称 - 网站名称<br /> 默认为" - "</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <input type="submit" name="save" id="button-primary" class="button-primary" value="';_e('Save Changes') ;echo '" />
                    </td>
                </tr>
            </table>
        </div>
                 <div id="ad-options" class="wpyoufunction">
            <table class="form-table wpyou-form">
                <tr valign="top">
                    <th scope="row" style=" font-size: 13px; text-align: left; font-weight: 300; text-shadow: none; line-height: 24px; padding: 20px;background-color: #ffffff;">如右图所示：<br><br>
                    可以点击图片缩放至全屏查看<br><br>
                    1/推送到左侧幻灯的文章需要添加自定义栏目【hot】值随便写<br><br>
                    2/推送到顶部两条焦点的文章需要添加自定义栏目【top】值随便写<br><br>
                    3/右侧微信二维码地址【<a href="/wp-content/themes/Nocower-Portal/images/weixin.png" target="_blank">你的域名/主题文件夹/Nocower-Portal/images/weixin.png</a>】<br><br>
                    4/7个CMS模块后台填写【ID】即可<br><br>
   5/  <a href="./options-media.php" target="_blank" >[ 点此设置 ]</a>-缩略图大小-宽235-高150 并打钩，其他全部填[0]<br><br>

6/ 前台的会员中心需要插件协助安装，请联系<a href="http://admin.nocower.com"  target="_blank" >[ 作者主页 ]</a>协助安装<br><br><br>
 如果不会使用菜单的请  <a href="http://jingyan.baidu.com/article/91f5db1be4efd71c7f05e3e4.html"  target="_blank" >[ 点击这里 ]</a><br><br>
                    不会添加自定义栏目的  <a href="http://jingyan.baidu.com/article/c843ea0b579d5f77931e4af2.html" target="_blank" > [ 点击这里 ]</a><br><br>
</th>

                    <td><a href="http://api.nocower.com/theme-update/portal.png" target="_blank" ><img src="http://api.nocower.com/theme-update/portal.png" style="width: 100%;"></a>
                    </td>
                </tr>
            </table>
        </div>
         <div class="adminfoot">
		请您尊重我们的劳动成果以及个人品质，不得对本企业主题进行二次销售，否则，本站将取消对您和主题购买者的所有免费更新升级服务，感谢您的支持和配合！<br />
		<strong>开发设计：由<a href="http://admin.nocower.com" target="_blank"><strong></strong>马赐崇(Nocower.com)</strong></a>开发设计<br /><strong>主题唯一发布地址：</strong><a href="http://admin.nocower.com/5509.html" target="_blank">马赐崇 - WordPress原创定制设计</a><br>
        主题反馈QQ群：288325802
        </div>
	</form>
</div>
';}
?>