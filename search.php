<?php get_header(); ?>

<!-- bing搜索配置 -->
<form method="get" class="search-form" action="https://cn.bing.com/?ensearch=1&FORM=BEHPTB">
      <input type="text" class="search-input" id="bing" placeholder="请输入bing搜索关键词"   onkeydown="if(event.keyCode==13){return Search('bing');}"/>
	   	    <button type="submit" class="search-submit" onClick="return Search('bing');">
				<span class="mutheme-search"></span>
			</button>
		</form>	
		<script type="text/javascript">
		function Search(type){
   		 if (type=="bing") {
        		var value=$("#bing").val()||"";
       			 window.open("https://cn.bing.com/search?q="+value+"&qs=n&form=QBLHCN&sp=-1&pq=12&sc=9-2&sk=&cvid=5D551A28C93A4D39AFB42949C4AB8101"); 
   		 } 
		 else {
        	var value=$("#wp_search").val()||"";
        	window.open("https://zhang.ge/search/"+value+"/"); 
   			 }
    	return false;
		}
</script>
<!-- 站内搜索配置 -->
<div id="primary">
        <div class="breadcrumb-navigation">
            <a rel="bookmark" href="<?php echo home_url(); ?>"><?php _e( 'Home', MUTHEME_NAME ); ?></a>
            <span class="breadcrumb-arrow"></span><?php _e( 'Search keyword', MUTHEME_NAME ); ?>
            <span class="breadcrumb-arrow"></span>
            <?php the_search_query(); ?>
        </div>
        <div id="postlist">
            <?php if ( have_posts() ):while ( have_posts() ) : the_post();
                $post_thumbnail = mutheme_thumbnail( 'index-thumbnail', 130, 130 );
                $post_class     = 'post';

                if ( $post_thumbnail["exist"] ) {
                    $post_class .= ' post-has-thumbnail';
                }

                if ( is_sticky() ) {
                    $post_class .= ' post-sticky';
                }
                ?>
                <div id="post-<?php the_ID(); ?>" class="<?php echo $post_class; ?>">
                    <div class="post-header">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </div>
                    <div class="post-meta">
                        <ul class="inline-ul">
                            <li class="inline-li">
                                <?php the_time( 'Y/m/d' ); ?>
                            </li>
                            <li class="inline-li">
                                <span class="post-span">|</span>
                            </li>
                            <li class="inline-li">
                                <?php the_category( ' , ' ); ?>
                            </li>
                            <?php mutheme_views(); ?>
                            <li class="inline-li">
                                <span class="post-span">|</span>
                            </li>
                            <li class="inline-li">
                                <?php comments_popup_link( '0 reply', '1 reply', '% replies' ); ?>
                            </li>
                            <?php mutheme_likes(); ?>
                        </ul>
                    </div>
                    <div class="post-body">
                        <?php if ( $post_thumbnail["exist"] ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink() ?>" rel="bookmark">
                                    <img class="lazy"
                                         src="<?php echo mutheme_cdn( mutheme_image( 'placeholder.png' ) ); ?>"
                                         data-original="<?php echo mutheme_cdn( $post_thumbnail ); ?>"
                                         alt="<?php the_title(); ?>" width="130" height="130"/>
                                </a>
                            </div>
                            <div class="post-content">
                                <?php printf( '<p>%s</p>', mutheme_excerpt( $post->post_content, 320 ) ); ?>
                            </div>
                        <?php else : ?>
                            <div class="post-content">
                                <?php printf( '<p>%s</p>', mutheme_excerpt( $post->post_content, 250 ) ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="pagenavi">
            <?php mutheme_pagenavi(); ?>
        </div>
    </div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>