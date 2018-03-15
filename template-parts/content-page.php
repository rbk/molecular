<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package molecular
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( !is_front_page() ) : ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if( has_post_thumbnail( ) ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">

		<?php the_content('more'); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'molecular' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	?>
	<?php edit_post_link( __( 'Edit', 'molecular' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
