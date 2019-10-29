<?php


class SES_Base {
  public $SES_CLIENT;
  public function __construct($SES_CLIENT) {
    $this->SES_CLIENT = $SES_CLIENT;
  }
}