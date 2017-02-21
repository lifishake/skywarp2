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
.colors-custom .site-footer .widget-area a:focus,
.colors-custom .site-footer .widget-area a:hover,
.colors-custom .posts-navigation a:focus,
.colors-custom .posts-navigation a:hover,
.comment-reply-link:focus,
.comment-reply-link:hover,
.colors-custom .widget_authors a:focus strong,
.colors-custom .widget_authors a:hover strong,
.colors-custom .entry-title a:focus,
.colors-custom .entry-title a:hover,
.entry-meta a:focus,
.entry-meta a:hover,
.colors-custom .entry-footer a:focus,
.colors-custom .entry-footer a:hover,
.entry-footer .cat-links a:focus,
.entry-footer .cat-links a:hover,
.entry-footer .date-links a:focus,
.entry-footer .date-links a:hover,
.entry-footer .tags-links a:focus,
.entry-footer .tags-links a:hover,
.colors-custom .post-navigation a:focus,
.colors-custom .post-navigation a:hover,
.colors-custom .pagination a:not(.prev):not(.next):focus,
.colors-custom .pagination a:not(.prev):not(.next):hover,
.colors-custom .comments-pagination a:not(.prev):not(.next):focus,
.colors-custom .comments-pagination a:not(.prev):not(.next):hover,
.colors-custom .logged-in-as a:focus,
.colors-custom .logged-in-as a:hover,
.colors-custom a:focus .nav-title,
.colors-custom a:hover .nav-title,
.colors-custom .edit-link a:focus,
.colors-custom .edit-link a:hover,
.colors-custom .site-info a:focus,
.colors-custom .site-info a:hover,
.colors-custom .widget .widget-title a:focus,
.colors-custom .widget .widget-title a:hover,
.colors-custom .widget ul li a:focus,
.colors-custom .widget ul li a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 93% ); /* base: #000; */
}

.colors-custom button,
.colors-custom input[type="button"],
.colors-custom input[type="submit"],
.colors-custom .entry-footer .edit-link a.post-edit-link {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 87% ); /* base: #222; */
}

.colors-custom input[type="text"]:focus,
.colors-custom input[type="email"]:focus,
.colors-custom input[type="url"]:focus,
.colors-custom input[type="password"]:focus,
.colors-custom input[type="search"]:focus,
.colors-custom input[type="number"]:focus,
.colors-custom input[type="tel"]:focus,
.colors-custom input[type="range"]:focus,
.colors-custom input[type="date"]:focus,
.colors-custom input[type="month"]:focus,
.colors-custom input[type="week"]:focus,
.colors-custom input[type="time"]:focus,
.colors-custom input[type="datetime"]:focus,
.colors-custom .colors-custom input[type="datetime-local"]:focus,
.colors-custom input[type="color"]:focus,
.colors-custom textarea:focus,
.colors-custom input[type="reset"],
.colors-custom .dropdown-toggle,
.colors-custom .menu-toggle,
.page-title,
.colors-custom.page .entry-title,
.colors-custom h2.widget-title,
.colors-custom mark,
.colors-custom .post-navigation a:focus .icon,
.colors-custom .post-navigation a:hover .icon,
.colors-custom .site-content .site-content-light,
.mention {
	color: hsl( ' . $hue . ', ' . $saturation . ', 87% ); /* base: #222; */
}

.colors-custom .social-navigation a:hover,
.colors-custom .social-navigation a:focus {
	background: hsl( ' . $hue . ', ' . $reduced_saturation . ', 80% ); /* base: #333; */
}

