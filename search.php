<?php get_header(); ?>
<div class="content4">
<style>.gjcs{height: 40px!important;line-height: 40px!important;margin: 0!important;padding: 0px!important;border:0!important;}</style>
<div class="soua">下面是为您搜索到的关于【 <?php echo $s; ?> 】的文章，如果没有找到您需要的文章，建议您更换更准确的关键词</div>
    <ul class="articleList" style=" margin-top: 0px; ">
    	<?php if ( get_option('wpyou_articlecats_perpage') ) { ?>
			<?php $articleperpage = stripslashes(get_option('wpyou_articlecats_perpage')); ?>
        <?php } else { ?>
            <?php $articleperpage = 20; ?>
        <?php } ?>
    	<?php query_posts("s=$s&showposts=$articleperpage&paged=$paged"); ?>
		<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <li><style>.gjcs{display:none!important;}</style>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
<span><?php the_time('Y-m-d'); ?></span>
<span><a href="<?php the_permalink() ?>#addcomment"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></a> &nbsp;&nbsp;|&nbsp;&nbsp;</span> 
               </li>
        <?php endwhile; ?><?php endif; ?>
            <li class="gjcs">
                <p>OH!Sorry，亲，木有找到和此关键词相关的文章呦，换个关键词试试吧~</p>
            </li>
    </ul>
    <div class="clear"></div>
    <div class="pagenavi"><?php if(function_exists('wpyou_pagenavi')) { wpyou_pagenavi(9); } ?></div>
</div>   
<?php get_footer(); ?>