<?php get_header(); ?>
<section class="wrapper">
<h2>404 ERROR</h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li>404 ERROR</li>
</ul>

<div id="main">
<div class="post">

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
</div>
</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>