.colors-custom input[type="text"]:focus,
.colors-custom input[type="email"]:focus,
.colors-custom input[type="url"]:focus,
.colors-custom input[type="password"]:focus,
.colors-custom input[type="search"]:focus,
.colors-custom input[type="number"]:focus,
.colors-custom input[type="tel"]:focus,
.colors-custom input[type="range"]:focus,
.colors-custom input[type="date"]:focus,
.colors-custom input[type="month"]:focus,
.colors-custom input[type="week"]:focus,
.colors-custom input[type="time"]:focus,
.colors-custom input[type="datetime"]:focus,
.colors-custom input[type="datetime-local"]:focus,
.colors-custom input[type="color"]:focus,
.colors-custom textarea:focus,
.bypostauthor > .comment-body > .comment-meta > .comment-author .avatar {
	border-color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 80% ); /* base: #333; */
}

.colors-custom h2,
.colors-custom input[type="text"],
.colors-custom input[type="email"],
.colors-custom input[type="url"],
.colors-custom input[type="password"],
.colors-custom input[type="search"],
.colors-custom input[type="number"],
.colors-custom input[type="tel"],
.colors-custom input[type="range"],
.colors-custom input[type="date"],
.colors-custom input[type="month"],
.colors-custom input[type="week"],
.colors-custom input[type="time"],
.colors-custom input[type="datetime"],
.colors-custom input[type="datetime-local"],
.colors-custom input[type="color"],
.colors-custom textarea,
.colors-custom .site-description,
.colors-custom .colors-custom .taxonomy-description,
.colors-custom .site-info a,
.colors-custom .wp-caption {
	color: hsl( ' . $hue . ', ' . $saturation . ', 60% ); /* base: #666; */
}

.colors-custom abbr,
.colors-custom acronym, {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 60% ); /* base: #666; */
}

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

.colors-custom button:hover,
.colors-custom button:focus,
.colors-custom input[type="button"]:hover,
.colors-custom input[type="button"]:focus,
.colors-custom input[type="submit"]:hover,
.colors-custom input[type="submit"]:focus,
.colors-custom .entry-footer .edit-link a.post-edit-link:hover,
.colors-custom .entry-footer .edit-link a.post-edit-link:focus,
.colors-custom .social-navigation a,
.colors-custom .prev.page-numbers:focus,
.colors-custom .prev.page-numbers:hover,
.colors-custom .next.page-numbers:focus,
.colors-custom .next.page-numbers:hover {
	background: hsl( ' . esc_attr( $hue ) . ', ' . esc_attr( $saturation ) . ', 54% ); /* base: #767676; */
}

.colors-custom input[type="reset"]:hover,
.colors-custom input[type="reset"]:focus,
.colors-custom hr {
	background: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

.colors-custom input[type="text"],
.colors-custom input[type="email"],
.colors-custom input[type="url"],
.colors-custom input[type="password"],
.colors-custom input[type="search"],
.colors-custom input[type="number"],
.colors-custom input[type="tel"],
.colors-custom input[type="range"],
.colors-custom input[type="date"],
.colors-custom input[type="month"],
.colors-custom input[type="week"],
.colors-custom input[type="time"],
.colors-custom input[type="datetime"],
.colors-custom input[type="datetime-local"],
.colors-custom input[type="color"],
.colors-custom textarea,
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

.entry-footer .cat-links .icon,
.entry-footer .date-links .icon,
.entry-footer .tags-links .icon {
	color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

.colors-custom input[type="reset"],
.colors-custom .prev.page-numbers,
.colors-custom .next.page-numbers {
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
.colors-custom .site-footer {
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
.colors-custom .menu-scroll-down,
.colors-custom .menu-scroll-down:hover,
.colors-custom .menu-scroll-down:focus {
	background-color: transparent;
}


@media screen and (min-width: 48em) {

	.colors-custom .nav-links .nav-previous .nav-title .icon,
	.colors-custom .nav-links .nav-next .nav-title .icon {
		color: hsl( ' . $hue . ', ' . $saturation . ', 80% ); /* base: #222; */
	}

	.colors-custom .main-navigation li li:hover,
	.colors-custom .main-navigation li li.focus {
		background: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */
	}

	.colors-custom .navigation-top .menu-scroll-down {
		color: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */;
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
