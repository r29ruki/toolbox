<?php get_header(); ?>
<section class="wrapper">

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">ジェン通 HOME</a></li>
<li>検索結果</li>
</ul>

<div id="main">

<?php if (have_posts()) : ?>
<div class="post">
<h4>「<?php echo $_GET['s'] ?>」の検索結果</h4>

<dl class="topics">
<?php while (have_posts()) : the_post(); ?>

<?php $cat = get_the_category(); $cat = $cat[0];?>

<dt><?php the_time('Y年m月d日'); ?><span class="<?php echo $cat->category_nicename; ?>"><?php the_category(' '); ?></span></dt>
<dd><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></dd>

<?php endwhile; ?>
</dl>
</div>

<!--ページャー-->
<div class="pager">
<?php global $wp_rewrite;
$paginate_base = get_pagenum_link(1);
if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
	$paginate_format = '';
	$paginate_base = add_query_arg('paged', '%#%');
} else {
	$paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') . 
	user_trailingslashit('page/%#%/', 'paged');;
	$paginate_base .= '%_%';
}
echo paginate_links( array(
	'base' => $paginate_base,
	'format' => $paginate_format,
	'total' => $wp_query->max_num_pages,
	'mid_size' => 3,
	'current' => ($paged ? $paged : 1),
)); ?>
</div>
<!--ページャー-->

<?php else : ?>
<div class="post">
<h4>「<?php echo $_GET['s'] ?>」の検索結果</h4>
<p><?php _e('お探しのキーワードに関連する記事・ページが見つかりませんでした。'); ?></p>
</div>
<?php endif; ?>
</div>

<div id="side"><?php get_sidebar(); ?></div>
</div>
</section>
<?php get_footer(); ?>
