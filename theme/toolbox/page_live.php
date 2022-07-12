<?php
/*
Template Name:LIVE
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
<h4>2021-</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Date</th>
<th>Venue</th>
</tr>
<?php query_posts("cat=18&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

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
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo $show_date; ?></td>
<td><?php echo $show_venue; ?></td> 
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/live-25/">and more...</a></p>
</div>
	
<div class="post">
<h4>2016-2020</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Date</th>
<th>Venue</th>
</tr>
<?php query_posts("cat=17&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

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
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo $show_date; ?></td>
<td><?php echo $show_venue; ?></td> 
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/live-20/">and more...</a></p>
</div>

<div class="post">
<h4>2011-2015</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Date</th>
<th>Venue</th>
</tr>
<?php query_posts("cat=16&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

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
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo $show_date; ?></td>
<td><?php echo $show_venue; ?></td> 
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/live-15/">and more...</a></p>
</div>

<div class="post">
<h4>2006-2010</h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>Date</th>
<th>Venue</th>
</tr>
<?php query_posts("cat=15&showposts=5"); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>

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
<tr>
<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
<td><?php echo $show_date; ?></td>
<td><?php echo $show_venue; ?></td> 
</tr>
<?php endwhile;endif; ?>
</tbody>
</table>

<p class="mb0"><a href="/archive/live-10/">and more...</a></p>
</div>

      <div class="post">
        <h4>2001-2005</h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Venue</th>
          </tr>
          <?php query_posts("cat=14&showposts=5"); ?>
          <?php if(have_posts()):while(have_posts()):the_post(); ?>
          
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
			<tr>
			<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
			<td><?php echo $show_date; ?></td>
			<td><?php echo $show_venue; ?></td> 
          </tr>
          <?php endwhile;endif; ?>
          </tbody>
        </table>
        
        <p class="mb0"><a href="/archive/live-05/">and more...</a></p>
      </div>
      
      <div class="post">
        <h4>1996-2000</h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Venue</th>
          </tr>
          <?php query_posts("cat=13&showposts=5"); ?>
          <?php if(have_posts()):while(have_posts()):the_post(); ?>
          
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
			<tr>
			<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
			<td><?php echo $show_date; ?></td>
			<td><?php echo $show_venue; ?></td> 
          </tr>
          <?php endwhile;endif; ?>
          </tbody>
        </table>
        
        <p class="mb0"><a href="/archive/live-00/">and more...</a></p>
      </div>
      
      <div class="post">
        <h4>-1995</h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Venue</th>
          </tr>
          <?php query_posts("cat=12&showposts=5"); ?>
          <?php if(have_posts()):while(have_posts()):the_post(); ?>
          
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
			<tr>
			<td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
			<td><?php echo $show_date; ?></td>
			<td><?php echo $show_venue; ?></td> 
          </tr>
          <?php endwhile;endif; ?>
          </tbody>
        </table>
        
        <p class="mb0"><a href="/archive/live-95/">and more...</a></p>
      </div>
</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>