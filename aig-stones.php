<?php 
defined( 'ABSPATH' ) or die( '404 - Not found!' );

/*
Plugin Name:  AIG - Stones
Plugin URI:   https://advicelocal.com/
Description:  StonePanels - Stone Post Type
Version:      1.0
Author:       Josue Daniel Bustamante
Author URI:   https://advicelocal.com/
License:      MIT
License URI:  https://advicelocal.com/
Text Domain:  aig-stone-panels-stones
Domain Path:  /languages
*/

$error      =   'Is not possible to retrieve this information right now, please try again.';

#region Utils

#endregion

#region Register_Post_Type
//      Register data structure and post type on Wordpress Core
function create_aig_stone_post_type() {
    register_post_type('stone',
    array(
        'labels' => array(
            'name'                  =>  __( 'Stones' ),
            'singular_name'         =>  __( 'Stone' ),
            'menu_name'             =>  __( 'Stones' ),
            'name_admin_bar'        =>  __( 'Stones'),
            'add_new'               =>  __( 'Add New', 'stone' ),
            'add_new_item'          =>  __( 'Add new Stone' ),
            'new_item'              =>  __( 'New stone' ),
            'edit_item'             =>  __( 'Edit stone' ),
            'view_item'             =>  __( 'View stone' ),
            'all_items'             =>  __( 'All stones' ),
            'search_items'          =>  __( 'Search stone' ),
            'parent_item_colon'     =>  __( 'Parent stone:' ),
            'not_found'             =>  __( 'No stone found.' ),
            'not_found_in_trash'    =>  __( 'No stone found in trash.' )
        ),
        'public'        =>  true,
        'show_in_rest'  =>  true,
        'hierarchical'  =>  false,
        'has_archive'   =>  true,
        'rewrite'       =>  true,
        'show_ui'       =>  true,
        'rest_base'     =>  'stones',
        'menu_icon'     =>  'dashicons-archive',
        'rewrite'       =>  array( 'slug' => 'stones' ),
        'taxonomies'    =>  array( 'stones_types', 'stones_colors' ),
        'supports'      =>  array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        )
    );
}
function create_aig_stone_taxonomy() {
    register_taxonomy(
        'stones_types',
        'stone',
        array(
            'public'            =>  true,
            'show_ui'           =>  true,
            'hierarchical'      =>  true,
            'label'             =>  __( 'Stone Types' ),
        )
    );
}
function create_aig_color_taxonomy() {
    register_taxonomy(
        'stones_colors',
        'stone',
        array(
            'public'            =>  true,
            'show_ui'           =>  true,
            'hierarchical'      =>  true,
            'label'             =>  __( 'Stone Colors' ),
        )
    );
}
add_action( 'init', 'create_aig_stone_post_type' );
add_action( 'init', 'create_aig_stone_taxonomy' );
add_action( 'init', 'create_aig_color_taxonomy' );
register_taxonomy_for_object_type( 'stones_types', 'stone' );
register_taxonomy_for_object_type( 'stones_colors', 'stone' );
#endregion

#region Enqueue_Scripts
//      Enqueue CSS files
function aig_stones_custom_scripts() {
    wp_enqueue_style( 'aig_stones_custom_css', plugins_url('/css/main.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'aig_stones_custom_scripts' );
#endregion
?>
