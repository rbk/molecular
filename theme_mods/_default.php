<?php
	function molecular_customizer_register_default( $wp_customize ) {

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
		$wp_customize->remove_control('display_header_text');
		$wp_customize->remove_control('header_textcolor');
		$wp_customize->remove_control('background_color');

	}
	add_action( 'customize_register', 'molecular_customizer_register_default' );
?>