<?php get_header() ?>
<!--左侧菜单栏-->
<?php get_sidebar(); ?>
<!--内容栏-->
<div id="contents">
<!-- bing搜索配置 -->
<form method="get" class="search-form" action="https://cn.bing.com/?ensearch=1&FORM=BEHPTB">
      <input type="text" class="search-input" id="bing" placeholder="请输入bing搜索关键词"   onkeydown="if(event.keyCode==13){return Search('bing');}"/>
	   	    <button type="submit" class="search-submit" onClick="return Search('bing');">
				<span class="daniot-search"></span>
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
            <span class="breadcrumb-arrow"></span>
            <?php the_search_query(); ?>
        </div>
        <div id="postlist">
            <?php if ( have_posts() ):while ( have_posts() ) : the_post();
                $post_class     = 'post';
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
                            <li class="inline-li">
                                <span class="post-span">|</span>
                            </li>
                            <li class="inline-li">
                                <?php comments_popup_link( '0 reply', '1 reply', '% replies' ); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="post-body">
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="pagenavi">
            <?php daniot_pagenavi(); ?>
        </div>
    </div>
    <?php get_footer() ?>