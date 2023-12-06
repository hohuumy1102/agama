<?php
// Register Custom Post Type Social media
// Post Type Key: Social media
function create_social_media_cpt() {

	$labels = array(
		'name' => __( 'Social media', 'Post Type General Name', 'affiliate' ),
		'singular_name' => __( 'Social media', 'Post Type Singular Name', 'affiliate' ),
		'menu_name' => __( 'Social media', 'affiliate' ),
		'name_admin_bar' => __( 'Social media', 'affiliate' ),
		'archives' => __( 'Social media Archives', 'affiliate' ),
		'attributes' => __( 'Social media Attributes', 'affiliate' ),
		'parent_item_colon' => __( 'Parent Social media:', 'affiliate' ),
		'all_items' => __( 'All Social media', 'affiliate' ),
		'add_new_item' => __( 'Add New Social media', 'affiliate' ),
		'add_new' => __( 'Add New', 'affiliate' ),
		'new_item' => __( 'New Social media', 'affiliate' ),
		'edit_item' => __( 'Edit Social media', 'affiliate' ),
		'update_item' => __( 'Update Social media', 'affiliate' ),
		'view_item' => __( 'View Social media', 'affiliate' ),
		'view_items' => __( 'View Social media', 'affiliate' ),
		'search_items' => __( 'Search Social media', 'affiliate' ),
		'not_found' => __( 'Not found', 'affiliate' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'affiliate' ),
		'featured_image' => __( 'Featured Image', 'affiliate' ),
		'set_featured_image' => __( 'Set featured image', 'affiliate' ),
		'remove_featured_image' => __( 'Remove featured image', 'affiliate' ),
		'use_featured_image' => __( 'Use as featured image', 'affiliate' ),
		'insert_into_item' => __( 'Insert into Social media', 'affiliate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Social media', 'affiliate' ),
		'items_list' => __( 'Social media list', 'affiliate' ),
		'items_list_navigation' => __( 'Social media list navigation', 'affiliate' ),
		'filter_items_list' => __( 'Filter Social media list', 'affiliate' ),
	);
	$args = array(
		'label' => __( 'Social media', 'affiliate' ),
		'description' => __( 'Social media', 'affiliate' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-gallery',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies' => array(''),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'social_media', $args );

}
add_action( 'init', 'create_social_media_cpt', 0 );

// Register Custom Post Type Product Service
// Post Type Key: Social media
function create_product_service_cpt()
{

	$labels = array(
		'name' => __('Product Service', 'Post Type General Name', 'affiliate'),
		'singular_name' => __('Product Service', 'Post Type Singular Name', 'affiliate'),
		'menu_name' => __('Product Service', 'affiliate'),
		'name_admin_bar' => __('Product Service', 'affiliate'),
		'archives' => __('Product Service Archives', 'affiliate'),
		'attributes' => __('Product Service Attributes', 'affiliate'),
		'parent_item_colon' => __('Parent Product Service:', 'affiliate'),
		'all_items' => __('All Product Service', 'affiliate'),
		'add_new_item' => __('Add New Product Service', 'affiliate'),
		'add_new' => __('Add New', 'affiliate'),
		'new_item' => __('New Product Service', 'affiliate'),
		'edit_item' => __('Edit Product Service', 'affiliate'),
		'update_item' => __('Update Product Service', 'affiliate'),
		'view_item' => __('View Product Service', 'affiliate'),
		'view_items' => __('View Product Service', 'affiliate'),
		'search_items' => __('Search Product Service', 'affiliate'),
		'not_found' => __('Not found', 'affiliate'),
		'not_found_in_trash' => __('Not found in Trash', 'affiliate'),
		'featured_image' => __('Featured Image', 'affiliate'),
		'set_featured_image' => __('Set featured image', 'affiliate'),
		'remove_featured_image' => __('Remove featured image', 'affiliate'),
		'use_featured_image' => __('Use as featured image', 'affiliate'),
		'insert_into_item' => __('Insert into Product Service', 'affiliate'),
		'uploaded_to_this_item' => __('Uploaded to this Product Service', 'affiliate'),
		'items_list' => __('Product Service list', 'affiliate'),
		'items_list_navigation' => __('Product Service list navigation', 'affiliate'),
		'filter_items_list' => __('Filter Product Service list', 'affiliate'),
	);
	$args = array(
		'label' => __('Product Service', 'affiliate'),
		'description' => __('Product Service', 'affiliate'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies' => array(''),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type('product_service', $args);

}
add_action('init', 'create_product_service_cpt', 0);

// Register Custom Post Type Event
// Post Type Key: Social media
function create_events_cpt()
{

	$labels = array(
		'name' => __('Event', 'Post Type General Name', 'affiliate'),
		'singular_name' => __('Event', 'Post Type Singular Name', 'affiliate'),
		'menu_name' => __('Event', 'affiliate'),
		'name_admin_bar' => __('Event', 'affiliate'),
		'archives' => __('Event Archives', 'affiliate'),
		'attributes' => __('Event Attributes', 'affiliate'),
		'parent_item_colon' => __('Parent Event:', 'affiliate'),
		'all_items' => __('All Event', 'affiliate'),
		'add_new_item' => __('Add New Event', 'affiliate'),
		'add_new' => __('Add New', 'affiliate'),
		'new_item' => __('New Event', 'affiliate'),
		'edit_item' => __('Edit Event', 'affiliate'),
		'update_item' => __('Update Event', 'affiliate'),
		'view_item' => __('View Event', 'affiliate'),
		'view_items' => __('View Event', 'affiliate'),
		'search_items' => __('Search Event', 'affiliate'),
		'not_found' => __('Not found', 'affiliate'),
		'not_found_in_trash' => __('Not found in Trash', 'affiliate'),
		'featured_image' => __('Featured Image', 'affiliate'),
		'set_featured_image' => __('Set featured image', 'affiliate'),
		'remove_featured_image' => __('Remove featured image', 'affiliate'),
		'use_featured_image' => __('Use as featured image', 'affiliate'),
		'insert_into_item' => __('Insert into Event', 'affiliate'),
		'uploaded_to_this_item' => __('Uploaded to this Event', 'affiliate'),
		'items_list' => __('Event list', 'affiliate'),
		'items_list_navigation' => __('Event list navigation', 'affiliate'),
		'filter_items_list' => __('Filter Event list', 'affiliate'),
	);
	$args = array(
		'label' => __('Event', 'affiliate'),
		'description' => __('Event', 'affiliate'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-camera-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies' => array(''),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type('event', $args);

}
add_action('init', 'create_events_cpt', 0);


// Register Custom Post Type Support guide
// Post Type Key: support_guide
function create_support_guide_cpt()
{

	$labels = array(
		'name' => __('Support guide', 'Post Type General Name', 'affiliate'),
		'singular_name' => __('Support guide', 'Post Type Singular Name', 'affiliate'),
		'menu_name' => __('Support guide', 'affiliate'),
		'name_admin_bar' => __('Support guide', 'affiliate'),
		'archives' => __('Support guide Archives', 'affiliate'),
		'attributes' => __('Support guide Attributes', 'affiliate'),
		'parent_item_colon' => __('Parent Support guide:', 'affiliate'),
		'all_items' => __('All Support guide', 'affiliate'),
		'add_new_item' => __('Add New Support guide', 'affiliate'),
		'add_new' => __('Add New', 'affiliate'),
		'new_item' => __('New Support guide', 'affiliate'),
		'edit_item' => __('Edit Support guide', 'affiliate'),
		'update_item' => __('Update Support guide', 'affiliate'),
		'view_item' => __('View Support guide', 'affiliate'),
		'view_items' => __('View Support guide', 'affiliate'),
		'search_items' => __('Search Support guide', 'affiliate'),
		'not_found' => __('Not found', 'affiliate'),
		'not_found_in_trash' => __('Not found in Trash', 'affiliate'),
		'featured_image' => __('Featured Image', 'affiliate'),
		'set_featured_image' => __('Set featured image', 'affiliate'),
		'remove_featured_image' => __('Remove featured image', 'affiliate'),
		'use_featured_image' => __('Use as featured image', 'affiliate'),
		'insert_into_item' => __('Insert into Support guide', 'affiliate'),
		'uploaded_to_this_item' => __('Uploaded to this Support guide', 'affiliate'),
		'items_list' => __('Support guide list', 'affiliate'),
		'items_list_navigation' => __('Support guide list navigation', 'affiliate'),
		'filter_items_list' => __('Filter Support guide list', 'affiliate'),
	);
	$args = array(
		'label' => __('Support guide', 'affiliate'),
		'description' => __('Support guide', 'affiliate'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-info',
		'supports' => array('title',
				'editor',
				'author',
				'thumbnail',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'page-attributes'),
		'taxonomies' => array(''),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type('support_guide', $args);

}
add_action('init', 'create_support_guide_cpt', 0);

