<?php
/*
Template Name:SONGS
*/
?>

<?php get_header(); ?>
<section class="wrapper">
<h2><?php the_title();?></h2>

<div class="inner cf">
<ul id="pankuzu">
<li><a href="<?php bloginfo('url'); ?>">TOOLBOX HOME</a></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<div class="post">
<h4>ALBUM</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Release</th>
<th>Data</th>
</tr>
<?php query_posts("cat=12&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo post_custom('Release'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/album/">and more...</a></p>
</div>

<div class="post">
<h4>SINGLE</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Release</th>
<th>Data</th>
</tr>
<?php query_posts("cat=13&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo post_custom('Release'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/single/">and more...</a></p>
</div>

<div class="post">
<h4>OTHER</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Release</th>
<th>Data</th>
</tr>
<?php query_posts("cat=18&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo post_custom('Release'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/other/">and more...</a></p>
</div>

</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>