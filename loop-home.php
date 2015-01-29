<?php
/**
 * The home loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: http://codex.wordpress.org/The_Loop
 *
 * @package storefront
 */

do_action( 'storefront_loop_before' );

while ( have_posts() ) : the_post();

	/* Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	?>
	<aside class="home-post">
		<?php the_post_thumbnail(); ?>
		<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a><br>
		<a href="<?php the_permalink(); ?>" class="button blue">Read More</a>
	</aside>
	<?php

endwhile; 
/**
 * @hooked storefront_paging_nav - 10
 */
do_action( 'storefront_loop_after' );