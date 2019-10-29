<?php


class Lex_Runtime_Base {
  public $LEX_RUNTIME_CLIENT;
  public function __construct($LEX_RUNTIME_CLIENT) {
    $this->LEX_RUNTIME_CLIENT = $LEX_RUNTIME_CLIENT;
  }
}