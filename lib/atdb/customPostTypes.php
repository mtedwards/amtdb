<?php
  
  
/* LETS START BY CLEANING UP SOME THINGS */

function posts_orderby_lastname ($orderby_statement) 
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}

function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
 // remove_menu_page( 'plugins.php' );                //Plugins
 /// remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
 // remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );
  
  // Register Custom Post Type
function shows_post_type() {

	$labels = array(
		'name'                => _x( 'Shows', 'Post Type General Name', 'atdb' ),
		'singular_name'       => _x( 'Show', 'Post Type Singular Name', 'atdb' ),
		'menu_name'           => __( 'Shows', 'atdb' ),
		'parent_item_colon'   => __( 'Parent Show:', 'atdb' ),
		'all_items'           => __( 'All Shows', 'atdb' ),
		'view_item'           => __( 'View Show', 'atdb' ),
		'add_new_item'        => __( 'Add New Show', 'atdb' ),
		'add_new'             => __( 'Add New', 'atdb' ),
		'edit_item'           => __( 'Edit Show', 'atdb' ),
		'update_item'         => __( 'Update Show', 'atdb' ),
		'search_items'        => __( 'Search Show', 'atdb' ),
		'not_found'           => __( 'Not found', 'atdb' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'atdb' ),
	);
	$args = array(
		'label'               => __( 'show', 'atdb' ),
		'description'         => __( 'A production of a show', 'atdb' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tickets-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'show', $args );

}

// Hook into the 'init' action
add_action( 'init', 'shows_post_type', 0 );


  // Register Custom Post Type
function producer_post_type() {

	$labels = array(
		'name'                => _x( 'Producers','Post Type General Name', 'atdb' ),
		'singular_name'       => _x( 'Producer', 'Post Type Singular Name', 'atdb' ),
		'menu_name'           => __( 'Producers', 'atdb' ),
		'parent_item_colon'   => __( 'Parent Producer:', 'atdb' ),
		'all_items'           => __( 'All Producers', 'atdb' ),
		'view_item'           => __( 'View Producer', 'atdb' ),
		'add_new_item'        => __( 'Add New Producer', 'atdb' ),
		'add_new'             => __( 'Add New', 'atdb' ),
		'edit_item'           => __( 'Edit Producer', 'atdb' ),
		'update_item'         => __( 'Update Producer', 'atdb' ),
		'search_items'        => __( 'Search Producer', 'atdb' ),
		'not_found'           => __( 'Not found', 'atdb' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'atdb' ),
	);
	$args = array(
		'label'               => __( 'producer', 'atdb' ),
		'description'         => __( 'A Producer of a show', 'atdb' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'revisions'  ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-businessman',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'producer', $args );

}

// Hook into the 'init' action
add_action( 'init', 'producer_post_type', 0 );


function person_post_type() {

	$labels = array(
		'name'                => _x( 'People', 'Post Type General Name', 'atdb' ),
		'singular_name'       => _x( 'Person', 'Post Type Singular Name', 'atdb' ),
		'menu_name'           => __( 'People', 'atdb' ),
		'parent_item_colon'   => __( 'Parent Person:', 'atdb' ),
		'all_items'           => __( 'All People', 'atdb' ),
		'view_item'           => __( 'View Person', 'atdb' ),
		'add_new_item'        => __( 'Add New Person', 'atdb' ),
		'add_new'             => __( 'Add New', 'atdb' ),
		'edit_item'           => __( 'Edit Person', 'atdb' ),
		'update_item'         => __( 'Update Person', 'atdb' ),
		'search_items'        => __( 'Search People', 'atdb' ),
		'not_found'           => __( 'Not found', 'atdb' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'atdb' ),
	);
	$args = array(
		'label'               => __( 'person', 'atdb' ),
		'description'         => __( 'A person working on a show', 'atdb' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt','thumbnail', 'page-attributes', 'revisions'  ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'person', $args );

}

// Hook into the 'init' action
add_action( 'init', 'person_post_type', 0 );


function venue_post_type() {

	$labels = array(
		'name'                => _x( 'Venues', 'Post Type General Name', 'atdb' ),
		'singular_name'       => _x( 'Venue', 'Post Type Singular Name', 'atdb' ),
		'menu_name'           => __( 'Venue', 'atdb' ),
		'parent_item_colon'   => __( 'Parent Venue:', 'atdb' ),
		'all_items'           => __( 'All Venues', 'atdb' ),
		'view_item'           => __( 'View Venue', 'atdb' ),
		'add_new_item'        => __( 'Add New Venue', 'atdb' ),
		'add_new'             => __( 'Add New', 'atdb' ),
		'edit_item'           => __( 'Edit Venue', 'atdb' ),
		'update_item'         => __( 'Update Venue', 'atdb' ),
		'search_items'        => __( 'Search Venues', 'atdb' ),
		'not_found'           => __( 'Not found', 'atdb' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'atdb' ),
	);
	$args = array(
		'label'               => __( 'person', 'atdb' ),
		'description'         => __( 'A person working on a show', 'atdb' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'page-attributes', 'editor', 'revisions', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-home',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'venue', $args );

}

// Hook into the 'init' action
add_action( 'init', 'venue_post_type', 0 );