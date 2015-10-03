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
	}

	public static function register_post_types() {

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
			'hierarchical' => true,
			'menu_position'=> 7,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'revisions','custom-fields' ),
			'post-formats' => 'link'
		) );

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
			'menu_position'=> 6,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'revisions'),
			'post-formats' => 'link'
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
			'menu_position'=> 6,
			'supports'     => array( 'title', 'editor', 'categories','thumbnail', 'revisions'),
			'post-formats' => 'link',
			'taxonomies' => array('category'),  
		) );
		flush_rewrite_rules();
		
		register_post_type( 'customproduct', array(
			'labels'       => array(
				'name'               => __('Custom Product', 'oda'),
				'singular_name'      => __('Custom Product', 'oda'),
				'add_new_item'       => __('Add new Custom Product', 'oda'),
				'edit_item'          => __('Edit Custom Product', 'oda'),
				'new_item'           => __('New Custom Product', 'oda'),
				'view_item'          => __('View Custom Product', 'oda'),
				'search_items'       => __('Search Custom Product', 'oda'),
				'not_found'          => __('No Custom Product found', 'oda'),
				'not_found_in_trash' => __('No Custom Product found in trash', 'oda'),
				'parent_item_colon'  => __('Parent Custom Product', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => true,
			'hierarchical' => true,
			'menu_position'=> 6,
			'supports'     => array( 'title', 'editor', 'custom-fields','thumbnail', 'revisions'),
			'post-formats' => 'link',
			'taxonomies' => array('category'),  
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