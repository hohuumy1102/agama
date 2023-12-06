<?php

// Register Taxonomy Post Categories
// Taxonomy Key: Category Post
function create_category_article_type_tax()
{

	$labels = array(
		'name' => _x('Article type', 'Article type ', 'affiliate'),
		'singular_name' => _x('Article type', 'Article type ', 'affiliate'),
		'search_items' => __('Search Article type', 'affiliate'),
		'all_items' => __('All Article type', 'affiliate'),
		'parent_item' => __('Parent Category', 'affiliate'),
		'parent_item_colon' => __('Parent Category:', 'affiliate'),
		'edit_item' => __('Edit Category', 'affiliate'),
		'update_item' => __('Update Category', 'affiliate'),
		'add_new_item' => __('Add New Category', 'affiliate'),
		'new_item_name' => __('New Category Name', 'affiliate'),
		'menu_name' => __('Article type', 'affiliate'),
	);
	$args = array(
		'labels' => $labels,
		'description' => __('Article type', 'affiliate'),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('category_article_type', 'post', $args);

}
add_action('init', 'create_category_article_type_tax');

// Register Taxonomy Banner Categories
// Taxonomy Key: Category Banner
function create_category_social_media_tax() {

	$labels = array(
		'name'              => _x( 'Categories', 'Categories ', 'affiliate' ),
		'singular_name'     => _x( 'Categories', 'Category ', 'affiliate' ),
		'search_items'      => __( 'Search Categories', 'affiliate' ),
		'all_items'         => __( 'All Categories', 'affiliate' ),
		'parent_item'       => __( 'Parent Category', 'affiliate' ),
		'parent_item_colon' => __( 'Parent Category:', 'affiliate' ),
		'edit_item'         => __( 'Edit Category', 'affiliate' ),
		'update_item'       => __( 'Update Category', 'affiliate' ),
		'add_new_item'      => __( 'Add New Category', 'affiliate' ),
		'new_item_name'     => __( 'New Category Name', 'affiliate' ),
		'menu_name'         => __( 'Category', 'affiliate' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Categories', 'affiliate' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'category_social_media', 'social_media', $args );

}
add_action( 'init', 'create_category_social_media_tax' );


// Register Taxonomy Product Service
// Taxonomy Key: Category Banner
function create_category_product_service_tax()
{

	$labels = array(
		'name' => _x('Categories', 'Categories ', 'affiliate'),
		'singular_name' => _x('Categories', 'Category ', 'affiliate'),
		'search_items' => __('Search Categories', 'affiliate'),
		'all_items' => __('All Categories', 'affiliate'),
		'parent_item' => __('Parent Category', 'affiliate'),
		'parent_item_colon' => __('Parent Category:', 'affiliate'),
		'edit_item' => __('Edit Category', 'affiliate'),
		'update_item' => __('Update Category', 'affiliate'),
		'add_new_item' => __('Add New Category', 'affiliate'),
		'new_item_name' => __('New Category Name', 'affiliate'),
		'menu_name' => __('Category', 'affiliate'),
	);
	$args = array(
		'labels' => $labels,
		'description' => __('Categories', 'affiliate'),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('category_product_service', 'product_service', $args);

}
add_action('init', 'create_category_product_service_tax');
