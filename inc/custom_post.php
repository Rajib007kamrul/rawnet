<?php

/* Custom Post Type Class */

class post_type{

	public function __construct( $name, $singluar_name, $args ){
		$this -> register_post_type($name, $singluar_name, $args);
	}

	//Registering Post Types
	public function register_post_type( $name, $singluar_name, $args ) {

	    $args = array_merge(
			array(
				'labels' => array(
							'name' 			=> _x( $name, 'rawnet' ),
							'singular_name' => _x( $singluar_name, 'rawnet'),
							'add_new'		=> _x( "Add New $singluar_name", 'rawnet'),
							'add_new_item' 	=> _x( "Add New $singluar_name", 'rawnet'),
							'edit_item' 	=> __( "Edit $singluar_name", 'rawnet' ),
							'new_item' 		=> __( "New $singluar_name", 'rawnet' ),
							'view_item' 	=> __( "View $singluar_name", 'rawnet' ),
							'search_items' 	=> __( "Search $name", 'rawnet'),
							'not_found' 	=> __( "No $name found", 'rawnet'),
							'all_items' => __( "All $name", '' ),
							'not_found_in_trash' 	=> __("No $name found in Trash", '' ),
							'parent_item_colon' 	=> __( '', ''),
							'menu_name' 	=>  _x( $name, '' )
						  ),
				'public' 	=> true,
				'show_in_rest' => true,
				'query_var' => strtolower($singluar_name),
				'hierarchical' => true,
				'rewrite' 	=> array('slug' => $name),
				'supports' 	=> array(''),
			),
			$args
	    );

		register_post_type(strtolower($name),$args);
	}

	//Taxonomies
	public function taxonomies( $post_types, $tax_arr ) {

		$taxonomies = array();

		foreach ($tax_arr as $name => $arr){

			$singular_name = $arr['singular_name'];

			$labels = array(
					'name' => _x( $singular_name, 'rawnet' ),
					'singular_name' => _x( $singular_name, 'rawnet' ),
					'add_new' => _x( "Add New $singular_name", 'rawnet' ),
					'add_new_item' => _x( "Add New $singular_name", 'rawnet' ),
					'edit_item' => __( "Edit $singular_name", 'rawnet' ),
					'new_item' => __( "New $singular_name", 'rawnet' ),
					'view_item' => __( "View $singular_name", 'rawnet' ),
					'update_item' => __( "Update $singular_name", 'rawnet'),
					'search_items' => __( "Search $singular_name", 'rawnet' ),
					'not_found' => __ ( "$singular_name Not Found", 'rawnet' ),
					'not_found_trash' => __ ( "$singular_name Not Found in Trash", 'rawnet' ),
					'all_items' => __( "All $singular_name", 'rawnet' ),
					'separate_items_with_comments' => __( "Separate tags with commas", 'rawnet' )
			);

			$defaultArr = array(
				'hierarchical' => true,
				'query_var' => true,
				'rewrite' => array('slug' => $name),
				'labels' => $labels,
				'show_in_rest' => true
			);

			$taxonomies[$name] =  array_merge($defaultArr, $arr);
		}

		$this->register_all_taxonomies( $post_types, $taxonomies );
	}

	public function register_all_taxonomies( $post_types, $taxonomies ) {
		foreach( $taxonomies as $name => $arr ) {
			register_taxonomy(strtolower($name),strtolower($post_types), $arr);
		}
	}
}