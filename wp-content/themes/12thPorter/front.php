<?php
/*
Template Name: Front
*/
?>
<?php get_header(); ?>
 <div id="content">
 <div id="frontleft">
  <div id="social">
<a href="http://twitter.com/12th_and_Porter"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" width="29" height="29" /></a>
<a href="http://www.facebook.com/#!/12thandPorter"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" width="24" height="29" /></a>
<a href="http://www.myspace.com/12thandporter"><img src="<?php bloginfo('template_directory'); ?>/images/myspace.png" width="34" height="29" /></a>
<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" width="29" height="29" /></a>
</div>
  
<div id="rotator">
 <?php wp_cycle(); ?>
  </div>
  <div id="calendar">
   <h4>This Week</h4>
   <div id="calendar_inner">Loading Upcoming Events...</div>
    <script type="text/javascript" src="http://www.ticketweb.com/snl/eventlist/TWEventAPIPlugin.js"></script>
    <script type="text/javascript">
      TwEventList.create("calendar_inner", {
        dataUrl : "http://www.ticketweb.com/snl/EventAPI.action?key=L8riEir5Jf4czPX211i5&version=1&venueId=25638&method=json"
      });
    </script>

  </div>
  
  <div id="news">
   <h4>Newsworthy</h4>
  
<?php
    $recentPosts = new WP_Query();
    $recentPosts->query('posts_per_page=2&cat=-4');
?>
<?php if($recentPosts->have_posts()): while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

<div class="post">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <p class="postmetadata"><?php the_time('F jS, Y') ?> | <?php comments_popup_link('0 Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
    <div class="entry">
   <?php the_excerpt(); ?>
    </div> 
   </div>  

<?php endwhile; endif; ?>
 
  </div>
 </div>
 <div id="frontright">
  <div class="comingup">
    <h4>Coming Up</h4>
<ul>
<?php
    $recentPosts = new WP_Query();
    $recentPosts->query('posts_per_page=5&cat=4');
?>
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'front-page-flyer' ); ?></a></li>
<?php endwhile; ?>
</ul>
    

</div>
 
 <div id="a12thtwitter">
  <h5 class="twittertitle">12th & twitter</h5>

   <?php //twitter_messages('12th_and_Porter', 3, true, false, 'link', true, true, false); ?>

 </div>
   <a class="followus" href="http://www.twitter.com/12th_and_Porter">follow us on twitter</a>
 
 </div><div class="clear"></div>
 </div></div>

<?php get_footer(); ?>
