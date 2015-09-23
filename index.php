<?php get_header(); ?>
 <?php if (get_option('wpyou_ad_topfullbanner')) { ?>
                <div class="ad_topfullbanner">
                	<?php echo get_option('wpyou_ad_topfullbanner'); ?>
            	</div>
			<?php } ?>
<div class="content homecontent"
	<div class="featured">
<div class="slideshow"> 
        <?php if( is_home()) { ?>
            <?php include (TEMPLATEPATH . '/slideshow.php'); ?>
        <?php } ?>
<div class="indexhot">
<div class="hotspan">24小时热评</div>
 <ul id="popular-posts">
 <?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 10");  
 foreach ($result as $post) {
 setup_postdata($post);
 $postid = $post->ID;
 $title = $post->post_title;
 $commentcount = $post->comment_count;
 if ($commentcount != 0) { ?>
 <li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>">
 <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 35,"...","utf-8"); ?>-[<?php echo $commentcount ?>评]</a></li>
 <?php } } ?>
 </ul>
</div>
</div>
<div class="latest">
<div class="indextop">
<ul class="indextop1">
<?php query_posts('meta_key=top&showposts=2');while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 43,"...","utf-8"); ?></a></li>
<p>
<?php if (has_excerpt()) {
                echo $description = get_the_excerpt(); //文章编辑中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 178,"…"); //文章编辑中若无摘要，自定截取文
            } ?><a href="<?php the_permalink() ?>"> [ 查看全文 ] </a></p>
                    <?php endwhile;?>
</ul>
</div>
<div class="topad">
  <?php if (get_option('wpyou_ad_logobanner')) { ?>
                    <?php echo get_option('wpyou_ad_logobanner'); ?>
            <?php } ?>
</div>         
            <?php query_posts('showposts=14&offset=1&caller_get_posts=1'); ?>
                <ul class="indexnew">
                   <?php while (have_posts()) : the_post(); ?>
                   <li><span>[ <?php the_category(','); ?> ]</span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 41,"...","utf-8"); ?></a></li>
                   <?php endwhile; ?>
                </ul>
</div>
<div class="index250">
<div class="guanzhu">
<div class="bdsharebuttonbox" id="indexshare"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<li class="weixin"></li>
</div>
<?php if( is_home()) { ?>
            <?php include (TEMPLATEPATH . '/gunping.php'); ?>
        <?php } ?>
</div>
</div></div>
    <?php if (get_option('wpyou_ad_homepage01')) { ?>
        <div class="clear"></div><div class="ad_leftbanner">
            <?php echo get_option('wpyou_ad_homepage01'); ?>
        </div>
	<?php } ?>
    <?php wp_reset_query(); ?>
    <?php if (get_option('wpyou_homepage_leftcat01')) { $homeleftcatid01 = get_option('wpyou_homepage_leftcat01'); ?>
        <div class="sidebar leftbar">
            <h2><a href="<?php echo get_category_link($homeleftcatid01);?>" title="<?php echo get_cat_name( $homeleftcatid01 ); ?>">
                <?php echo get_cat_name( $homeleftcatid01 ); ?></a><span><a href="<?php echo get_category_link($homeleftcatid01);?>" title="查看更多">›› 更多</a></span></h2>
                <ul id="cat-<?php echo $homeleftcatid01; ?>">
                     <li><?php query_posts("caller_get_posts=1&showposts=3&cat=$homeleftcatid01")?>
                        <ul><div class="piczong"><?php while (have_posts()) : the_post(); ?>
                            <li class="thumbpic">
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?>
                                    <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></h4>
                            </li>
                            <?php endwhile;?></div>
                            <?php query_posts("caller_get_posts=1&offset=2&showposts=9&cat=$homeleftcatid01"); ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <li class="indexmok"><p>> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 65,"...","utf-8"); ?></a></p>
