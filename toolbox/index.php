<?php get_header(); ?>
<section class="wrapper">

<section id="kv">
<div class="inner">
<h2>TOOLBOX<span>Mr.Children's Music Equipment Detabase</span></h2>
<p>Mr.Children 使用楽器・機材のデータベース。非公式ファンサイト。<br>気になる楽器や機材を検索してみよう！</p>

<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
<label><input type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="例：Fender、ブルーフラワー、名もなき詩 etc.."><input type="submit" value="" class="search"></label>
</form>
</div>

<ul class="bxslider">
<li><img src="<?php bloginfo('template_directory');?>/img/main01.jpg" title="Funky roots"></li>
<li><img src="<?php bloginfo('template_directory');?>/img/main02.jpg" title="The long and winding road"></li>
<li><img src="<?php bloginfo('template_directory');?>/img/main03.jpg" title="Happy trees"></li>
</ul>
</section>

<div class="inner cf">
<div id="main">
<div class="post post2">
<ul class="tabMenu">
<li id="tab1">UP DATE</li>
<li id="tab2">SAKURAI's</li>
<li id="tab3">TAHARA's</li>
<li id="tab4">NAKAGAWA's</li>
<li id="tab5">JEN's</li>
<li id="tab6">LIVE</li>
<li id="tab7">MEDIA</li>
</ul>

<div class="tabContents">
<div>
<dl class="topics">
<?php
$my_query = new WP_Query('showposts=15');
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php $cat = get_the_category(); $cat = $cat[0];?>

<dt><?php the_time('Y年m月d日'); ?><span class="<?php echo $cat->category_nicename; ?>"><?php the_category(' '); ?></span></dt>
<dd><a href="<?php the_permalink() ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endwhile; ?>
</dl>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=15&category=4'); foreach($myposts as $post) : ?>
<?php $cat = get_the_category(); $cat = $cat[0];?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/sakurai/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=15&category=3'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/tahara/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=15&category=5'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/nakagawa/" class="btn01">and more...</a></p>
</div>

<div>
<dl class="topics topics2">
<dt></dt>
<dd>JENの機材情報は<a href="https://jen.mrchildren.tools/" target="_blank" rel="noopener noreferrer">ジェン通</a>に移動しました。</dd>
</dl>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=15&category=12,13,14,15,16,17,18'); foreach($myposts as $post) : ?>
<?php $cat = get_the_category(); $cat = $cat[0];?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
<p><a href="/live/" class="btn01">and more...</a></p>
</dl>
</div>

<div>
<dl class="topics topics2">
<?php $myposts = get_posts('numberposts=15&category=25'); foreach($myposts as $post) : ?>
<dt><?php echo get_the_date("Y.m.d"); ?></dt>
<dd><a href="<?php the_permalink(); ?>" class="<?php echo $cat->category_nicename; ?>">「<?php the_title(); ?>」</a></dd>
<?php endforeach; ?>
</dl>
<p><a href="/archive/media/" class="btn01">and more...</a></p>
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