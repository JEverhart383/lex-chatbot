<?php

require_once dirname(__FILE__) . '/Lex_Model_Base.php';

class Lex_Model_Bots extends Lex_Model_Base {

  public function getBots() {
    $result = $this->LEX_MODEL_CLIENT->getBots()['bots'];
    return $result;
  }

  public function getBot($name) {
    $params = array(
      'name' => $name,
      'versionOrAlias' => '$LATEST'
    );
    $result = $this->LEX_MODEL_CLIENT->getBot($params);
    return $result;
  }


}