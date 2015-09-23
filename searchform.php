<form method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>/">
   <input class="searchInput" type="text" value="输入关键字" placeholder="输入关键字"  onblur="if(this.value=='') this.value='输入关键字';" onfocus="if(this.value=='输入关键字') this.value='';" name="s" id="ls" x-webkit-speech lang="zh-CN"/>
   <input class="searchBtn" type="submit" id="searchsubmit" title="搜索" value="搜索"/>
</form>