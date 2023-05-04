<!-- 搜索框配置 -->
<form  style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px; role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
		<label class="screen-reader-text" for="s"></label>
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
        <input type="submit" id="danios-searchsubmit" value="站内搜索" />
        <input type="submit" id="bing-searchsubmit" value="bing搜索" onkeydown="if(event.keyCode==13){searchtype=bing;}" />
    </div>
</form>