<?php
/*
Template Name:ALLSONGS
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
<h4><a href="/album/everything-1st-album/">EVERYTHING</a></h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>KEY</th>
<th>BPM</th>
<th>Data</th>
</tr>
<?php query_posts("cat=185&tag_id=161&showposts=7"); ?>
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
</div>
	
<div class="post">
<h4><a href="/album/kind-of-love-2nd-album/">Kind of Love</a></h4>

<table class="table_A equipment">
<tbody>
<tr>
<th>Title</th>
<th>KEY</th>
<th>BPM</th>
<th>Data</th>
</tr>
<?php query_posts("cat=185&tag_id=162&showposts=15"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/versus-3rd-album/">Versus</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=163&showposts=25"); ?>
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
</div>
	
<div class="post">
        <h4><a href="/album/atomic-heart-4th-album/">Atomic Heart</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=164&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/shinkai-5th-album/">深海</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=165&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/bolero-6th-album/">BOLERO</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=166&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/discovery-7th-album/">DISCOVERY</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=167&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/q-8th-album/">Q</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=169&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/its-a-wonderful-world-9th-album/">IT'S A WONDERFUL WORLD</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=172&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/shifuku-10th-album/">シフクノオト</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=173&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/i-love-u-11th-album/">I ♥ U</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=174&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/home-12th-album/">HOME</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=175&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/b-side-best-album/">B-SIDE</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=175&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/supermarket-fantasy-13th-album/">SUPERMARKET FANTASY</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=177&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/sense-14th-album/">SENSE</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=178&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/aibo-15th-album/">［(an imitation) blood orange］</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=181&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/juryoku-to-kokyu-17th-album/">重力と呼吸</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=183&showposts=25"); ?>
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
</div>

<div class="post">
        <h4><a href="/album/soundtracks-18th-album/">SOUNDTRACKS</a></h4>
        
        <table class="table_A equipment">
          <tbody>
          <tr>
            <th>Title</th>
            <th>KEY</th>
            <th>BPM</th>
            <th>Data</th>
          </tr>
          <?php query_posts("cat=185&tag_id=184&showposts=25"); ?>
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
</div>

</div>

<div id="side">
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer(); ?>