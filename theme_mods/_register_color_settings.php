<?php

function wp_molecular_customizer_register_colors( $wp_customize ) {

	$customizer_colors = array(
	    'molecular_header_color' => 'Header Background Color',
	    'molecular_header_text_color' => 'Header Text Color',
	    'molecular_background_color' => 'Body Background Color',
	    'molecular_body_text_color' => 'Body Text Color',
	    'molecular_top_nav_bg' => 'Top Navigation Background Color',
	    'molecular_top_nav_bg_hover' => 'Top Navigation Background Color Hover',
	    'molecular_top_nav_text' => 'Top Navigation Text Color',
	    'molecular_link_color' => 'Link Color',
	    'molecular_link_color_hover' => 'Link Color Hover'
	);
	foreach( $customizer_colors  as $id => $label ){
		$wp_customize->add_setting(
			$id, 
			array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'type'           => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);		
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			$id, 
			array(
				'label'      => $label,
				'section'    => 'colors',
				'settings'   => $id
			) ) 
		);
	}
	$wp_customize->add_setting(
		'molecular_background_offset', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);		
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'molecular_background_offset', 
		array(
			'label'      => 'Background Color Offset',
			'section'    => 'colors',
			'settings'   => 'molecular_background_offset',
			'description' => __('Affects the footer, sticky post, and quote','molecular')
		) ) 
	);
	$wp_customize->add_setting(
		'molecular_background_text_offset', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);		
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'molecular_background_text_offset', 
		array(
			'label'      => 'Background Color Text Offset',
			'section'    => 'colors',
			'settings'   => 'molecular_background_text_offset',
			'description' => __('Affects the footer, sticky post, and quote','molecular')
		) ) 
	);
	$wp_customize->add_setting(
		'molecular_link_color_offset', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);		
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'molecular_link_color_offset', 
		array(
			'label'      => 'Link Offset Color',
			'section'    => 'colors',
			'settings'   => 'molecular_link_color_offset'
		) ) 
	);


}
add_action( 'customize_register', 'wp_molecular_customizer_register_colors' );
?>