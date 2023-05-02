<?php get_header() ?>
<!--主要内容-->
<!--以文档格式显示页面内容-->
  <br>
  <table style="width: 96%; line-height: 1.5; margin-top: 5px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><div class="date"><?php the_time('Y年m月d日 H:i:s'); ?></div></div>
      </td>
    </tr>
  </table>

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
            <!-- end of the loop -->
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        </table><!--base-->


<?php get_footer() ?>