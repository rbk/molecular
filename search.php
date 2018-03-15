<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package molecular
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid">
				
				<div class="row">
					
					<div class="col-md-8 col-sm-8">
						
					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'molecular' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

						<?php endwhile; ?>
						
						<?php molecular_posts_pagination(); ?>

					<?php else : ?>

						<section class="no-results not-found">
							<header class="page-header">
								<h1 class="page-title"><?php _e( 'Nothing Found', 'molecular' ); ?></h1>
							</header><!-- .page-header -->
						</section><!-- .no-results -->

					<?php endif; ?>

					</div>
					<div class="col-md-4 col-sm-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
