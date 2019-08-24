<?php
namespace controller\proccessor;

use controller\DB;

class Select
{
  function __construct($select,$table)
  {
    $this->select=$select;

    $this->table=$table;

    $this->process();

  }


  function process()
  {
    //first , what if select was not called at all?
    //we return all

    if($this->select == null)
    {
      $this->query=" SELECT * FROM ".$this->table;
    }
    //it takes in an array of all the argument passed. we want to convert it to a string
    elseif(is_array($this->select)){

      $this->query="SELECT ".\implode(',',$this->select)." FROM ".$this->table;
    }

  }

}



 ?>
