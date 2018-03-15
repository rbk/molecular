<?php
// Header Options
function molecular_theme_customizer_register_header_options( $wp_customize ) {

	$wp_customize->add_setting('header_image_style', array(
		'default'        => 'tile',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		'header_image_style', 
		array(
			'label'      => __('Header Image Style', 'molecular'),
			'section'    => 'header_image',
			'priority'   => 2,
			'settings'   => 'header_image_style',
			'type'		 => 'radio',
			'choices' => array(
				'tile' => __('Tile - Image repeats. Good for using patterns.', 'molecular'),
				'stretch' => __('Stretch - Image covers background. ', 'molecular')
			)
		) 
	);
	$wp_customize->add_setting('hide_site_title', array(
		'default'        => 0,
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		'hide_site_title', 
		array(
			'label'      => __('Hide Site Title', 'molecular'),
			'section'    => 'title_tagline',
			'priority'   => 2,
			'settings'   => 'hide_site_title',
			'type'		 => 'checkbox'
		) 
	);
}
add_action( 'customize_register', 'molecular_theme_customizer_register_header_options' );


?>