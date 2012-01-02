<?php get_header(); ?>

<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
                        <p class="eventdeets"> <?php echo get_post_meta($post->ID, 'eventdetails', true) ?></p>
			<h2 class="pagetitle"><?php the_title(); ?></h2>

			<div class="entry">
                         <img class="alignright" href="<?php echo get_post_meta($post->ID, 'bandphoto', true) ?>" />
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>



			</div>
		</div>

<div style="width:500px;"><?php comments_template(); ?></div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
</div></div>

<?php get_footer(); ?>