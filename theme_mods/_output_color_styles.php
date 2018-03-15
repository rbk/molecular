<?php
function molecular_theme_customizer_colors( ){

	$header_color 					= get_theme_mod('molecular_header_color');
	$header_text_color 			= get_theme_mod('molecular_header_text_color');
	$body_text_color 				= get_theme_mod('molecular_body_text_color');
	$background_color 			= get_theme_mod('molecular_background_color');
  $top_nav_bg 						= get_theme_mod('molecular_top_nav_bg');
  $top_nav_bg_hover 			= get_theme_mod('molecular_top_nav_bg_hover');
  $top_nav_text 					= get_theme_mod('molecular_top_nav_text');
	$link_color 						= get_theme_mod('molecular_link_color');
	$link_color_hover 			= get_theme_mod('molecular_link_color_hover');
	$background_offset 			= get_theme_mod('molecular_background_offset');
	$background_text_offset = get_theme_mod('molecular_background_text_offset');
	$background_link_offset = get_theme_mod('molecular_link_color_offset');

	if( empty($header_color) ){
		$header_color = '#B11A1A';
	}

	if( empty($background_color) ){
		$background_color = '#fafafa';
	}

	if( empty($header_text_color) ){
		$header_text_color = '#ffffff';
	}

	if( empty($link_color_hover) ){
		$link_color_hover = colourBrightness( $link_color, .6 );
	}

	?>
	<style id="molecular-theme-customizer-colors">


		<?php if( $header_color ) : ?>
			#masthead {
				background-color: <?php echo $header_color ;?>;
			}
			#masthead #small-navigation ul li a:hover {
				color: <?php echo $header_color; ?>;
				border-color: <?php echo $header_text_color; ?>;
			}
		<?php endif; ?>

		<?php if( $header_text_color != '#ffffff' ) : ?>
			#masthead a,
			#masthead #site-title-link,
			#masthead #site-description,
			#masthead .search-submit,
			#masthead .search-form input[type="search"],
			#masthead #small-navigation ul li a {
				color: <?php echo $header_text_color; ?>;
			}
			#masthead .search-form input[type="search"] {
				border-bottom: 1px solid <?php echo $header_text_color; ?>;
			}
		    #masthead .search-form ::-webkit-input-placeholder { color: <?php echo $header_text_color; ?>; }
		    #masthead .search-form :-moz-placeholder { /* Firefox 18- */ color: <?php echo $header_text_color; ?>; }
		    #masthead .search-form ::-moz-placeholder { /* Firefox 19+ */ color: <?php echo $header_text_color; ?>; }
		    #masthead .search-form :-ms-input-placeholder { color: <?php echo $header_text_color; ?>; }

			#masthead #small-navigation ul li a {
				border: 1px solid <?php echo $header_text_color; ?>;
			}
			#masthead #small-navigation ul li a:hover {
				color: <?php echo $header_color; ?>;
				background-color: <?php echo $header_text_color; ?>;
			}
			body.mobile #mobile-menu-toggle {
				border-color: <?php echo $header_text_color; ?>;
			}
			body.mobile #mobile-menu-toggle:hover {
				border-color: <?php echo $header_text_color; ?>;
				background-color: <?php echo $header_text_color; ?>;
			}
			body.mobile #mobile-menu-toggle span {
				border-color: <?php echo $header_text_color; ?>;
			}
		<?php endif; ?>

		/*Top navigation*/
		<?php if( $top_nav_bg ) : ?>
			#mobile-navbar {
				background-color: <?php echo $top_nav_bg; ?>;
			}
			#main-navigation ul li a,
			#main-navigation {
				background-color: <?php echo $top_nav_bg; ?>;
			}
		<?php endif; ?>

		/*Top Navigation Text Color*/
		<?php if( $top_nav_text ) : ?>
			#main-navigation ul li a,
			#main-navigation {
				color: <?php echo $top_nav_text; ?>;
			}
			#main-navigation ul li a:hover,
			#main-navigation ul.sub-menu li a:hover,
			#main-navigation ul li a:focus,
			#main-navigation ul.sub-menu li a:focus,
			#main-navigation li.current-menu-item > a {
				color: <?php echo $top_nav_text; ?>;
			}
		<?php endif; ?>
		<?php if( $top_nav_bg_hover ) : ?>
			#main-navigation ul li a:hover,
			#main-navigation ul.sub-menu li a:hover,
			#main-navigation ul li a:focus,
			#main-navigation ul.sub-menu li a:focus {
				background-color: <?php echo $top_nav_bg_hover; ?>;
			}
			#main-navigation li.current-menu-item > a {
				background-color: <?php echo $top_nav_bg_hover; ?>;

			}
		<?php endif; ?>

		/*Body Background Color*/
		<?php if( $background_color != '#fafafa' ) : ?>
			body {
				background-color: <?php echo $background_color ;?>;
			}
		<?php endif; ?>

		/*Body Text Color*/
		<?php if( $body_text_color ) : ?>
			body {
				color: <?php echo $body_text_color ;?>;
			}
			td, th {
				border: 1px solid <?php echo $body_text_color; ?>;
			}
			#comments .comment {
				border-left: 1px dotted <?php echo $body_text_color; ?>;
			}
		<?php endif; ?>

		/*Link Color*/
		<?php if( $link_color ) : ?>

			#colophon .molecular_social a,
			a, a:focus {
				color: <?php echo $link_color ;?>;
			}
			::-moz-selection,
			::selection {
				background: <?php echo $link_color ;?>;
			}
			q,
			blockquote,
			pre {
				border-left: 6px solid <?php echo $link_color ;?>;
			}
			@media only screen and (min-width: 992px) {
				article.sticky {
					border-left: 6px solid <?php echo $link_color ;?>;
				}
			}

			/*ISSUE*/
			.button:not(.search-submit),
			input[type=submit],
			#submit {
				background-color: <?php echo $link_color; ?>;
				color: <?php echo $background_color; ?>;
			}
			.button:not(.search-submit):hover,
			input[type=submit]:hover,
			#submit:hover{
				background-color: <?php echo $link_color_hover; ?>;
				color: <?php echo $background_color; ?>;
			}

		<?php endif; ?>
		/*Link Hover Color*/
		<?php if( $link_color_hover ) : ?>
			a:hover {
				color: <?php echo $link_color_hover; ?>;
			}
			#colophon .molecular_social a:hover,
			#colophon .molecular_social a:focus {
				color: <?php echo $link_color_hover; ?>;
			}
		<?php endif; ?>

		/*Background Offsets*/
		<?php if( $background_offset ) : ?>
			q,
			blockquote,
			pre,
			#colophon {
				background-color: <?php echo $background_offset; ?>;
			}
			@media only screen and (min-width: 992px) {
				article.sticky {
					background-color: <?php echo $background_offset; ?>;
				}
			}
		<?php endif; ?>

		/*Background Text Offsets*/
		<?php if( $background_text_offset ) : ?>
			q,
			blockquote,
			pre,
			article.sticky,
			#colophon {
				color: <?php echo $background_text_offset; ?>;
			}
		<?php endif; ?>

		/*Link offset*/
		<?php if( $background_link_offset ) : ?>
			q a,
			blockquote a,
			pre a,
			article.sticky a,
			#colophon a {
				color: <?php echo $background_link_offset; ?>;
			}
		<?php endif; ?>

	</style>
	<?php
}
add_action( 'wp_head', 'molecular_theme_customizer_colors');
?>
