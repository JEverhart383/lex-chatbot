<?php

require_once dirname(__FILE__) . '/Lex_Model_Base.php';

class Lex_Model_Intent extends Lex_Model_Base {

  public function getIntents() {
    $result = $this->LEX_MODEL_CLIENT->getIntents()['intents'];
    return $result;
  }

  public function getIntent($name) {
    $params = array(
      'name' => $name,
      'version' => '$LATEST'
    );
    $result = $this->LEX_MODEL_CLIENT->getIntent($params)->toArray();
    return $result;
  }


}