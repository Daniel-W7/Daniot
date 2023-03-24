<?php

/**
 * @name Daniot setting
 * @description Custom setting of themes
 *  @version     见functions.php中daniot-version定义的版本号
 * @author      Daniel
 * @url https://www.danios.com（海源）
 * @package     Daniot
 **/
class daniot_settings {
    private $defaults;

    public function __construct() {
        $this->defaults = array(
            array(
                'title' => '主题配色',
                'key'   => 'color',
                'type'  => 'radio',
                'value' => array(
                    'default' => '默认',
                    'red'     => '新年红',
                    'blue'    => '理工蓝',
                    'green'   => '青葱绿'
                ),
                'label' => false
            ),
            array(
                'title' => '网站描述',
                'key'   => 'description',
                'type'  => 'textarea',
                'value' => false,
                'label' => '用简洁凝练的话对你的网站进行描述'
            ),
            array(
                'title' => '网站关键词',
                'key'   => 'keywords',
                'type'  => 'textarea',
                'value' => false,
                'label' => '多个关键词请用英文逗号隔开'
            ),
            array(
                'title' => '导航标签数量',
                'key'   => 'tag_number',
                'type'  => 'number',
                'value' => false,
                'label' => '默认标签数量为25,标签使用文章数量排序'
            ),
            array(
                'title' => 'CDN设置',
                'key'   => 'cdn',
                'type'  => 'radio',
                'value' => array(
                    0 => '不使用',
                    1 => '七牛',
                    2 => '又拍'
                ),
                'label' => '七牛用户勾选即可,又拍用户需要新建规则: <code>!260x260</code>'
            ),
            array(
                'title' => '头像来源',
                'key'   => 'avatar',
                'type'  => 'radio',
                'value' => array(
                    0 => '默认',
                    1 => '多说'
                ),
                'label' => false
            ),
            /*array(
                'title' => '导航栏',
                'key'   => 'fixed_navigation',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '固定头部导航栏',
                'label' => '勾选后，导航栏将会固定在头部'
            ),*/
            array(
                'title' => '导航菜单',
                'key'   => 'disable_global_navigation',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '禁用导航菜单',
                'label' => '勾选后，禁止使用下拉导航菜单'
            ),
            array(
                'title' => '缩略图',
                'key'   => 'thumbnail',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '只显示特色图片',
                'label' => '勾选后，首页和归档页面只显示特色图片的缩略图，文章中插入的图片缩略图将不会显示'
            ),
            array(
                'title' => '默认小工具',
                'key'   => 'register_widget',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '开启默认小工具',
                'label' => '默认禁用 Wordpress 自带的小工具, 勾选后，开启默认小工具'
            ),
            array(
                'title' => '首页、分类内容',
                'key'   => 'full-content',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '显示全文',
                'label' => '默认首页、分类页显示摘要, 勾选后，开启后显示全文'
            )
        );

        // Add theme setting menu and page
        add_action( 'admin_menu', array( $this, 'menu' ) );

        // Register wordpress plugins install extention
        add_action( 'tgmpa_register', array( $this, 'plugins' ) );
    }

    public function menu() {
        add_menu_page( daniot_NAME, daniot_NAME, 'manage_options', 'daniot_setting', array(
            $this,
            'page'
        ), daniot_image( 'setting-icon.png' ), 59 );

        add_submenu_page( 'daniot_setting', daniot_NAME . ' 主题设置', '主题设置', 'edit_themes', 'daniot_setting', array(
            $this,
            'page'
        ) );
        add_submenu_page( 'daniot_setting', daniot_NAME . ' 说明文档', '说明文档', 'edit_themes', 'daniot_help', array(
            $this,
            'help'
        ) );

        add_action( 'admin_init', array( $this, 'settings_group' ) );
    }

    public function page() {
        if ( isset( $_REQUEST['settings-updated'] ) ) { ?>
            <div id="message" class="updated fade">
                <p><strong>主题设置已保存.</strong></p>
            </div>
        <?php
        }

        ?>

        <div class="wrap">
            <h2>主题设置</h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'daniot-settings-group' ); ?>
                <table class="form-table">
                    <tbody>
                    <?php
                    foreach ( $this->defaults as $key => $arr ) {
                        ?>
                        <tr valign="top">
                            <th scope="row">
                                <label><?php echo $arr['title']; ?></label>
                            </th>
                            <td>
                                <p>
                                    <?php $this->build( $arr ); ?>
                                </p>
                                <?php
                                if ( $arr['label'] ) {
                                    printf( '<p class="description">%s</p>', $arr['label'] );
                                }
                                ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
                <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>"/>
            </form>
        </div>

    <?php
    }

