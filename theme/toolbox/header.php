<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="<?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' | '; } bloginfo('description'); ?>" />
<title><?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' | '; } bloginfo('name'); ?> | Mr.Children 使用楽器・機材のデータベース。非公式ファンサイト。</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory');?>/css/style.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory');?>/css/jquery.bxslider.css" rel="stylesheet">
</head>

<body>
<div id="loader"><div><img src="<?php bloginfo('template_directory');?>/img/loader.gif" alt="now loading..."></div></div>

<header>
<div class="inner cf">
<h1><?php echo trim(wp_title('', false)); if(wp_title('', false)) { echo ' | '; } bloginfo('name'); ?> | Mr.Children 使用楽器・機材のデータベース。非公式ファンサイト。</h1>
<p><a href="<?php bloginfo('url'); ?>"><strong>TOOLBOX</strong>Mr.Children's Music Equipment Detabase</a></p>

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
<li><a href="<?php bloginfo('url'); ?>/archive/sakurai/">SAKURAI's</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/tahara/">TAHARA's</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/nakagawa/">NAKAGAWA's</a></li>
<li><a href="https://jen.mrchildren.tools/" target="_blank" rel="noopener noreferrer">JEN's</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/kouguchi/">KOUGUCHI's</a></li>
</ul>
</li>
<li><a href="#">DATA<span>その他データ</span></a>
<ul>
<li><a href="<?php bloginfo('url'); ?>/live/">LIVE</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/media/">MEDIA</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/songs/">SONGS</a></li>
</ul>
</li>
<li><a href="#">COMMUNITY<span>交流</span></a>
<ul>
<li><a href="/bbs_live/yybbs.cgi">LIVE BOARD</a></li>
<li><a href="<?php bloginfo('url'); ?>/archive/blog/">BLOG</a></li>
<li><a href="https://twilog.org/TOOLBOX_M" target="_blank" rel="noopener noreferrer">Twilog</a></li>
</ul>
</li>
</ul>
</nav>
</div>
</header>