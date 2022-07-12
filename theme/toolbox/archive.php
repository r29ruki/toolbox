<?php get_header(); ?>
<section class="wrapper">
<?php if( in_category( array('3','4','5','6','7') ) ) : ?>
<h2>EQUIPMENT</h2>
<?php elseif( in_category( array('8','9','10') ) ) : ?>
<h2>SONGS</h2>
<?php else: ?>
<h2><?php printf(__('%s', 'kubrick'), single_cat_title('', false)); ?></h2>
<?php endif; ?>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<?php if( in_category( array('3','4','5','6','7') ) ) : ?>
<li><a href="<?php bloginfo('url'); ?>/equipment/">EQUIPMENT</a></li>
<li><?php printf(__('%s', 'kubrick'), single_cat_title('', false)); ?></li>
<?php elseif( in_category( array('8','9','10') ) ) : ?>
<li><a href="<?php bloginfo('url'); ?>/songs/">SONGS</a></li>
<li><?php printf(__('%s', 'kubrick'), single_cat_title('', false)); ?></li>
<?php else: ?>
<li><?php printf(__('%s', 'kubrick'), single_cat_title('', false)); ?></li>
<?php endif; ?>
</ul>

<div id="main">

<!-- if 投稿が存在するかを確認する条件文 *1 -->
<?php if (have_posts()) : ?>

<!-- 投稿一覧の最初を取得 -->
       <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<!-- カテゴリーアーカイブの場合 *2 -->
       <?php /* If this is a category archive */ if( in_category(array('3','4','5','6','7','8','9','10','12','13','14','15','16','17','18'))) { ?>
<!-- カテゴリー名を表示 -->
        <h3><?php printf(__('%s', 'kubrick'), single_cat_title('', false)); ?></h3>
<!-- タグアーカイブの場合 *2 -->
       <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<!-- タグ名を表示 -->
        <h2 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'kubrick'), single_tag_title('', false) ); ?></h2>
<!-- 日別アーカイブの場合 *2 -->
       <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<!-- 年月日を表示 -->
        <h2 class="pagetitle"><?php printf(_c(' %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick'))); ?>年</h2>
<!-- 月別アーカイブの場合 *2 -->
       <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<!-- 年月を表示 -->
        <h2 class="pagetitle"><?php printf(_c(' %s|Monthly archive page', 'kubrick'), get_the_time(__('F, Y', 'kubrick'))); ?>年</h2>
<!-- 年別アーカイブの場合 *2 -->
       <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<!-- 年を表示 -->
        <h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'kubrick'), get_the_time(__('Y', 'kubrick'))); ?></h2>
<!-- 著者アーカイブの場合 *2 -->
      <?php /* If this is an author archive */ } elseif (is_author()) { ?>
<!-- 著者を表示 -->
        <h2 class="pagetitle"><?php _e('Author Archive', 'kubrick'); ?></h2>
<!-- 複数ページになるアーカイブの場合 *2 -->
       <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<!-- ブログアーカイブを表示 -->
        <h2 class="pagetitle"><?php _e('Blog Archives', 'kubrick'); ?></h2>
<!-- *2 の終了 -->
       <?php } ?>


<?php if( in_category( array('3','4','5','6','7') ) ) : ?>
<!-- 投稿データを取得するループ *3 -->
<!-- 機材カテゴリ用 -->
<div class="post">
<table class="table_A equipment">
<tbody>
<tr>
<th>Model<span><a href="<?php echo add_query_arg( array('order' => 'ASC', 'orderby' => 'title') ); ?>">▲</a><a href="<?php echo add_query_arg( array('order' => 'DESC', 'orderby' => 'title') ); ?>">▼</a></span></th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<tr>
<?php while (have_posts()) : the_post(); ?>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>

<td><a href="<?php bloginfo('url'); ?>/tag/<?php echo post_custom('Maker'); ?>"><?php echo post_custom('Maker'); ?></a></td>
<td><?php echo post_custom('Finish'); ?></td>

<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

