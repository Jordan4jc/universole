<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */
?>

<div class="hero-image">
	<?php the_post_thumbnail(); ?>
</div>
<?php
/**
 * @hooked storefront_page_header - 10
 * @hooked storefront_page_content - 20
 */
// do_action( 'storefront_page' );
the_content();
?>
