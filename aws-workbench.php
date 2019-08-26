<?php
/* Plugin Name: AWS Workbench
 * Author: Jeff Everhart
 *
 *
 *
 *
 *
*/

define('AWS_WORKBENCH_DIR', dirname(__FILE__) );

require_once dirname(__FILE__) . '/classes/AWSWorkbench_Main.php';
require_once dirname(__FILE__) . '/classes/AWS_Workbench_Base_Controller.php';
require_once dirname(__FILE__) . '/classes/AWS_Route53_Controller.php';
require_once dirname(__FILE__) . '/classes/AWS_S3_Buckets_Controller.php';
require_once dirname(__FILE__) . '/classes/AWS_SES_Email_Controller.php';
require_once dirname(__FILE__) . '/classes/AWS_SES_Identities_Controller.php';

require_once dirname(__FILE__) . '/classes/AwsClientClasses/SES/SES_Email.php';
require_once dirname(__FILE__) . '/classes/AwsClientClasses/SES/SES_Identities.php';

// Initialize main class which registers clients for other services
$AWSWorkbench_Main = new AWSWorkbench_Main();
$AWSWorkbench_Main->init();

// Bootstrap routes and handlers for S3 services
$AWS_S3 = new AWS_S3_Buckets_Controller($AWSWorkbench_Main->AWS_S3);
$AWS_S3->init();

$AWS_ROUTE53 = new AWS_Route53_Controller($AWSWorkbench_Main->AWS_ROUTE53, 'route53/hostedzones');
$AWS_ROUTE53->init();


// Bootstrap routes and handlers for Lex Services
// $AWS_S3 = new AwsWorkbenchS3APIRoutes($AWSWorkbench->AWS_S3);
// $AWS_S3->init();

$SES_EMAIL = new SES_Email($AWSWorkbench_Main->AWS_SES);
$AWS_SES_EMAIL = new AWS_SES_Email_Controller($SES_EMAIL);
$AWS_SES_EMAIL->init();

$SES_IDENTITIES = new SES_Identities($AWSWorkbench_Main->AWS_SES);
$AWS_SES_IDENTITIES = new AWS_SES_Identities_Controller($SES_IDENTITIES);
$AWS_SES_IDENTITIES->init();

if (! function_exists('wp_mail')){
  function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() ) {
    global $SES_EMAIL;
    return $SES_EMAIL->send_email( $to, $subject, $message, $headers, $attachments );
  }

}

