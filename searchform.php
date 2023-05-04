<!-- 搜索框配置 -->
<form  role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
		<label class="screen-reader-text" for="s"></label>
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
        <input type="submit" id="danios-searchsubmit" value="站内搜索" />
        <input type="submit" id="bing-searchsubmit" value="bing搜索" onkeydown="if(event.keyCode==13){searchtype=bing;}" />
    </div>
</form>
<div class="box_c" text-align:="" center;="">
    <form action="https://cn.bing.com/search" method="get" onsubmit="_submit()" class="search_k" target="_blank">    
        <input type="hidden" name="qs" value="n">    
        <input type="hidden" name="sp" value="-1">    
        <input type="hidden" name="sc" value="8-0">    
        <input type="hidden" name="sk" value="">    
        <input type="hidden" name="setmkt" value="zh-cn">    
        <input type="hidden" name="setlang" value="zh-cn">    
        <input type="hidden" name="FORM" value="SECNEN">    
        <input type="hidden" name="pq" value="">    
        <input type="text" size="26" maxlength="100" class="swap_value" name="q" value="" placeholder="输入关键词按回车键必应搜索">
        <button type="submit" class="wp-block-button-s" style="color:#fff;background-color:#3578dc;border-color:#17a2b800;border-radius:3px;box-shadow:none;text-decoration: none;padding:4px;font-size:1.125em">必应搜索</button>
    </form>
</div>
<script> const SITE = "www.danios.com "; 
function _submit() 
{ 
    let q = document.getElementsByName('q')[0]; 
    let pq = document.getElementsByName('pq')[0]; 
    q.value = 'site:'+ SITE + q.value; 
    pq.value = q.value; } 
    </script>
    </div>