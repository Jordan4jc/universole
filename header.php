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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<header>
		<div class="col-full">
			<nav>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
					<?php if ( get_theme_mod( 'universole_logo' ) ) : ?>
					  <img src='<?php echo esc_url( get_theme_mod( 'universole_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					<?php else : ?>
						<img src="<?php echo bloginfo('template_directory'); ?>/images/blue-ridge-arrangement-image-logo.png">
					<?php endif; ?>
				</a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
		</div>
	</header>