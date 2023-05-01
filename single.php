<?php get_header() ?>

<body>
<!--主菜单栏-->
<div id="top-menu">
  <table id="menu-table">
    <tr>
      <td class="menu" style="width: 15%;"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></td>
      <td class="menu">
        <div class="top_navi">
          single.php
          <?php
            /*
            wp_nav_menu( $args )
            @参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
            特别说明：
            调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
            */
            /*
            wp_nav_menu( array(
              'theme_location'				=> 'daniot-topmenu',	//[保留]
              'container'							=> false,							//[可删]
              'before'								=> '',								//[可删]
              'after'									=> '',								//[可删]		
              'link_before'						=> '',								//[可删]
              'link_after'						=> '',							  //[可删]
              'depth'								  => 1,								//[可删]
            ) );
            */
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
    single.php
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
        'theme_location'				=> 'daniot-leftmenu',	//[保留]
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
      <td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"> 
            <?php bloginfo('title'); ?>&nbsp;
            <a href="<?php bloginfo('rss2_url'); ?>" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[RSS]</a>&nbsp;
            <a href="javascript:;" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[历史文章]</a></div>
      </td>
    </tr>
  </table><!--内容标题和RSS订阅配置-->
 <!--主要内容-->
<table class="base">
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">
Apr 21, 2023</td>
<td style="width: 10px; text-align: right; vertical-align: top;">[</td>
<td style="width: 140px; text-align: center; vertical-align: top;">Ubuntu 23.04</td>
<td style="width: 10px; text-align: left; vertical-align: top;">]</td>
<td style="padding-left: 5px;">
<a href="note-Ubuntu_23.04_download.html">Ubuntu 23.04 Configuration</a>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">
Apr 20, 2023</td>
<td style="width: 10px; text-align: right; vertical-align: top;">[</td>
<td style="width: 140px; text-align: center; vertical-align: top;">Fedora 38</td>
<td style="width: 10px; text-align: left; vertical-align: top;">]</td>
<td style="padding-left: 5px;">
<a href="note-Fedora_38_download.html">Fedora 38 Configuration</a>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">
Mar 23, 2023</td>
<td style="width: 10px; text-align: right; vertical-align: top;">[</td>
<td style="width: 140px; text-align: center; vertical-align: top;">Ubuntu 22.04</td>
<td style="width: 10px; text-align: left; vertical-align: top;">]</td>
<td style="padding-left: 5px;">
<a href="javascript:;">Cloud infrastructure by OpenStack Antelope</a>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">
Dec 16, 2021</td>
<td style="width: 10px; text-align: right; vertical-align: top;">[</td>
<td style="width: 140px; text-align: center; vertical-align: top;">CentOS Stream 9</td>
<td style="width: 10px; text-align: left; vertical-align: top;">]</td>
<td style="padding-left: 5px;">
<a href="note-CentOS_Stream_9_download.html">CentOS Stream 9 Configuration</a>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">
Aug 26, 2021</td>
<td style="width: 10px; text-align: right; vertical-align: top;">[</td>
<td style="width: 140px; text-align: center; vertical-align: top;">Windows 2022</td>
<td style="width: 10px; text-align: left; vertical-align: top;">]</td>
<td style="padding-left: 5px;">
<a href="note-Windows_Server_2022_download.html">Windows Server 2022 Configuration</a>
</td>
</tr>
</table>
<table style="width: 96%; line-height: 1.5; margin-top: 5px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
<tr>
<td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(static/image/icon.gif) #ffffff no-repeat 0 0;">
<div class="subject">News</div>
</td>
</tr>
</table>
<table class="base" style="margin-bottom: 12px;">
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Windows 11 WSL2 Performance vs. Ubuntu Linux With The AMD Ryzen 7 7800X3D - Phoronix</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Troubleshooting the "Temporary Failure in Name Resolution" Error ... - Linux Journal</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Linux Shift: Chinese APT Alloy Taurus Is Back With Retooling - Dark Reading</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Linux 6.4 Brings Improved MSI Laptop Support, Apple GMUX ... - Phoronix</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">How to Listen to Podcasts in Your Linux Terminal With Castero - MUO - MakeUseOf</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">How to Exit Vim in Linux (Three Ways) - Beebom</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 27, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Chinese Hackers Spotted Using Linux Variant of PingPull in Targeted Cyberattacks - The Hacker News</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 26, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Unix Vs Linux: What's the Difference? - Dignited</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 26, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Tar Command in Linux: Syntax, Options, and Examples - Beebom</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 26, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Steam Deck gets a Preview update with STAR WARS Jedi: Survivor ... - GamingOnLinux</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 26, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Opera's New Redesigned Web Browser is Also Available on Linux - It's FOSS News</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 26, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Linux Operating System Market Growth, Revenue, Emerging Trends, Scope, Business Opportunities and Forecast 203 - openPR</a>
</p>
</td>
</tr>
<tr>
<td style="width: 140px; text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;">Apr 26, 2023</td>
<td>
<p style="height: 20px; overflow: hidden;">
<a href="javascript:;">Linux Operating System Market Growth, Revenue, Emerging Trends, Scope, Business Opportunities and Forecast 203 - openPR</a>
</p>
</td>
</tr>
</table>
<?php get_footer() ?>