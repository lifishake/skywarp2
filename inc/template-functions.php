<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage SkyWarp2
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sw2_body_classes( $classes ) {

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	// Get the colorscheme or the default if there isn't one.
	$classes[] = 'colors-custom';

	return $classes;
}
add_filter( 'body_class', 'sw2_body_classes' );

function skywarp2_get_thumbnail_str() {
    if ( !is_singular() )
        return '';
    if ( has_post_thumbnail() ) :
        $post_image_id = get_post_thumbnail_id($post_to_use->ID);
        if ($post_image_id) 
        {
            $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail'/*skywarp2-featured-image*/, false);
            if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		}
	endif;
    return $thumbnail;
}

function skywarp2_replace_header_image( $html, $header, $attr )
{
	$new_src = skywarp2_get_thumbnail_str();
	if ( empty($new_src) || $new_src === '' )
	{
		return $html;
	}

	$html = '<img';

	foreach ( $attr as $name => $value ) {
		if ( $name === 'src' ) {
			$value = $new_src;
		}
		$html .= ' ' . $name . '="' . $value . '"';
	}

	$html .= ' />';
	return $html;
}
add_filter('get_header_image_tag','skywarp2_replace_header_image',10,3);