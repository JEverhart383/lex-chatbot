<?php

require_once dirname(__FILE__) . '/Lex_Model_Base.php';

class Lex_Model_Slot_Type extends Lex_Model_Base {

  public function getSlotTypes() {
    $result = $this->LEX_MODEL_CLIENT->getSlotTypes()['slotTypes'];
    return $result;
  }

  public function getSlotType($name) {
    $params = array(
      'name' => $name,
      'version' => '$LATEST'
    );
    $result = $this->LEX_MODEL_CLIENT->getSlotType($params)->toArray();
    return $result;
  }


}