<span><?php the_time('m/d'); ?></span></li>
                            <?php endwhile;?>
                        </ul><?php } ?>
                    </li>
                </ul>
        </div>    
    <?php if (get_option('wpyou_homepage_midcat01')) { $homemidcatid01 = get_option('wpyou_homepage_midcat01'); ?>
    	<div class="sidebar leftbar" style=" margin-left: 10px; ">
			<h2><a href="<?php echo get_category_link($homemidcatid01);?>" title="<?php echo get_cat_name( $homemidcatid01 ); ?>"><?php echo get_cat_name( $homemidcatid01 ); ?></a><span><a href="<?php echo get_category_link($homemidcatid01);?>" title="查看更多">›› 更多</a></span></h2>
<ul id="cat-<?php echo $homeleftcatid01; ?>">
                <li>
                        <?php query_posts("caller_get_posts=1&showposts=3&cat=$homemidcatid01")?>
                        <ul><div class="piczong">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="thumbpic">
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?>
                                    <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></h4>
                                </li>
                            <?php endwhile;?></div>
                            <?php query_posts("caller_get_posts=1&offset=2&showposts=9&cat=$homemidcatid01"); ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="indexmok"><p>> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 65,"...","utf-8"); ?></a></p>
<span><?php the_time('m/d'); ?></span></li>
                            <?php endwhile;?>
                        </ul>
                    <?php } ?>
                </li>
        	</ul>
        </div>    
<div class="clear"></div>
    <?php if (get_option('wpyou_ad_homepage02')) { ?>
        <div class="ad_leftbanner">
            <?php echo get_option('wpyou_ad_homepage02'); ?>
            <div class="clear"></div>
        </div>
	<?php } ?>
    <?php wp_reset_query(); ?>
    <?php if (get_option('wpyou_homepage_leftcat02')) { $homeleftcatid02 = get_option('wpyou_homepage_leftcat02'); ?>
    	<div class="sidebar leftbar">
    		 <h2><a href="<?php echo get_category_link($homeleftcatid02);?>" title="<?php echo get_cat_name( $homeleftcatid02 ); ?>"><?php echo get_cat_name( $homeleftcatid02 ); ?></a><span><a href="<?php echo get_category_link($homeleftcatid02);?>" title="更多">›› 更多</a></span></h2>
<ul id="cat-<?php echo $homeleftcatid02; ?>">
        <li><?php query_posts("caller_get_posts=1&showposts=3&cat=$homeleftcatid02")?>
                <ul><div class="piczong">
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="thumbpic">
                            <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } else {?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } ?>
                            <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></a></h4>
                        </li>
                    <?php endwhile;?></div>
                    <?php query_posts("caller_get_posts=1&offset=2&showposts=9&cat=$homeleftcatid02"); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="indexmok"><p>> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 65,"...","utf-8"); ?></a></p><span><?php the_time('m/d'); ?></span></li>
                    <?php endwhile;?>
                </ul>
        <?php } ?>
    	</li>
        </ul>
    	</div>
    <?php if (get_option('wpyou_homepage_midcat02')) { $homemidcatid02 = get_option('wpyou_homepage_midcat02'); ?>
        <div class="sidebar leftbar" style=" margin-left: 10px; ">
            <h2><a href="<?php echo get_category_link($homemidcatid02);?>" title="<?php echo get_cat_name( $homemidcatid02 ); ?>"><?php echo get_cat_name( $homemidcatid02 ); ?></a><span><a href="<?php echo get_category_link($homemidcatid02);?>" title="查看更多">›› 更多</a></span></h2>
<ul id="cat-<?php echo $homeleftcatid02; ?>">
                <li>
                        <?php query_posts("caller_get_posts=1&showposts=3&cat=$homemidcatid02")?>
                        <ul><div class="piczong">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="thumbpic">
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?>
                                    <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></h4>
                                </li>
                            <?php endwhile;?></div>
                            <?php query_posts("caller_get_posts=1&offset=2&showposts=9&cat=$homemidcatid02"); ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="indexmok"><p>> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 65,"...","utf-8"); ?></a></p>
