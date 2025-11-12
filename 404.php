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

    if( class_exists( 'ReduxFramework' ) ) {
        $rakar404title     = rakar_opt( 'rakar_error_title' ); 
        $rakar404subtitle     = rakar_opt( 'rakar_error_subtitle' ); 
        $rakar404description  = rakar_opt( 'rakar_error_description' );
        $rakar404btntext      = rakar_opt( 'rakar_error_btn_text' );
    } else {
        $rakar404title     = __( 'OooPs! Page Not Found', 'rakar' );
        $rakar404subtitle     = __( 'This page seems to have slipped through a time portal', 'rakar' );
        $rakar404description  = __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rakar' );
        $rakar404btntext      = __( ' Back To Home', 'rakar');

    }

    // get header //
    get_header(); 

    if(!empty(rakar_opt('rakar_error_bg', 'url' ) )){
        $bg_url = rakar_opt('rakar_error_bg', 'url' );
    }else{
        $bg_url = '';
    }
    
        echo '<div class="overflow-hidden" data-bg-src="'.esc_url( $bg_url ).'">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-xl-5 col-lg-6 align-self-center py-5">';
                        echo '<div class="error-content">';
                            if(!empty($rakar404title)){
                                echo '<h2 class="h1 error-title">'.wp_kses_post( $rakar404title ).'</h2>';
                            }
                            if(!empty($rakar404subtitle)){
                                echo '<h3 class="box-title error-subtitle">'.wp_kses_post( $rakar404subtitle ).'</h3>';
                            }
                            if(!empty($rakar404description)){
                                echo '<p class="error-text">'.esc_html( $rakar404description ).'</p>';
                            }
                            echo '<a href="'.esc_url( home_url('/') ).'" class="th-btn error-btn"><i class="fal fa-home me-2"></i>'.esc_html( $rakar404btntext ).'</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-xl-7 col-lg-6 align-self-end">';
                        echo '<div class="error-img">';
                            if(!empty(rakar_opt('rakar_error_img', 'url' ) )){
                                echo '<img src="'.esc_url( rakar_opt('rakar_error_img', 'url' ) ).'" alt="'.esc_attr__('404 image', 'rakar').'">';
                            }else{
                                echo '<img src="'.get_template_directory_uri().'/assets/img/error_image.png" alt="'.esc_attr__('404 image', 'rakar').'">';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';

    //footer
    get_footer();