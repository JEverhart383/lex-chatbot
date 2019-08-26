<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class AWS_S3_Buckets_Controller {
  public $S3_CLIENT;
  public function __construct($S3_CLIENT) {
    $this->S3_CLIENT = $S3_CLIENT;
    $this->namespace = '/aws-workbench/v1';
    $this->resource = 's3/buckets';
  }

  public function init() {
    add_action('rest_api_init', array($this, 'register_routes'));
  }

  public function register_routes() {
    register_rest_route($this->namespace, '/' . $this->resource, array(
      'methods' => 'GET',
      'permission_callback' => array($this, 'check_is_admin'),
      'callback' => array($this, 'get_items')
    ));

    register_rest_route($this->namespace, '/' . $this->resource . '/(?P<bucket>[a-zA-Z0-9._-]+)', array(
      'methods' => 'GET',
      'callback' => array($this, 'get_item'),
      'permission_callback' => array($this, 'check_is_admin'),
      'args' => array(
        'bucket' => array(
          'required' => true
        )
      )
    ));
  }

  public function get_items () {
    try{
      $buckets = $this->S3_CLIENT->listBuckets()['Buckets'];
      return $buckets;
    } catch (Exception $exc) {
      return $exc;
    }
  }

  public function get_item (WP_REST_Request $request) {
    try {
      $contents = $this->S3_CLIENT->listObjects(['Bucket' => $request['bucket']])['Contents'];
      return $contents;
    } catch (Exception $exc) {
      return $exc;
    }
  }

  public function check_is_admin ($request) {
    if (! current_user_can('activate_plugins')) {
      return new WP_Error('rest_forbidden', esc_html__('You cannot view this resources'));
    }
    return true;
  }

}