<?php elseif( in_category( array('12','13','14','15','16','17','18') ) ) : ?>
<!-- 投稿データを取得するループ *3 -->
<!-- LIVEカテゴリ用。5年毎にカテゴリ追加 -->
<div class="post">
<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Date<span><a href="<?php echo add_query_arg( array('order' => 'ASC', 'orderby' => 'date') ); ?>">▲</a><a href="<?php echo add_query_arg( array('order' => 'DESC', 'orderby' => 'date') ); ?>">▼</a></span></th>
<th>Venue</th>
</tr>
<tr>
<?php while (have_posts()) : the_post(); ?>
<?php 
    global $wpdb;
    $get_meta = $wpdb->get_results(
          $wpdb->prepare( "SELECT show_date,show_venue FROM
          wp_setlist WHERE
          post_id = %d", get_the_ID()
    )
    );
    $get_meta = isset($get_meta[0]) ? $get_meta[0] : null;
    $show_date = isset($get_meta->show_date) ? $get_meta->show_date : null;
    $show_venue = isset($get_meta->show_venue) ? $get_meta->show_venue : null;
  ?>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo $show_date; ?></td>
<td><?php echo $show_venue; ?></td> 
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
	

<?php elseif( in_category( array('8','9','10') ) ) : ?>
<!-- 投稿データを取得するループ *3 -->
<!-- 楽曲カテゴリ用 -->
<div class="post">
<table class="table_A equipment">
<tbody>
<tr>
<th>Title<span><a href="<?php echo add_query_arg( array('order' => 'ASC', 'orderby' => 'title') ); ?>">▲</a><a href="<?php echo add_query_arg( array('order' => 'DESC', 'orderby' => 'title') ); ?>">▼</a></span></th>
<th>Data</th>
</tr>
<tr>
<?php while (have_posts()) : the_post(); ?>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
	
	
<?php elseif( in_category( array('185') ) ) : ?>
<!-- 投稿データを取得するループ *3 -->
<!-- 楽曲カテゴリ用 -->
<div class="post">
<table class="table_A equipment">
<tbody>
<tr>
<th>Title<span><a href="<?php echo add_query_arg( array('order' => 'ASC', 'orderby' => 'title') ); ?>">▲</a><a href="<?php echo add_query_arg( array('order' => 'DESC', 'orderby' => 'title') ); ?>">▼</a></span></th>
<th>KEY<span><a href="<?php echo add_query_arg( array('order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'KEY') ); ?>">▲</a><a href="<?php echo add_query_arg( array('order' => 'DESC', 'orderby' => 'meta_value', 'meta_key' => 'KEY') ); ?>">▼</a></span></th>
<th>BPM<span><a href="<?php echo add_query_arg( array('order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'BPM') ); ?>">▲</a><a href="<?php echo add_query_arg( array('order' => 'DESC', 'orderby' => 'meta_value', 'meta_key' => 'BPM') ); ?>">▼</a></span></th>
<th>Data</th>
</tr>
<tr>
<?php while (have_posts()) : the_post(); ?>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo post_custom('KEY'); ?></td>
<td><?php echo post_custom('BPM'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
	
<?php elseif( in_category( array('1','2','25') ) ) : ?>
<!-- 投稿データを取得するループ *3 -->
<!-- 未分類、MEDIA用 -->
<div class="post">
<ul class="list_A">
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
</div>

<?php else: ?>

<!-- 投稿データを取得するループ *3 -->
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

<?php the_content() ?>

<p class="categori"><span class="fr"><?php the_date('Y年m月d日'); ?></span><?php the_category(' '); ?><?php the_tags('タグ: ', ', '); ?><?php comments_popup_link(__('コメント 0件：コメントを書く', 'kubrick'), __('コメント 1件：コメントを書く', 'kubrick'), __('コメント %件：コメントを書く', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?></p>
</div>
<?php endwhile; ?>

<?php endif; ?>

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

<!-- *1 が成り立たない場合 -->
    <?php else :
        if ( is_category() ) { // If this is a category archive
            printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", 'kubrick').'</h2>', single_cat_title('',false));
        } else if ( is_date() ) { // If this is a date archive
            echo('<h2>'.__("Sorry, but there aren't any posts with this date.", 'kubrick').'</h2>');
        } else if ( is_author() ) { // If this is a category archive
            $userdata = get_userdatabylogin(get_query_var('author_name'));
            printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", 'kubrick')."</h2>", $userdata->display_name);
        } else {
            echo("<h2 class='center'>".__('No posts found.', 'kubrick').'</h2>');
        }
      get_search_form();
    endif;
?>
    </div>



<!-- サイドバーを埋め込む -->
<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>