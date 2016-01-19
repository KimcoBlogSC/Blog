<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package ZeroGravity
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<div class="credits-left"><?php echo get_theme_mod('zerogravity_footer_text_left', 'Copyright 2015'); ?></div>
			<div class="credits-center"><?php echo get_theme_mod('zerogravity_footer_text_center', 'Footer text center'); ?></div>
			<div class="credits-right">
			<?php // echo esc_attr( get_bloginfo( 'name', 'display' ) )." ";
			// _e('uses the theme', 'zerogravity');?> 
			<a href="<?php echo ZEROGRAVITY_AUTHOR_URI; ?>/wordpress-themes/zerogravity">ZeroGravity</a> <?php _e('by', 'zerogravity'); ?> GalussoThemes.com<br />
			<?php _e('Powered by', 'zerogravity'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'zerogravity' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'zerogravity' ); ?>"> WordPress</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>