<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class AWS_Lex_Model_Intent_Controller {
  public $LEX_MODEL;
  public function __construct($LEX_MODEL) {
    $this->LEX_MODEL = $LEX_MODEL;
    $this->namespace = '/aws-workbench/v1';
    $this->resource = 'lex/intents';
  }

  public function init() {
    add_action('rest_api_init', array($this, 'register_routes'));
  }

  public function register_routes() {
    register_rest_route($this->namespace, '/' . $this->resource, array(
      'methods' => 'GET',
      // 'permission_callback' => array($this, 'check_is_admin'),
      'callback' => array($this, 'get_items')
    ));

    register_rest_route($this->namespace, '/' . $this->resource . '/(?P<name>[a-zA-Z0-9._-]+)', array(
      'methods' => 'GET',
      // 'permission_callback' => array($this, 'check_is_admin'),
      'callback' => array($this, 'get_item')
    ));

  }

  public function get_items (WP_REST_Request $request) {
    try {
      $intents = $this->LEX_MODEL->getIntents();
      return $intents;
    } catch (Exception $exc) {
      return $exc;
    }
  }

  public function get_item (WP_REST_Request $request) {
    try {
      $name = $request['name'];
      $intent = $this->LEX_MODEL->getIntent($name);
      return $intent;
    } catch (Exception $exc) {
      return $exc;
    }
  }


  // public function check_is_admin ($request) {
  //   if (! current_user_can('activate_plugins')) {
  //     return new WP_Error('rest_forbidden', esc_html__('You cannot view this resources'));
  //   }
  //   return true;
  // }

}