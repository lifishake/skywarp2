<?php
/**
 * 用来显示摘要。目前只在search的时候使用
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage SkyWarp2
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
			<div class="entry-meta">
				<?php
					skywarp2_entry_meta();
				?>
			</div><!-- .entry-meta -->

		<?php
            mb_regex_encoding("UTF-8");
			$keyword = get_search_query();
			$text = get_the_title();
			$text = mb_ereg_replace($keyword, '<span class="highlight">'.$keyword.'</span>', $text);
			$title = sprintf('<h2 class="entry-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>',esc_url( get_permalink()),$text );
			echo $title; 
		?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_skywarp2_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
