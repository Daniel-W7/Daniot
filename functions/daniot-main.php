<?php
/**
 * @name Daniot main
 * @description daniot theme basic functions
 *  @version     见functions.php中daniot-version定义的版本号
 * @author      Daniel
 * @url https://www.danios.com（海源）
 * @package     Daniot
 **/

// Enqueue theme css and javascript file
add_action( 'wp_enqueue_scripts', 'daniot_scripts' );
function daniot_scripts() {
    wp_enqueue_style( 'style', get_bloginfo( 'stylesheet_url' ) );

    //Enqueue jQuery and avoid conflict
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', daniot_script( 'jquery.min.js' ), false, '1.8.2' );
    wp_enqueue_script( 'jquery', false, false, '1.8.2' );

    wp_enqueue_script( 'daniot-all', daniot_script( 'all.js' ), null, daniot_VERSION, false );

    if( is_page_template( 'templates/archives.php' ) ){
        wp_enqueue_script( 'daniot-archives', daniot_script( 'archives.js' ), null, daniot_VERSION, false );
    }
}

// Theme setting part
if ( is_admin() ) {
    get_template_part( 'functions/libraries/class.tgm' );
    get_template_part( 'functions/libraries/theme-update-checker' );
    get_template_part( 'functions/daniot-settings' );

    //Theme update check
    new ThemeUpdateChecker( daniot_NAME, 'https://mufeng.me/wp-admin/admin-ajax.php?action=daniot_api' );

    // Initialize theme setting
    new daniot_settings();
}

// Disable google fonts
add_filter( 'gettext_with_context', 'daniot_google_fonts', 888, 4 );
function daniot_google_fonts( $translations, $text, $context, $domain ) {
    if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
        $translations = 'off';
    }

    return $translations;
}