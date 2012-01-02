<?php
/*
Template Name: Media
*/
?>
<?php get_header(); ?>

<div id="content" class="media">
 <div id="media_left">
  <div class="logotype textCenter"> <img src="<?php bloginfo('template_directory'); ?>/images/autumattic.png" width="155" height="137" /><img src="<?php bloginfo('template_directory'); ?>/images/logotype_aa.png" width="174" height="23" /></div>
  
  <p><strong>JUSTIN RODDICK</strong><br />
Partner/Producer<br />
<a href="mailto:justin@autumnaddict.com">Justin@autumnaddict.com</p></a>

<p><strong>DANIEL SLEZINGER</strong><br />
Partner/Producer<br />
<a href="mailto:daniel@autumnaddict.com">Daniel@autumnaddict.com</p></a>

<p><strong>JESSICA PHILLIPS</strong><br />
Booking Assistant<br />
<a href="mailto:jessica@autumnaddict.com">Jessica@autumnaddict.com</p></a>
  
  </div>
 <div id="media_right">
  <div class="top"></div>
   <div class="middle">
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
        <h2 class="pagetitle"><?php the_title(); ?></h2>
            <div class="entry">
                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
  <!--<h3><a class="posttitle" href="#">Section Links</a></h3>-->


            </div>
        </div>
        <?php endwhile; endif; ?>
   </div>
  <div class="bottom"></div>
  
  <div class="top"></div>
   <div class="middle">
    <div class="post">
<h2 class="pagetitle">Videos</h2>
     <div class="entry">
     <?php
    $recentPosts = new WP_Query();
    $recentPosts->query('page_id=143');
?>
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>

     </div>
    </div>
   </div>
  <div class="bottom"></div>  
 </div>
</div>
</div>

<?php get_footer(); ?>
