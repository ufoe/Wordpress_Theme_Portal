<?php $display_categories = array(1,474); $i = 1; 
foreach ($display_categories as $category) { ?>
	<!-- CategoriyList begin -->
	<div id="cat-<?php echo $i; ?>" class="section">
		<?php query_posts("caller_get_posts=1&showposts=10&cat=$category")?>
		<h2><a href="<?php echo get_category_link($category);?>" title="<?php single_cat_title(); ?>"><?php single_cat_title(); ?></a><span><a href="<?php echo get_category_link($category);?>" title="更多<?php single_cat_title(); ?>">›› 更多</a></span></h2>
		<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="deep"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
	</div>
	<!-- CategoriyList end -->
<?php $i++; } ?>      
<div class="clear"></div>
<!-- PicCategoriy begin -->
<div class="section piccats">
    <?php query_posts("showposts=6&cat=1")?>
    <h2><a href="<?php echo get_category_link($category);?>" title="<?php single_cat_title(); ?>"><?php single_cat_title(); ?></a><span><a href="<?php echo get_category_link($category);?>" title="更多<?php single_cat_title(); ?>">更多</a></span></h2>
    <ul>
        <?php while (have_posts()) : the_post(); ?>
            <li>
            	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><?php the_post_thumbnail( 'small' ); ?></a>
				<?php } else {?>
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><img src="<?php echo catch_post_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
				<?php } ?>
				<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h3>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<!-- PicCategoriy end -->