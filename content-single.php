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

    rakar_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $rakar_post_details_title_position = rakar_opt('rakar_post_details_title_position');
        } else {
            $rakar_post_details_title_position = 'header';
        }

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
        // Blog Post Thumbnail
        do_action( 'rakar_blog_post_thumb' );
        
        echo '<div class="blog-content">';
            // Blog Post Meta
            do_action( 'rakar_blog_post_meta' );

            if( $rakar_post_details_title_position != 'header' ) {
                echo '<h2 class="blog-title">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
            }

            if( get_the_content() ){

                the_content();
                // Link Pages
                rakar_link_pages();
            }  

            if( class_exists('ReduxFramework') ) {
                $rakar_post_details_share_options = rakar_opt('rakar_post_details_share_options');
                $rakar_display_post_tags = rakar_opt('rakar_display_post_tags');
                $rakar_author_options = rakar_opt('rakar_post_details_author_desc_trigger');
            } else {
                $rakar_post_details_share_options = false;
                $rakar_display_post_tags = false;
                $rakar_author_options = false;
            }
            
            $rakar_post_tag = get_the_tags();
            
            if( ! empty( $rakar_display_post_tags ) || ( ! empty($rakar_post_details_share_options )) ){
                echo '<div class="share-links clearfix">';
                    echo '<div class="row justify-content-between">';
                        if( is_array( $rakar_post_tag ) && ! empty( $rakar_post_tag ) ){
                            if( count( $rakar_post_tag ) > 1 ){
                                $tag_text = __( 'Tags:', 'rakar' );
                            }else{
                                $tag_text = __( 'Tag:', 'rakar' );
                            }
                            if($rakar_display_post_tags){
                                echo '<div class="col-md-auto">';
                                    echo '<span class="share-links-title">'.esc_html($tag_text).'</span>';
                                    echo '<div class="tagcloud">';
                                        foreach( $rakar_post_tag as $tags ){
                                            echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
    
                        /**
                        *
                        * Hook for Blog Details Share Options
                        *
                        * Hook rakar_blog_details_share_options
                        *
                        * @Hooked rakar_blog_details_share_options_cb 10
                        *
                        */
                        do_action( 'rakar_blog_details_share_options' );
    
                    echo '</div>';
    
                echo '</div>';    
            }  
        
        echo '</div>';

    echo '</div>'; 

        /**
        *
        * Hook for Post Navigation
        *
        * Hook rakar_blog_details_post_navigation
        *
        * @Hooked rakar_blog_details_post_navigation_cb 10
        *
        */
        do_action( 'rakar_blog_details_post_navigation' );

        /**
        *
        * Hook for Blog Authro Bio
        *
        * Hook rakar_blog_details_author_bio
        *
        * @Hooked rakar_blog_details_author_bio_cb 10
        *
        */
        do_action( 'rakar_blog_details_author_bio' );

        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook rakar_blog_details_comments
        *
        * @Hooked rakar_blog_details_comments_cb 10
        *
        */
        do_action( 'rakar_blog_details_comments' );
