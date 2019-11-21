<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once dirname(__FILE__) . '/interface/AWSWorkbench_Interface.php';
require_once dirname(__FILE__) . '/services/WP_Lex_Chatbot_Data_Service.php';

class AWSWorkbench_Main {
  public $API_KEY;
  public $API_SECRET;
  public $AWS_SDK;
  public $IS_CONFIGURED = false;
  public $AWS_S3;
  public $AWS_SES;
  public $AWS_LEX_MODEL;
  public $AWS_LEX_RUNTIME;
  public $AWS_ROUTE53;
  public $AWS_ROUTE53_DOMAINS;

  public function __construct () {

  }

  public function init ($file) {
    $AWS_INTERFACE = new AWSWorkbench_Interface();
    $AWS_INTERFACE->init();

    $this->load_credentials();
    $this->instantiate_sdk_client();
    $this->test_sdk_configuration();
    $this->register_lex_model_client();
    $this->register_lex_runtime_client();
    $this->initialize_database_tables($file);
  }

  public static function return_credentials () {
    return get_option('aws_workbench_credentials');
  }
  private function load_credentials () {
    $credentials = get_option('aws_workbench_credentials');
    if (isset($credentials)) {
      $this->API_KEY = $credentials['API_KEY'];
      $this->API_SECRET = $credentials['API_SECRET'];
    }
  }

  private function instantiate_sdk_client () {
    if (isset($this->API_KEY) && isset($this->API_SECRET) ){
      require AWS_WORKBENCH_DIR . '/aws/aws-autoloader.php';

      $credentials = new Aws\Credentials\Credentials($this->API_KEY, $this->API_SECRET);
      $shared_config = [
        'region' => 'us-east-1',
        'version' => 'latest',
        'credentials' => $credentials
      ];

      $sdk = new Aws\Sdk($shared_config);

      $this->AWS_SDK = $sdk;
    }
  }

  private function initialize_database_tables ($file) {
    error_log('Main initialize_database_tables getting called');
    register_activation_hook($file, array('WP_Lex_Chatbot_Data_Service', 'initialize_plugin_tables'));
    WP_Lex_Chatbot_Data_Service::add_message_to_database('string');
  }

  private function test_sdk_configuration () {
    try {
      $s3 = $this->AWS_SDK->createS3();
      $s3->listBuckets();
      $this->IS_CONFIGURED = true;
    }
    catch (Exception $exc) {
      echo $exc;
      $this->IS_CONFIGURED = false;
    }
  }

  public function register_lex_model_client () {
    $this->AWS_LEX_MODEL = $this->AWS_SDK->createLexModelBuildingService();
  }

  public function register_lex_runtime_client () {
    $this->AWS_LEX_RUNTIME = $this->AWS_SDK->createLexRuntimeService();
  }


}