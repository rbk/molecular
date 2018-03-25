<?php
/**
 * Homepage Template
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
					<div class="col-md-8 col-sm-8">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php 

							if( 'posts' == get_option( 'show_on_front' ) ) : 
								get_template_part( 'template-parts/content', 'excerpt' );
							else :
								get_template_part( 'template-parts/content', 'page' );
							endif;

						?>
						<?php endwhile; // end of the loop. ?>
						<?php molecular_posts_pagination(); ?>
					</div>
					<div class="col-md-4 col-sm-4">
						<?php get_sidebar(); ?>
					</div>
				</div>		
			</div><!-- .container-fluid -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>


