<?php


add_action( 'init', 'rawnet_register_post' );

function rawnet_register_post() {
	$portfolio_args = array( 'supports' => array( 'title', 'editor', 'thumbnail' ), 'has_archive' => true );
	$portfolio     = new post_type( 'Portfolio', 'portfolio', $portfolio_args );
	$portfolio_cat_args = array( "Portfolio_cat" => array( 'singular_name' => 'Category', 'query_var'=> true ) );
	$portfolio->taxonomies('portfolio', $portfolio_cat_args );

	$team_args = array( 'supports' => array( 'title' ,'thumbnail' ) );
	$team     = new post_type( 'Team', 'team', $team_args );

	$team_cat_args = array( "team_cat" => array( 'singular_name' => 'Category', 'query_var'=> true ) );
	$team->taxonomies('team', $team_cat_args );

	$service_args = array( 'supports' => array( 'title','editor','thumbnail' ) );
	$service     = new post_type( 'Service', 'service', $service_args );

	$service_cat_args = array( "Service_cat" => array( 'singular_name' => 'Service Category', 'query_var'=> true ) );
	$service->taxonomies('service', $service_cat_args );

	$partner_args = array( 'supports' => array( 'title','thumbnail' ) );
	$partner     = new post_type( 'Partner', 'partner', $partner_args );
}

add_action( 'manage_team_posts_custom_column' , 'team_columns', 10, 2 );

function team_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'designation':
			$team_designation = get_post_meta( $post_id , 'team_designation', true );
			echo $team_designation;
			break;
		case 'category':
			$team_cats = wp_get_post_terms( $post_id, 'team_cat', array( 'fields' => 'names' ) );
			echo implode( ",", $team_cats );
			break;
	}
}

add_filter('manage_team_posts_columns', 'rawnet_team_columns');

function rawnet_team_columns( $columns ) {
    $columns['designation'] = __( 'Designation', 'rawnet' );
    $columns['category'] = __( 'Category', 'rawnet' );

    return $columns;
}

add_action( 'manage_portfolio_posts_custom_column' , 'portfolio_columns', 10, 2 );

function portfolio_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'category':
			$portfolio_cats = wp_get_post_terms( $post_id, 'portfolio_cat', array( 'fields' => 'names' ) );
			echo implode( ",", $portfolio_cats );
			break;
	}
}

add_filter('manage_portfolio_posts_columns', 'rawnet_portfolio_columns');

function rawnet_portfolio_columns( $columns ) {
    $columns['category'] = __( 'Category', 'rawnet' );

    return $columns;
}

add_action( 'manage_service_posts_custom_column' , 'service_columns', 10, 2 );

function service_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'category':
			$service_cats = wp_get_post_terms( $post_id, 'service_cat', array( 'fields' => 'names' ) );
			echo implode( ",", $service_cats );
			break;
	}
}

add_filter('manage_service_posts_columns', 'rawnet_service_columns');

function rawnet_service_columns( $columns ) {
    $columns['category'] = __( 'Category', 'rawnet' );

    return $columns;
}

function rawnet_change_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'team' == $screen->post_type ) {
          $title = 'Enter Your Name';
     }

     return $title;
}

add_filter( 'enter_title_here', 'rawnet_change_title_text' );