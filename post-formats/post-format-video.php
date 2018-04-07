<?php
/**
 * Video Post Format
 *
 * @category Video
 * @package  Molecular
 * @author   Richard Keller <richard@richardkeller.net>
 * @license  Na https://blog.richardkeller.net/license
 * @version  PHP: 5.6.3 
 * @link     idk
 */
?>
<article class="excerpt">
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink() ?>">VIDEO:&nbsp<?php the_title(); ?></a>
		</h2>
  </header><!-- .entry-header -->
	<div class="entry-meta">
		<?php molecular_posted_on(); ?>
	</div><!-- .entry-meta -->
  <?php the_content(); ?>
</article>
