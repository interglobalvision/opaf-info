<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

	// HOME
  $home_page = get_page_by_path('home');

  if (!empty($home_page) ) {

    $home_metabox = new_cmb2_box( array(
      'id'            => $prefix . 'home_metabox',
      'title'         => esc_html__( 'Options', 'cmb2' ),
      'object_types'  => array( 'page' ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($home_page->ID) ),
    ) );

    $home_metabox->add_field( array(
  		'name' => esc_html__( 'Location', 'cmb2' ),
  		'id'   => $prefix . 'home_location',
  		'type' => 'wysiwyg',
      'options' => array(
  	    'wpautop' => false, // use wpautop?
  	    'media_buttons' => false, // show insert/upload button(s)
  	    'textarea_rows' => 5, // rows="..."
  	    'teeny' => true, // output the minimal editor config used in Press This
  	    'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
    	),
  	) );

    $home_metabox->add_field( array(
  		'name' => esc_html__( 'Press', 'cmb2' ),
  		'id'   => $prefix . 'home_press',
  		'type' => 'wysiwyg',
      'options' => array(
  	    'wpautop' => false, // use wpautop?
  	    'media_buttons' => false, // show insert/upload button(s)
  	    'textarea_rows' => 5, // rows="..."
  	    'teeny' => true, // output the minimal editor config used in Press This
  	    'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
    	),
  	) );

  }

}
?>
