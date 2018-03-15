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
					'prev_text' => '<i class="fa fa-arrow-left"></i> Previous',
					'next_text' => 'Next <i class="fa fa-arrow-right"></i>'
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
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'molecular' ); ?></h1>
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

/**
 * Returns true if a blog has more than 1 category.
 */
function molecular_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so molecular_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so molecular_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in molecular_categorized_blog.
 */
function molecular_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'molecular_category_transient_flusher' );
add_action( 'save_post',     'molecular_category_transient_flusher' );
