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
            'classes' => 'button white'             
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

// Custom product shortcode
// Add Shortcode
function shop_item_shortcode( $atts ) {
    ob_start();

    // Attributes
    extract( shortcode_atts(
        array(
        'sku' => 'none'
        ), $atts )
    );

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 1,
        'meta_key' => '_sku', 
        'meta_value' => $sku
        );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) { ?>
        <ul class="clothes-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <aside class="shop-item">
                <div class="info">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                    <a href="<php echo get_permalink(); ?>" class="button blue">Shop Now</a>
                </div>
                <?php the_post_thumbnail(); ?>
            </aside>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}
add_shortcode( 'shop-item', 'shop_item_shortcode' );