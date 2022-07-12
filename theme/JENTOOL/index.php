<?php get_header(); ?>
<section class="wrapper">

<section id="kv">
<!--
<div class="inner">
<h2>ジェン通<span>-the box filled with JEN's tools-</span></h2>
<p>Mr.Children・鈴木"JEN"英哉 使用楽器・機材のデータベース。非公式ファンサイト。<br>気になる楽器や機材を検索してみよう！</p>

<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
<label><input type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="例：TAMA、コパー、ap bank fes etc.."><input type="submit" value="" class="search"></label>
</form>
</div>

<ul class="bxslider">
<li><img src="<?php bloginfo('template_directory');?>/img/main01.jpg" title="Funky roots"></li>
<li><img src="<?php bloginfo('template_directory');?>/img/main02.jpg" title="The long and winding road"></li>
<li><img src="<?php bloginfo('template_directory');?>/img/main03.jpg" title="Happy trees"></li>
</ul>



-->
</section>
<div class="inner cf">
<div id="main">
	<div class="zoom-in">
		<div class="zoom-in-img">
			<a href="<?php bloginfo('url'); ?>/archive/kit/"><img src="<?php bloginfo('template_directory');?>/img/main01.jpg" alt="kit">
			<div class="zoom-in-img-text">
			<p class="text1">MAIN KITs</p>
			</div></a>
		</div>
		<div class="zoom-in-img">
			<a href="<?php bloginfo('url'); ?>/archive/snares/"><img src="<?php bloginfo('template_directory');?>/img/main04.jpg" alt="snare">
			<div class="zoom-in-img-text">
			<p class="text1">Snares</p>
			</div></a>
		</div>
		<div class="zoom-in-img">
			<a href="<?php bloginfo('url'); ?>/archive/cymbals/"><img src="<?php bloginfo('template_directory');?>/img/main02.jpg" alt="cymbal">
			<div class="zoom-in-img-text">
			<p class="text1">Cymbals</p>
			</div></a>
		</div>
		<div class="zoom-in-img">
			<a href="<?php bloginfo('url'); ?>/archive/others/"><img src="<?php bloginfo('template_directory');?>/img/main03.jpg" alt="other">
			<div class="zoom-in-img-text">
			<p class="text1">Others</p>
			</div></a>
		</div>
	</div>
<div class="post post2">
<ul class="tabMenu">
<li id="tab1">UP DATE</li>
<li id="tab2">MAIN KITs</li>
<li id="tab3">Snares</li>
<li id="tab4">Cymbals</li>
<li id="tab5">Others</li>
<li id="tab6">BLOG</li>
</ul>

<div class="tabContents">
<div>
<dl class="topics">
<?php
$my_query = new WP_Query('showposts=10');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php $cat = get_the_category(); $cat = $cat[0];?>

<dt><?php the_time('Y年m月d日'); ?><span class="<?php echo $cat->category_nicename; ?>"><?php the_category(' '); ?></span></dt>
<dd><a href="<?php the_permalink() ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endwhile; ?>
</dl>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=10&category=16'); foreach($myposts as $post) : ?>
<?php $cat = get_the_category(); $cat = $cat[0];?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/kit/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=10&category=3'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/snares/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=10&category=4'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/cymbals/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=10&category=5'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/others/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=10&category=1'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/blog/" class="btn01">and more...</a></p>
</div>
</div>
</div>
</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>