<?php

/**
 * @name Daniot widget
 * @description Theme basic functions
 *  @version     见functions.php中daniot-version定义的版本号
 * @author      Daniel
 * @url https://www.danios.com（海源）
 * @package     Daniot
 **/
class daniot_widget_populars extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'description' => 'daniot：热门文章（需要WP-PostViews插件）' );
         parent::__construct( 'daniot_widget_populars', 'daniot：热门文章', $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $limit = strip_tags( $instance['limit'] );
        $limit = $limit ? $limit : 10;
        ?>
        <div class="widget widget-populars">
            <h3><?php _e( 'Popular posts', daniot_NAME ); ?></h3>
            <ul class="list">
                <?php
                $args  = array(
                    'paged'               => 1,
                    'meta_key'            => 'views',
                    'orderby'             => 'meta_value_num',
                    'ignore_sticky_posts' => 1,
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'showposts'           => $limit
                );
                $posts = query_posts( $args ); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <li class="widget-popular">
                        <p>
                            <a href="<?php the_permalink() ?>" rel="bookmark"
                               title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            <?php if ( function_exists( 'the_views' ) ) { ?>
                                <span><?php echo daniot_views_count(); ?></span>
                            <?php } ?>
                        </p>
                    </li>
                <?php endwhile;
                wp_reset_query();
                $posts = null;
                ?>
            </ul>
        </div>
    <?php
    }
    
    function update( $new_instance, $old_instance ) {
        if ( ! isset( $new_instance['submit'] ) ) {
            return false;
        }
        $instance          = $old_instance;
        $instance['limit'] = strip_tags( $new_instance['limit'] );

        return $instance;
    }

    function form( $instance ) {
        global $wpdb;
        $instance = wp_parse_args( (array) $instance, array( 'limit' => '' ) );
        $limit    = strip_tags( $instance['limit'] );
        ?>

        <p><label for="<?php echo $this->get_field_id( 'limit' ); ?>">文章数量：<input
                    id="<?php echo $this->get_field_id( 'limit' ); ?>"
                    name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text"
                    value="<?php echo $limit; ?>"/></label></p>
        <input type="hidden" id="<?php echo $this->get_field_id( 'submit' ); ?>"
               name="<?php echo $this->get_field_name( 'submit' ); ?>" value="1"/>
    <?php
    }
}

add_action( 'widgets_init', 'daniot_widget_populars_init' );
function daniot_widget_populars_init() {
    register_widget( 'daniot_widget_populars' );
}

class daniot_widget_modified extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'description' => 'daniot：最近更新的文章' );
         parent::__construct( 'daniot_widget_modified', 'daniot：最近更新', $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $limit = strip_tags( $instance['limit'] );
        $limit = $limit ? $limit : 8;
        ?>
        <div class="widget widget-modified">
            <h3><?php _e( 'Last modified posts', daniot_NAME ); ?></h3>
            <ul class="list">
                <?php
                $args  = array(
                    'orderby'             => 'modified',
                    'ignore_sticky_posts' => 1,
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'showposts'           => $limit
                );
                $index = 0;
                $posts = query_posts( $args ); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <li>
                        <p>
                            <a href="<?php the_permalink() ?>" rel="bookmark"
                               title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </p>

                        <p>
                            <?php _e( 'Update time：', daniot_NAME ); ?>
                            <span><?php echo daniot_time_since(strtotime($posts[$index]->post_modified_gmt)); ?></span>
                        </p>
                    </li>
                    <?php $index ++; endwhile;
                wp_reset_query();
                $posts = null;
                ?>
            </ul>
        </div>
    <?php
    }
    
    function update( $new_instance, $old_instance ) {
        if ( ! isset( $new_instance['submit'] ) ) {
            return false;
        }
        $instance          = $old_instance;
        $instance['limit'] = strip_tags( $new_instance['limit'] );

        return $instance;
    }

    function form( $instance ) {
        global $wpdb;
        $instance = wp_parse_args( (array) $instance, array( 'limit' => '' ) );
        $limit    = strip_tags( $instance['limit'] );
        ?>

        <p><label for="<?php echo $this->get_field_id( 'limit' ); ?>">文章数量：<input
                    id="<?php echo $this->get_field_id( 'limit' ); ?>"
                    name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text"
                    value="<?php echo $limit; ?>"/></label></p>
        <input type="hidden" id="<?php echo $this->get_field_id( 'submit' ); ?>"
               name="<?php echo $this->get_field_name( 'submit' ); ?>" value="1"/>
    <?php
    }
}

