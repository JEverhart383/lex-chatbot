<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
require_once dirname(__FILE__) . '/../AWSWorkbench_Main.php';
class AWSWorkbench_Interface_MainMenu extends AWSWorkbench_Interface_Base {
  public $CREDENTIALS;
  public function load_data() {
    $this->CREDENTIALS = AWSWorkbench_Main::return_credentials();
  }

}