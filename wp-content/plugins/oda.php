<?php
/*
Plugin Name: ODA Plugins
Plugin URI: http://8manos.in
Description: A simple WordPress plugin template
Version: 1.0
Author: Manish Runwal
License: GPL2
*/
/*
	ODA plugin
*/
class ODA {
	const version = '0.1';
	public static $settings = array();


	public static function setup() {
		add_action( 'init', array(__CLASS__, 'register_post_types'),1 );
		add_action( 'init', array(__CLASS__, 'register_base_taxonomy'),1 );
	}
	public static function register_base_taxonomy(){
		register_taxonomy( 'cat_workshop', 'workshop', // This will set parent category as cat_workshop
					array( 'hierarchical' => true,
								 'label' => 'Worshop Categories',
								 'query_var' => true,
								 'rewrite' => true ));
		register_taxonomy( 'cat_games', 'game', // This will sent parent category as game
					array( 'hierarchical' => true,
								 'label' => 'Games Categories',
								 'query_var' => true,
								 'rewrite' => true ));
		register_taxonomy( 'recomienda', 'recommend', // This will set parent category as parques
					array( 'hierarchical' => true,
								 'label' => 'Rec. Categories',
								 'query_var' => true,
								 'rewrite' => true ));
		register_taxonomy( 'product_size', 'customproduct', // This will set parent category as parques
					array( 'hierarchical' => true,
								 'label' => 'Product Sizes',
								 'query_var' => true,
								 'rewrite' => true ));	
		register_taxonomy( 'product_color', 'customproduct', // This will set parent category as parques
					array( 'hierarchical' => true,
								 'label' => 'Product Color',
								 'query_var' => true,
								 'rewrite' => true ));						 
	}

	public function renameExcerpt(){
			remove_meta_box( 'postexcerpt', 'game', 'side' );
    	add_meta_box('postexcerpt', __('Link to download'), 'post_excerpt_meta_box', 'game', 'normal', 'high');
			remove_meta_box( 'postexcerpt', 'Homelinks', 'side' );
    	add_meta_box('postexcerpt', __('Link to page'), 'post_excerpt_meta_box', 'Homelinks', 'normal', 'high');

	}

