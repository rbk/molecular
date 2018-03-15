<?php
/**
 * The template for displaying all pages.
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

						<div class="alignleft"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></div>
						
						<div class="author-template-list">
							
						<h1>Articles by <?php echo get_the_author(); ?></h1>
						<ul>
							<?php while ( have_posts() ) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; // end of the loop. ?>
						</ul>								
					
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<?php get_sidebar(); ?>
					</div>
				</div>		
			</div><!-- .container-fluid -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
