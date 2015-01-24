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

function universole_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'universole_mce_buttons_2');
/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

    $style_formats = array(  
        // Each array child is a format with it's own settings
        array(  
            'title' => 'White Button',  
            'selector' => 'a',  
            'classes' => 'button'             
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 