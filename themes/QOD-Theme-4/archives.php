<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div class="post archives">

	<?php query_posts('showposts=1000'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

    <?php endif; ?>
	
</div>

<?php get_footer(); ?>