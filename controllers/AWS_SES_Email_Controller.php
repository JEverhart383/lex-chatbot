<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class AWS_SES_Email_Controller {
  public $SES_EMAIL;
  public function __construct($SES_EMAIL) {
    $this->SES_EMAIL = $SES_EMAIL;
    $this->namespace = '/aws-workbench/v1';
    $this->resource = 'ses/emails';
  }

  public function init() {
    add_action('rest_api_init', array($this, 'register_routes'));
  }

  public function register_routes() {
    register_rest_route($this->namespace, '/' . $this->resource, array(
      'methods' => 'POST',
      'permission_callback' => array($this, 'check_is_admin'),
      'callback' => array($this, 'create_item')
    ));

  }

  public function create_item (WP_REST_Request $request) {
    try {
      $email = $this->SES_EMAIL->send_email($request['toAddresses'], $request['subject'], $request['message'] );
      return $email;
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