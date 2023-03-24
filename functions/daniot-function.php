<?php
/**
 * @name Daniot function
 * @description daniot theme basic functions
 *  @version     见functions.php中daniot-version定义的版本号
 * @author      Daniel
 * @url         https://www.danios.com（海源）
 * @package     Daniot
 **/

// Add theme toolbar link
add_action( 'admin_bar_menu', 'daniot_toolbar_link', 999 );
function daniot_toolbar_link( $wp_admin_bar ) {
    $args = array(
        'title' => 'daniot 设置',
        'href'  => admin_url( 'admin.php?page=daniot_setting' ),
        'meta'  => array(
            'title' => 'daniot 设置'
        )
    );
    $wp_admin_bar->add_node( $args );
}

/**
 * Theme comment walker
 *
 * @param $comment
 * @param $args
 * @param $depth
 */
function daniot_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;

    global $commentcount;

    if ( ! $commentcount ) {
        $page         = ( ! empty( $in_comment_loop ) ) ? get_query_var( 'cpage' ) - 1 : get_page_of_comment( $comment->comment_ID, $args ) - 1;
        $cpp          = get_option( 'comments_per_page' );
        $commentcount = $cpp * $page;
    }

    if ( ! $comment->comment_parent ) {
        //$email  = $comment->comment_author_email;
        $avatar = get_avatar( $comment, $size = '50' );
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-avatar"><?php echo $avatar; ?></div>
                    <span class="comment-floor"><?php ++ $commentcount;
                        switch ( $commentcount ) {
                            case 1:
                                _e( 'Sofa', daniot_NAME );
                                break;
                            case 2:
                                _e( 'Bench', daniot_NAME );
                                break;
                            case 3:
                                _e( 'Floor', daniot_NAME );
                                break;
                            default:
                                printf( __( '%s Floor', daniot_NAME ), $commentcount );
                        } ?></span>

            <div class="comment-data">
                <span class="comment-span <?php if ( $comment->user_id == 1 ) {
                    echo "comment-author";
                } ?>"><?php printf( '%s', get_comment_author_link() ) ?></span>
                <span
                    class="comment-span comment-date"><?php echo daniot_time_since(strtotime($comment->comment_date_gmt), true ); ?></span>
            </div>
            <div class="comment-text"><?php comment_text() ?></div>
            <div class="comment-reply"><?php comment_reply_link( array_merge( $args, array(
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                    'reply_text' => __( 'Reply', daniot_NAME )
                ) ) ) ?></div>
        </div>
    <?php } else {
        ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body comment-children-body">
            <div class="comment-avatar"><?php echo get_avatar( $comment, $size = '30' ); ?></div>
            <span
                class="comment-floor"><?php comment_reply_link( array_merge( $args, array(
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                    'reply_text' => __( 'Reply', daniot_NAME )
                ) ) ) ?></span>

            <div class="comment-data">
                <span class="comment-span <?php if ( $comment->user_id == 1 ) {
                    echo "comment-author";
                } ?>">
                    <?php
                    $parent_id      = $comment->comment_parent;
                    $comment_parent = get_comment( $parent_id );
                    printf( '%s', get_comment_author_link() );
                    ?>
                </span>
                <span
                    class="comment-span comment-date"><?php echo daniot_time_since(strtotime($comment->comment_date_gmt), true ); ?></span>
            </div>
            <div class="comment-text">
                <span class="comment-to"><a href="<?php echo "#comment-" . $parent_id; ?>"
                                            title="<?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $comment_parent->comment_content ) ), 0, 100, "..." ); ?>">@<?php echo $comment_parent->comment_author; ?></a>：</span>
                <?php echo get_comment_text(); ?>
            </div>
        </div>
    <?php }
}

add_filter( 'get_avatar', 'daniot_avatar', 10, 3 );
function daniot_avatar( $avatar ) {
    if ( ! is_admin() ) {
        $avatar = str_replace( 'src=', 'src="' . daniot_cdn( daniot_image( 'placeholder.png' ), 120, 120, true ) . '" data-original=', $avatar );
    }

    if ( daniot_settings( 'avatar' ) == 1 ) {
        $avatar = str_replace( array(
            "www.gravatar.com",
            "0.gravatar.com",
            "1.gravatar.com",
            "2.gravatar.com"
        ), "gravatar.duoshuo.com", $avatar );
    }

    return $avatar;
}

/**
 * Theme body class
 */
function daniot_body_class()
{
    $extra_class = array(daniot_settings( 'color' ));

    if( daniot_settings( 'full-content' ) ){
        $extra_class[] = 'full-content';
    }

    $extra_class = implode(' ', $extra_class);

    body_class($extra_class);
}