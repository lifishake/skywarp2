<?php
/**
 * Twenty Seventeen: Color Patterns
 *
 * @package WordPress
 * @subpackage SkyWarp2
 * @since 1.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */
function sw2_custom_colors_css() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 184 ) );

	/**
	 * Filter Twenty Seventeen default saturation level.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $saturation integer
	 */
	$saturation = 36;
	$reduced_saturation = ( .75 * $saturation ) . '%';
	$saturation = $saturation . '%';
	$css = '
/**
 * Sky Warp 2: Color 色板
 *
 * 颜色按照从亮到暗的顺序
 */

a:hover,
a:active,
.entry-content a:focus,
.entry-content a:hover,
.entry-summary a:focus,
.entry-summary a:hover,
.widget a:focus,
.widget a:hover,
.site-footer .widget-area a:focus,
.site-footer .widget-area a:hover,
.sidebar-inline .widget-column a:focus,
.sidebar-inline .widget-column a:hover,
.posts-navigation a:focus,
.posts-navigation a:hover,
.comment-reply-link:focus,
.comment-reply-link:hover,
.entry-title a:focus,
.entry-title a:hover,
.entry-meta a:focus,
.entry-meta a:hover,
.entry-footer a:focus,
.entry-footer a:hover,
.entry-footer .cat-links a:focus,
.entry-footer .cat-links a:hover,
.entry-footer .date-links a:focus,
.entry-footer .date-links a:hover,
.entry-footer .tags-links a:focus,
.entry-footer .tags-links a:hover,
.post-navigation a:focus,
.post-navigation a:hover,
.pagination a:not(.prev):not(.next):focus,
.pagination a:not(.prev):not(.next):hover,
.comments-pagination a:not(.prev):not(.next):focus,
.comments-pagination a:not(.prev):not(.next):hover,
a:focus .nav-title,
a:hover .nav-title,
.edit-link a:focus,
.edit-link a:hover,
.site-info a:focus,
.site-info a:hover,
.widget .widget-title a:focus,
.widget .widget-title a:hover,
.widget ul li a:focus,
.widget ul li a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 93% ); /* base: #000; */
}

button,
input[type="button"],
input[type="submit"],
.entry-footer .edit-link a.post-edit-link {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 87% ); /* base: #222; */
}

.site-navigation-fixed.navigation-top:before,
.colors-custom .dropdown-toggle,
.colors-custom .menu-toggle,
.page-title,
.colors-custom.page .entry-title,
.colors-custom h2.widget-title,
h2.sidebar-inline-title,
.colors-custom mark,
.colors-custom .post-navigation a:focus .icon,
.colors-custom .post-navigation a:hover .icon,
.colors-custom .site-content .site-content-light,
.mention {
	color: hsl( ' . $hue . ', ' . $saturation . ', 87% ); /* base: #222; */
}

.social-navigation a:hover,
.social-navigation a:focus {
	background: hsl( ' . $hue . ', ' . $reduced_saturation . ', 80% ); /* base: #333; */
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
textarea:focus,
.bypostauthor > .comment-body > .comment-meta > .comment-author .avatar {
	border-color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 80% ); /* base: #333; */
}

span.highlight,
h2,
input[type="text"],
input[type="email"],
input[type="url"],
input[type="search"],
textarea,
input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
textarea:focus,
.colors-custom .site-description,
.colors-custom .colors-custom .taxonomy-description,
.site-info a,
.colors-custom .wp-caption {
	color: hsl( ' . $hue . ', ' . $saturation . ', 60% ); /* base: #666; */
}

.colors-custom abbr,
.colors-custom acronym, {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 60% ); /* base: #666; */
}

.navigation-top .menu-scroll-up,
.colors-custom h5,
.entry-meta,
.entry-meta a,
.colors-custom .nav-subtitle,
.colors-custom .no-comments,
.colors-custom .comment-awaiting-moderation,
.colors-custom .page-numbers.current,
.colors-custom .navigation-top .current-menu-item > a,
.colors-custom .navigation-top .current_page_item > a,
.colors-custom .main-navigation a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */
}

.bypostauthor .author-url {
    text-shadow: 1px 1px 1px hsl( ' . $hue . ', ' . $saturation . ', 54% );
}

