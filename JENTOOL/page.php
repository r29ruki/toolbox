<?php get_header(); ?>
<section class="wrapper">
<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">ジェン通 HOME</a></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">
<h4><?php the_title();?></h4>

<?php the_content(); ?>
<?php endwhile; else: ?>

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>

<?php endif; ?>
</div>
</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>