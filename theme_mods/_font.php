<?php
function wp_molecular_customizer_register_font( $wp_customize ) {

	$available_fonts = 'Open+Sans|Roboto|Lato|Oswald|Roboto+Condensed|Montserrat|Source+Sans+Pro|Raleway|PT+Sans|Open+Sans+Condensed:300|Droid+Sans|Ubuntu|Roboto+Slab|Droid+Serif|Merriweather|Arimo|PT+Sans+Narrow|Noto+Sans|Titillium+Web|PT+Serif|Bitter';
	$google_font_url = 'https://fonts.googleapis.com/css?family=';
	$fonts = array(
		'default' => 'Theme Default (Roboto)',
		'Open Sans, sans-serif' => 'Open Sans, sans-serif',
		'Roboto, sans-serif' => 'Roboto, sans-serif',
		'Lato, sans-serif' => 'Lato, sans-serif',
		'Oswald, sans-serif' => 'Oswald, sans-serif',
		'Roboto Condensed, sans-serif' => 'Roboto Condensed, sans-serif',
		'Montserrat, sans-serif' => 'Montserrat, sans-serif',
		'Source Sans Pro, sans-serif' => 'Source Sans Pro, sans-serif',
		'Raleway, sans-serif' => 'Raleway, sans-serif',
		'PT Sans, sans-serif' => 'PT Sans, sans-serif',
		'Open Sans Condensed, sans-serif' => 'Open Sans Condensed, sans-serif',
		'Droid Sans, sans-serif' => 'Droid Sans, sans-serif',
		'Ubuntu, sans-serif' => 'Ubuntu, sans-serif',
		'Arimo, sans-serif' => 'Arimo, sans-serif',
		'PT Sans Narrow, sans-serif' => 'PT Sans Narrow, sans-serif',
		'Noto Sans, sans-serif' => 'Noto Sans, sans-serif',
		'Titillium Web, sans-serif' => 'Titillium Web, sans-serif',
		'Roboto Slab, serif' => 'Roboto Slab, serif',
		'Droid Serif, serif' => 'Droid Serif, serif',
		'Merriweather, serif' => 'Merriweather, serif',
		'PT Serif, serif' => 'PT Serif, serif',
		'Bitter, serif' => 'Bitter, serif'

	);
	$font_sizes = array();
	for( $i=8;$i<28;$i++ ){
		if( $i == 18 ){ // Set default
			$font_sizes[$i . 'px'] = 'Theme Default (' . $i . 'px)';
		} else {
			$font_sizes[$i . 'px'] = $i . 'px';
		}
	}
	
	// Add font section
	$wp_customize->add_section('fonts', array(
		'title' => 'Typography',
		'description' => __('Change the font family, size, and line height.', 'molecular'),
		'priority' => 31
	));

	// Heading Font
	$wp_customize->add_setting(
		'heading_font', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		'heading_font', 
		array(
			'label'      => __( 'Heading Font', 'molecular' ),
			'section'    => 'fonts',
			'settings'   => 'heading_font',
			'type'		 => 'select',
			'choices' => $fonts
		) 
	);

	// Body Font
	$wp_customize->add_setting(
		'body_font', 
		array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$fonts['default'] = 'Theme Default (Source Serif Pro)';

	$wp_customize->add_control( 
		'body_font', 
		array(
			'label'      => __( 'Body Font', 'molecular' ),
			'section'    => 'fonts',
			'settings'   => 'body_font',
			'type'		 => 'select',
			'choices' => $fonts
		) 
	);
	// Body Font Size
	$wp_customize->add_setting(
		'body_font_size', 
		array(
			'default'        => '16px',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		'body_font_size', 
		array(
			'label'      => __( 'Font Size', 'molecular' ),
			'section'    => 'fonts',
			'settings'   => 'body_font_size',
			'type'		 => 'select',
			'choices'	 => $font_sizes
		) 
	);
	// Body Font Line Height
	$wp_customize->add_setting(
		'body_font_lh', 
		array(
			'default'        => '1.8',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		'body_font_lh', 
		array(
			'label'      => __( 'Line Height', 'molecular' ),
			'section'    => 'fonts',
			'settings'   => 'body_font_lh',
			'type'		 => 'text',
			'description'=> 'Theme Default (1.5 no units)'
		) 
	);

}
add_action( 'customize_register', 'wp_molecular_customizer_register_font' );

function wp_molecular_customizer_fonts( ) {
?>
<style class="molecular-theme-customizer-typography">
/* Injected Via WordPress Customizer */
<?php
	
	$css = '';
	$body_css = '';
	$heading_font =  get_theme_mod( 'heading_font' );
	$body_font =  get_theme_mod( 'body_font' );
	$body_font_size =  get_theme_mod( 'body_font_size' );
	$body_font_line_height =  get_theme_mod( 'body_font_lh' );
	
	$font_import = '';
	$font1 = 'Roboto:400,700,300,900';
	$font2 = 'Source+Serif+Pro';


	if( !empty($heading_font) && $heading_font != 'default' ) {
		$heading_font = explode(',', $heading_font);
		$heading_font_css = '"' . $heading_font[0] . '",' . $heading_font[1];
		$heading_font_link = $heading_font[0];
		$css .= 'h1,h2,h3,h4,h5,h6, #site-title { font-family: '. $heading_font_css .' ;} ';
		$font1 = str_replace(' ', '+', $heading_font[0]);
	}
	if( !empty($body_font) && $body_font != 'default' ) {
		$body_font = explode(',', $body_font);
		$body_font_css = '"' . $body_font[0] . '",' . $body_font[1];
		$body_font_link = $body_font[0];
		$body_css .= 'font-family: '. $body_font_css .' ;';
		$body_font = str_replace(' ', '+', $body_font[0]);

		if( !strpos($font_import, $body_font ) ){
			$font2 = $body_font;
		}
	}

	if( $body_font_size ){
		$body_css .= 'font-size:' .$body_font_size . ';';
	}
	if( $body_font_line_height ){
		$body_css .= 'line-height:' .$body_font_line_height. ';';
	}

	$font_import = $font1 . '|' . $font2;
	
	echo '@import url(https://fonts.googleapis.com/css?family='. $font_import .');';
	echo "\r";
	echo 'body { ' . $body_css . '}';
	echo $css;
    
?></style><?php
}

add_action( 'wp_head', 'wp_molecular_customizer_fonts');




?>