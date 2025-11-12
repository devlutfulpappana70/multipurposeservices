<?php
/**
 * @Packge     : Rakar
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function rakar_essential_scripts() {

    wp_enqueue_style( 'rakar-style', get_stylesheet_uri() ,array(), wp_get_theme()->get( 'Version' ) ); 

    // google font
    wp_enqueue_style( 'rakar-fonts', rakar_google_fonts() ,array(), null );

    // Bootstrap Min
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) ,array(), '5.0.0' );

    // Font Awesome Six
    wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) ,array(), '6.0.0' );

    // Magnific Popup
    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );

    // Swiper css
    wp_enqueue_style( 'swiper-css', get_theme_file_uri( '/assets/css/swiper-bundle.min.css' ) ,array(), '4.0.13' );

    // Wishlist css
    wp_enqueue_style( 'wishlist-css', get_theme_file_uri( '/assets/css/th-wl.css' ), array(), '1.0' );

    // rakar main style
    wp_enqueue_style( 'rakar-main-style', get_theme_file_uri('/assets/css/style.css') ,array(), wp_get_theme()->get( 'Version' ) );


    // Load Js

    // Bootstrap
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '5.0.0', true );

    // swiper js
    wp_enqueue_script( 'swiper-js', get_theme_file_uri( '/assets/js/swiper-bundle.min.js' ), array('jquery'), '1.0.0', true );

    // magnific popup
    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), '1.0.0', true );

    // counterup
    wp_enqueue_script( 'counterup', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), array( 'jquery' ), '4.0.0', true );

    // jquery-ui
    wp_enqueue_script( 'jquery-ui-slider' );

    // Isotope Imagesloaded
    wp_enqueue_script( 'imagesloaded' ); 

    // Isotope
    wp_enqueue_script( 'isototpe-pkgd', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '1.0.0', true );

    // main script
    wp_enqueue_script( 'rakar-main-script', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), wp_get_theme()->get( 'Version' ), true );

    // comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rakar_essential_scripts',99 );


function rakar_block_editor_assets( ) {
    // Add custom fonts.
    wp_enqueue_style( 'rakar-editor-fonts', rakar_google_fonts(), array(), null );
}

add_action( 'enqueue_block_editor_assets', 'rakar_block_editor_assets' );

/*
Register Fonts
*/
function rakar_google_fonts() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language. 
     */
     
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'rakar' ) ) {
        $font_url =  'https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Inter:wght@100..900&display=swap';
    }
    return $font_url;
}