<?php 
/*
register_nav_menu( $location, $description )
函数功能：开启导航菜单功能
@参数 string $location, 导航菜单的位置
@参数 string $description, 导航菜单的描述
开启多个位置的导航菜单，只需要重复调用此函数即可
*/
register_nav_menu( 'daniot-topmenu', '网站的顶部导航' ); 
register_nav_menu( 'daniot-leftmenu', '网站的左侧导航' );
register_nav_menu( 'daniot-rightmenu', '网站的右侧导航' );    //注册一个菜单
/*添加feed自动链接功能*/
add_theme_support('automatic-feed-links');
/**
* 想要wp_title()函数实现，访问首页显示“站点标题-站点副标题”
* 如果存在翻页且正方的不是第1页，标题格式“标题-第2页”
* 当使用短横线-作为分隔符时，会将短横线转成字符实体&#8211;
* 而我们不需要字符实体，因此需要替换字符实体
* wp_title()函数显示的内容，在分隔符前后会有空格，也要去掉
*/
add_filter('wp_title', 'lingfeng_wp_title', 10, 2);
function lingfeng_wp_title($title, $sep) {
	global $paged, $page;

	//如果是feed页，返回默认标题内容
	if ( is_feed() ) { 
		return $title;
	}

	// 标题中追加站点标题
	$title .= get_bloginfo( 'name' );

	// 网站首页追加站点副标题
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// 标题中显示第几页
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( '第%s页', max( $paged, $page ) );

	//去除空格，-的字符实体
	$search = array('&#8211;', ' ');
	$replace = array('-', '');
	$title = str_replace($search, $replace, $title);

	return $title;	
}

//WordPress获取当前在线人数:{$online_count},今日访问量：{$today_count},昨日访问量：{$yesterday_count},本月访问量：{$month_count},总访问量：{$total_count}
function view_count() /*注意这个函数名，调用的就是用它了*/
{
	$online_log = dirname(__FILE__).'/static/online_log.dat'; //保存在线人数的统计文件到对应目录,
	$count_log = dirname(__FILE__).'/static/count_log.dat';//保存月日的统计文件到对应目录,

	//WordPress获取站点当前在线人数
	//首先你要有读写文件的权限，首次访问肯不显示，正常情况刷新即可  
	  
	$timeout = 120;//120秒内没动作者,认为掉线  
	$entries = file($online_log);
	$temp = array();
	for ($i=0;$i<count($entries);$i++){
	$entry = explode(",",trim($entries[$i]));
	if(($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) {
	array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp  
	}}
	array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间  
	$online_count = count($temp); //计算在线人数  
	$entries = implode("",$temp);
	//写入文件  
	$fp = fopen($online_log,"w");
	flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些网络文件系统中正常工作  
	fputs($fp,$entries);
	flock($fp,LOCK_UN);
	fclose($fp);

	//WordPress获取站点总访问量：{$total_count},
	global $wpdb;
	$total_count=0;
	$views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
	foreach($views as $key=>$value)
	{
	$meta_value=$value->meta_value;
	if($meta_value!=' ')
	{
	$total_count+=(int)$meta_value;}
	}

	//WordPress获取今日访问量：{$today_count},昨日访问量：{$yesterday_count},本月访问量：{$month_count},总访问量：{$total_count}
	
	//$data = unserialize(file_get_contents($file));
	$fp=fopen($count_log,'r+');
	$content='';
	if (flock($fp,LOCK_EX)){
		while (($buffer=fgets($fp,1024))!=false){
			$content=$content.$buffer;
		}
		$data=unserialize($content);
		//设置记录键值
		$month_count = date('Ym');
		$today_count = date('Ymd');
		$yesterday_count = date('Ymd',strtotime("-1 day"));
		$tongji = array();
		// 本月访问量增加
		$tongji[$month_count] = $data[$month_count] + 1;
		// 今日访问增加
		$tongji[$today_count] = $data[$today_count] + 1;
		//保持昨天访问
		$tongji[$yesterday_count] = $data[$yesterday_count];
		//保存统计数据
		ftruncate($fp,0); // 将文件截断到给定的长度
		rewind($fp); // 倒回文件指针的位置
		fwrite($fp, serialize($tongji));
		flock($fp,LOCK_UN);
		fclose($fp);
		//输出数据
		$month_count = $tongji[$month_count];
		$today_count= $tongji[$today_count];
		$yesterday_count = $tongji[$yesterday_count]?$tongji[$yesterday_count]:0;
		echo "在线:{$online_count},今日:{$today_count},总:{$total_count}";
		//echo "当前在线人数:{$online_count},今日访问量：{$today_count},昨日访问量：{$yesterday_count},本月访问量：{$month_count},总访问量：{$total_count} ";
		//echo "document.write('总访问量：{$total_count}, 本月访问量：{$month_count}, 昨日访问量：{$yesterday_count}, 今日访问量：{$today_count}');";
	}
}

/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @Param int $range			数字分页的宽度
* @Return string|empty		输出分页的HTML代码		
*/
function daniot_pagenavi( $range = 4 ) {
	global $paged,$wp_query;
	if ( !@$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}
	if( $max_page >1 ) {
		echo "<div class='fenye'>"; 
		if( !$paged ){
			$paged = 1;
		}
		if( $paged != 1 ) {
			echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
		}
		previous_posts_link('上一页');
		if ( $max_page >$range ) {
			if( $paged <$range ) {
				for( $i = 1; $i <= ($range +1); $i++ ) {
					echo "<a href='".get_pagenum_link($i) ."'";
				if($i==$paged) echo " class='current'";echo ">$i</a>";
				}
			}elseif($paged >= ($max_page -ceil(($range/2)))){
				for($i = $max_page -$range;$i <= $max_page;$i++){
					echo "<a href='".get_pagenum_link($i) ."'";
					if($i==$paged)echo " class='current'";echo ">$i</a>";
					}
				}elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
					for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
						echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
					}
				}
			}else{
				for($i = 1;$i <= $max_page;$i++){
					echo "<a href='".get_pagenum_link($i) ."'";
					if($i==$paged)echo " class='current'";echo ">$i</a>";
				}
			}
		next_posts_link('下一页');
		if($paged != $max_page){
			echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
		}
		echo '<span>共['.$max_page.']页</span>';
		echo "</div>\n";  
	}
}

//默认搜索伪静态
/*
function wp_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) . "/");
        exit();
    }
}
add_action( 'template_redirect', 'wp_search_url_rewrite' );
*/
?>
