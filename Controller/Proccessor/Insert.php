<?php
namespace Controller\Proccessor;

use Controller\Proccessor\Processor;
use controller\DB;

class Insert extends Processor
{
  function __construct()
  {
    parent::__construct();

    $this->query = "";

    if($this->isOperation())
    {
        $this->process();
    }


  }


  function process()
  {
                                                                                                                                      

    $this->query = " INSERT INTO ".$this->db->table."(".implode(',',array_keys($this->db->insert)).")"." VALUES (" .implode(',',$this->stringify()).")";

    

  }

  private function stringify()
  {
    foreach (array_values($this->db->insert) as $key => $value) {
      $new_values[] = "'".$value."'";
    }
    return $new_values;
  }

  private function isOperation()
  {
    return ( $this->db->isInsert == null) ? false : true;
  }

}



 ?>
