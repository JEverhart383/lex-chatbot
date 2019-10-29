<?php


class Lex_Model_Base {
  public $LEX_MODEL_CLIENT;
  public function __construct($LEX_MODEL_CLIENT) {
    $this->LEX_MODEL_CLIENT = $LEX_MODEL_CLIENT;
  }
}