<?php

require_once dirname(__FILE__) . '/SES_Base.php';

class SES_Identities extends SES_Base {
  public function list_identities () {
    $response = $this->SES_CLIENT->listIdentities();
    return $response;
  }

  public function list_policies ($name) {
    $response = $this->SES_CLIENT->listPolicies($name);
    return $response;
  }
}