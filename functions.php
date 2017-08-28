<?php

function icapital_screenr_child_enqueue_styles() {

	$parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[ $parent_style ],
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'wp_enqueue_scripts', 'icapital_screenr_child_enqueue_styles' );

function page_header( $item ) {
	if ( is_category() && function_exists('category_image_src')) {
		$cat_image = category_image_src( array( 'size' => 'full' ) , false );
		$item['title'] = single_cat_title( '', false );
		$item['image'] = $cat_image ? $cat_image : $item['image'];
	}

	return $item;
}

add_filter( 'screenr_page_header_item', 'page_header', 20 );