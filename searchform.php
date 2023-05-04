<!-- 搜索框配置 -->
<form  role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="danios-searchsubmit" value="站内搜索" />
        <input type="submit" id="bing-searchsubmit" value="bing搜索" />
    </div>
</form>
<form action="https://cn.bing.com/search" method="get" onsubmit="_submit()" class="search_k" target="_blank">    
    <input type="text" size="26" maxlength="100" class="swap_value" name="q" value="" placeholder="必应搜索">
    <button type="submit" class="wp-block-button-s"">必应搜索</button>
</form>