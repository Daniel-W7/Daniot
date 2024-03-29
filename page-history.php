<?php get_header() ?>
<!--主要内容-->
<!--以文档格式显示页面内容-->
<table class="base"> 
  <?php 
  // the query
  $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
  <?php if ( $wpb_all_query->have_posts() ) : ?>
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
    <!--<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>-->
  <div class="block">
    <tr>
      <td style="width: 120px;style="text-align: right; padding-right: 10px; letter-spacing: 1px; vertical-align: top;"><?php the_time('Y年m月d日'); ?></td>
      <td style="width: 10px; text-align: right; vertical-align: top;">[</td>
      <td style="width: 200px; text-align: center; vertical-align: top;"><?php the_category(','); ?></td>
      <td style="width: 10px; text-align: left; vertical-align: top;">]</td>
      <td style="padding-left: 5px;">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></a>
      </td>
    </tr>
  </div><!-- block -->			
  <?php endwhile; ?>
  <!-- end of the loop -->
  <?php wp_reset_postdata(); ?>
  <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</table><!--base-->
<?php get_footer() ?>