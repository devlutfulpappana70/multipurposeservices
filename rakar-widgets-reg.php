<?php
/**
 * @Packge     : Rakar
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

function rakar_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $rakar_sidebar_widget_title_heading_tag = rakar_opt('rakar_sidebar_widget_title_heading_tag');
    } else {
        $rakar_sidebar_widget_title_heading_tag = 'h3';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'rakar' ),
        'id'            => 'rakar-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'rakar' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'rakar' ),
        'id'            => 'rakar-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'rakar' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );
    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 1', 'rakar' ),
           'id'            => 'rakar-footer-1',
           'before_widget' => '<div class="col-md-6 col-xl-auto"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 2', 'rakar' ),
           'id'            => 'rakar-footer-2',
           'before_widget' => '<div class="col-md-6 col-xl-auto"><div id="%1$s" class="widget widget_nav_menu footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 3', 'rakar' ),
           'id'            => 'rakar-footer-3',
           'before_widget' => '<div class="col-md-6 col-xl-auto"><div id="%1$s" class="widget widget_nav_menu footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 4', 'rakar' ),
           'id'            => 'rakar-footer-4',
           'before_widget' => '<div class="col-md-6 col-xl-auto"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Offcanvas Sidebar', 'rakar' ),
           'id'            => 'rakar-offcanvas',
           'before_widget' => '<div id="%1$s" class="widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
    }
    if( class_exists('woocommerce') ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'WooCommerce Sidebar', 'rakar' ),
                'id'            => 'rakar-woo-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your woocommerce page sidebar.', 'rakar' ),
                'before_widget' => '<div class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget_title">',
                'after_title'   => '</h3>',
            )
        );
    }

}

add_action( 'widgets_init', 'rakar_widgets_init' );