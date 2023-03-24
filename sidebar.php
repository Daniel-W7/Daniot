<div id="sidebar">
    <?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar' ) ) : ?>
        <p><?php _e( 'Please set up widgets at dashboard!', daniot_NAME ); ?></p>
    <?php endif; ?>
	<!-- 博客统计 -->
<div class="widget">
    <h1 class="widget-title">站点统计</h1>
    <ul>
        <li>文章总数：<?php echo wp_count_posts()->publish;?> 篇</li>
        <li>页面总数：<?php echo wp_count_posts('page')->publish;?> 个</li>
        <li>评论总数：<?php echo wp_count_comments()->total_comments?> 条</li>
        <li>分类总数：<?php echo wp_count_terms('category')?> 个</li>
        <li>标签总数：<?php echo wp_count_terms('post_tag')?> 个</li>
        <li>运行天数：<?php echo floor((time()-strtotime("2020-10-04"))/86400);?> 天</li>
        <li>访问总数：<?php
            $counterFile = "counter.txt";
            $counterBackupFile = "counter_bak.txt";
            function displayCounter($counterFile, $counterBackupFile) {
                $fp = fopen($counterFile, "r");
                $num = fgets($fp, 10);
                fclose($fp);
                $fp = fopen($counterBackupFile, "r");
                $numBak = fgets($fp, 10);
                fclose($fp);
                if ($num < 10) {
                    if ($numBak > 10) {
                        $num = $numBak;
                    }
                }
                if (!is_user_logged_in()) {
                    $num += 1;
                    $fp = fopen($counterFile, "w");
                    fputs($fp, $num, 10);
                    fclose($fp);
                    if ($num % 20 == 0 && $num > 10) {
                        $fp = fopen($counterBackupFile, "w");
                        fputs($fp, $num, 10);
                        fclose($fp);
                    }
                }
                echo "$num"." 人次";
            }

            if (!file_exists($counterFile)) {
                fopen($counterFile, "w");
                fputs($fp, 0, 10);
                fclose($fp);
            }
            if (!file_exists($counterBackupFile)) {
                fopen($counterBackupFile, "w");
                fputs($fp, 0, 10);
                fclose($fp);
            }

            displayCounter($counterFile, $counterBackupFile);
        ?></li>
    </ul>
</div>
</div>
