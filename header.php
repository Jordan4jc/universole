<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script src="//use.typekit.net/hgy3qzw.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	global $woocommerce; 
	global $post;
	$page_slug = get_post( $post )->post_name;
?>
<div id="page-cart" role="complementary">
	<?php dynamic_sidebar( 'cart_widget_area' ); ?>
</div>
<div id="page">
	<div id="overlay"></div>
	<header>
		<nav>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<?php if ( get_theme_mod( 'universole_logo' ) ) : ?>
				  <img src='<?php echo esc_url( get_theme_mod( 'universole_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				<?php else : ?>
					<img src="<?php echo bloginfo('template_directory'); ?>/images/blue-ridge-arrangement-image-logo.png">
				<?php endif; ?>
			</a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php 
			if($page_slug == 'cart' || $page_slug == 'checkout'){
			} else {
				echo '<div class="cart">';
					echo '<a href="#" class="fa fa-shopping-cart"></a>';
					echo '<span class="number">'.$woocommerce->cart->cart_contents_count.'</span>';
				echo '</div>';
			}
			?>
		</nav>
	</header>