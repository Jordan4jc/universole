<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
// Add logo field to customize section
function universole_theme_customizer( $wp_customize ) {
  $wp_customize->add_section('universole_logo_section' , array(
    'title'       => __( 'Logo', 'universole' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
	));
	$wp_customize->add_setting('universole_logo');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'universole_logo', array(
    'label'    => __( 'Logo', 'universole' ),
    'section'  => 'universole_logo_section',
    'settings' => 'universole_logo',
	)));
}
add_action('customize_register', 'universole_theme_customizer');

// Strip shortcode
function strip_code( $atts, $content ) {
	$content = preg_replace( "/\[\/strip\](\<br \/\>|\<\/p\>.?\<p\>).?\[strip/s", '[/strip][strip', $content );
   	return '<div class="strip">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'strip', 'strip_code' );