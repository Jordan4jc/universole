<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */
?>

<?php the_post_thumbnail(); ?>
<?php
/**
 * @hooked storefront_page_header - 10
 * @hooked storefront_page_content - 20
 */
// do_action( 'storefront_page' );
the_content();
?>
