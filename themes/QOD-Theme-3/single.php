<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<?php 
			
				ob_start();
				the_content();
				$content = ob_get_clean();
				
				$shortVersion = strip_tags(substr($content, 0, 108)) . "... ";
				
				$numWords =  sizeof(explode(" ", $content));
				
				echo "<div class='cuf' style='";
				
				if (($numWords >= 1) && ($numWords < 10)) {
			        echo "font-size: 42px;";
			    }
			    else if (($numWords >= 10) && ($numWords < 20)) {
			        echo "font-size: 38px;";
			    }
			    else if (($numWords >= 20) && ($numWords < 30)) {
			        echo "font-size: 32px;";
			    }
			    else if (($numWords >= 30) && ($numWords < 40)) {
			        echo "font-size: 28px;";
			    }
			    else {
			        echo "font-size: 24px;";
			    }
				
				echo "'>";
				
				echo $content;
				
				echo "</div>";
							
			?>

			<p class="author">
				&mdash; <?php the_title(); ?>
				<br />
				<a id='perma' href='<?php the_permalink(); ?>'>[ permalink ]</a>
				<br />
				<a id="twitter" href="http://twitter.com/home?status=<?php echo $shortVersion ?> http://quotesondesign.com/?p=<?php the_ID(); ?>">[ Tweet This ]</a>
				<br />
				
				<?php $source = get_post_meta($post->ID, 'Source', true); 
				   if ($source) { ?>
					<span id="source">[ Source: <?php echo $source; ?>  ]</span>
				<?php } ?>
			</p>			
		</div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
