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
//WordPress获取站点总浏览量
function all_view() /*注意这个函数名，调用的就是用它了*/
{
global $wpdb;
$count=0;
$views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
foreach($views as $key=>$value)
{
$meta_value=$value->meta_value;
if($meta_value!=' ')
{
$count+=(int)$meta_value;}
}
return $count;}
//WordPress获取站点当前在线人数
function show_online_count() {
	//首先你要有读写文件的权限，首次访问肯不显示，正常情况刷新即可  
	$online_log = "/var/www/html/wp-content/themes/test/static/maplers.dat"; //保存人数的文件到根目录,  
	$timeout = 120;//30秒内没动作者,认为掉线  
	$entries = file($online_log);
	$temp = array();
	for ($i=0;$i<count($entries);$i++){
	$entry = explode(",",trim($entries[$i]));
	if(($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) {
	array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp  
	}}
	array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间  
	$maplers = count($temp); //计算在线人数  
	$entries = implode("",$temp);
	//写入文件  
	$fp = fopen($online_log,"w");
	flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些网络文件系统中正常工作  
	fputs($fp,$entries);
	flock($fp,LOCK_UN);
	fclose($fp);
	return $maplers;
}



?>
