<?php
/**
 * Template name: Full Width - no sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package molecular
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php endwhile; // end of the loop. ?>
					</div>
				</div>		
			</div><!-- .container-fluid -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
