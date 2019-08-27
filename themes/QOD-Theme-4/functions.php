<?php

  function qod_enqueue_scripts() {

    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', ("//code.jquery.com/jquery-1.11.2.min.js"), "", null, true);
      wp_enqueue_script('jquery');
    }

    wp_enqueue_style('qod-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script('qod-scripts', get_template_directory_uri() . '/js/min/qod-min.js', array('jquery'), null, true);
  }

  add_action('wp_enqueue_scripts', 'qod_enqueue_scripts');


  add_filter( 'rest_post_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );

  function my_prefix_add_rest_orderby_params( $params ) {
      $params['orderby']['enum'][] = 'rand';

      return $params;
  }

?>