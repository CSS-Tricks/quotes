<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

			<p class="author">&mdash; <?php the_title(); ?></p>
			
			<?php the_meta(); ?>

			
		</div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>