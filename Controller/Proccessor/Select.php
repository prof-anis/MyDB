<?php
namespace Controller\Proccessor;


use Controller\Proccessor\Processor;
use controller\DB;

class Select  extends Processor
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
    //first , what if select was not called at all?
    //we return all

    if($this->db->select == null )
    {
      $this->query=" SELECT * FROM ".$this->db->table;
    }
    //it takes in an array of all the argument passed. we want to convert it to a string
    elseif(is_array($this->db->select)){

      $this->query="SELECT ".\implode(',',$this->db->select)." FROM ".$this->db->table;
    }

  }



  private function isOperation()
  {
    return ($this->db->isSelect == null) ? false : true;
  }

}



 ?>
