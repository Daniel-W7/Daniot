<?php get_header() ?>
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
              'theme_location'				=> 'daniot-topmenu',									//[保留]
              'menu'								=> '',									//[可删]
              'container'							=> false,							//[可删]
              'container_class'				=> '',									//[可删]
              'container_id'					=> '',									//[可删]
              'menu_class'					=> 'menu',						//[可删]
              'menu_id'							=> 'menu',									//[可删]
              'echo'								=> true,							//[可删]
              'fallback_cb'						=> 'wp_page_menu',		//[可删]
              'before'								=> '',									//[可删]
              'after'									=> '',									//[可删]		
              'link_before'						=> '',									//[可删]
              'link_after'							=> '',									//[可删]
              'items_wrap'						=> '<ul id="%1$s" class="%2$s">%3$s</ul>',	//[可删]
              'depth'								=> 3,								//[可删]
              'walker'								=> ''									//[可删]			
            ) );
          ?>
        </div>
      </td>
      <td class="menu"><a href="note-policy.html">隐私策略</a></td>
      <td class="menu"><a href="note-send.html">支持/联系我们</a></td>
      <td class="menu" style="width: 15%;">
        <div class="count"><?php echo '在线人数:' .show_online_count(); ?> / <?php echo '总访问量:' .all_view();?></div>
      </td>
    </tr>
  </table><!--menu-table-->
</div><!--top-menu-->
<!--左侧菜单栏-->
<div id="left">
  <div class="os">
    index.php
  </div><!--os-->
  <div class="navi">
    <?php
      /*
      wp_nav_menu( $args )
      @参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
      特别说明：
      调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
      */
      wp_nav_menu( array(
        'theme_location'				=> 'daniot-leftmenu',	//[保留]调用左侧导航菜单
        'container'							=> false,							//[可删]
        'before'								=> '',								//[可删]
        'after'									=> '',								//[可删]		
        'link_before'						=> '',								//[可删]
        'link_after'						=> '',							  //[可删]
        'depth'								  => 1,								//[可删]
      ) );
    ?>
  </div><!--navi-->
  <!--左侧广告栏-->
  <div style="display: inline-block; width: 100%; font-size: 
              12px; text-align: center; background-color: #e6e6fa; 
              border-bottom: 1px solid #696969; border-top: 2px solid #e6e6fa;">赞助商链接</div>
    <div id="bann">
      <script async="" src="static/js/adsbygoogle-ca-pub-6423793798099903.js" crossorigin="anonymous"></script>
      <!-- 160x600 -->
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6423793798099903" data-ad-slot="6315121180" data-ad-format="auto"></ins>
      <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div><!--左侧广告栏-->
</div><!--左侧菜单栏-->
<!--内容栏-->
<div id="contents">
  <!--内容标题和RSS订阅配置-->
  <table style="width: 96%; line-height: 1.5; margin-top: 10px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"> 
            <?php bloginfo('title'); ?>&nbsp;
            <a href="<?php bloginfo('rss2_url'); ?>" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[RSS]</a>&nbsp;
            <a href="" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[历史文章]</a></div>
      </td>
    </tr>
  </table><!--内容标题和RSS订阅配置-->
<!--主要内容-->
<table class="base">
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="block">
      <tr>
        <td style="text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;"><?php the_time('Y年m月d日 H:i:s'); ?></td>
        <td style="width: 10px; text-align: right; vertical-align: top;">[</td>
        <td style="width: 200px; text-align: center; vertical-align: top;"><?php the_category(','); ?></td>
        <td style="width: 10px; text-align: left; vertical-align: top;">]</td>
        <td style="padding-left: 5px;">
          <a href="./note?os=Ubuntu_23.04&amp;p=download"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></a>
        </td>
      </tr>
    </div><!-- block -->			
  <?php endwhile; ?>
  <?php daniot_pagenavi(); ?>
  <?php endif; ?>
</table><!--base-->
<?php get_footer() ?>