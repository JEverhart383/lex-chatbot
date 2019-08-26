<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class AWS_SES_Identities_Controller {
  public $SES_IDENTITIES;
  public function __construct($SES_IDENTITIES) {
    $this->SES_IDENTITIES = $SES_IDENTITIES;
    $this->namespace = '/aws-workbench/v1';
    $this->resource = 'ses/identities';
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

    register_rest_route($this->namespace, '/' . $this->resource . '/(?P<name>)', array(
      'methods' => 'GET',
      'permission_callback' => array($this, 'check_is_admin'),
      'callback' => array($this, 'get_item')
    ));

  }

  public function get_items () {
    try {
      $identities = $this->SES_IDENTITIES->list_identities();
      return $identities['Identities'];
    } catch(Exception $exc) {
      return $exc;
    }

  }

  public function get_item (WP_REST_Request $request) {
    try {
      $identity_name = $request['name'];
      $policies = $this->SES_IDENTITIES->list_policies($identity_name);
      return $policies;
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