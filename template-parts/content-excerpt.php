<?php
/**
 * The template used for excerpts
 *
 * @package molecular
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt'); ?>>
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</h2>
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<?php molecular_posted_on(); ?>
	</div><!-- .entry-meta -->
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
