<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(' | ', true, 'right'); ?></title>
<!--[if lt IE 9]>
<script src="<?php echo RBK_THEME_DIR; ?>/js/compatibility/html5shiv.min.js"></script>
<script src="<?php echo RBK_THEME_DIR; ?>/js/compatibility/respond.min.js"></script>
<![endif]-->
<?php 

	// Customizer vars
	$logo 				= get_theme_mod('logo');
	$logo_width 		= get_theme_mod('logo_width');
	$mobile_logo 		= get_theme_mod('mobile_logo');
	$mobile_logo_width 	= get_theme_mod('mobile_logo_width');
	$center_logo_option = get_theme_mod('center_logo');
	$blog_description 	= get_option('blogdescription');
	$header_image 		= get_header_image();
	$header_text_color  = get_theme_mod('header_text_color');
	$hide_site_title 	= get_theme_mod('hide_site_title');
	$header_image_style = get_theme_mod('header_image_style');

?>
<script>
	// Set any variables you may need in your javascript
	var molecular_theme = {
		base_url: "<?php echo esc_url( home_url( '/' ) ); ?>",
		center_logo: "<?php echo $center_logo_option; ?>",
		logo: "<?php echo $logo; ?>",
		mobile_logo: "<?php echo $mobile_logo; ?>",
		logo_width: "<?php echo $logo_width; ?>",
		mobile_logo_width: "<?php echo $mobile_logo_width; ?>",
		blog_description: "<?php echo $blog_description; ?>"
	}
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php

		if( get_header_image() ) {
			$header_image = 'style="background-image: url('.get_header_image().')"';
		}

		// Determine logo width and override width
		if( $logo ){
			$l = getimagesize($logo);
			if( $logo_width && is_int( (integer)$logo_width ) ){
				if( !strpos($logo_width, 'px') ){
					$logo_width = $logo_width . 'px';
				}
			} else {
				$logo_width = $l[0] . 'px';
			}
		}

		// Determine mobile logo width and override width
		if( $mobile_logo  ){
			$ml = getimagesize($mobile_logo);
			if( $mobile_logo_width && is_int( (integer)$mobile_logo_width ) ){
				if( !strpos($mobile_logo_width, 'px') ){
					$mobile_logo_width = $mobile_logo_width . 'px';
				}
			} else {
				$mobile_logo_width = $ml[0] . 'px';
			}
		} else {
			// if no mobile logo just use logo
			$mobile_logo = $logo;
			if( $mobile_logo_width && is_int( (integer)$mobile_logo_width ) ){
				if( !strpos($mobile_logo_width, 'px') ){
					$mobile_logo_width = $mobile_logo_width . 'px';
				}
			} else {
				$mobile_logo_width = $logo_width;
			}
		}
	
	?>
	<header id="masthead" class="site-header <?php echo $header_image_style; ?>" role="banner" <?php echo $header_image; ?>>
		<div class="container-fluid">
				<div class="table">
						<div class="header-left-wrapper">
							<div class="site-branding <?php echo ( get_theme_mod('center_branding') ) ? 'text-align-center' : ''; ?>">
							<h1 id="site-title">
							<?php if( $logo ) : ?>
								<a id="logo" class="<?php echo ($center_logo_option) ? 'hide' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span><?php bloginfo( 'name' ); ?></span>
									<picture>
										<img 
										srcset="
										<?php echo $logo; ?>  <?php echo $l[0]; ?>w, 
										<?php echo $mobile_logo; ?>  <?php echo str_ireplace('px', '', $mobile_logo_width); ?>w"
										sizes="
										(max-width: 768px) <?php echo $mobile_logo_width; ?>,
										<?php echo $logo_width; ?>
										"
										src="<?php echo $logo; ?>" 
										alt="<?php bloginfo( 'name' ); ?>" />
									</picture>
								</a>
							<?php endif; ?>
							<?php if( !$hide_site_title ) : ?>
								<div><a id="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span><?php bloginfo( 'name' ); ?></span>
								</a></div>
							<?php endif; ?>
							</h1>
							<?php if( $blog_description ) : ?>
								<h2 id="site-description">
									<span><?php echo $blog_description; ?></span>
								</h2>
							<?php endif; ?>
							</div><!-- .site-branding -->
						</div><!-- end header-left-wrapper -->
						<div class="header-right-wrapper text-align-center">
							<?php if( has_nav_menu( 'small_menu' ) ) : ?>
								<nav id="small-navigation" role="navigation" aria-label="main navigation">
									<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'molecular' ); ?></a>
									<?php wp_nav_menu( array( 'theme_location' => 'small_menu' ) ); ?>
								</nav>
							<?php endif; ?>
							<div class="clearfix"></div>
							<?php get_search_form(); ?>
						</div><!-- end header-left-wrapper -->
				</div>
		</div><!-- .container-fluid -->
	</header><!-- #masthead -->
	
	<div id="mobile-navbar">
		<div class="wrap">	
			<a id="search-open" href="#search"><i class="fa fa-search"></i></a>
			<a id="mobile-menu-open" href="#menu"><i class="fa fa-bars"></i></a>
		</div>
	</div>

	<?php if( has_nav_menu( 'primary' ) ) : ?>

		<nav id="main-navigation" role="navigation" aria-label="main navigation">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'molecular' ); ?></a>
			<div class="container-fluid">
				<?php 
					wp_nav_menu( array( 
						'theme_location'  => 'primary',
						'items_wrap'      => '<ul id="top-nav-list" class="%2$s">%3$s</ul>'
					) ); 
				?>
			</div>
		</nav>
			
	<?php endif; ?>

	<div id="mobile-navigation-container" class="fadeIn">
		<a id="mobile-menu-close" href="#menuclose"><i class="fa fa-close"></i></a>
		<div class="container-fluid">
			<div id="form-container">
				<div class="row">
					<div class="col-md-6 col-sm-6 centered">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<?php 
				$menu_class = '';
				$mobile_menu_content = is_active_sidebar( 'mobile_menu_content' );
				$mobile_navigation = has_nav_menu( 'primary' );
				if( !$mobile_menu_content ){
					$menu_class = 'centered';
				}
			?>
			<div id="menu-content-container">
				<div class="row">		
					<div class="col-md-6 col-sm-6 auto-menu <?php echo $menu_class; ?>">
						<?php 
							if( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( array( 'theme_location' => 'primary' ) );
							} else {
								echo '<ul>';
								wp_list_pages("title_li=");
								echo '</ul>';
							}
						?>
					</div>
					<br>
					<?php if( $mobile_menu_content ) : ?>
						<div class="col-md-6 col-sm-6">
							<?php dynamic_sidebar( 'mobile_menu_content' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if( has_molecular_social() ) : ?>
				<div id="social-container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<?php echo molecular_social(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	
	<div id="content" class="site-content">