<span><?php the_time('m/d'); ?></span></li>
                            <?php endwhile;?>
                        </ul>
                    <?php } ?>
                </li>
            </ul>
        </div>    
    <div class="clear"></div>
    <?php if (get_option('wpyou_ad_homepage03')) { ?>
        <div class="ad_leftbanner">
            <?php echo get_option('wpyou_ad_homepage03'); ?>
            <div class="clear"></div>
        </div>
    <?php } ?>
    <?php wp_reset_query(); ?>
    <?php if (get_option('wpyou_homepage_leftcat03')) { $homeleftcatid03 = get_option('wpyou_homepage_leftcat03'); ?>
        <div class="sidebar leftbar">
             <h2><a href="<?php echo get_category_link($homeleftcatid03);?>" title="<?php echo get_cat_name( $homeleftcatid03 ); ?>"><?php echo get_cat_name( $homeleftcatid03 ); ?></a><span><a href="<?php echo get_category_link($homeleftcatid03);?>" title="更多">›› 更多</a></span></h2>
<ul id="cat-<?php echo $homeleftcatid03; ?>">
        <li><?php query_posts("caller_get_posts=1&showposts=3&cat=$homeleftcatid03")?>
                <ul><div class="piczong">
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="thumbpic">
                            <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } else {?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } ?>
                            <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></a></h4>
                        </li>
                    <?php endwhile;?></div>
                    <?php query_posts("caller_get_posts=1&offset=2&showposts=9&cat=$homeleftcatid03"); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="indexmok"><p>> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 65,"...","utf-8"); ?></a></p><span><?php the_time('m/d'); ?></span></li>
                    <?php endwhile;?>
                </ul>
        <?php } ?>
        </li>
        </ul>
        </div>
    <?php if (get_option('wpyou_homepage_midcat03')) { $homemidcatid03 = get_option('wpyou_homepage_midcat03'); ?>
        <div class="sidebar leftbar" style=" margin-left: 10px; ">
            <h2><a href="<?php echo get_category_link($homemidcatid03);?>" title="<?php echo get_cat_name( $homemidcatid03 ); ?>"><?php echo get_cat_name( $homemidcatid03 ); ?></a><span><a href="<?php echo get_category_link($homemidcatid03);?>" title="查看更多">›› 更多</a></span></h2>
<ul id="cat-<?php echo $homeleftcatid03; ?>">
                <li>
                        <?php query_posts("caller_get_posts=1&showposts=3&cat=$homemidcatid03")?>
                        <ul><div class="piczong">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="thumbpic">
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?>
                                    <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></h4>
                                </li>
                            <?php endwhile;?></div>
                            <?php query_posts("caller_get_posts=1&offset=2&showposts=9&cat=$homemidcatid03"); ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="indexmok"><p>> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 65,"...","utf-8"); ?></a></p>
<span><?php the_time('m/d'); ?></span></li>
                            <?php endwhile;?>
                        </ul>
                    <?php } ?>
                </li>
            </ul>
        </div>    
    <div class="clear"></div>
    <div class="clear"></div>
    <?php if (get_option('wpyou_ad_homepage05')) { ?>
        <div class="ad_leftbanner">
            <?php echo get_option('wpyou_ad_homepage05'); ?>
        </div><div class="clear"></div>
	<?php } ?>
    <?php wp_reset_query(); ?>
<div class="footpic">
<?php if (get_option('wpyou_homepage_midcat04')) { $homemidcatid04 = get_option('wpyou_homepage_midcat04'); ?>
<div class="footshowbt"><a style="float:left;" href="<?php echo get_category_link($homemidcatid04);?>" title="<?php echo get_cat_name( $homemidcatid04 ); ?>"><?php echo get_cat_name( $homemidcatid04 ); ?></a><span><a href="<?php echo get_category_link($homemidcatid04);?>" title="查看更多">›› 更多</a></span></div>
        <div class="footshow" >
                        <?php query_posts("caller_get_posts=1&showposts=8&cat=$homemidcatid04")?>
                        <ul>
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="thumbpic">
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),array( 125,75 ), false, ''  ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?>
                                    <div class="footbt"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 28,"...","utf-8"); ?></a></div>
                                </li>
                            <?php endwhile;?>
                        </ul>
                          <?php } ?>
        </div></div>
<div class="clear"></div>
</div>   
<?php get_footer(); ?>