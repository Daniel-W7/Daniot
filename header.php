<!--定义头部id和类,方便之后进行css格式配置-->
<!--定义网站标题-->
<div id="header">
    <div class="header">
        <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
        </a>
        <div class="global-nav">
            <?php wp_nav_menu( array(
                'theme_location'  => 'top-menu',
                'container_class' => 'top-menu'
            ) ); ?>
        </div>
        <div class="mobile-menu-button"></div>
    </div> 
</div>