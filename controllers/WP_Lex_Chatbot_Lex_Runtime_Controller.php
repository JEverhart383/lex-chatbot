<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class WP_Lex_Chatbot_Lex_Runtime_Controller {
  public $Lex_Runtime_Service;
  public function __construct($Lex_Runtime_Service) {
    $this->LEX_RUNTIME_SERVICE = $Lex_Runtime_Service;
    $this->namespace = '/aws-workbench/v1';
    $this->resource = 'lex/messages';
  }

  public function init() {
    add_action('rest_api_init', array($this, 'register_routes'));
  }

  public function register_routes() {
    register_rest_route($this->namespace, '/' . $this->resource, array(
      'methods' => 'POST',
      // 'permission_callback' => array($this, 'check_is_admin'),
      'callback' => array($this, 'create_item')
    ));

  }

  public function create_item (WP_REST_Request $request) {
    try {
      $body = $request->get_body();
      $bot_response = $this->LEX_RUNTIME_SERVICE->post_text($body);
      return $bot_response;
    } catch (Exception $exc) {
      return $exc;
    }
  }

}