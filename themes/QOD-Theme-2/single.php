<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<?php 
			
				ob_start();
				the_content();
				$content = ob_get_clean();
				
				$numWords =  sizeof(explode(" ", $content));
				
				echo "<div class='cuf' style='";
				
				if (($numWords >= 1) && ($numWords < 10)) {
			        echo "font-size: 36px;";
			    }
			    else if (($numWords >= 10) && ($numWords < 20)) {
			        echo "font-size: 32px;";
			    }
			    else if (($numWords >= 20) && ($numWords < 30)) {
			        echo "font-size: 28px;";
			    }
			    else if (($numWords >= 30) && ($numWords < 40)) {
			        echo "font-size: 24px;";
			    }
			    else {
			        echo "font-size: 20px;";
			    }
				
				echo "'>";
				
				echo $content;
				
				echo "</div>";
							
			?>

			<p class="author">&mdash; <?php the_title(); ?></p>
			
			<?php the_meta(); ?>
			
		</div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>