    public function help() {
        wp_enqueue_style( 'daniot-help', daniot_style( 'help.css' ) );
        ?>
        <div class="wrap">
            <h1>欢迎使用<?php echo daniot_NAME ?></h1>

            <div class="changelog">
                <div class="feature-section under-the-hood one-col">
                    <div class="col">
                        <h3>功能说明</h3>

                        <p>
                            主题提供四种颜色（默认、新年红、理工蓝、青葱绿）以供选择，Gavatar头像默认采用多说源，可在后台关闭；主题提供了三个侧边栏小工具（最新文章、最新评论、热门文章）；禁止加载Google Fonts，关闭了Wordpress
                            默认要输出的 head 部分功能，推荐使用七牛云加速会有更好的体验；本主题支持后台更新。
                        </p>
						<p>首页左上角logo替换位置在\public\images\logo.png 尺寸为205*60 缓冲图标为\public\images\placeholder.png 建议尺寸144*144
                        <p>
                            主题推荐安装 WP-PostViews、WP-Zan 插件：WP-PostViews 是文章浏览量统计插件，热门文章小工具采用了此插件；WP-Zan 是文章点赞插件。
                        </p>
                    </div>
                </div>
                <div class="feature-section under-the-hood one-col">
                    <div class="col">
                        <h3>菜单图标</h3>

                        <p>
                        <ul class="daniot-icon-list">
                            <?php
                            $icon_arr = array(
                                'daniot-layers',
                                'daniot-air',
                                'daniot-aircraft',
                                'daniot-drive',
                                'daniot-colours',
                                'daniot-compass',
                                'daniot-game',
                                'daniot-home',
                                'daniot-image',
                                'daniot-medal',
                                'daniot-mic',
                                'daniot-rocket',
                                'daniot-shop',
                                'daniot-user',
                                'daniot-instagram',
                                'daniot-music',
                                'daniot-video',
                                'daniot-apple',
                                'daniot-windows',
                                'daniot-android',
                                'daniot-twitter',
                                'daniot-github',
                                'daniot-feed',
                                'daniot-tablet',
                                'daniot-mobile',
                                'daniot-linux',
                                'daniot-dribbble',
                                'daniot-weibo',
                                'daniot-wordpress',
                                'daniot-qq',
                                'daniot-wechat',
                                'daniot-facebook',
                                'daniot-safari',
                                'daniot-chrome',
                                'daniot-firefox',
                                'daniot-opera',
                                'daniot-ie',
                                'daniot-edge',
                                'daniot-download',
                                'daniot-email',
                                'daniot-tag',
                                'daniot-comment'
                            );

                            foreach ( $icon_arr as $key => $val ) {
                                ?>
                                <li>
                                    <span class="<?php echo $val; ?>"></span>
                                    <code><?php echo $val; ?></code>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="feature-section under-the-hood two-col">
                    <div class="col">
                        <h3>菜单设置</h3>

                        <p>
                        <ol>
                            <li>菜单页面</code>点击<code>显示选项</code>，勾选上<code>CSS类</code></li>
                            <li>点击菜单右侧下三角，展开编辑选项；</li>
                            <li>在<code>CSS类（可选）</code>填选上相应的图标名称</li>
                        </ol>
                        </p>
                    </div>
                </div>
                <div class="feature-section under-the-hood one-col">
                    <div class="col">
                        <h3>关于</h3>
                        <p>主题版本：<?php echo daniot_NAME . ' ' . daniot_VERSION; ?><p>
						<p>若有主题问题或建议,可以访问<a href="https://www.danios.com" target="_blank">海源</a>(https://www.danios.com)查看帮助或联系我们</p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    public function settings_group() {
        register_setting( 'daniot-settings-group', daniot_NAME . '_settings' );
    }

    public function plugins() {
        $plugins = array(
            array(
                'name'     => 'WP-Zan ',
                'slug'     => 'wp-zan',
                'required' => false,
            ),
            array(
                'name'     => 'WP-PostViews ',
                'slug'     => 'wp-postviews',
                'required' => false,
            )
        );

        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'domain'       => daniot_NAME,           // Text domain - likely want to be the same as your theme.
            'default_path' => '',                          // Default absolute path to pre-packaged plugins
            'has_notices'  => true,                        // Show admin notices or not
            'is_automatic' => true,                        // Automatically activate plugins after installation or not
            'message'      => '',                          // Message to output right before the plugins table
            'strings'      => array(
                'page_title'                      => __( '安装推荐插件', daniot_NAME ),
                'menu_title'                      => __( '安装插件', daniot_NAME ),
                'installing'                      => __( '正在安装插件: %s', daniot_NAME ),
                // %1$s = plugin name
                'oops'                            => __( '出错了.', daniot_NAME ),
                'notice_can_install_required'     => _n_noop( daniot_NAME . ' 需要安装下面的插件: %1$s.', daniot_NAME . ' 需要安装下面的插件: %1$s.' ),
                // %1$s = plugin name(s)
                'notice_can_install_recommended'  => _n_noop( daniot_NAME . ' 推荐安装下面的插件: %1$s.', daniot_NAME . ' 推荐安装下面的插件: %1$s.' ),
                // %1$s = plugin name(s)
                'notice_cannot_install'           => _n_noop( '对不起，您没有权限安装%s插件.请联系网站管理员安装.', '对不起，您没有权限安装%s插件.请联系网站管理员安装..' ),
                // %1$s = plugin name(s)
                'notice_can_activate_required'    => _n_noop( '必需的插件没有被启用: %1$s.', '必需的插件没有被启用: %1$s.' ),
                // %1$s = plugin name(s)
                'notice_can_activate_recommended' => _n_noop( '推荐的插件没有被启用: %1$s.', '推荐的插件没有被启用: %1$s.' ),
                // %1$s = plugin name(s)
                'notice_cannot_activate'          => _n_noop( '对不起，您没有权限启用%s插件，请联系网站管理员启用插件.', '对不起，您没有权限启用%s插件，请联系网站管理员启用插件.' ),
                // %1$s = plugin name(s)
                'notice_ask_to_update'            => _n_noop( '为了获得最好的兼容性，请更新插件（注意：更新后将不再是汉化版本）: %1$s.', '为了获得最好的兼容性，请更新插件（注意：更新后将不再是汉化版本）: %1$s.' ),
                // %1$s = plugin name(s)
                'notice_cannot_update'            => _n_noop( '对不起，您没有权限更新%s插件，请联系网站管理员更新d.', '对不起，您没有权限更新%s插件，请联系网站管理员更新。' ),
                // %1$s = plugin name(s)
                'install_link'                    => _n_noop( '开始安装插件', '开始安装插件' ),
                'activate_link'                   => _n_noop( '启用已安装的插件。', '启用已安装的插件' ),
                'return'                          => __( '继续安装推荐插件。', daniot_NAME ),
                'plugin_activated'                => __( '成功开启插件。', daniot_NAME ),
                'complete'                        => __( '所有插件已成功安装并开启 %s。', daniot_NAME ),
                // %1$s = dashboard link
                'nag_type'                        => 'updated',
                // Determines admin notice type - can only be 'updated' or 'error'
                'dismiss'                         => '不再提示'
            )
        );

        tgmpa( $plugins, $config );
    }

    private function build( $obj ) {
        switch ( $obj['type'] ) {
            case 'number':
                $this->number( $obj['key'] );
                break;

            case 'input':
                $this->input( $obj['key'] );
                break;

            case 'textarea':
                $this->textarea( $obj['key'] );
                break;

            case 'radio':
                $this->radio( $obj['key'], $obj['value'] );
                break;

            case 'checkbox':
                $this->checkbox( $obj['key'], $obj['value'], $obj['text'] );
                break;
        }
    }

    private function input( $key ) {
        printf( '<input type="input" class="regular-text" name="%s_settings[%s]" value="%s" />', daniot_NAME, $key, daniot_settings( $key ) );
    }

    private function number( $key ) {
        printf( '<input type="number" class="small-text" name="%s_settings[%s]" value="%s" step="1" min="1" />', daniot_NAME, $key, daniot_settings( $key ) );
    }

    private function textarea( $key ) {
        printf( '<textarea type="textarea" class="large-text" name="%s_settings[%s]">%s</textarea>', daniot_NAME, $key, daniot_settings( $key ) );
    }

    private function radio( $key, $value ) {
        $real_val = daniot_settings( $key );

        foreach ( $value as $_key => $_val ) { ?>
            <label>
                <input class="daniot-<?php echo $_key; ?>" type="radio"
                       name="<?php echo daniot_NAME . '_settings[' . $key . ']'; ?>"
                       value="<?php echo $_key; ?>" <?php if ( $_key == $real_val ) {
                    echo 'checked="checked"';
                } ?> /> <?php echo $_val; ?>
            </label>
        <?php }
    }

    private function checkbox( $key, $value, $text ) {
        $real_val = daniot_settings( $key );

        ?>
        <label>
            <input type="checkbox" name="<?php echo daniot_NAME . '_settings[' . $key . ']'; ?>"
                   value="<?php echo $value; ?>" <?php if ( $value == $real_val ) {
                echo 'checked="checked"';
            } ?> /> <?php echo $text; ?>
        </label>
    <?php }
}