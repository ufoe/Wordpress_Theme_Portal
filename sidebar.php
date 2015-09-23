<div class="sidebar" id="sidebar">
<div class="sidehot">
<div class="sidehotbt">最多关注</div>
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
<div class="sidehot">
           <div class="sidehotbt">全站最新</div>
                <ul  class="sidetj">
                  	<?php
					 global $post;
					 $recentposts = get_posts('caller_get_posts=1&numberposts=10');
					 foreach($recentposts as $post) :
					?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"> <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 40,"...","utf-8"); ?></a></li>
					<?php endforeach; ?>
                </ul>
            </li>
</div>
<ul class="sidead">
<?php if (get_option('wpyou_ad_homepage04')) { ?>
<?php echo get_option('wpyou_ad_homepage04'); ?>
<?php } ?>
</ul>
<div id="sidesoll">
<div class="widget_tag_cloud">
<div class="sidehotbt">标签云集</div>
<div class="sideyun"><?php wp_tag_cloud('smallest=12&largest=16&number=40&unit=px&orderby=count&order=DESC'); ?></div>
</div>
<div class="widget_text">
<?php if (get_option('wpyou_ad_pageheaderbanner')) { ?>
<?php echo get_option('wpyou_ad_pageheaderbanner'); ?>
<?php } ?>
</div>
</div>
</div>