<?php get_header(); ?>
<section class="wrapper">
<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">
<h4><?php the_title();?></h4>

<?php the_content(); ?>
        <p></p>
                                <p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
                                        <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
              <i class="fab fa-twitter-square"></i> Tweet
           </a>
          <a class="sns__facebook" href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
               <i class="fab fa-facebook-square"></i> Shere
           </a>
          <a class="sns__hatena" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_the_permalink();?>&title=<?php echo get_the_title(); ?>" target="_blank" rel="nofollow noopener">
                                                 <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
           </a>
          <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

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