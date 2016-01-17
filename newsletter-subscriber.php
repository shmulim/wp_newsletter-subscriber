<?php

/**
 * Plugin Name: Newsletter Subscriber
 * Description: Adds a newsletter subscription form.
 * Version: 1.0.0
 * Author: Shmuli Markel
 * Author URI: http://shmulimarkel.com/
 * Tested up to: 4.4.0
 **/

// exit if accessed directly
if ( !defined('ABSPATH') ) exit;

// require php scripts
require_once( plugin_dir_path(__FILE__) . '/includes/newsletter-subscriber-scripts.php' );
require_once( plugin_dir_path(__FILE__) . '/includes/newsletter-subscriber-class.php' );
require_once( plugin_dir_path(__FILE__) . '/includes/newsletter-subscriber-mailer.php' );

function ns_register_widget(){
  register_widget( 'Newsletter_Subscriber_Widget' );
}

add_action( 'widgets_init', 'ns_register_widget' );
