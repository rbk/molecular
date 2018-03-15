<?php


function wp_molecular_customizer_register_logo( $wp_customize ) {

   // logo
	$wp_customize->add_setting(
		'logo', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
   $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'logo',
           array(
               'label'      => __( 'Site logo', 'molecular' ),
               'section'    => 'title_tagline',
               'settings'   => 'logo',
               'context'    => '',
               'description'=> 'Use image with transparent background.'
           )
       )
   );


   // Logo Width
	$wp_customize->add_setting('logo_width', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('logo_width', array(
		'label'      => __('Logo Width Override (Pixels)', 'molecular'),
		'section'    => 'title_tagline',
		'settings'   => 'logo_width',
		'description'=> 'Override logo actual width. The height will automatically adjust image ratio. Only use pixel values.'
	));
      // Mobile logo
	$wp_customize->add_setting(
		'mobile_logo', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
   $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'mobile_logo',
           array(
               'label'      => __( 'Mobile logo (optional)', 'molecular' ),
               'section'    => 'title_tagline',
               'settings'   => 'mobile_logo',
               'context'    => '',
               'description'=> 'Replaces logo on smaller devices for more fine tuned mobile experience. Use an image twice the size you think for high pixel density displays.'
           )
       )
   );
    // Mobile Logo Width
	$wp_customize->add_setting('mobile_logo_width', array(
		'default'        => '150',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('mobile_logo_width', array(
		'label'      => __('Mobile Logo Width Override (Pixels)', 'molecular'),
		'section'    => 'title_tagline',
		'settings'   => 'mobile_logo_width',
		'description'=> 'Set the max width of your logo for mobile devices. Set this even if you do not have a mobile logo. This setting with affect the main logo on mobile devices.'
	));

	// Center Branding
	$wp_customize->add_setting('center_branding', array(
		'default'        => 0,
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('center_branding', array(
		'label'      => __('Center Branding', 'molecular'),
		'section'    => 'title_tagline',
		'settings'   => 'center_branding',
		'description'=> 'Check this box to center the logo, site title and/or tagline over the content area.',
		'type'		 => 'checkbox'
	));
	$wp_customize->add_setting('center_logo', array(
		'default'        => 0,
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('center_logo', array(
		'label'      => __('Center Logo', 'molecular'),
		'section'    => 'title_tagline',
		'settings'   => 'center_logo',
		'description'=> 'Check this box to center the logo over the site title and/or tagline.',
		'type'		 => 'checkbox'
	));

}
add_action( 'customize_register', 'wp_molecular_customizer_register_logo' );


?>