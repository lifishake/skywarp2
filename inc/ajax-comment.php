<?php 

/**
 * ajax_comment后的回调函数，以及自定义的comment回调显示函数。
 * 自定义comment回调的原因是看原版显示格式不顺眼。
 * 本文件原型来自大发提供的do.php，有大幅度增删改。原始URL：https://fatesinger.com/59
 * @package skywarp2
 */
 
//追加回调入口
add_action('wp_ajax_nopriv_ajax_comment', 'ajax_comment_callback');
add_action('wp_ajax_ajax_comment', 'ajax_comment_callback');

/**
 * 作用: AJAX提交过程的共同函数。
 * 		在大发原来传参的基础上，针对非诚意留言增加了一个is_grasp的参数以及对应的参数处理。
 * 		其实大发原版也是基于WP的comment的。
 * 来源: 破袜子根据大发的代码修改
 */
function skywarp2_newcomment( $is_grasp ) {
	global $wpdb;
    $comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;
    $post = get_post($comment_post_ID);
    if ( empty($post->comment_status) ) {
        do_action('comment_id_not_found', $comment_post_ID);
        ajax_comment_err('评论状态不正确');
    }
    $status = get_post_status($post);
    $status_obj = get_post_status_object($status);
    if ( !comments_open($comment_post_ID) ) {
        do_action('comment_closed', $comment_post_ID);
        ajax_comment_err('评论已关闭');
    } elseif ( 'trash' == $status ) {
        do_action('comment_on_trash', $comment_post_ID);
        ajax_comment_err('评论状态不正确');
    } elseif ( !$status_obj->public && !$status_obj->private ) {
        do_action('comment_on_draft', $comment_post_ID);
        ajax_comment_err('评论状态不正确');
    } elseif ( post_password_required($comment_post_ID) ) {
        do_action('comment_on_password_protected', $comment_post_ID);
        ajax_comment_err('密码保护中');
    } else {
        do_action('pre_comment_on_post', $comment_post_ID);
    }
    $comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
    $comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
    $comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
	$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;
	$comment_type = '';

    $user = wp_get_current_user();
    if ( $user->exists() ) {
        if ( empty( $user->display_name ) )
            $user->display_name=$user->user_login;
        $comment_author       = esc_sql($user->display_name);
        $comment_author_email = esc_sql($user->user_email);
        $comment_author_url   = esc_sql($user->user_url);
        $user_ID              = esc_sql($user->ID);
        if ( current_user_can('unfiltered_html') ) {
            if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
                kses_remove_filters();
                kses_init_filters();
            }
        }
    } else {
        if ( get_option('comment_registration') || 'private' == $status )
            ajax_comment_err('对不起，只有登录用户才能评论。');
    }
	
    /*无诚意留言的判断标志*/
	if ( $is_grasp ) {
		$dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
		if ( $comment_author_email ) $dupe .= "OR comment_author_email = '$comment_author_email' ";
		$dupe .= ") LIMIT 1";
		if ( $wpdb->get_var($dupe) ) {
			ajax_comment_err('说过话不能点路过哦！');
		}
		$comment_content      = "私は異議を唱えるできません".' 【'.$comment_author.'】';
		//自定义了一个type.
		$comment_type = 'senseless';
	}
	
    if ( get_option('require_name_email') && !$user->exists() ) {
        if ( 6 > strlen($comment_author_email) || '' == $comment_author )
            ajax_comment_err( '错误：请填写昵称和邮件地址。' );
        elseif ( !is_email($comment_author_email))
            ajax_comment_err( '错误：邮件格式不正确。' );
    }
    if ( '' == $comment_content )
        ajax_comment_err( '错误：请输入您的评论内容。' );
    $dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
    if ( $comment_author_email ) $dupe .= "OR comment_author_email = '$comment_author_email' ";
    $dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
    if ( $wpdb->get_var($dupe) ) {
        ajax_comment_err('请不要重复评论！');
    }
    if ( $lasttime = $wpdb->get_var( $wpdb->prepare("SELECT comment_date_gmt FROM $wpdb->comments WHERE comment_author = %s ORDER BY comment_date DESC LIMIT 1", $comment_author) ) ) {
        $time_lastcomment = mysql2date('U', $lasttime, false);
        $time_newcomment  = mysql2date('U', current_time('mysql', 1), false);
        $flood_die = apply_filters('comment_flood_filter', false, $time_lastcomment, $time_newcomment);
        if ( $flood_die ) {
            ajax_comment_err('评论太频繁了，请稍后再按。');
        }
    }

    $comment_parent = (isset($_POST['comment_parent']) && !$is_grasp) ? absint($_POST['comment_parent']) : 0;
    $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

    $comment_id = wp_new_comment( $commentdata );


    $comment = get_comment($comment_id);
    do_action('set_comment_cookies', $comment, $user);
    $comment_depth = 1;
    $tmp_c = $comment;
    while($tmp_c->comment_parent != 0){
        $comment_depth++;
        $tmp_c = get_comment($tmp_c->comment_parent);
    }
    $GLOBALS['comment'] = $comment;
	//追加了一个email作为返回值。方便回调函数顺利取到头像。
	return $comment_author_email;
}

/**
 * 作用: 无诚意留言的回调显示
 * 来源: 破袜子原创
 */
function skywarp2_additional_grasp_show($email) {
	?>
    <li class= "grasp sensele">
	<div class="comment-grasp vcard">
		<div class="comment-author vcard">
			<?php echo '<a class="x7" href="#">'.get_avatar( $email, $size = '32').'</a>';?>
		</div>
    </li>
	<?php
}

/**
 * 作用: 留言的回调显示
 * 来源: 破袜子原创
 */
function skywarp2_additional_comment_show($email) {
	?>
    <li <?php comment_class(); ?>>
        <article class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $email, $size = '100')?>
                </div>
                <div class="comment-metadata">
                    <span><b class="fn author-url"><?php echo get_comment_author_link(); ?></b>
					</span>
                    <time datetime="<?php comment_time( 'c' ); ?>">刚刚</time>
                </div>
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php echo '评论审核中。'; ?></p>
				<?php endif; ?>
            </footer>
            <div class="comment-content <?php echo $vcard_class;?>">
                <?php comment_text(); ?>
            </div>
        </article>		
    </li>
	<?php
}

/**
 * 作用: 评论提交后的回调函数，
 * 来源: 大发（bigfa）
 * URI: https://fatesinger.com/59
 */
function ajax_comment_callback(){
	$is_grasp = isset($_POST['grasp']) ? true : false;
	$comment_author_email ;
	if ( false==(bool)$is_grasp ) {
		$comment_author_email = skywarp2_newcomment( false );
		skywarp2_additional_comment_show($comment_author_email); 
	}
	else {
		$comment_author_email = skywarp2_newcomment( true );
		skywarp2_additional_grasp_show($comment_author_email); 
	}
    die();
}

/**
 * 作用: ajax效果时，弹出的错误窗口
 * 来源: 大发
 */
function ajax_comment_err($a) {
    header('HTTP/1.0 500 Internal Server Error');
    header('Content-Type: text/plain;charset=UTF-8');
    echo $a;
    exit;
}