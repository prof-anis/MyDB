<?php
namespace Controller\Proccessor;

use Controller\Proccessor\Processor;
use controller\DB;

class Insert extends Processor
{
  function __construct($insert,$table)
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

    $this->query = " INSERT INTO ".$this->db->table;

  }

  private function isOperation()
  {
    return ( $this->db->isInsert == null) ? false : true;
  }

}



 ?>
