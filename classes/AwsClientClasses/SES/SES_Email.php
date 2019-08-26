<?php

require_once dirname(__FILE__) . '/SES_Base.php';

class SES_Email extends SES_Base {

  public function prepare_message ($to, $subject, $message, $headers = '', $attachments = array()) {

    if (!is_array($to)) {
      $to = explode(',', $to);
    }

    $message = array(
      'Destination'=>[
        'ToAddresses' => $to
      ],
      'Message' => [
        'Body' => [
          'Html' => [
            'Data' => $message
          ],
          'Text' => [
            'Data' => $message
          ]
        ],
        'Subject' => [
          'Data' => $subject
        ]
      ],
      'Source' => 'jeffeverhart383@gmail.com'
    );
    return $message;
  }
  public function send_email($to, $subject, $message, $headers = '', $attachments = array()) {
    $message = $this->prepare_message($to, $subject, $message);
    try {
      $this->SES_CLIENT->sendEmail($message);
      return true;
    } catch (Exception $exc) {
      return false;
    }
  }
}