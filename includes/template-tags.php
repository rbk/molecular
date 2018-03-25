<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package molecular
 */
if( ! function_exists( 'molecular_posts_pagination' ) ) :

	function molecular_posts_pagination( ) {
		?>
		<div class="post-pagination" role="navigation">
			<?php
				the_posts_pagination(array(
					'mid_size' => 5,
					'prev_text' => '<i class="fa fa-arrow-left"></i> ' . __('Previous', 'molecular'),
					'next_text' => __('Next', 'molecular') . '<i class="fa fa-arrow-right"></i>'
				));
			?>
		</div>
		<?php
	}

endif;

if ( ! function_exists( 'molecular_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function molecular_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php __( 'Post navigation', 'molecular' ); ?></h1>
		<div class="post-nav-links">
			<?php previous_post_link( '%link', _x( '<span class="meta-nav-left"><i class="fa fa-arrow-left"></i>%title</span> ', 'Previous post link', 'molecular' ) ); ?>
			<?php next_post_link(     '%link', _x( ' <span class="meta-nav-right">%title<i class="fa fa-arrow-right"></i></span>', 'Next post link',     'molecular' ) ); ?>
			<div class="clearfix"></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'molecular_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function molecular_posted_on() {
	$author_name = get_the_author();
	$author_link = get_author_posts_url( get_the_author_meta( "ID" ) );
	echo '<a href="'.$author_link.'">'.$author_name .'</a> &#10148 ' . get_the_date();
}
endif;
?>
