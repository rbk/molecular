<?php
$social_networks = array(
	'reddit',
	'rss',
	'google',
	'github',
	'codepen',
	'facebook',
	'instagram',
	'twitter',
	'linkedin',
	'youtube',
	'vimeo',
	'pinterest',
	'soundcloud'

);
function wp_molecular_customizer_register_social( $wp_customize ) {
	global $social_networks;
	$wp_customize->add_section('social', array(
		'title' => __('Social Links', 'molecular'),
		'description' => __('Link to your social networks here. Full url to your social network page required.', 'molecular'),
		'priority' => 31
	));

	foreach( $social_networks as $social ){

		$wp_customize->add_setting(
			$social, 
			array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'type'           => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control( 
			$social, 
			array(
				'label'      => ucfirst($social),
				'section'    => 'social',
				'settings'   => $social,
				'type'		 => 'text'
			) 
		);

	}

}
add_action( 'customize_register', 'wp_molecular_customizer_register_social' );

/**
 * Social icons for website
 * @return string/html 
 */
function molecular_social() {

	global $social_networks;
	$network_count = 0;
	$links = array();
	foreach( $social_networks as $network ){
		$link = get_theme_mod($network);
		if( $link ){
			$links[$network] = $link;
			$network_count++;
		}
	}
	if( $network_count >= 1 ){
		echo '<div class="molecular_social">';
		foreach( $links as $network => $link ){
			echo _x("<a target='_blank' class='social-icon fa fa-$network' href='$link'><span info='should add label'>/span></a>", 'molecular');
		}
		echo '</div>';
	}
}
function has_molecular_social( ){
	global $social_networks;
	$network_count = 0;
	$links = array();
	foreach( $social_networks as $network ){
		$link = get_theme_mod($network);
		if( $link ){
			$links[$network] = $link;
			$network_count++;
		}
	}
	if( count($link) > 0 ){
		return true;
	} else {
		return false;
	}
}
?>
