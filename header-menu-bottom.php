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
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( rakar_meta('page_breadcrumb_area') ) ) {
            $rakar_page_breadcrumb_area  = rakar_meta('page_breadcrumb_area');
        } else {
            $rakar_page_breadcrumb_area = '1';
        }
    }else{
        $rakar_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $rakar_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            
            if( class_exists( 'ReduxFramework' ) ){
                $ex_class = '';
            }else{
                $ex_class = ' th-breadcumb';   
            }
            echo '<div class="breadcumb-banner">';
                echo '<div class="breadcumb-wrapper '. esc_attr($ex_class).'" id="breadcumbwrap">';
                    echo '<div class="container">';
                        echo '<div class="breadcumb-content">';
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                                if( !empty( rakar_meta('page_breadcrumb_settings') ) ) {
                                    if( rakar_meta('page_breadcrumb_settings') == 'page' ) {
                                        $rakar_page_title_switcher = rakar_meta('page_title');
                                    } else {
                                        $rakar_page_title_switcher = rakar_opt('rakar_page_title_switcher');
                                    }
                                } else {
                                    $rakar_page_title_switcher = '1';
                                }
                            } else {
                                $rakar_page_title_switcher = '1';
                            }

                            if( $rakar_page_title_switcher ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $rakar_page_title_tag    = rakar_opt('rakar_page_title_tag');
                                }else{
                                    $rakar_page_title_tag    = 'h1';
                                }

                                if( defined( 'CMB2_LOADED' )  ){
                                    if( !empty( rakar_meta('page_title_settings') ) ) {
                                        $rakar_custom_title = rakar_meta('page_title_settings');
                                    } else {
                                        $rakar_custom_title = 'default';
                                    }
                                }else{
                                    $rakar_custom_title = 'default';
                                }

                                if( $rakar_custom_title == 'default' ) {
                                    echo rakar_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $rakar_page_title_tag ),
                                            "text"  => esc_html( get_the_title( ) ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    echo rakar_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $rakar_page_title_tag ),
                                            "text"  => esc_html( rakar_meta('custom_page_title') ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }

                            }
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                                if( rakar_meta('page_breadcrumb_settings') == 'page' ) {
                                    $rakar_breadcrumb_switcher = rakar_meta('page_breadcrumb_trigger');
                                } else {
                                    $rakar_breadcrumb_switcher = rakar_opt('rakar_enable_breadcrumb');
                                }

                            } else {
                                $rakar_breadcrumb_switcher = '1';
                            }

                            if( $rakar_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                    rakar_breadcrumbs(
                                        array(
                                            'breadcrumbs_classes' => '',
                                        )
                                    );
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        echo '<!-- Page title 3 -->';
         if( class_exists( 'ReduxFramework' ) ){
            $ex_class = '';
            if (class_exists( 'woocommerce' ) && is_shop()){
            $breadcumb_bg_class = 'custom-woo-class';
            }elseif(is_404()){
                $breadcumb_bg_class = 'custom-error-class';
            }elseif(is_search()){
                $breadcumb_bg_class = 'custom-search-class';
            }elseif(is_archive()){
                $breadcumb_bg_class = 'custom-archive-class';
            }else{
                $breadcumb_bg_class = '';
            }
        }else{
            $breadcumb_bg_class = ''; 
            $ex_class = ' th-breadcumb';     
        }

        echo '<div class="breadcumb-banner">';
            echo '<div class="breadcumb-wrapper '. esc_attr($breadcumb_bg_class . $ex_class).'">'; 
                echo '<div class="container z-index-common">';
                        echo '<div class="breadcumb-content">';
                            if( class_exists( 'ReduxFramework' )  ){
                                $rakar_page_title_switcher  = rakar_opt('rakar_page_title_switcher');
                            }else{
                                $rakar_page_title_switcher = '1';
                            }

                            if( $rakar_page_title_switcher ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $rakar_page_title_tag    = rakar_opt('rakar_page_title_tag');
                                }else{
                                    $rakar_page_title_tag    = 'h1';
                                }
                                if( class_exists('woocommerce') && is_shop() ) {
                                    echo rakar_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $rakar_page_title_tag ),
                                            "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }elseif ( is_archive() ){
                                    echo rakar_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $rakar_page_title_tag ),
                                            "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }elseif ( is_home() ){
                                    $rakar_blog_page_title_setting = rakar_opt('rakar_blog_page_title_setting');
                                    $rakar_blog_page_title_switcher = rakar_opt('rakar_blog_page_title_switcher');
                                    $rakar_blog_page_custom_title = rakar_opt('rakar_blog_page_custom_title');
                                    if( class_exists('ReduxFramework') ){
                                        if( $rakar_blog_page_title_switcher ){
                                            echo rakar_heading_tag(
                                                array(
                                                    "tag"   => esc_attr( $rakar_page_title_tag ),
                                                    "text"  => !empty( $rakar_blog_page_custom_title ) && $rakar_blog_page_title_setting == 'custom' ? esc_html( $rakar_blog_page_custom_title) : esc_html__( 'Latest News', 'rakar' ),
                                                    'class' => 'breadcumb-title'
                                                )
                                            );
                                        }
                                    }else{
                                        echo rakar_heading_tag(
                                            array(
                                                "tag"   => "h1",
                                                "text"  => esc_html__( 'Latest News', 'rakar' ),
                                                'class' => 'breadcumb-title',
                                            )
                                        );
                                    }
                                }elseif( is_search() ){
                                    echo rakar_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $rakar_page_title_tag ),
                                            "text"  => esc_html__( 'Search Result', 'rakar' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }elseif( is_404() ){
                                    echo rakar_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $rakar_page_title_tag ),
                                            "text"  => esc_html__( 'Error Page', 'rakar' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }elseif( is_singular( 'product' ) ){
                                    $posttitle_position  = rakar_opt('rakar_product_details_title_position');
                                    $postTitlePos = false;
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }

                                    if( $postTitlePos != true ){
                                        echo rakar_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $rakar_page_title_tag ),
                                                "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    } else {
                                        if( class_exists( 'ReduxFramework' ) ){
                                            $rakar_post_details_custom_title  = rakar_opt('rakar_product_details_custom_title');
                                        }else{
                                            $rakar_post_details_custom_title = __( 'Shop Details','rakar' );
                                        }

                                        if( !empty( $rakar_post_details_custom_title ) ) {
                                            echo rakar_heading_tag(
                                                array(
                                                    "tag"   => esc_attr( $rakar_page_title_tag ),
                                                    "text"  => wp_kses( $rakar_post_details_custom_title, $allowhtml ),
                                                    'class' => 'breadcumb-title'
                                                )
                                            );
                                        }
                                    }
                                }else{
                                    $posttitle_position  = rakar_opt('rakar_post_details_title_position');
                                    $postTitlePos = false;
                                    if( is_single() ){
                                        if( class_exists( 'ReduxFramework' ) ){
                                            if( $posttitle_position && $posttitle_position != 'header' ){
                                                $postTitlePos = true;
                                            }
                                        }else{
                                            $postTitlePos = false;
                                        }
                                    }
                                    if( is_singular( 'product' ) ){
                                        $posttitle_position  = rakar_opt('rakar_product_details_title_position');
                                        $postTitlePos = false;
                                        if( class_exists( 'ReduxFramework' ) ){
                                            if( $posttitle_position && $posttitle_position != 'header' ){
                                                $postTitlePos = true;
                                            }
                                        }else{
                                            $postTitlePos = false;
                                        }
                                    }

                                    if( $postTitlePos != true ){
                                        echo rakar_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $rakar_page_title_tag ),
                                                "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    } else {
                                        if( class_exists( 'ReduxFramework' ) ){
                                            $rakar_post_details_custom_title  = rakar_opt('rakar_post_details_custom_title');
                                        }else{
                                            $rakar_post_details_custom_title = __( 'Blog Details','rakar' );
                                        }

                                        if( !empty( $rakar_post_details_custom_title ) ) {
                                            echo rakar_heading_tag(
                                                array(
                                                    "tag"   => esc_attr( $rakar_page_title_tag ),
                                                    "text"  => wp_kses( $rakar_post_details_custom_title, $allowhtml ),
                                                    'class' => 'breadcumb-title'
                                                )
                                            );
                                        }
                                    }
                                }
                            }
                            if( class_exists('ReduxFramework') ) {
                                $rakar_breadcrumb_switcher = rakar_opt( 'rakar_enable_breadcrumb' );
                            } else {
                                $rakar_breadcrumb_switcher = '1';
                            }
                            if( $rakar_breadcrumb_switcher == '1' ) {
                                if(rakar_breadcrumbs()){
                                echo '<div>';
                                    rakar_breadcrumbs(
                                        array(
                                            'breadcrumbs_classes' => 'nav',
                                        )
                                    );
                                echo '</div>';
                                }
                            }
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }