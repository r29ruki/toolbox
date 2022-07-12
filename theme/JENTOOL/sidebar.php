<?php if ( !is_home() && !is_front_page() ) : ?>
<!--以下はHOMEには表示しない-->
<?php if( in_category( array('2','3','4','5','16') ) ) : ?>
 
<h3>EQUIPMENT</h3>
<ul class="snav flexbox">
<?php wp_list_categories('orderby=count&order=desc&include=2,3,4,5,16&show_count=1&title_li='); ?>
</ul>

<?php elseif( in_category( array('18','19','20','21','22','23','106') ) ) : ?>
 
<h3>LIVE</h3>
<ul class="snav flexbox">
<?php wp_list_categories('order=desc&include=18,19,20,21,22,23,106&show_count=1&title_li='); ?>
</ul>

<?php elseif( in_category( array('1') ) ) : ?>

<h3>最新の投稿記事</h3>
<ul class="snav">
<?php $myposts = get_posts('numberposts=10&category=1'); foreach($myposts as $post) : ?>
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
<li><a href="<?php bloginfo('url'); ?>/archive/about/">WHAT IS "JENTOOL"??</a></li>
<li><a href="<?php bloginfo('url'); ?>/link/">LINK</a></li>
<li class="tw"><a href="https://twitter.com/jen_tools" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/tw.png"></a></li>
</ul>

<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
<input type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="例：Ludwig"> <input type="submit" value="検索">
</form>

<br>
<div class="tw">
	<a class="twitter-timeline" data-height="570" data-theme="light" href="https://twitter.com/jen_tools?ref_src=twsrc%5Etfw">Tweets by jen_tools</a> 
	<script async="" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>