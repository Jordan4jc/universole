<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				do_action( 'storefront_page_before' );
				?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			<?php 
			$args = array(
			'post_type' => 'product',
			'product_category' => 'sandals',
			'product_status' => 'publish',
			'posts_per_page' => -1
			);
			$isEven;
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				echo '<div class="sandals">';
				while ( $loop->have_posts() ) : $loop->the_post();
					echo '<section class="inner-grid">';
					echo '<aside class="col half">';
					the_post_thumbnail();
					echo '</aside>';
					echo '<aside class="col half">';
					the_title('<h2>','</h2>');
					the_content();
					echo '<a class="button blue" href="'.get_permalink().'">View in the Shop</a>';
					echo '</aside>';
					$isEven = ! $isEven;
					echo '</section>';
				endwhile;
				echo '</div>';
			} else {
				echo __( 'No products found' );
			}
			wp_reset_postdata();
			?>

<?php get_footer(); ?>
