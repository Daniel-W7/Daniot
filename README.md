# Daniot

php版本及安装包：                             
  php7.4 php7.4-cli php7.4-common php7.4-json php7.4-mbstring php7.4-mysql php7.4-opcache php7.4-readline  
注：php7.4-mbstring需要修改php.ini，添加extension=php_mbstring.dll，重启apache才能正常使用 

wordpress版本：6.1


# 版本说明/更新日志
**v0.0.1_daniel**

* 修改主体名称为daniot（海源）
* 解决页面菜单栏下拉菜单问题
* 重新定义版本和说明文件，简化使用和理解
* 通过调整php_mbstring的配置及说明，使主题可正常显示
* 修复“WP_Widget 类在 daniot_widget_populars 中的调用构造方法自 4.3.0 版本起以弃用！请使用 __construct() 代替”报错，以及部分语法错误
* 发现启用wp-zan插件会导致报错，之后再处理,小工具移除.recentcomments样式,移除CSS/JS版本号两个选项会导致报错，暂时关闭
* 升级到jquery3.6.4，适配wordpress6.1，php7.4