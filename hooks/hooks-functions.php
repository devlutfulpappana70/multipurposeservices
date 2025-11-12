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


    // preloader hook function
    if( ! function_exists( 'rakar_preloader_wrap_cb' ) ) {
        function rakar_preloader_wrap_cb() {
            $preloader_display              =  rakar_opt('rakar_display_preloader');

            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){
                    echo '<div id="preloader" class="preloader">';
                        echo '<button class="th-btn preloaderCls">'.esc_html__( 'Cancel Preloader', 'rakar' ).'</button>';
                        echo '<div class="preloader-inner">
                            <div class="loader">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>';
                    echo '</div>';
                }
            }else{
                echo '<div class="preloader">';
                    echo '<button class="th-btn preloaderCls">'.esc_html__( 'Cancel Preloader', 'rakar' ).'</button>';
                    echo '<div class="preloader-inner">
                        <div class="loader">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>';
                echo '</div>';
            }

        }
    }

    // Header Hook function
    if( !function_exists('rakar_header_cb') ) { 
        function rakar_header_cb( ) {
            get_template_part('templates/header');
        }
    }

    // Header Hook function
    if( !function_exists('rakar_breadcrumb_cb') ) { 
        function rakar_breadcrumb_cb( ) {
            get_template_part('templates/header-menu-bottom');
        }
    }

    // back top top hook function
    if( ! function_exists( 'rakar_back_to_top_cb' ) ) {
        function rakar_back_to_top_cb( ) {
            $backtotop_trigger = rakar_opt('rakar_display_bcktotop');
            if( class_exists( 'ReduxFramework' ) ) {
                if( $backtotop_trigger ) {
            	?>
                    <div class="scroll-top">
                        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
                            </path>
                        </svg>
                    </div>
                <?php 
                }
            }

        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('rakar_blog_start_wrap_cb') ) {
        function rakar_blog_start_wrap_cb() { ?>
            <section class="th-blog-wrapper space-top space-extra-bottom">
                <div class="container">
                    <div class="row">
        <?php }
    }

    // Blog End Wrapper Function
    if( !function_exists('rakar_blog_end_wrap_cb') ) {
        function rakar_blog_end_wrap_cb() {?>
                    </div>
                </div>
            </section>
        <?php }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('rakar_blog_col_start_wrap_cb') ) {
        function rakar_blog_col_start_wrap_cb() {
           
                //Redux option work
                if( class_exists('ReduxFramework') ) {
                    $rakar_blog_sidebar = rakar_opt('rakar_blog_sidebar');
                }else{
                    $rakar_blog_sidebar = '1';
                }

                if( class_exists('ReduxFramework') ) {
                    // $rakar_blog_sidebar = rakar_opt('rakar_blog_sidebar');
                    if( $rakar_blog_sidebar == '2' && is_active_sidebar('rakar-blog-sidebar') ) {
                        echo '<div class="col-xxl-8 col-lg-7  order-lg-last">';
                    } elseif( $rakar_blog_sidebar == '3' && is_active_sidebar('rakar-blog-sidebar') ) {
                        echo '<div class="col-xxl-8 col-lg-7">';
                    } else {
                        echo '<div class="col-lg-12">';
                    }

                } else {
                    if( is_active_sidebar('rakar-blog-sidebar') ) {
                        echo '<div class="col-xxl-8 col-lg-7">';
                    } else {
                        echo '<div class="col-lg-12">';
                    }
                }
                

        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('rakar_blog_col_end_wrap_cb') ) {
        function rakar_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('rakar_blog_sidebar_cb') ) {
        function rakar_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_blog_sidebar = rakar_opt('rakar_blog_sidebar');
            } else {
                $rakar_blog_sidebar = 2;
                
            }
            if( $rakar_blog_sidebar != 1 && is_active_sidebar('rakar-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('rakar_blog_details_sidebar_cb') ) {
        function rakar_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_blog_single_sidebar = rakar_opt('rakar_blog_single_sidebar');
            } else {
                $rakar_blog_single_sidebar = 4;
            }
            if( $rakar_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('rakar_blog_pagination_cb') ) {
        function rakar_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('rakar_blog_content_cb') ) {
        function rakar_blog_content_cb( ) {

            //Redux option work
            if( class_exists('ReduxFramework') ) {
                $rakar_blog_grid = rakar_opt('rakar_blog_grid');  
            }else{
                $rakar_blog_grid = '1';
            }

            if( $rakar_blog_grid == '1' ) {
                $rakar_blog_grid_class = 'col-lg-12';
            } elseif( $rakar_blog_grid == '2' ) {
                $rakar_blog_grid_class = 'col-sm-6';
            } else {
                $rakar_blog_grid_class = 'col-lg-4 col-sm-6';
            }

            echo '<div class="row">';
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        echo '<div class="'.esc_attr($rakar_blog_grid_class).'">';
                            get_template_part('templates/content',get_post_format());
                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else{
                    get_template_part('templates/content','none');
                }
            echo '</div>';
        }
    }

    // footer content Function
    if( !function_exists('rakar_footer_content_cb') ) {
        function rakar_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'rakar_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'rakar_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'rakar_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $rakar_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $rakar_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $rakar_footer_builder_trigger = rakar_opt('rakar_footer_builder_trigger');
                            if( $rakar_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $rakar_global_footer_select = get_post( rakar_opt( 'rakar_footer_builder_select' ) );
                                $footer_post = get_post( $rakar_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                rakar_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $rakar_footer_builder_trigger = rakar_opt('rakar_footer_builder_trigger');
                    if( $rakar_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $rakar_global_footer_select = get_post( rakar_opt( 'rakar_footer_builder_select' ) );
                        $footer_post = get_post( $rakar_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        rakar_footer_global_option();
                    }
                }
            } else { ?>
                <div class="footer-layout1 footer-sitcky">
                    <div class="copyright-wrap bg-theme2">
                        <div class="container">
                            <p class="copyright-text text-center"><?php echo sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s"> %s </a> All Rights Reserved.', date('Y'), esc_url('#'), esc_html__( 'Rakar.','rakar') ); ?></p> 
                        </div>
                    </div>
                </div>
            <?php }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('rakar_blog_details_wrapper_start_cb') ) {
        function rakar_blog_details_wrapper_start_cb( ) {
            echo '<section class="th-blog-wrapper blog-details space-top space-extra-bottom">';
                echo '<div class="container">';
                    if( is_active_sidebar( 'rakar-blog-sidebar' ) ){
                        $rakar_gutter_class = 'gx-60';
                    }else{
                        $rakar_gutter_class = '';
                    }
                    // echo '<div class="row './/esc_attr( $rakar_gutter_class ).'">';
                    echo '<div class="row">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('rakar_blog_details_col_start_cb') ) {
        function rakar_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_blog_single_sidebar = rakar_opt('rakar_blog_single_sidebar');
                if( $rakar_blog_single_sidebar == '2' && is_active_sidebar('rakar-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7 order-lg-last">';
                } elseif( $rakar_blog_single_sidebar == '3' && is_active_sidebar('rakar-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('rakar-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('rakar_blog_post_meta_cb') ) {
        function rakar_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_display_post_author      =  rakar_opt('rakar_display_post_author');
                $rakar_display_post_date      =  rakar_opt('rakar_display_post_date');
                $rakar_display_post_cate   =  rakar_opt('rakar_display_post_cate');
                $rakar_display_post_comments      =  rakar_opt('rakar_display_post_comments');
            } else {
                $rakar_display_post_author      = '1';
                $rakar_display_post_date      = '1';
                $rakar_display_post_cate   = '1';
                $rakar_display_post_comments      = '0'; 
            }

                echo '<div class="blog-meta">';
                    if( $rakar_display_post_author ){
                        echo '<a class="author" href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fal fa-user"></i>'. esc_html__('By ', 'rakar') .esc_html( ucwords( get_the_author() ) ).'</a>';
                    }
                    if( $rakar_display_post_date ){
                        echo ' <a href="'.esc_url( rakar_blog_date_permalink() ).'"><i class="fal fa-clock"></i>'.esc_html( get_the_date() ).'</a>';
                    }
                    if( $rakar_display_post_cate ){
                        $categories = get_the_category(); 
                        if(!empty($categories)){
                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"><img src="'.get_template_directory_uri().'/assets/img/cat_1.svg" alt="'.esc_html__('Icon', 'rakar').'">'.esc_html( $categories[0]->name ).'</a>';
                        }
                    }
                    if( $rakar_display_post_comments ){
                        ?>
                        <a href="#"><i class="fal fa-comment"></i>
                            <?php 
                                if(get_comments_number() == 1){
                                    echo esc_html__('Comment (', 'rakar'); 
                                }else{
                                    echo esc_html__('Comments (', 'rakar'); 
                                }
                                echo get_comments_number(); ?>)</a>
                        <?php
                    }
                echo '</div>';
        }
    }

    // blog details share options hook function
    if( !function_exists('rakar_blog_details_share_options_cb') ) {
        function rakar_blog_details_share_options_cb( ) {

            if( class_exists('ReduxFramework') ) {
                $rakar_post_details_share = rakar_opt('rakar_post_details_share_options');
            } else {
                $rakar_post_details_share = "0";
            }

            if( function_exists( 'rakar_social_sharing_buttons' ) ){
                if( $rakar_post_details_share ){
                    echo '<div class="col-sm-auto text-xl-end">';
                        echo '<span class="share-links-title">'.esc_html__('Share On:', 'rakar').'</span>';
                       echo ' <div class="th-social">';
                            echo rakar_social_sharing_buttons();
                        echo '</div>';
                    echo '</div>';
                }
            }
            
    
        }
    }
    
    
    // blog details author bio hook function
    if( !function_exists('rakar_blog_details_author_bio_cb') ) {
        function rakar_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  rakar_opt( 'rakar_post_details_author_box' );
            } else {
                $postauthorbox = '0';
            }
            if(  $postauthorbox == '1' ) {

                echo '<div class="author-widget-wrap">';
                        echo '<div class="avater">';
                            echo '<img src="'.esc_url( get_avatar_url( get_the_author_meta('ID') ) ).'" alt="img">';
                        echo '</div>';
                        echo '<div class="avater-content">';
                            echo ' <div class="author-info">';
                                echo '<h3 class="name"><a class="text-inherit" href="#">'.esc_html( ucwords( get_the_author() )).'</a></h3>';
                                echo '<span class="text">'.get_user_meta( get_the_author_meta('ID'), '_rakar_author_desig',true ).'</span>';
                            echo '</div>';
                            echo '<p class="author-bio">'.get_the_author_meta( 'user_description', get_the_author_meta('ID') ).'</p>';
                            echo '<div class="social-links">';
                                    $rakar_social_icons = get_user_meta( get_the_author_meta('ID'), '_rakar_social_profile_group',true );
                                    if(!empty($rakar_social_icons)){
                                        foreach( $rakar_social_icons as $singleicon ) {
                                            if( ! empty( $singleicon['_rakar_social_profile_icon'] ) ) {
                                                echo '<a href="'.esc_url( $singleicon['_rakar_lawyer_social_profile_link'] ).'"><i class="'.esc_attr( $singleicon['_rakar_social_profile_icon'] ).'"></i></a>';
                                            }
                                        }
                                    }
                            echo '</div>';
                        echo '</div>';
             echo '</div>';

               
            }

        }
    }

     // Blog Details Post Navigation hook function
     if( !function_exists( 'rakar_blog_details_post_navigation_cb' ) ) {
        function rakar_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_post_navigation = rakar_opt('rakar_post_details_post_navigation');
            } else {
                $rakar_post_navigation = 0;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( ($rakar_post_navigation == '1') && (!empty($prevpost) || !empty($nextpost)) ) {
                echo '<div class="blog-navigation">'; 
                    if( ! empty( $prevpost ) ) {
                        echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'" class="nav-btn prev">';
                            echo '<i class="fa-solid fa-angle-left"></i>';
                            echo ' <span class="nav-text">'.get_the_title($prevpost->ID).'</span>';
                        echo '</a>';
                    }

                    if( ! empty( $nextpost ) ) {
                        echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'" class="nav-btn next">';
                            echo '<i class="fa-solid fa-angle-right"></i>';
                            echo ' <span class="nav-text">'.get_the_title($nextpost->ID).'</span>';
                        echo '</a>';
                    }
                echo '</div>';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('rakar_blog_details_comments_cb') ) {
        function rakar_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo rakar_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'rakar' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('rakar_blog_details_col_end_cb') ) {
        function rakar_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('rakar_blog_details_wrapper_end_cb') ) {
        function rakar_blog_details_wrapper_end_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('rakar_page_start_wrap_cb') ) {
        function rakar_page_start_wrap_cb( ) {
            
            if( is_page( 'cart' ) ){
                $section_class = "th-cart-wrapper space-top space-extra-bottom";
            }elseif( is_page( 'checkout' ) ){
                $section_class = "th-checkout-wrapper space-top space-extra-bottom";
            }elseif( is_page('wishlist') ){
                $section_class = "wishlist-area space-top space-extra-bottom";
            }else{
                $section_class = "space-top space-extra-bottom";  
            }
            echo '<section class="'.esc_attr( $section_class ).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('rakar_page_end_wrap_cb') ) {
        function rakar_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('rakar_page_col_start_wrap_cb') ) {
        function rakar_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_page_sidebar = rakar_opt('rakar_page_sidebar');
            }else {
                $rakar_page_sidebar = '1';
            }
            
            if( $rakar_page_sidebar == '2' && is_active_sidebar('rakar-page-sidebar') ) {
                echo '<div class="col-lg-8 order-last">';
            } elseif( $rakar_page_sidebar == '3' && is_active_sidebar('rakar-page-sidebar') ) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('rakar_page_col_end_wrap_cb') ) {
        function rakar_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('rakar_page_sidebar_cb') ) {
        function rakar_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $rakar_page_sidebar = rakar_opt('rakar_page_sidebar');
            }else {
                $rakar_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $rakar_page_layoutopt = rakar_opt('rakar_page_layoutopt');
            }else {
                $rakar_page_layoutopt = '3';
            }

            if( $rakar_page_layoutopt == '1' && $rakar_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $rakar_page_layoutopt == '2' && $rakar_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('rakar_page_content_cb') ) {
        function rakar_page_content_cb( ) {
            if(  class_exists('woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_page('wishlist') || is_account_page() )  ) {
                echo '<div class="woocommerce--content">';
            } else {
                echo '<div class="page--content clearfix">';
            }

                the_content();

                // Link Pages
                rakar_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        }
    }

    if( !function_exists('rakar_blog_post_thumb_cb') ) {
        function rakar_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $rakar_post_slider_thumbnail = rakar_meta( 'post_format_slider' );

            if( !empty( $rakar_post_slider_thumbnail ) ){
                echo '<div class="blog-img th-slider" data-slider-options=\'{"effect":"fade"}\'>';
                    echo '<div class="swiper-wrapper">';
                        foreach( $rakar_post_slider_thumbnail as $single_image ){
                            echo '<div class="swiper-slide">';
                                echo rakar_img_tag( array(
                                    'url'   => esc_url( $single_image )
                                ) );
                            echo '</div>';
                        }
                    echo '</div>';
                    echo '<button class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                    echo '<button class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
                echo '</div>';

            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="blog-img">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">'; 
                    }

                    the_post_thumbnail();

                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && ! empty ( rakar_meta( 'post_format_video' ) ) ){
                    echo '<div class="blog-img blog-video" data-overlay="title" data-opacity="4">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();

                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( rakar_meta( 'post_format_video' ) ).'" class="play-btn popup-video">';
                            echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo rakar_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $rakar_audio = rakar_meta( 'post_format_audio' );
                if( ! empty( $rakar_audio ) ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $rakar_audio );
                    echo '</div>';
                }elseif( ! is_single() ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $rakar_audio );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists('rakar_blog_post_content_cb') ) {
        function rakar_blog_post_content_cb( ) {
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );
            if( class_exists( 'ReduxFramework' ) ) {
                $rakar_excerpt_length          = rakar_opt( 'rakar_blog_postExcerpt' );
                $rakar_display_post_category   = rakar_opt( 'rakar_display_post_category' );
            } else {
                $rakar_excerpt_length          = '48';
                $rakar_display_post_category   = '1';
            }

            if( class_exists( 'ReduxFramework' ) ) {
                $rakar_blog_admin = rakar_opt( 'rakar_blog_post_author' );
                $rakar_blog_readmore_setting_val = rakar_opt('rakar_blog_readmore_setting');
                if( $rakar_blog_readmore_setting_val == 'custom' ) {
                    $rakar_blog_readmore_setting = rakar_opt('rakar_blog_custom_readmore');
                } else {
                    $rakar_blog_readmore_setting = __( 'READ MORE', 'rakar' );
                }
            } else {
                $rakar_blog_readmore_setting = __( 'READ MORE', 'rakar' );
                $rakar_blog_admin = true;
            }
            echo '<!-- blog-content -->';

                do_action( 'rakar_blog_post_thumb' );
                
                echo '<div class="blog-content">';

                    // Blog Post Meta
                    do_action( 'rakar_blog_post_meta' );

                    echo '<!-- Post Title -->';
                    echo '<h2 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
                    echo '<!-- End Post Title -->';

                    echo '<!-- Post Summary -->';
                    echo rakar_paragraph_tag( array(
                        "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $rakar_excerpt_length, '' ), $allowhtml ),
                        "class" => 'blog-text',
                    ) );
  
                    if( !empty( $rakar_blog_readmore_setting ) ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="th-btn">'.esc_html( $rakar_blog_readmore_setting ).'<i class="far fa-arrow-right ms-2"></i></a>';
                    }

                    echo '<!-- End Post Summary -->';
                echo '</div>';
            echo '<!-- End Post Content -->';
        }
    }
