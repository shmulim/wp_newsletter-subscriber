<?php

function ns_add_scripts(){
  wp_enqueue_script( 'ns-main-js', plugins_url() . '/newsletter-subscriber/js/main.js', array('jquery') );
  wp_enqueue_style( 'ns-styles-css', plugins_url() . '/newsletter-subscriber/css/styles.css' );
}

add_action( 'wp_enqueue_scripts', 'ns_add_scripts' );