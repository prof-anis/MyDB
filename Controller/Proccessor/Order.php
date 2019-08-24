<?php
namespace Controller\Proccessor;


class Order
{
  public $query;

    function __construct($orderBy)
    {
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
