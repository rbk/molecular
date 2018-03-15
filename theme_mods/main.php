<?php 

/**
 *  Main file for all customizer includes
 */
function molecular_customizer_live_preview() {
 
    wp_enqueue_script(
        'built-in-theme-customizer',
        get_template_directory_uri() . '/theme_mods/js/built-in-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0.0.1',
        true
    );
 
}
add_action( 'customize_preview_init', 'molecular_customizer_live_preview' );

include('_default.php');
include('_register_color_settings.php');
include('_output_color_styles.php');
include('_font.php');
include('_social.php');
include('_logo.php');
include('_header_options.php');


?>