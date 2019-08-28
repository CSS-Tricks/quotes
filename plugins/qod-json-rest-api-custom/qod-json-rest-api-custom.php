<?php
/*
Plugin Name: QOD Custom Meta For JSON API
Description: Adds custom meta field information to publicly accessible API
Author: Andy Adams
Version: 0.1
*/

function qod_add_custom_meta_to_posts( $data, $post, $context ) {
  // We only want to modify the 'view' context, for reading posts
  if ( $context !== 'view' || is_wp_error( $data ) ) {
    return $data;
  }

  $source = get_post_meta( $post['ID'], 'Source', true );

  if ( ! empty( $source ) ) {
    $data['custom_meta'] = array( 'Source' => $source );
  }

  return $data;
}

add_filter( 'json_prepare_post', 'qod_add_custom_meta_to_posts', 10, 3 );

function qod_remove_extra_data( $data, $post, $context ) {
  // We only want to modify the 'view' context, for reading posts
  if ( $context !== 'view' || is_wp_error( $data ) ) {
    return $data;
  }

  $unset_these_fields = array(
    'author', 'status', 'type', 'parent', 'ping_status',
    'slug', 'sticky', 'meta', 'modified', 'modified_gmt',
    'modified_tz', 'menu_order', 'guid', 'format', 'featured_image',
    'excerpt', 'comment_status', 'terms', 'date', 'date_gmt', 'date_tz'
  );

  foreach ( $unset_these_fields as $field ) {
    unset( $data[$field] );
  }

  return $data;
}

add_filter( 'json_prepare_post', 'qod_remove_extra_data', 12, 3 );

add_action( 'rest_api_init', 'register_posts_meta_field' );
function register_posts_meta_field() {
  register_meta('post', 'Source',
            [
                'show_in_rest' => true,
                'single' => true,
                'type' => 'string'
            ]
        );
}
