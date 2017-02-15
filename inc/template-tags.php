<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage SkyWarp2
 * @since 1.0
 */

function skywarp2_timediff( $from, $to, $before, $after) {
	if ( empty($from) || empty($to) )
		return '';
	if( empty($before) )
		$before = '于';
	if( empty($after) )
		$after = '前';
	$from_int = strtotime($from) ;
	$to_int = strtotime($to) ;
	$diff_time = abs($to_int - $from_int) ;
	if ( $diff_time > 60 * 60 * 24 * 365 ){//年
		$num = round($diff_time / (60 * 60 * 24 * 365));
		$uni = '年';
	}
	else if ( $diff_time > 60 * 60 * 24 * 31 ) {//月
		$num = round($diff_time / (60 * 60 * 24 * 30));
		$uni = '个月';
	}
	else if ( $diff_time > 60 * 60 * 24 ) {//天
		$num = round($diff_time / (60 * 60 * 24));
		$uni = '天';
	}
	else if ( $diff_time > 60 * 60 ) { //小时
		$num = round($diff_time / 3600);
		$uni = '小时';
	}
	else { //分钟
		$num = round($diff_time / 60);
		$uni = '分';
	}
	$return = $before.$num.$uni.$after ;
	return $return;
}

function skywarp2_rel_post_date() {
	global $post;
	$post_date_time = mysql2date('j-n-Y H:i:s', $post->post_date, false);
	$current_time = current_time('timestamp');
	$date_today_time = gmdate('j-n-Y H:i:s', $current_time);
	return skywarp2_timediff( $post_date_time, $date_today_time ,'&nbsp;','前' ) ;
}

function skywarp2_rel_comment_date() {
	global $post , $comment;
	$post_date_time = mysql2date('j-n-Y H:i:s', $post->post_date, false);
	$comment_date_time = mysql2date('j-n-Y H:i:s', $comment->comment_date, false);
	return skywarp2_timediff( $post_date_time, $comment_date_time ,'&nbsp;','后' ) ;
}

function skywarp2_time_link() {
	$time_string = '<span class="calendar-desc">%1$s<time class="entry-date published updated" datetime="%2$s">%3$s</time></span>';

	$time_string = sprintf( $time_string,
		sw2_get_svg( array( 'icon' => 'calendar' ) ),
		get_the_date( DATE_W3C ),
		skywarp2_rel_post_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		'<span class="screen-reader-text">Posted on</span> %s', $time_string
	);
}

function skywarp2_entry_meta(){
	$has_edit_link = true;
	$all_meta = '';
	$has_date = true;
	$has_category = true;
	$has_tag = true;
	if ( is_category() ) {
		$has_category = false;
	}
	if ( is_tag() ) {
		$has_tag = false;
	}
	if ( is_date() ) {
		$has_date = false;
	}
	if ( is_single() ) {
		$has_category = false;
		$has_tag = false;
		$has_edit_link = false;
	}
	if ( is_page() )
	{
		$has_date = false;
		$has_category = false;
		$has_tag = false;
		$has_edit_link = false;
	}
	if ( $has_date ) {
		$all_meta .= skywarp2_time_link();
	}
	if ( $has_tag )
	{
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list )
		{
			$all_meta.= '<span class="tag-desc">' . sw2_get_svg( array( 'icon' => 'hashtag' ) ) . $tags_list . '</span>';
		}
	}
	echo $all_meta;
	if ( $has_edit_link ) {
		sw2_edit_link();
	}
}

if ( ! function_exists( 'twentyseventeen_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function twentyseventeen_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = ', ';

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
	if ( ( $categories_list || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';
			if ( 'post' === get_post_type() ) {
				if ( is_single() && (!(has_tag('zhuanzai') || has_category('zhaichaohedaolian'))) ) {
					get_template_part( 'template-parts/post/meta', 'license' );
				}
				echo '<span class="cat-tags-links">';

					// Make sure there's more than one category before displaying.
					if ( $categories_list ) {
						echo '<span class="cat-links">' . sw2_get_svg( array( 'icon' => 'folder-open' ) ) . $categories_list . '</span>';
					}

					if ( $tags_list ) {
						echo '<span class="tags-links">' . sw2_get_svg( array( 'icon' => 'hashtag' ) ) . $tags_list . '</span>';
					}

				echo '</span>';
			}

			sw2_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;

function sw2_edit_link() {

	$link = edit_post_link(
		'编辑',
		'<span class="edit-link">',
		'</span>'
	);

	return $link;
}
