<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="<?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' | '; } bloginfo('description'); ?>" />
<title><?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' | '; } bloginfo('name'); ?> | Mr.Children・鈴木"JEN"英哉 使用楽器・機材のデータベース。非公式ファンサイト。</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory');?>/css/style.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory');?>/css/jquery.bxslider.css" rel="stylesheet">
</head>

<body>

<div id="loader"><div><img src="<?php bloginfo('template_directory');?>/img/loader.svg" alt="now loading..." width="50"></div></div>

<header>
<div class="inner cf">
<h1><?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' | '; } bloginfo('name'); ?> | Mr.Children・鈴木"JEN"英哉 使用楽器・機材のデータベース。非公式ファンサイト。</h1>
<p><a href="<?php bloginfo('url'); ?>"><strong>ジェン通</strong>-the box filled with JEN's tools-</a></p>

<label class="toggle" for="open">
<span class="navBtn">
<span></span>
<span></span>
<span></span>
</span>
</label>
<input id="open" type="checkbox">
<div id="navBg"></div>

<nav>
<ul class="cf">
<li><a href="<?php bloginfo('url'); ?>">HOME<span>ホーム</span></a></li>
<li><a href="<?php bloginfo('url'); ?>/equipment/">EQUIPMENT<span>楽器・機材</span></a>
<ul>
<li><a href="<?php bloginfo('url'); ?>/archive/kit/">MAIN KITs</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/snares/">Snares</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/cymbals/">Cymbals</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/others/">Others</a></li>
<li><a href="<?php bloginfo('url'); ?>/history_main/">HISTORY</a></li>
</ul>
</li>
<!-- LIVE情報ページ追加 -->
<li><a href="<?php bloginfo('url'); ?>/live/">LIVE<span>ライブ</span></a>
<ul>
<li><a href="<?php bloginfo('url'); ?>/archive/live-00/">〜2000</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/live-05/">2000〜2005</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/live-10/">2006〜2010</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/live-15/">2011〜2015</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/live-20/">2016〜2020</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/live-25/">2021〜</a></li>
</ul>
</li>
<!-- 追加ここまで -->
	
<li><a href="<?php bloginfo('url'); ?>/archive/blog/">BLOG<span>ブログ</span></a></li>
</ul>
</nav>
</div>
</header>