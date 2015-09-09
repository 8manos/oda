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

		register_post_type( 'slider', array(
			'labels'       => array(
				'name'               => __('Slides', 'oda'),
				'singular_name'      => __('slide', 'oda'),
				'add_new_item'       => __('Add New Slide', 'oda'),
				'edit_item'          => __('Edit Slide', 'oda'),
				'new_item'           => __('New Slide', 'oda'),
				'view_item'          => __('View Slide', 'oda'),
				'search_items'       => __('Search Slide', 'oda'),
				'not_found'          => __('No Slide found', 'oda'),
				'not_found_in_trash' => __('No Slide found in trash', 'oda'),
				'parent_item_colon'  => __('Parent Slide', 'oda')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => false,
			'hierarchical' => true,
			'menu_position'=> 7,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'revisions','custom-fields' ),
			'post-formats' => 'link'
		) );



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