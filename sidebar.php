<!--左侧菜单栏-->
<div id="left">
  <div class="os">
    电脑硬件
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
        'depth'								  => 3,								//[可删]
      ) );
    ?>
  </div><!--navi-->
   
  <div style="display: inline-block; width: 100%; font-size: 
              12px; text-align: center; background-color: #e6e6fa; 
              border-bottom: 1px solid #696969; border-top: 2px solid #e6e6fa;">面朝大海，拥抱开源</div>
 <!--左侧广告栏
    <div id="bann">
      <script async="" src="static/js/adsbygoogle-ca-pub-6423793798099903.js" crossorigin="anonymous"></script>-->
      <!-- 160x600 -->
      <!--左侧广告栏
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6423793798099903" data-ad-slot="6315121180" data-ad-format="auto"></ins>
      <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>--><!--左侧广告栏-->
</div><!--左侧菜单栏-->