	public static function register_post_types() {

		register_post_type( 'Homelinks', array(
			'labels'       => array(
				'name'               => __('Home page links', 'oda'),
				'singular_name'      => __('Home page link', 'oda'),
				'add_new_item'       => __('Add new link', 'oda'),
				'edit_item'          => __('Edit link', 'oda'),
				'new_item'           => __('New home page link', 'oda'),
				'view_item'          => __('View link', 'oda'),
				'search_items'       => __('Search link', 'oda'),
				'not_found'          => __('No home page link found', 'oda'),
				'not_found_in_trash' => __('No home page link found in trash', 'oda'),
				'parent_item_colon'  => __('Parent Links', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => false,
			'hierarchical' => true,
			'menu_position'=> 2,
			'supports'     => array( 'title', 'excerpt', 'thumbnail', 'revisions'),
			'post-formats' => 'link'
		) );
		register_post_type( 'game', array(
			'labels'       => array(
				'name'               => __('Games', 'oda'),
				'singular_name'      => __('game', 'oda'),
				'add_new_item'       => __('Add New game', 'oda'),
				'edit_item'          => __('Edit game', 'oda'),
				'new_item'           => __('New game', 'oda'),
				'view_item'          => __('View game', 'oda'),
				'search_items'       => __('Search game', 'oda'),
				'not_found'          => __('No game found', 'oda'),
				'not_found_in_trash' => __('No game found in trash', 'oda'),
				'parent_item_colon'  => __('Parent game', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => true,
			'hierarchical' => true,
			'menu_position'=> 3,
			'supports'     => array( 'title', 'editor', 'excerpt', 'custom-fields','thumbnail', 'revisions'),
			'post-formats' => 'link',
			//'taxonomies' => array('category'),
		) );
		register_post_type( 'workshop', array(
			'labels'       => array(
				'name'               => __('Workshop', 'oda'),
				'singular_name'      => __('Workshop', 'oda'),
				'add_new_item'       => __('Add new Workshop', 'oda'),
				'edit_item'          => __('Edit Workshop', 'oda'),
				'new_item'           => __('New Workshop', 'oda'),
				'view_item'          => __('View Workshop', 'oda'),
				'search_items'       => __('Search Workshop', 'oda'),
				'not_found'          => __('No Workshop found', 'oda'),
				'not_found_in_trash' => __('No Workshop found in trash', 'oda'),
				'parent_item_colon'  => __('Parent Workshop', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => true,
			'hierarchical' => true,
			'menu_position'=> 5,
			'supports'     => array( 'title', 'editor', 'excerpt','categories','thumbnail', 'revisions'),
			'post-formats' => 'link',
			//'taxonomies' => array('category'),
		) );
		register_post_type( 'guest', array(
			'labels'       => array(
				'name'               => __('Guests', 'oda'),
				'singular_name'      => __('guest', 'oda'),
				'add_new_item'       => __('Add New Guest', 'oda'),
				'edit_item'          => __('Edit Guest', 'oda'),
				'new_item'           => __('New Guest', 'oda'),
				'view_item'          => __('View Guest', 'oda'),
				'search_items'       => __('Search Guest', 'oda'),
				'not_found'          => __('No Guest found', 'oda'),
				'not_found_in_trash' => __('No Guest found in trash', 'oda'),
				'parent_item_colon'  => __('Parent Guest', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => false,
			'public_queryable'=> true,
			'capability_type'    => 'post',
			'hierarchical' => true,
			'menu_position'=> 5,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'revisions','custom-fields' ),
			'post-formats' => 'link'
		) );
		register_post_type( 'recommend', array(
			'labels'       => array(
				'name'               => __('Recommends', 'oda'),
				'singular_name'      => __('Recommend', 'oda'),
				'add_new_item'       => __('Add new Recommend', 'oda'),
				'edit_item'          => __('Edit recommend', 'oda'),
				'new_item'           => __('New recommend', 'oda'),
				'view_item'          => __('View recommend', 'oda'),
				'search_items'       => __('Search recommend', 'oda'),
				'not_found'          => __('No recommend found', 'oda'),
				'not_found_in_trash' => __('No recommend found in trash', 'oda'),
				'parent_item_colon'  => __('Parent recommend', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => true,
			'hierarchical' => true,
			'menu_position'=> 6,
			'supports'     => array( 'title', 'editor','excerpt', 'categories','thumbnail', 'revisions'),
			//'taxonomies' => array('category'),
		) );



		register_post_type( 'customproduct', array(
			'labels'       => array(
				'name'               => __('Products', 'oda'),
				'singular_name'      => __('Products', 'oda'),
				'add_new_item'       => __('Add New Product', 'oda'),
				'edit_item'          => __('Edit Product', 'oda'),
				'new_item'           => __('New Product', 'oda'),
				'view_item'          => __('View Product', 'oda'),
				'search_items'       => __('Search Product', 'oda'),
				'not_found'          => __('No Product found', 'oda'),
				'not_found_in_trash' => __('No Product found in trash', 'oda'),
				'parent_item_colon'  => __('Parent Product', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => true,
			'hierarchical' => true,
			'menu_position'=> 6,
			'supports'     => array( 'title', 'editor', 'custom-fields','thumbnail', 'revisions'),
			'post-formats' => 'link',
			//'taxonomies' => array('category'),
		) );


		flush_rewrite_rules();
	}

	public static function metadata_post( $groups ) {
		$groups[] = array(

			'artist' => array(
				array(
					'id'      => 'artist-data',
					'title'   => __('Module properties', 'oda'),
					'fields'  => array(

						array(
							'id'      => 'artist_location',
							'title'   => 'Artist Location',
							'desc'    => 'City, Country',
							'type'    => 'text'
						),
					)
				)
			)
		);
		return $groups;
	}




}
add_action( 'plugins_loaded', array('ODA', 'setup') );
add_action( 'admin_init',  array('ODA','renameExcerpt'));
