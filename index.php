<?php get_header() ?>
<!--主要内容-->
<!--以日期[分类]文章名格式显示左右历史文章-->
<table class="base">
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="block">
      <tr>
        <td style="text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;"><?php the_time('Y年m月d日'); ?></td>
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
