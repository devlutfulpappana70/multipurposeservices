<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<?php
    wp_body_open();

    /**
    *
    * Preloader
    *
    * Hook rakar_preloader_wrap
    *
    * @Hooked rakar_preloader_wrap_cb 10
    *
    */
    do_action( 'rakar_preloader_wrap' );

    if( ! rakar_opt('rakar_header_sticky')){ ?>
        <div id="smooth-wrapper">
            <div id="smooth-content">
    <?php }

    /**
    *
    * rakar header
    *
    * Hook rakar_header
    *
    * @Hooked rakar_header_cb 10
    *
    */
    do_action( 'rakar_header' );

    if( rakar_opt('rakar_header_sticky')) { ?>
        <div id="smooth-wrapper">
            <div id="smooth-content">
    <?php }


    /**
    *
    * rakar breadcrumb
    *
    * Hook rakar_breadcrumb
    *
    * @Hooked rakar_breadcrumb_cb 10
    *
    */
    do_action( 'rakar_breadcrumb' );