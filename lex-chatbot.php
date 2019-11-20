<?php
/* Plugin Name: WP Lex Chatbot
 * Author: Jeff Everhart
 * Description: A plugin that allows WordPress users to create and deploy site-based chatbots using the Amazon Lex bot building platform
 * Version: 0.0.1
 *
 *
 *
*/

define('AWS_WORKBENCH_DIR', dirname(__FILE__) );

require_once dirname(__FILE__) . '/AWSWorkbench_Main.php';
require_once dirname(__FILE__) . '/controllers/AWS_Workbench_Base_Controller.php';
require_once dirname(__FILE__) . '/controllers/AWS_S3_Buckets_Controller.php';
require_once dirname(__FILE__) . '/controllers/AWS_SES_Email_Controller.php';
require_once dirname(__FILE__) . '/controllers/AWS_SES_Identities_Controller.php';
require_once dirname(__FILE__) . '/controllers/AWS_Lex_Model_Bot_Controller.php';
require_once dirname(__FILE__) . '/controllers/AWS_Lex_Model_Intent_Controller.php';
require_once dirname(__FILE__) . '/controllers/AWS_Lex_Model_Slot_Type_Controller.php';
require_once dirname(__FILE__) . '/controllers/WP_Lex_Chatbot_Lex_Runtime_Controller.php';

require_once dirname(__FILE__) . '/services/Lex/Lex_Model_Bot.php';
require_once dirname(__FILE__) . '/services/Lex/Lex_Runtime_Service.php';
require_once dirname(__FILE__) . '/services/Lex/Lex_Model_Intent.php';
require_once dirname(__FILE__) . '/services/Lex/Lex_Model_Slot_Type.php';
require_once dirname(__FILE__) . '/services/SES/SES_Email.php';
require_once dirname(__FILE__) . '/services/SES/SES_Identities.php';
require_once dirname(__FILE__) . '/interface/Interface_Chat_Dialog.php';

// Initialize main class which registers clients for other services
$AWSWorkbench_Main = new AWSWorkbench_Main();
$AWSWorkbench_Main->init(__FILE__);

// Bootstrap routes and handlers for S3 services
$AWS_S3 = new AWS_S3_Buckets_Controller($AWSWorkbench_Main->AWS_S3);
$AWS_S3->init();

// Bootstrap routes and handlers for Lex Services
// $AWS_S3 = new AwsWorkbenchS3APIRoutes($AWSWorkbench->AWS_S3);
// $AWS_S3->init();

$SES_EMAIL = new SES_Email($AWSWorkbench_Main->AWS_SES);
$AWS_SES_EMAIL = new AWS_SES_Email_Controller($SES_EMAIL);
$AWS_SES_EMAIL->init();

$SES_IDENTITIES = new SES_Identities($AWSWorkbench_Main->AWS_SES);
$AWS_SES_IDENTITIES = new AWS_SES_Identities_Controller($SES_IDENTITIES);
$AWS_SES_IDENTITIES->init();

$LEX_MODEL_BOTS = new Lex_Model_Bot($AWSWorkbench_Main->AWS_LEX_MODEL);
$AWS_LEX_MODEL_BOTS = new AWS_Lex_Model_Bot_Controller($LEX_MODEL_BOTS);
$AWS_LEX_MODEL_BOTS->init();

$LEX_MODEL_INTENTS = new Lex_Model_Intent($AWSWorkbench_Main->AWS_LEX_MODEL);
$AWS_LEX_MODEL_INTENTS = new AWS_Lex_Model_Intent_Controller($LEX_MODEL_INTENTS);
$AWS_LEX_MODEL_INTENTS->init();

$LEX_MODEL_SLOT_TYPES = new Lex_Model_Slot_Type($AWSWorkbench_Main->AWS_LEX_MODEL);
$AWS_LEX_MODEL_SLOT_TYPES = new AWS_Lex_Model_Slot_Type_Controller($LEX_MODEL_SLOT_TYPES);
$AWS_LEX_MODEL_SLOT_TYPES->init();

$Lex_Runtime_Service = new Lex_Runtime_Service($AWSWorkbench_Main->AWS_LEX_RUNTIME);
$WP_Lex_Chatbot_Lex_Runtime_Controller = new WP_Lex_Chatbot_Lex_Runtime_Controller($Lex_Runtime_Service);
$WP_Lex_Chatbot_Lex_Runtime_Controller->init();

$Interface_Chat_Dialog = new Interface_Chat_Dialog();
$Interface_Chat_Dialog->init();

if (! function_exists('wp_mail')){
  function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() ) {
    global $SES_EMAIL;
    return $SES_EMAIL->send_email( $to, $subject, $message, $headers, $attachments );
  }

}

