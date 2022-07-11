<?php
/*
Template Name:EQUIPMENT
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
<h4>SAKURAI's</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=6&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><a href="<?php bloginfo('url'); ?>/tag/<?php echo post_custom('Maker'); ?>"><?php echo post_custom('Maker'); ?></a></td>
<td><?php echo post_custom('Finish'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/sakurai/">and more...</a></p>
</div>

<div class="post">
<h4>TAHARA's</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=7&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><a href="<?php bloginfo('url'); ?>/tag/<?php echo post_custom('Maker'); ?>"><?php echo post_custom('Maker'); ?></a></td>
<td><?php echo post_custom('Finish'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/tahara/">and more...</a></p>
</div>

<div class="post">
<h4>NAKAGAWA's</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=8&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><a href="<?php bloginfo('url'); ?>/tag/<?php echo post_custom('Maker'); ?>"><?php echo post_custom('Maker'); ?></a></td>
<td><?php echo post_custom('Finish'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/nakagawa/">and more...</a></p>
</div>

<div class="post">
<h4>JEN's</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=9&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><a href="<?php bloginfo('url'); ?>/tag/<?php echo post_custom('Maker'); ?>"><?php echo post_custom('Maker'); ?></a></td>
<td><?php echo post_custom('Finish'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/jen/">and more...</a></p>
</div>

<div class="post">
<h4>KOUGUCHI's</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=10&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><a href="<?php bloginfo('url'); ?>/tag/<?php echo post_custom('Maker'); ?>"><?php echo post_custom('Maker'); ?></a></td>
<td><?php echo post_custom('Finish'); ?></td>
<td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/kougucgi/">and more...</a></p>
</div>
</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>