<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Rakar
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// enqueue css
function rakar_common_custom_css(){
	wp_enqueue_style( 'rakar-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = rakar_opt( 'rakar_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $rakar_header_bg =  get_header_image();
    }else{
        if( rakar_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( rakar_meta( 'breadcumb_image' ) ) ){
                $rakar_header_bg = rakar_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $rakar_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$rakar_header_bg}')!important;
        }";
    }
    
	// Theme color
	$rakarthemecolor = rakar_opt('rakar_theme_color'); 
    if( !empty( $rakarthemecolor ) ){
        list($r, $g, $b) = sscanf( $rakarthemecolor, "#%02x%02x%02x");

        $rakar_real_color = $r.','.$g.','.$b;
        if( !empty( $rakarthemecolor ) ) {
            $customcss .= ":root {
            --theme-color: rgb({$rakar_real_color});
            }";
        }
    }

    // Heading  color
	$rakarheadingcolor = rakar_opt('rakar_heading_color');
    if( !empty( $rakarheadingcolor ) ){
        list($r, $g, $b) = sscanf( $rakarheadingcolor, "#%02x%02x%02x");

        $rakar_real_color = $r.','.$g.','.$b;
        if( !empty( $rakarheadingcolor ) ) {
            $customcss .= ":root {
                --title-color: rgb({$rakar_real_color});
            }";
        }
    }
    // Body color
	$rakarbodycolor = rakar_opt('rakar_body_color');
    if( !empty( $rakarbodycolor ) ){
        list($r, $g, $b) = sscanf( $rakarbodycolor, "#%02x%02x%02x");

        $rakar_real_color = $r.','.$g.','.$b;
        if( !empty( $rakarbodycolor ) ) {
            $customcss .= ":root {
                --body-color: rgb({$rakar_real_color});
            }";
        }
    }
    // White color
	$rakarwhitecolor = rakar_opt('rakar_white_color');
    if( !empty( $rakarwhitecolor ) ){
        list($r, $g, $b) = sscanf( $rakarwhitecolor, "#%02x%02x%02x");

        $rakar_real_color = $r.','.$g.','.$b;
        if( !empty( $rakarwhitecolor ) ) {
            $customcss .= ":root {
                --white-color: rgb({$rakar_real_color});
            }";
        }
    }

     // Body font
     $rakarbodyfont = rakar_opt('rakar_theme_body_font', 'font-family');
     if( !empty( $rakarbodyfont ) ) {
         $customcss .= ":root {
             --body-font: $rakarbodyfont ;
         }";
     }
 
     // Heading font
     $rakarheadingfont = rakar_opt('rakar_theme_heading_font', 'font-family');
     if( !empty( $rakarheadingfont ) ) {
         $customcss .= ":root {
             --title-font: $rakarheadingfont ;
         }";
     }


    if(rakar_opt('rakar_menu_icon_class')){
        $menu_icon_class = rakar_opt( 'rakar_menu_icon_class' );
    }else{
        $menu_icon_class = 'f7d9';
    }

    if( !empty( $menu_icon_class ) ) {
        $customcss .= ".main-menu ul.sub-menu li a:before {
                content: \"\\$menu_icon_class\" !important;
            }";
    }

    // if( !empty( $menu_icon_class ) ) {
    //     $customcss .= ":root {
    //         .main-menu ul.sub-menu li a:before {
    //             content: \"\\$menu_icon_class\";
    //         }
    //     }";
    // }

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'rakar-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'rakar_common_custom_css', 100 );