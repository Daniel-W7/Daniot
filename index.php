<!DOCTYPE html>
<html lang="zh-CN">
<!--
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
*
* @link       https://codex.wordpress.org/Template_Hierarchy
*
* @package    Arke
* @copyright  Copyright (c) 2018, Danny Cooper
* @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
*/
-->
    <!--定义网站头部标签栏显示的内容-->
    <head>
    <?php daniot_head(); ?>
        <link rel="canonical" 
            href="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>" 
        />
    </head>
    <!--定义网站主要内容-->
    <body>
        <!--调用header.php里的所有程序-->
        <?php get_header(); ?>
        <!--定义primary区间-->
        <div id="primary">    
            <!--定义postlist区间-->
            <div id="postlist">
                <?php
                    //定义显示所有内容，将daniot_settings( 'full-content' )赋值
                    $full_content = daniot_settings( 'full-content' );
                    //如果有文章的话，直接显示文章，并配置点赞,定义文章类为post
                    if ( have_posts() ):while ( have_posts() ) : the_post();
                        $post_class = 'post';
                ?>
                <!--定义post后文章整体的id和类
                <div id="post-<?//php the_ID(); ?>" class="<?//php echo $post_class; ?>">-->
                    <!--配置页面中的文章标题+超链接选项-->
                    <div class="post-header">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <?php if ( is_sticky() ) { ?>
                            <span class="post-sticky"><?php _e( 'Stick', daniot_NAME ); ?></span>
                        <?php } ?>
                    </div>
                    <!-- 显示文章全部内容选项
                    <div class="post-body">-->
                        <!--显示文章全部内容-->
                        <?php //the_content();?>
                        <!--显示文章标题+部分内容
                        <div class="post-content"> -->
                            <!--显示文章标题+超链接
                            <a href="<?php //the_permalink() ?>" rel="bookmark">
                                <img class="lazy"
                                    src="<?php //echo daniot_cdn( daniot_image( 'placeholder.png' ) ); ?>"
                                    alt="<?php //the_title(); ?>" width="130" height="130"
                                />
                            </a>-->
                            <!--显示文章部分内容
                            <?php //printf( '<p>%s</p>', daniot_excerpt( $post->post_content, 320 ) ); ?>
                        </div>-->
                        <!--while if结束语句-->
                        <?php endwhile; endif; ?>
            </div>
        </div>
        <!--调用footer.php里的所有程序-->
        <?php get_footer(); ?>
    </body>
</html>