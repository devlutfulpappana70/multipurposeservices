<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function rakar_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'rakar_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function rakar_register_metabox() {

	$prefix = '_rakar_';

	$prefixpage = '_rakarpage_';
	
	$rakar_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'rakar' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );

    $rakar_post_meta->add_field( array(
        'name' => esc_html__( 'Post Format Video', 'rakar' ),
        'desc' => esc_html__( 'Use This Field When Post Format Video', 'rakar' ),
        'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );

	$rakar_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'rakar' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'rakar' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$rakar_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'rakar' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'rakar' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$rakar_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'rakar' ),
		'object_types'  => array( 'page', 'rakar_event' ), // Post type
        'closed'        => true
    ) );

    $rakar_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'rakar' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'rakar' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','rakar'),
            '2'     => esc_html__('Hide','rakar'),
        )
    ) );


    $rakar_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'rakar' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__('Global Settings','rakar'),
            'page'     => esc_html__('Page Settings','rakar'),
        )
	) );

    $rakar_page_meta->add_field( array(
        'name'    => esc_html__( 'Breadcumb Image', 'rakar' ),
        'desc'    => esc_html__( 'Upload an image or enter an URL.', 'rakar' ),
        'id'      => $prefix . 'breadcumb_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => __( 'Add File', 'rakar' ) // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $rakar_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'rakar' ),
		'desc' => esc_html__( 'check to display Page Title.', 'rakar' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','rakar'),
            '2'     => esc_html__('Hide','rakar'),
        )
	) );

    $rakar_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'rakar' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','rakar'),
            'custom'  => esc_html__('Custom Title','rakar'),
        ),
        'default'   => 'default'
    ) );

    $rakar_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'rakar' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $rakar_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'rakar' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'rakar' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => rakar_set_checkbox_default_for_new_post( true ),
    ) );

    $rakar_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'rakar' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$rakar_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'rakar' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'rakar' ),
            '2' => esc_html__( 'Container Fluid', 'rakar' ),
            '3' => esc_html__( 'Fullwidth', 'rakar' ),
        ),
	) );

	// code for body class//

    $rakar_layout_meta->add_field( array(
	'name' => esc_html__( 'Insert Your Body Class', 'rakar' ),
	'id'   => $prefix . 'custom_body_class',
	'type' => 'text'
    ) );

}

add_action( 'cmb2_admin_init', 'rakar_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function rakar_register_taxonomy_metabox() {

    $prefix = '_rakar_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$rakar_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'rakar' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$rakar_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'rakar' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$rakar_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'rakar' ),
		'desc' => esc_html__( 'Set Category Image', 'rakar' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','rakar') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$rakar_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'rakar' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta as post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
    $rakar_user->add_field( array(
		'name' => esc_html__( 'Author Designation', 'rakar' ),
		'desc' => esc_html__( 'Use This Field When Author Designation', 'rakar' ),
		'id'   => $prefix . 'author_desig',
        'type' => 'text',
    ) );
	$rakar_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'rakar' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $rakar_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'rakar' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'rakar' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'rakar' ),
            'remove_button'     => __( 'Remove Social Profile', 'rakar' ),
            'closed'         => true
        ),
    ) );

    $rakar_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'rakar' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $rakar_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'rakar' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'rakar' ),
        'type'       => 'text'
    ) );
}
