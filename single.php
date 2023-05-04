<?php get_header() ?>
<!--主要内容-->
<!--以文档格式显示文章内容-->
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
