<?php
/*
Template Name:ALLSONGS_old
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
<h4>EVERYTHING</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>KEY</th>
<th>BPM</th>
<th>Data</th>
</tr>
<?php query_posts("cat=12&showposts=7"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

<?php 
    $cat = get_the_category();
    $cat_slug = $cat[0]->slug;
  ?>
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
            <td><?php echo post_custom('KEY'); ?></td>
            <td><?php echo post_custom('BPM'); ?></td>
            <td class="data"><?php the_excerpt(); ?></td>
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/album/everything/">and more...</a></p>
</div>

<div class="post">
        <h4>Atomic Heart</h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=25&showposts=25"); ?>
          <?php if(have_posts()):while(have_posts()):the_post(); ?>
          
          <?php 
          $cat = get_the_category();
          $cat_slug = $cat[0]->slug;
          ?>
          <tr>
            <td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
            <td><?php echo post_custom('KEY'); ?></td>
            <td><?php echo post_custom('BPM'); ?></td>
            <td class="data"><?php the_excerpt(); ?></td>
          </tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/album/atomic-heart/">and more...</a></p>
</div>

      <div class="post">
        <h4>深海</h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=14&showposts=25"); ?>
          <?php if(have_posts()):while(have_posts()):the_post(); ?>
          
          <?php 
          $cat = get_the_category();
          $cat_slug = $cat[0]->slug;
          ?>
          <tr>
            <td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
            <td><?php echo post_custom('KEY'); ?></td>
            <td><?php echo post_custom('BPM'); ?></td>
            <td class="data"><?php the_excerpt(); ?></td>
          </tr>
          <?php endwhile;endif; ?>
          </tbody>
        </table>
        
        <p class="mb0"><a href="/archive/album/深海/">and more...</a></p>
      </div>

</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>