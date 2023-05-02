<?php get_header() ?>
<!--主要内容-->
<!--以文档格式显示文章内容-->
  <br>
  <table style="width: 96%; line-height: 1.5; margin-top: 5px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><div class="date"><?php the_time('Y年m月d日 H:i:s'); ?></div></div>
      </td>
    </tr>
  </table>
  <table class="base">
    <td>
    <div class="block">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            </div><!-- .entry-meta -->
            <div class="entry-cnt">
              <div class="entry-arch">
                <?php the_content(); ?>
              </div><!-- .entry-arch -->
            </div><!-- .entry-cnt -->
            <div class="related">
              <span class="r-left"></span>
              <span class="r-right"></span>
              <div class="clear"></div>
            </div><!-- .related -->
      <?php endwhile; ?>
      <?php daniot_pagenavi(); ?>
      <?php endif; ?>
      </div><!-- block -->
  </td>
</table><!--base-->
</div><!--contents-->
<?php get_footer() ?>
