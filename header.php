<?php
/**
 * @Packge     : Rakar
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $rakar_post_id = get_the_ID();

            // Get the page settings manager
            $rakar_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $rakar_page_settings_model = $rakar_page_settings_manager->get_model( $rakar_post_id );

            // Retrieve the color we added before
            $rakar_header_style = $rakar_page_settings_model->get_settings( 'rakar_header_style' );
            $rakar_header_builder_option = $rakar_page_settings_model->get_settings( 'rakar_header_builder_option' );

            if( $rakar_header_style == 'header_builder'  ) {

                if( !empty( $rakar_header_builder_option ) ) {
                    $rakarheader = get_post( $rakar_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $rakarheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $rakar_header_builder_trigger = rakar_opt('rakar_header_options');
                if( $rakar_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $rakar_global_header_select = get_post( rakar_opt( 'rakar_header_select_options' ) );
                    $header_post = get_post( $rakar_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    rakar_global_header_option();
                }
            }
        } else {
            $rakar_header_options = rakar_opt('rakar_header_options');
            if( $rakar_header_options == '1' ) {
                rakar_global_header_option();
            } else {
                $rakar_header_select_options = rakar_opt('rakar_header_select_options');
                $rakarheader = get_post( $rakar_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $rakarheader->ID );
                echo '</header>';
            }
        }
    } else {
        rakar_global_header_option();
    }