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
<li><a href="<?php bloginfo('url'); ?>">ジェン通 HOME</a></li>
<li><?php the_title();?></li>
</ul>

<div id="main">
<div class="post">
<h4>MAIN KITs</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=16&showposts=5"); ?>
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

<p class="mb0"><a href="/archive/kit/">and more...</a></p>
</div>

<div class="post">
<h4>Snares</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=3&showposts=5"); ?>
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

<p class="mb0"><a href="/archive/snares/">and more...</a></p>
</div>

<div class="post">
<h4>Cymbals</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=4&showposts=5"); ?>
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

<p class="mb0"><a href="/archive/cymbals/">and more...</a></p>
</div>

<div class="post">
<h4>Others</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Model</th>
<th>Maker</th>
<th>Finish</th>
<th>Data</th>
</tr>
<?php query_posts("cat=5&showposts=5"); ?>
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

<p class="mb0"><a href="/archive/others/">and more...</a></p>
</div>

</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>