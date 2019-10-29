<?php


class Lex_Runtime_Service {
  public $LEX_RUNTIME_CLIENT;
  public function __construct($LEX_RUNTIME_CLIENT) {
    $this->LEX_RUNTIME_CLIENT = $LEX_RUNTIME_CLIENT;
  }

  public function post_text($post_text) {
    $decoded_message = json_decode($post_text, true);
    $bot_response = $this->LEX_RUNTIME_CLIENT->postText($decoded_message);
    return $bot_response->toArray();
  }
}