add_action( 'widgets_init', 'daniot_widget_modified_init' );
function daniot_widget_modified_init() {
    register_widget( 'daniot_widget_modified' );
}

class daniot_widget_comment extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'description' => 'daniot：最新评论' );
         parent::__construct( 'daniot_widget_comment', 'daniot：最新评论', $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $limit = strip_tags( $instance['limit'] );
        $limit = $limit ? $limit : 5;
        ?>
        <div class="widget widget-comment">
            <h3><?php _e( 'Latest comments', daniot_NAME ); ?></h3>
            <ul>
                <?php
                $comments = get_comments( "user_id=0&number={$limit}&status=approve&type=comment" );
                foreach ( $comments as $comment ) { ?>
                    <li>
                        <p>
                            <a href="<?php echo get_permalink( $comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>">
                                <?php echo $comment->comment_content; ?>
                            </a>
                        </p>

                        <p>
                            <?php echo get_avatar( $comment->comment_author_email, 32 ); ?>
                            <?php echo $comment->comment_author; ?>
                            <span><?php echo daniot_time_since(strtotime($comment->comment_date_gmt)); ?></span>
                        </p>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    <?php
    }

    function update( $new_instance, $old_instance ) {
        if ( ! isset( $new_instance['submit'] ) ) {
            return false;
        }
        $instance          = $old_instance;
        $instance['limit'] = strip_tags( $new_instance['limit'] );

        return $instance;
    }

    function form( $instance ) {
        global $wpdb;
        $instance = wp_parse_args( (array) $instance, array( 'limit' => '' ) );
        $limit    = strip_tags( $instance['limit'] );
        ?>

        <p><label for="<?php echo $this->get_field_id( 'limit' ); ?>">评论数量：<input
                    id="<?php echo $this->get_field_id( 'limit' ); ?>"
                    name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text"
                    value="<?php echo $limit; ?>"/></label></p>
        <input type="hidden" id="<?php echo $this->get_field_id( 'submit' ); ?>"
               name="<?php echo $this->get_field_name( 'submit' ); ?>" value="1"/>
    <?php
    }
}

add_action( 'widgets_init', 'daniot_widget_comment_init' );
function daniot_widget_comment_init() {
    register_widget( 'daniot_widget_comment' );
}

class daniot_widget_links extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'description' => 'daniot：友情链接' );
         parent::__construct( 'daniot_widget_links', 'daniot：友情链接', $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $limit = strip_tags( $instance['limit'] );
        $limit = $limit ? $limit : 10;
        ?>
        <div class="widget widget-links">
            <h3><?php _e( 'Links', daniot_NAME ); ?></h3>
            <ul>
                <?php $bookmarks = get_bookmarks( 'limit=' . $limit );
                if ( ! empty( $bookmarks ) ) {
                    foreach ( $bookmarks as $bookmark ) { ?>
                        <li>
                            <a class="tooltipped tooltipped-n" href="<?php echo $bookmark->link_url; ?>"
                               aria-label="<?php echo $bookmark->link_description != '' ? $bookmark->link_description : $bookmark->link_name; ?>"><?php echo $bookmark->link_name; ?></a>
                        </li>
                    <?php
                    }
                } ?></ul>
            </ul>
        </div>
    <?php
    }

    function update( $new_instance, $old_instance ) {
        if ( ! isset( $new_instance['submit'] ) ) {
            return false;
        }
        $instance          = $old_instance;
        $instance['limit'] = strip_tags( $new_instance['limit'] );

        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'limit' => '' ) );
        $limit    = strip_tags( $instance['limit'] );
        ?>

        <p><label for="<?php echo $this->get_field_id( 'limit' ); ?>">链接数量：<input
                    id="<?php echo $this->get_field_id( 'limit' ); ?>"
                    name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text"
                    value="<?php echo $limit; ?>"/></label></p>
        <input type="hidden" id="<?php echo $this->get_field_id( 'submit' ); ?>"
               name="<?php echo $this->get_field_name( 'submit' ); ?>" value="1"/>
    <?php
    }
}

add_action( 'widgets_init', 'daniot_widget_links_init' );
function daniot_widget_links_init() {
    register_widget( 'daniot_widget_links' );
}