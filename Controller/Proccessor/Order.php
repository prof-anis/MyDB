<?php
namespace Controller\Proccessor;

use Controller\Proccessor\Processor;

class Order extends Processor
{
  public $query;

    function __construct($orderBy)
    {
      parent::__construct();
      $this->orderBy=$orderBy;
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
