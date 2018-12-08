<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts-fair .dashicons-admin-post:before {
    content: '\f319';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//Register Custom Post Types
add_action( 'init', 'register_cpt_fair' );

function register_cpt_fair() {

  $labels = array(
    'name' => _x( 'Fairs', 'fair' ),
    'singular_name' => _x( 'Fair', 'fair' ),
    'add_new' => _x( 'Add New', 'fair' ),
    'add_new_item' => _x( 'Add New Fair', 'fair' ),
    'edit_item' => _x( 'Edit Fair', 'fair' ),
    'new_item' => _x( 'New Fair', 'fair' ),
    'view_item' => _x( 'View Fair', 'fair' ),
    'search_items' => _x( 'Search Fairs', 'fair' ),
    'not_found' => _x( 'No fairs found', 'fair' ),
    'not_found_in_trash' => _x( 'No fairs found in Trash', 'fair' ),
    'parent_item_colon' => _x( 'Parent Fair:', 'fair' ),
    'menu_name' => _x( 'Fairs', 'fair' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'fair', $args );
}
