<?php
/*
Template Name: Video
*/
?>
<?php get_header(); ?>

<div id="content">
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="pagetitle"><?php the_title(); ?></h2>
			<div class="entry">
            
            <div class="videoinfo">
             <div class="video floatLeft">
             <?php echo get_post_meta($post->ID, 'videoembed', true) ?>
             </div>
             <div id="videometa" class="floatRight">
              <h2><?php echo get_post_meta($post->ID, 'artistname', true) ?></h2>
              <p class="eventdeets"><?php echo get_post_meta($post->ID, 'eventdetails', true) ?></p>
              <p><?php echo get_post_meta($post->ID, 'eventdescription', true) ?></p>
<?php $tixcheck=get_post_meta($post->ID, 'ticketpurchaselink', true); ?>
<?php if ( $tixcheck ) { ?>

<a class="buytix" href="<?php echo get_post_meta($post->ID, 'ticketpurchaselink', true) ?>">buy tickets</a>
<?php  } ?>
              


             </div>
            <div class="clear"></div>
            </div><h2 class="pagetitle" style="margin-top: 20px; margin-bottom: 10px !important">Video Vault</h2>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
  <!--<h3><a class="posttitle" href="#">Section Links</a></h3>-->
<ul class="section_children">
<?php
$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
if ($children) { ?>

      <?php echo $children; ?> 

<?php } ?>
</ul>

			</div>
		</div>
		<?php endwhile; endif; ?>
</div>
</div>
<?php get_footer(); ?>

