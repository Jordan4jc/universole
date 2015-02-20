<?php
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function universole_scritps() {
    wp_register_script('main', get_stylesheet_directory_uri().'/js/main.js', array('jquery'),null, true);
    
    wp_enqueue_script('main');
}
add_action( 'wp_enqueue_scripts', 'universole_scritps' );
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
        ),
        array(  
            'title' => 'Blue Button',  
            'selector' => 'a',  
            'classes' => 'button blue'             
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

// Add custom editor styles
function my_theme_add_editor_styles() {
    add_editor_style( 'editor.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );

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
                    <a href="<?php echo get_permalink(); ?>" class="button blue">Shop Now</a>
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

// remove parent theme widget areas
function remove_some_widgets(){
    unregister_sidebar( 'header-1' );
    unregister_sidebar( 'footer-2' );
    unregister_sidebar( 'footer-3' );
    unregister_sidebar( 'footer-4' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

// register custom widget areas
function register_widgets(){
    register_sidebar( array(
        'name'          => 'Cart Widget Area',
        'id'            => 'cart_widget_area',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'register_widgets', 11 );

function wp176545_add_feature_image() {
    echo get_the_post_thumbnail( get_option( 'woocommerce_shop_page_id' ) );
}
add_action('universole_shop_page_header', 'wp176545_add_feature_image');