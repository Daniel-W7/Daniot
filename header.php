<!--头部主要内容-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php wp_head(); ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title><?php wp_title('-', true, 'right'); ?></title>
  <link href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/popup.js"></script>
</head>
<body>
<!--主菜单栏-->
<div id="top-menu">
  <table id="menu-table">
    <tr>
      <td class="menu" style="width: 15%;"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></td>
      <td class="menu">
        <div class="top_navi">
        <?php
          /*
          wp_nav_menu( $args )
          @参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
          特别说明：
          调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
          */
          wp_nav_menu( array(
            'theme_location'				=> 'daniot-topmenu',	//[保留]调用左侧导航菜单
            'container'							=> false,							//[可删]
            'before'								=> '',								//[可删]
            'after'									=> '',								//[可删]		
            'link_before'						=> '',								//[可删]
            'link_after'						=> '',							  //[可删]
            'depth'								  => 3,								//[可删]
          ) );
        ?>
        </div>
      </td>
      <td class="menu" style="width: 16%;">
        <div class="count"><?php view_count();?></div>
      </td>
    </tr>
  </table><!--menu-table-->
</div><!--top-menu-->
<!--左侧菜单栏-->
<?php get_sidebar(); ?>
<!--内容栏-->
<div id="contents">
<!--判断是首页的话只显示网站标题和RSS订阅配置，不是首页的话，只显示文章标题和文章时间-->
<?php if(is_home() || is_front_page() || is_search()) { ?>
  <!--网站标题和RSS订阅配置-->
  <table style="width: 96%; line-height: 1; margin-top: 10px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 80%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"> 
            <?php bloginfo('title'); ?>&nbsp;
            <a href="<?php bloginfo('rss2_url'); ?>" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[RSS]</a>&nbsp;
            <a href="" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[本站历史]</a>&nbsp;
      
        </div><!--subject-->
        
      </td>
    </tr>
  </table><!--内容标题和RSS订阅配置-->
<?php } else {?>
<br>
  <table style="width: 96%; line-height: 1.5; margin-top: 5px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <div class="date"><?php the_time('Y年m月d日'); ?></div></div>
      </td>
    </tr>
  </table>

<?php } ?>