<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage SkyWarp2
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Top Menu">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo sw2_get_svg( array( 'icon' => 'bars' ) ); echo sw2_get_svg( array( 'icon' => 'close' ) ); ?></button>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( sw2_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo sw2_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php echo( '跳至正文' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
