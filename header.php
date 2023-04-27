<!--定义头部id和类,方便之后进行css格式配置-->
<!--定义网站标题-->
<div id="header">
    <div class="header">
        <!--根据是不是主页配置不同的类-->
        <?php
            if (is_home()) {
            echo '<h1 class="logo">';
            }else{
            echo '<h2 class="logo">';
            }
        ?>
        <!--顶部显示网站名称，logo-->
        <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
        <!--
        <img src="<?php //echo daniot_image( 'logo.png' ); ?>" 
                alt="<?php //bloginfo( 'name' ); ?>" 
                width="102"
                height="30"/>
        -->
        </a>
        <!--根据是不是主页配置显示内容，使首页标题横向显示-->
        <?php
        if (is_home()) {
            echo '</h1>';
        }else{
            echo '</h2>';
        }
        ?>
        <div class="global-nav">
            <?php wp_nav_menu( array(
                'theme_location'  => 'top-menu',
                'container_class' => 'top-menu'
            ) ); ?>
        </div>
        <div class="mobile-menu-button"></div>
    </div> 
</div>