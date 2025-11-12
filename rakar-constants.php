<?php
/**
 * @Packge     : Rakar
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant 
 *
 */

// Base URI
if ( ! defined( 'RAKAR_DIR_URI' ) ) {
    define('RAKAR_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'RAKAR_DIR_ASSIST_URI' ) ) {
    define( 'RAKAR_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'RAKAR_DIR_CSS_URI' ) ) {
    define( 'RAKAR_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('RAKAR_DIR_JS_URI')) {
    define('RAKAR_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('RAKAR_DIR_PATH')) {
    define('RAKAR_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('RAKAR_DIR_PATH_INC')) {
    define('RAKAR_DIR_PATH_INC', RAKAR_DIR_PATH . 'inc/');
}

//RAKAR framework Folder Directory
if (!defined('RAKAR_DIR_PATH_FRAM')) {
    define('RAKAR_DIR_PATH_FRAM', RAKAR_DIR_PATH_INC . 'rakar-framework/');
}

//Hooks Folder Directory
if (!defined('RAKAR_DIR_PATH_HOOKS')) {
    define('RAKAR_DIR_PATH_HOOKS', RAKAR_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'RAKAR_DEMO_DIR_PATH' ) ){
    define( 'RAKAR_DEMO_DIR_PATH', RAKAR_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'RAKAR_DEMO_DIR_URI' ) ){
    define( 'RAKAR_DEMO_DIR_URI', RAKAR_DIR_URI.'inc/demo-data/' );
}