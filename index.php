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
                //$post_thumbnail = daniot_thumbnail( 'index-thumbnail', 260, 260 );
                $post_class = 'post';
                /**
                *   if ( !$full_content && $post_thumbnail["exist"] ) {
                *        $post_class .= ' post-has-thumbnail';
                *   }
                */    
                ?>
            <!--定义post后文章整体的id和类
                定义post文章的头部的类
                定义post文章的标题的类
                文章标题添加超链接
                判断标题是否置顶，置顶的话，类为post-sticky
                -->
            <div id="post-<?php //the_ID(); ?>" class="<?php //echo $post_class; ?>">
                
                <div class="post-header">
                  
                    <h2 class="post-title">
                        
                        <a href="<?php //the_permalink(); ?>" title="<?php //the_title(); ?>"><?php the_title(); ?></a>
                        
                        <?php //if ( is_sticky() ) { ?>
                            <span class="post-sticky"><?php //_e( 'Stick', daniot_NAME ); ?></span>
                        <?php //} ?>
                    </h2>
                </div>
            <!--侧边栏定义代码
                定义行内有序列表的类
                 定义行内有序列表子内容的类
                 输出文章编写时间,并调用daniot_time_since
                        -->
            <!--
            <div class="post-meta">
                
                <ul class="inline-ul">
                   
                    <li class="inline-li">
                        
                        <?php //echo daniot_time_since(strtotime($post->post_date_gmt)); ?>
                    </li>
                    <li class="inline-li">
                        <span class="post-span">·</span>
                    </li>
                    <li class="inline-li">
                        <?php //the_category( ' , ' ); ?>
                    </li>
                    <?php daniot_views(); ?>
                    <li class="inline-li">
                        <span class="post-span">·</span>
                    </li>
                    <li class="inline-li">
                        <?php //comments_popup_link( __( '0 reply', daniot_NAME ), __( '1 reply', daniot_NAME ), __( '% replies', daniot_NAME ) ); ?>
                    </li>
                    <?php //daniot_likes(); ?>
                </ul>
            </div>
            -->
            <div class="post-body">
                <?php if ( $full_content ) {
                    the_content();
                } else {
                    //if ( $post_thumbnail["exist"] ) : ?>
                    <!--关闭点赞组件，但是和CSS应该有联系，之后再修改配置
                        <div class="post-thumbnail">
                    -->
                            <a href="<?php the_permalink() ?>" rel="bookmark">
                                <img class="lazy"
                                        src="<?php echo daniot_cdn( daniot_image( 'placeholder.png' ) ); ?>"
                                        data-original="<?php echo daniot_cdn( $post_thumbnail ); ?>"
                                        alt="<?php the_title(); ?>" width="130" height="130"/>
                            </a>
                        </div>
                        <div class="post-content">
                            <?php printf( '<p>%s</p>', daniot_excerpt( $post->post_content, 320 ) ); ?>
                        </div>
                    <?php //else : ?>
                        <div class="post-content">
                            <?php printf( '<p>%s</p>', daniot_excerpt( $post->post_content, 250 ) ); ?>
                        </div>
                    <?php //endif;
                } ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>
<div class="pagenavi">
    <?php daniot_pagenavi(); ?>
</div>
</div>
<!--调用footer.php里的所有程序-->
<?php get_footer(); ?>