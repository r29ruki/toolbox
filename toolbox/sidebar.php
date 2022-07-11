<?php if ( !is_home() && !is_front_page() ) : ?>
<!--以下はHOMEには表示しない-->
<?php if( in_category( array('3','4','5','7') ) ) : ?>
 
<h3>EQUIPMENT</h3>
<ul class="snav flexbox">
<?php wp_list_categories('orderby=count&order=desc&include=3,4,5,7&show_count=1&title_li='); ?>
</ul>

<?php elseif( in_category( array('185','8','9','10') ) ) : ?>
 
<h3>SONGS</h3>
<ul class="snav flexbox">
<?php wp_list_categories('orderby=count&order=desc&include=8,9,10&show_count=1&title_li='); ?>
</ul>

<?php elseif( in_category( array('12','13','14','15','16','17','18') ) ) : ?>
 
<h3>LIVE</h3>
<ul class="snav flexbox">
<?php wp_list_categories('orderby=ID&order=desc&include=12,13,14,15,16,17,18&show_count=1&title_li='); ?>
</ul>

<?php elseif( in_category( array('11') ) ) : ?>

<h3>最新の投稿記事</h3>
<ul class="snav">
<?php $myposts = get_posts('numberposts=10&category=11'); foreach($myposts as $post) : ?>
<?php
	$cat = get_the_category();
	$cat = $cat[0];
?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<?php else: ?>

<?php endif; ?>
<!--以上はHOMEには表示しない-->
<?php endif; ?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>

<ul class="sbnr">
<li><a href="<?php bloginfo('url'); ?>/archive/extra/">EXTRA</a></li>
<li><a href="<?php bloginfo('url'); ?>/notfound/">NOT FOUND</a></li>
<li class="tw"><a href="https://twitter.com/TOOLBOX_M" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/tw.png"></a></li>
</ul>

<?php if ( !is_home() && !is_front_page() ) : ?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
<input type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="例：Fender"> <input type="submit" value="検索">
<?php endif; ?>
</form>

<br>

<div class="tw"><a class="twitter-timeline" data-height="500" data-theme="light" href="https://twitter.com/TOOLBOX_M?ref_src=twsrc%5Etfw">Tweets by TOOLBOX_M</a><script async src="https://mrchildren.tools/widget_tmp.js" charset="utf-8"></script></div>