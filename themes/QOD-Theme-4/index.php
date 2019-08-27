<?php get_header(); ?>

<?php query_posts('showposts=1&orderby=rand'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		ob_start();
		the_content();
		$content = ob_get_clean();
		$shortVersion = strip_tags(substr($content, 0, 108)) . "... ";
	?>

	<div class="post" id="post-<?php the_ID(); ?>">

		<div id="quote-content">
			<?php the_content(); ?>
		</div>

		<p class="author">

			<span id="quote-title-dash">&mdash;</span> <span id="quote-title"><?php the_title(); ?></span>

			<span id="quote-source">
				<?php if ($source = get_post_meta( $post->ID, 'Source', true )) : ?>
					Source:
					<?php
						echo wp_kses( $source, array(
							'a' => array(
								'href' => array(),
								'title' => array()
							)
						) );
					?>
				<?php endif; ?>
			</span>

		</p>

	</div>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<div id="quote-button-wrapper">
  <a href="/" id="get-another-quote-button">
  	Get another random design quote
  </a>
</div>

<?php get_footer(); ?>