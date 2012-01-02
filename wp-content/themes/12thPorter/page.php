<?php get_header(); ?>

<div id="content">
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="pagetitle"><?php the_title(); ?></h2>
			<div class="entry">
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
</div></div>

<?php get_footer(); ?>