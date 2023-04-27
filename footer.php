<!-- #content -->
<div id="footer">
    <div class="footer">
      <!-- 一言开始 -->
        <p id="hitokoto">:D 获取中...</p>
        <script>
          fetch('https://v1.hitokoto.cn')
            .then(function (res){
              return res.json();
            })
            .then(function (data) {
              var hitokoto = document.getElementById('hitokoto');
              hitokoto.innerText = data.hitokoto; 
            })
            .catch(function (err) {
              console.error(err);
            })
        </script>
      <!-- 一言结束 -->
      <!--友情链接部分-->
        <?php 
          /*if (wp_is_mobile()){ ?>
        <div class="widget-links">
          <ul>
            <li>友情链接:<?php wp_list_bookmarks('title_li=&categorize=0'); ?></li>	
          </ul>
        </div>
          <?php } else { ?>
          <?php } */?>
      <!--版权和备案信息-->
        <p>&copy; Copyright &copy; 2018 - <?php echo date('Y'); ?>  <a href="<?php echo home_url() ?>"><?php echo get_bloginfo('name') ?></a> All Rights Reserved.  Powered by <a href="https://wordpress.org/" target="_blank">WordPress</a></p> 
        <div style="width:300px;margin:0 auto; padding:20px 0;">
          <a target="_blank" 
             href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=34162302000199" 
             style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
             <img src="https://www.danielw7.com/wp-content/uploads/2021/12/备案图标.png" style="float:left;"/>
             <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">皖公网安备 34162302000199号</p>
          </a>
        </div>
    </div>
</div>
<!-- #footer -->
<?php wp_footer(); ?>
