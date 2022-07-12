<?php get_header(); ?>

<?php if( in_category( array('3','4','5','6','7') ) ) : ?>
<section class="wrapper">
<h2>EQUIPMENT</h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/equipment/">EQUIPMENT</a></li>
<li><?php the_category(' '); ?></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<h3><?php $cat = get_the_category(); $cat = $cat[0];?><?php echo $cat->cat_name; ?></h3>

<div class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h4><?php the_title();?></h4>

<h5>基本情報</h5>

<p>Maker：<?php echo post_custom('Maker'); ?><br>
Finish：<?php echo post_custom('Finish'); ?></p>


<?php the_content(); ?>

<p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
    <br>
                    <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
        <i class="fab fa-twitter-square"></i> Tweet
    </a>
    <a class="sns__facebook" href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
        <i class="fab fa-facebook-square"></i> Shere
    </a>
    <a class="sns__hatena" href="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
        <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
    </a>
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
</p>
<?php endwhile; else: ?>

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>

<?php endif; ?>
</div>

<p class="nextPrev cf">
<span><?php previous_post_link('←前の記事「%link」', '%title', TRUE, ''); ?></span>
<span><?php next_post_link('「%link」次の記事→', '%title', TRUE, ''); ?></span>
</p>
</div>

<div id="side"><?php get_sidebar(); ?></div>
</div>
</section>

<?php elseif( in_category( array('12','13','14','15','16','17','18') ) ) : ?>

<section class="wrapper">
<h2><?php $cat = get_the_category(); $cat = $cat[0];?><?php echo $cat->cat_name; ?></h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><?php the_category(' '); ?></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<div class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h4><?php the_title();?></h4>
<?php 
    global $wpdb;
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
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
<p>Date：<?php echo $show_date; ?><br>
Venue：<?php echo $show_venue; ?></p>
<?php the_content(); ?>

                <p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
                    <br>
                    <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-twitter-square"></i> Tweet
                    </a>
                    <a class="sns__facebook" href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-facebook-square"></i> Shere
                    </a>
                    <a class="sns__hatena" href="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
                    </a>
                    <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
                </p>
<?php endwhile; else: ?>

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>

<?php endif; ?>
</div>

<p class="nextPrev cf">
<span><?php previous_post_link('←前の記事「%link」', '%title', TRUE, ''); ?></span>
<span><?php next_post_link('「%link」次の記事→', '%title', TRUE, ''); ?></span>
</p>
</div>

<div id="side"><?php get_sidebar(); ?></div>
</div>
</section>

<?php elseif( in_category( array('185') ) ) : ?>
<section class="wrapper">
<h2>SONGS</h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><?php the_category(' '); ?></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<h3><?php $cat = get_the_category(); $cat = $cat[0];?><?php echo $cat->cat_name; ?></h3>

<div class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h4><?php the_title();?></h4>

<h5>楽曲情報</h5>

<p>Original Key：<?php echo post_custom('KEY'); ?><br>
BPM：<?php echo post_custom('BPM'); ?></p>


<?php the_content(); ?>

                <p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
                    <br>
                    <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-twitter-square"></i> Tweet
                    </a>
                    <a class="sns__facebook" href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-facebook-square"></i> Shere
                    </a>
                    <a class="sns__hatena" href="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
                    </a>
                    <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
                </p>

<?php endwhile; else: ?>

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>

<?php endif; ?>
</div>

<p class="nextPrev cf">
<span><?php previous_post_link('←前の記事「%link」', '%title', TRUE, ''); ?></span>
<span><?php next_post_link('「%link」次の記事→', '%title', TRUE, ''); ?></span>
</p>
</div>

<div id="side"><?php get_sidebar(); ?></div>
</div>
</section>

<?php elseif( in_category( array('1','2') ) ) : ?>
<!-- EXTRA,MEDIA -->
<section class="wrapper">
<h2><?php $cat = get_the_category(); $cat = $cat[0];?><?php echo $cat->cat_name; ?></h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><?php the_category(' '); ?></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<div class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h4><?php the_title();?></h4>

<?php the_content(); ?>

                <p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
                    <br>
                    <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-twitter-square"></i> Tweet
                    </a>
                    <a class="sns__facebook" href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-facebook-square"></i> Shere
                    </a>
                    <a class="sns__hatena" href="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
                    </a>
                    <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
                </p>

<?php endwhile; else: ?>

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>

<?php endif; ?>
</div>

<p class="nextPrev cf">
<span><?php previous_post_link('←前の記事「%link」', '%title', TRUE, ''); ?></span>
<span><?php next_post_link('「%link」次の記事→', '%title', TRUE, ''); ?></span>
</p>
</div>

<div id="side"><?php get_sidebar(); ?></div>
</div>
</section>

<?php elseif( in_category( array('11','270') ) ) : ?>
<!-- BLOG,DUMMY -->
<section class="wrapper">
    <h2><?php $cat = get_the_category(); $cat = $cat[0];?><?php echo $cat->cat_name; ?></h2>
    
    <div class="inner cf">
        <ul id="pankuzu">
            <li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
            <li><?php the_category(' '); ?></li>
            <li><?php the_title();?></li>
        </ul>
        
        <div id="main">
            <div class="post">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                <h4><?php the_title();?></h4>
                
                <?php the_content(); ?>
                
                <p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
                    <br>
                    <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-twitter-square"></i> Tweet
                    </a>
                    <a class="sns__facebook" href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-facebook-square"></i> Shere
                    </a>
                    <a class="sns__hatena" href="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
                    </a>
                    <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
                </p>
                
                <?php endwhile; else: ?>
                
                <p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
                
                <?php endif; ?>
            </div>
            
            <?php comments_template(); ?>

            <p class="nextPrev cf">
                <span><?php previous_post_link('←前の記事「%link」', '%title', TRUE, ''); ?></span>
                <span><?php next_post_link('「%link」次の記事→', '%title', TRUE, ''); ?></span>
            </p>
        </div>
        
        <div id="side"><?php get_sidebar(); ?></div>
    </div>
</section>

<?php else: ?>

<section class="wrapper">
<h2><?php $cat = get_the_category(); $cat = $cat[0];?><?php echo $cat->cat_name; ?></h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><?php the_category(' '); ?></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<div class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h4><?php the_title();?></h4>

<?php the_content(); ?>

                <p class="categori"><?php the_category(' '); ?><?php the_tags( '', '' ); ?>
                    <br>
                    <a class="sns__twitter" href="javascript:window.open('http://twitter.com/share?hashtags=ミスチル機材&amp;via=TOOLBOX_M&amp;text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-twitter-square"></i> Tweet
                    </a>
                    <a class="sns__facebook" href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <i class="fab fa-facebook-square"></i> Shere
                    </a>
                    <a class="sns__hatena" href="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
                        <img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /> Bookmark
                    </a>
                    <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
                </p>

<?php endwhile; else: ?>

<p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>

<?php endif; ?>
</div>

<p class="nextPrev cf">
<span><?php previous_post_link('←前の記事「%link」', '%title', TRUE, ''); ?></span>
<span><?php next_post_link('「%link」次の記事→', '%title', TRUE, ''); ?></span>
</p>
</div>

<div id="side"><?php get_sidebar(); ?></div>
</div>
</section>

<?php endif; ?>

<?php get_footer(); ?>