<?php get_header(); ?>
<div class="content2">
	<div class="single">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
            <div class="singlebt" style="margin-top: 0px;"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 70,"...","utf-8"); ?></div>
            <div class="singlemeta">
            	本文由作者：<span><?php the_author_posts_link(); ?></span> 于 <span><?php the_time('Y-m-d H:i'); ?></span> 发布 
                        <span>超过 <?php if(function_exists('the_views')) { the_views(); } ?> 个小伙伴围观</span> 
                        <span class="cmts"><?php comments_popup_link('暂无评论', '[ 1条评论 ]', '[ %条评论 ]'); ?></span> 
				&nbsp;&nbsp;<?php edit_post_link('编辑本文', '', ''); ?></div>
<div class="bdsharebuttonbox" id="singleshare"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a><a href="#" class="bds_mshare" data-cmd="mshare" title="分享到一键分享"></a><a href="#" class="bds_thx" data-cmd="thx" title="分享到和讯微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_tsohu" data-cmd="tsohu" title="分享到搜狐微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_kaixin001" data-cmd="kaixin001" title="分享到开心网"></a><a href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a><a href="#" class="bds_baidu" data-cmd="baidu" title="分享到百度搜藏"></a><a href="#" class="bds_t163" data-cmd="t163" title="分享到网易微博"></a><a href="#" class="bds_taobao" data-cmd="taobao" title="分享到我的淘宝"></a><a href="#" class="bds_meilishuo" data-cmd="meilishuo" title="分享到美丽说"></a><a href="#" class="bds_diandian" data-cmd="diandian" title="分享到点点网"></a><a href="#" class="bds_ibaidu" data-cmd="ibaidu" title="分享到百度个人中心"></a><a href="#" class="bds_hi" data-cmd="hi" title="分享到百度空间"></a><a href="#" class="bds_share189" data-cmd="share189" title="分享到手机快传"></a><a href="#" class="bds_mogujie" data-cmd="mogujie" title="分享到蘑菇街"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a><a href="#" class="bds_bdysc" data-cmd="bdysc" title="分享到百度云收藏"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin","tqf","mshare","thx","douban","tsohu","sqq","kaixin001","bdhome","baidu","t163","taobao","sohu","meilishuo","diandian","ibaidu","hi","share189","mogujie","tieba","mail","bdysc","ty","bdxc","copy","tfh","duitang","qq","youdao","fx","sdo","hx"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin","tqf","mshare","thx","douban","tsohu","sqq","kaixin001","bdhome","baidu","t163","taobao","sohu","meilishuo","diandian","ibaidu","hi","share189","mogujie","tieba","mail","bdysc","ty","bdxc","copy","tfh","duitang","qq","youdao","fx","sdo","hx"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            <div class="entry">
            	<div class="entrycontent">
					<?php if (get_option('wpyou_ad_single01')) { ?>
                        <div class="ad_single <?php if (get_option('wpyou_ad_single01_align') == '1') { ?>ad_singleleft<?php } elseif (get_option('wpyou_ad_single01_align') == '2') { ?>ad_singleright<?php } else { ?><?php } ?>" <?php if (get_option('wpyou_ad_single01_width')) { ?>style="width:<?php echo get_option('wpyou_ad_single01_width') ?>px;"<?php } ?>>
                            <?php echo get_option('wpyou_ad_single01'); ?>
                            <div class="clear"></div>
                        </div>
                    <?php } ?>
                <?php the_content(''); ?>
                <!-- SingleAd begin -->
				<?php if (get_option('wpyou_ad_single02')) { ?>
                    <div class="ad_single ad_singlebtm <?php if (get_option('wpyou_ad_single02_align') == '1') { ?>ad_singleleft<?php } elseif (get_option('wpyou_ad_single02_align') == '2') { ?>ad_singleright<?php } else { ?><?php } ?>">
                        <?php echo get_option('wpyou_ad_single02'); ?>
                        <div class="clear"></div>
                    </div>
                <?php } ?>
            	</div>
            </div>
            <div class="postmeta">
                本文链接 : <a href="<?php the_permalink() ?>" class="underline"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 70,"...","utf-8"); ?></a> - &nbsp[ <a href="javascript:void()" onclick="copyLink('<?php the_permalink() ?>'); return false;" class="copylink" title="复制链接转发分享给更多的朋友">复制链接</a> ]<br />
            版权所有 : <a href="<?php echo get_settings('home'); ?>" class="underline"><?php bloginfo('name'); ?></a><br />
            	订阅更新 : <a href="<?php if (get_option('wpyou_feed_url')) { ?><?php echo get_option('wpyou_feed_url'); ?><?php } else { ?><?php bloginfo('rss2_url'); } ?>" title="订阅更新" target="_blank" class="underline">RSS订阅我们的优质内容更新 - </a>&nbsp; [ <a href="javascript:void(0)" class="print">打印本页</a> ]
            </div>
<div class="postnavi">
                <div class="previous_post"><?php previous_post_link('上一篇 : %link') ?></div>
                <div class="next_post"><?php next_post_link('下一篇 : %link') ?></div>
            </div>
            <div class="relatedrandom">
    <?php
    $backup = $post; 
    $tags = wp_get_post_tags($post->ID);
    $tagIDs = array();
    if ($tags) {
        echo '<div class="related">';
        $tagcount = count($tags);
        for ($i = 0; $i < $tagcount; $i++) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
        $args=array(
            'tag__in' => $tagIDs,
            'post__not_in' => array($post->ID),
            'showposts'=>8,
            'caller_get_posts'=>1
        );
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <li class="singlepic"> <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } else {?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } ?>
                <p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></p>
                        </li>
            <?php endwhile;
                echo '</div>';
        } else { ?>
    <div class="related-post">
        <?php
        query_posts(array('orderby' => 'rand', 'showposts' => 4, 'caller_get_posts' => 1));
        if (have_posts()) :
        while (have_posts()) : the_post();?>
         <li class="singlepic"> <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } else {?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } ?>
                <p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 20,"...","utf-8"); ?></a></p>
                        </li>
        <?php endwhile;endif; ?>
    </div>
    <?php }
    }
    $post = $backup;
    wp_reset_query();
    ?>
                </div> 
<div class="clear"></div>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Error begin -->
        <div class="error">
            <h4>没有找到您要访问的页面</h4>
            <ol>
                <li>请检查您输入的网址是否正确。</li>
                <li>确认无误有可能我们的页面正在升级或维护。</li>
                <li>您可以尝试访问以下链接。</li>
            </ol>
        </div>
    <?php endif; ?>
    </div>
    	<div class="postcomment"><?php comments_template(); ?></div></div>
<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
<?php get_footer(); ?>