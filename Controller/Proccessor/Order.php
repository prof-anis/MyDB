<?php
namespace Controller\Proccessor;

use Controller\Proccessor\Processor;

class Order extends Processor
{
  public $query;

    function __construct()
    {
      parent::__construct();
      $this->orderBy=$this->db->orderBy;
      $this->process();

    }

    private function process()
    {
      if($this->orderBy == null)
      {
        $this->query="";
      }
      else{
        $this->query=" ORDER BY ".$this->orderBy[0]." ".$this->orderBy[1];
      }
    }



}




?>
