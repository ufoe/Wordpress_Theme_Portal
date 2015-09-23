<div id="scrollDiv">
<?php if (get_option('wpyou_homepage_midcat05')) { $homemidcatid05 = get_option('wpyou_homepage_midcat05'); ?>
<div class="indexr"><a style="float:left;" href="<?php echo get_category_link($homemidcatid05);?>" title="<?php echo get_cat_name( $homemidcatid05 ); ?>"><?php echo get_cat_name( $homemidcatid05 ); ?></a><span><a href="<?php echo get_category_link($homemidcatid05);?>" title="查看更多">›› 更多</a></span></div>
                        <?php query_posts("caller_get_posts=1&showposts=5&cat=$homemidcatid05")?>
                        <ul class="indexr-pic">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="indexr-pic-img">
                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                        <div class="rrpic"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'indexid' ); echo $image[0];?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a></div>
                                    <?php } else {?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                                    <?php } ?>
                                    <div class="inder-bt"><div class="btbt"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 28,"...","utf-8"); ?></a></div>
<p><?php if (has_excerpt()) {
                echo $description = get_the_excerpt(); //文章编辑中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 78,"…"); //文章编辑中若无摘要，自定截取文
            } ?></p></div>
                                </li>
                            <?php endwhile;?>
                        </ul>
                          <?php } ?>
</div>