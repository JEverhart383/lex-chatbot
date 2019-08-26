<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once dirname(__FILE__) . '/interface/AWSWorkbench_Interface_Base.php';
require_once dirname(__FILE__) . '/interface/AWSWorkbench_Interface_MainMenu.php';

class AWSWorkbench_Interface {

  public function __construct () {

  }

  public function init () {

    $main_menu = new AWSWorkbench_Interface_MainMenu('AWS Workbench', 'aws-workbench', 'top-level', '');
    $main_menu->init();

    $lex_menu = new AWSWorkbench_Interface_Base('Lex - Chatbot', 'aws-workbench', 'sub-menu', '#/lex');
    $lex_menu->init();

    // The main interface class will always bootstrap the js and css resources
    add_action('admin_enqueue_scripts', array($this, 'bootstrap_javascript_app') );
  }

  public function bootstrap_javascript_app ($hook) {
    $hooks = array(
      'toplevel_page_aws-workbench',
    );
    if (in_array($hook, $hooks)){
      wp_enqueue_style('bootstrap-css', plugins_url('/css/bootstrap.min.css', dirname(__FILE__) ), array());
      wp_enqueue_style('aws-workbench-css', plugins_url('/css/aws-workbench.css', dirname(__FILE__) ), array());
      wp_enqueue_script('bootstrap-js',  plugins_url('/dist/bootstrap.min.js', dirname(__FILE__) ), array('jquery'), false, true );
      wp_enqueue_script('aws-workbench', plugins_url('/dist/main.js', dirname(__FILE__) ), array(), false, true );
      wp_localize_script('aws-workbench', 'AWS_WORKBENCH', array('rest_nonce'=> wp_create_nonce('wp_rest')));
    }
  }



}