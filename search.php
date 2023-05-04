<?php get_header() ?>
<!-- bing搜索配置 -->
<!-- 站内搜索配置 -->
    <table class="base">
        <td>
        <?php the_search_query(); ?>
            <?php if ( have_posts() ):while ( have_posts() ) : the_post();$post_class = 'post';?>
            <div class="block">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                <?php endwhile; endif; ?>
                <?php daniot_pagenavi(); ?>
            </div><!-- block -->
        </td>
    </table><!--base-->
<?php get_footer() ?>