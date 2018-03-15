<?php
/**
 * The template for displaying search forms in molecular
 *
 * @package molecular
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'molecular' ); ?></span>
	<input autocomplete="off" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'molecular' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button class="search-submit" title="<?php echo esc_attr_x( 'Search', 'submit button', 'molecular' ); ?>"><i class="fa fa-search"></i></button>
</form>
