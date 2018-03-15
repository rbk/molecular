<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package molecular
 */
?>


	</div><!-- #content -->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">	
	<?php if( is_active_sidebar( 'footer_widgets' ) ) : ?>
		<br>
		<div class="container-fluid">
			<div class="row">
				<?php dynamic_sidebar('footer_widgets'); ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="molecular-footer text-align-center">
		<?php echo molecular_social(); ?>
		<div>
			Copyright <?php echo Date('Y'); ?>, <?php echo bloginfo('name'); ?>
			<a target="_blank" href="//richardkeller.net">&nbsp; - Theme by Richard Keller</a>
		</div>
		<div class="clearfix"></div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>