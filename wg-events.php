<?php
/**
 * Plugin Name: WG EVENTS
 * Plugin URI: http://www.dsmwebgeeks.com
 * Description: This plugin adds an event content type for Web Geeks events
 * Version: 1.0.0
 * Author: Matthew Nuzum
 * Author URI: https://www.bearfruit.org
 * License: GPL2
 */
defined( 'ABSPATH' ) or die ('NOT FOUND');
include('class-wg-widget-next-event.php');
add_action('widgets_init', create_function('', 'return register_widget("WG_Widget_Next_Event");'));

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'wg_event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' ),
	'add_new_item'       => 'Add New Event',
	'new_item'           => 'New Event',
	'edit_item'          => 'Edit Event',
	'view_item'          => 'View Event',
	'all_items'          => 'All Events',
	'search_items'       => 'Search Events',
	'parent_item_colon'  => 'Parent Events:',
	'not_found'          => 'No events found.',
	'not_found_in_trash' => 'No events found in Trash.'
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'wg_events'),
      'hierarchical' => false,
      'supports' => array('title', 'editor', 'thumbnail', 'comments')
    )
  );
}

#register_taxonomy("event_type", array("wg_event"), array("hierarchical" => false, "label" => "Event Types", "singular_label" => "Event Type", "rewrite" => true));