button:hover,
button:focus,
input[type="button"]:hover,
input[type="button"]:focus,
input[type="submit"]:hover,
input[type="submit"]:focus,
.entry-footer .edit-link a.post-edit-link:hover,
.entry-footer .edit-link a.post-edit-link:focus,
.social-navigation a,
.prev.page-numbers:focus,
.prev.page-numbers:hover,
.next.page-numbers:focus,
.next.page-numbers:hover {
	background: hsl( ' . esc_attr( $hue ) . ', ' . esc_attr( $saturation ) . ', 54% ); /* base: #767676; */
}

hr {
	background: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

input[type="text"],
input[type="email"],
input[type="url"],
input[type="search"],
textarea,
.colors-custom select,
.colors-custom fieldset,
.colors-custom .widget .tagcloud a:hover,
.colors-custom .widget .tagcloud a:focus,
.colors-custom .widget.widget_tag_cloud a:hover,
.colors-custom .widget.widget_tag_cloud a:focus,
.colors-custom .wp_widget_tag_cloud a:hover,
.colors-custom .wp_widget_tag_cloud a:focus {
	border-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

.colors-custom thead th {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

.site-navigation-fixed.navigation-top:before {
	content: \''. get_bloginfo('name') .'\';
}

.entry-footer .cat-links .icon,
.entry-footer .date-links .icon,
.entry-footer .tags-links .icon {
	color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

.prev.page-numbers,
.next.page-numbers {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #ddd; */
}

.colors-custom .widget .tagcloud a,
.colors-custom .widget.widget_tag_cloud a,
.colors-custom .wp_widget_tag_cloud a {
	border-color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #ddd; */
}

.colors-custom .widget ul li {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #ddd; */
}

.site-title,
.site-title a {
	color: hsl( ' . $hue . ', ' . $saturation . ', 60% );
}

.site-title a:hover,
.site-title a:active
{
	color: hsl( ' . $hue . ', ' . $saturation . ', 76% );
}

.colors-custom pre,
.colors-custom mark,
.colors-custom ins {
	background: hsl( ' . $hue . ', ' . $saturation . ', 7% ); /* base: #eee; */
}

.colors-custom .navigation-top,
.colors-custom .main-navigation > div > ul,
.colors-custom .pagination,
.colors-custom .comments-pagination,
.colors-custom .entry-footer,
.colors-custom .site-footer,
.sidebar-inline .widget-column {
	border-top-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #eee; */
}

ol.comment-list li article,
.colors-custom .navigation-top,
.colors-custom .main-navigation li,
.colors-custom .entry-footer,
.colors-custom .single-featured-image-header
.colors-custom tr {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #eee; */
}

.colors-custom .site-header,
.colors-custom .single-featured-image-header {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 2% ); /* base: #fafafa; */
}

.colors-custom .menu-toggle,
.colors-custom .menu-toggle:hover,
.colors-custom .menu-toggle:focus,
.colors-custom .menu .dropdown-toggle,
.menu-scroll-up,
.menu-scroll-up:hover,
.menu-scroll-up:focus {
	background-color: transparent;
}


@media screen and (min-width: 48em) {

	.nav-links .nav-previous .nav-title .icon,
	.nav-links .nav-next .nav-title .icon {
		color: hsl( ' . $hue . ', ' . $saturation . ', 80% ); /* base: #222; */
	}

	.colors-custom .main-navigation li li:hover,
	.colors-custom .main-navigation li li.focus {
		background: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */
	}

	.colors-custom abbr[title] {
		border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */;
	}

	.colors-custom .main-navigation ul ul {
		border-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
		background: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #fff; */
	}

	.colors-custom .main-navigation ul li.menu-item-has-children:before,
	.colors-custom .main-navigation ul li.page_item_has_children:before {
		border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
	}

	.colors-custom .main-navigation ul li.menu-item-has-children:after,
	.colors-custom .main-navigation ul li.page_item_has_children:after {
		border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #fff; */
	}

	.colors-custom .main-navigation li li.focus > a,
	.colors-custom .main-navigation li li:focus > a,
	.colors-custom .main-navigation li li:hover > a,
	.colors-custom .main-navigation li li a:hover,
	.colors-custom .main-navigation li li a:focus,
	.colors-custom .main-navigation li li.current_page_item a:hover,
	.colors-custom .main-navigation li li.current-menu-item a:hover,
	.colors-custom .main-navigation li li.current_page_item a:focus,
	.colors-custom .main-navigation li li.current-menu-item a:focus {
		color: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #fff; */
	}
}';
return $css;
}
