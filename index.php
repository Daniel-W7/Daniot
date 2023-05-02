<?php get_header() ?>
<!--左侧菜单栏-->
<?php get_sidebar(); ?>
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
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[本站历史]</a></div>
            <?php get_search_form(); ?>
      </td>
    </tr>
  </table><!--内容标题和RSS订阅配置-->
<!--主要内容-->
<!--以日期[分类]文章名格式显示左右历史文章-->
<table class="base">
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="block">
      <tr>
        <td style="text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;"><?php the_time('Y年m月d日 H:i:s'); ?></td>
        <td style="width: 10px; text-align: right; vertical-align: top;">[</td>
        <td style="width: 200px; text-align: center; vertical-align: top;"><?php the_category(','); ?></td>
        <td style="width: 10px; text-align: left; vertical-align: top;">]</td>
        <td style="padding-left: 5px;">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></a>
        </td>
      </tr>
    </div><!-- block -->			
  <?php endwhile; ?>
  <?php daniot_pagenavi(); ?>
  <?php endif; ?>
</table><!--base-->
<?php get_footer() ?>
