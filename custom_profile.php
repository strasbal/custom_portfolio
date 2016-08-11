<?php
/*
Plugin Name: Custom Portfolio Posts
Plugin URI:  GITHUB RESPOSITORY ADDRESS
Description: Custom ‘Portfolio’ post type, includes image, title, description shortcode.
Version:     1.0
Author:      Alex Strasburg
Author URI:  http://strasburgmedia.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action ( 'init', 'portfolio_init' );

// Registers  a Portfolio post type

function portfolio_init() {
    $labels = array(
        'name' => __( 'Portfolio' ),
        'menu_name' => __( 'Portfolio', 'admin menu'),
        'name_admin_bar' => __( 'Portfolio', 'add new on admin bar'),
        'add_new' => __( 'Add New', 'Portfolio')
    );
    
    $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'Hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
  
  register_post_type( 'portfolio', $args);
}


// Shortcode for featured image
function rivetal_portfolio_image(){
   return the_post_thumbnail();
}
add_shortcode( 'featured_image', 'rivetal_portfolio_image' );

// Shortcode for featured title
function rivetal_portfolio_title(){
   return get_the_title();
}
add_shortcode( 'portfolio_title', 'rivetal_portfolio_title' );

// Shortcode for 140 character excerpt
function rivetal_portfolio_excerpt(){
  return substr(get_the_excerpt(), 0,147);
}
add_shortcode( 'the_excerpt', 'rivetal_portfolio_excerpt' );

?>
