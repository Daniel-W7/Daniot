<!DOCTYPE html>
<html lang="zh-CN">	
<!--定义网站标签栏-->
<head>
  <?php daniot_head(); ?>
    <link rel="canonical" 
          href="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] 
                ?>" 
    />
</head>
<!--定义网站主要内容-->
<body <?php daniot_body_class(); ?>>
<!--定义头部id和类,方便之后进行css格式配置-->
<!--定义网站标题-->
<div id="header">
    <div class="header">
        <!--根据是不是主页配置不同的类-->
        <?php
            if (is_home()) {
            echo '<h1 class="logo">';
            }else{
            echo '<h2 class="logo">';
            }
        ?>
        <!--显示头部介绍，logo-->
        <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
        <img src="<?php echo daniot_image( 'logo.png' ); ?>" 
                alt="<?php bloginfo( 'name' ); ?>" 
                width="102"
                height="30"/>
        </a>
        <!--根据是不是主页配置显示内容-->
        <?php
    
        if (is_home()) {
            echo '</h1>';
        }else{
            echo '</h2>';
        }
        ?>
        <div class="global-nav">
            
            <!--首页按钮配置代码
            <ul class="gnul">
                <li class="gnli <?php if ( is_home() ) {
                    echo "current";
                } ?>">
                    <a class="gna" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <span><?php _e( 'Home', daniot_NAME ); ?></span>
                    </a>
                </li>
            </ul>
            -->
                <!--配置导航菜单代码-->
                <!--
                <?php //if ( ! daniot_settings( 'disable_global_navigation' ) ) { ?>
                    <li class="gnli dropdown<?php //if ( is_single() ) {
                        //echo " current";
                    //} ?>">
                        <a class="gna dropdown-link" href="javascript:;">
                            <span><?php //_e( 'Navigation', daniot_NAME ); ?></span>
                        </a>

                        <div class="dropdown-arrow1"></div>
                        <div class="dropdown-arrow2"></div>
                        <div class="submenu">
                            <div class="tab-content">
                                <table>
                                    <tbody>
                                    <tr class="trline">
                                        <td class="tdleft"><?php //_e( 'Categories', daniot_NAME ); ?></td>
                                        <td class="tdright">
                                            <div class="tab-categories">
                                                <ul>
                                                    <?php //wp_list_categories( '&title_li=' ); ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdleft"><?php //_e( 'Tags', daniot_NAME ); ?></td>
                                        <td class="tdright">
                                            <div class="tab-tags">
                                                <?php /*wp_tag_cloud( array(
                                                    'unit'     => 'px',
                                                    'smallest' => 12,
                                                    'largest'  => 12,
                                                    'number'   => daniot_settings( 'tag_number' ),
                                                    'format'   => 'flat',
                                                    'orderby'  => 'count',
                                                    'order'    => 'DESC'
                                                ) ); */
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                -->
                <?php //} ?>
            <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>">
                <span><?php _e( 'Home', daniot_NAME ); ?></span>
                </a>
            <?php wp_nav_menu( array(
                'theme_location'  => 'top-menu',
                'container_class' => 'top-menu'
            ) ); ?>
        </div>
        <div class="mobile-menu-button"></div>
    </div> 
</div>
<!-- #header -->
<!--
关闭content块配置，简化布局
<div id="content">
    <div class="container clearfix">
            -->