<?php get_header(); ?>
<div class="content3">
    <ul class="explist">
        <?php if ( get_option('wpyou_articlecats_perpage') ) { ?>
            <?php $articleperpage = stripslashes(get_option('wpyou_articlecats_perpage')); ?>
        <?php } else { ?>
            <?php $articleperpage = 13; ?>
        <?php } ?>
        <?php
            $tag = get_query_var('tag'); 
            query_posts("tag=$tag&orderby=date&order=DESC&posts_per_page=".$articleperpage."&paged=".$paged);
        ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
               <li>
                    <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 80,"...","utf-8"); ?></a></h3>
                                <div class="postlistpic"><?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 125,75 ), false, ''  ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?></div>
                    <p><?php echo wpyou_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"..."); ?>...</p>
                    <div class="meta">
                    本文由作者：<span><?php the_author_posts_link(); ?></span> 于 <span><?php the_time('Y-m-d H:i'); ?></span>发布在 [ <span><?php the_category(' , ') ?></span>] 分类下
                        <span>超过 <?php if(function_exists('the_views')) { the_views(); } ?> 次围观</span>
                        <span class="cmts"><?php comments_popup_link('暂无评论', '[ 1条评论 ]', '[ %条评论 ]'); ?></span>
                    </div>
               </li>
            <?php endwhile; ?>
        <?php else : ?>
            <li style="font-size: 180px;text-align: center;color: #DDD;height: 250px;line-height: 250px;">404</li>
<li style="text-align: center;font-size:20px;width: 100%;height: 100px;line-height: 100px;">卧擦，页面找不到啦，有木有！，<span id="secondsDisplay">3</span> 秒钟之后返回首页。</FONT>
<script type="text/javascript">  
  var i = 3;  
  var intervalid;  
    intervalid = setInterval("fun()", 1000);  
    function fun() {  
          if (i == 0) {  
                  window.location.href = "<?php bloginfo('url'); ?>";  
                        clearInterval(intervalid);  
                      }  
  document.getElementById("secondsDisplay").innerHTML = i;  
  i--;   
    }  
</script>
        <?php endif; ?>
    </ul>
    <div class="clear"></div>
<div class="pagenavi"><?php if(function_exists('wpyou_pagenavi')) { wpyou_pagenavi(9); } ?></div>
</div>   
<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
<?php get_footer(); ?>