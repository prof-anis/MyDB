<?php

namespace Controller\Proccessor;


use Controller\Proccessor\Processor;
class Where   extends Processor
{
  public $where;
  public $query;

  function __construct($where)
  {

    $this->where=$where;
    $this->query=" WHERE ";
    $this->process();
  //  dd($where);
  //  return $this->retrieve();

  }
  public function process ()
  {
    $counter=1;
//check first if a where clause was sent at all

if($this->where == null)
{
  $this->query='';
  return $this->query;
}
    foreach($this->where as $value=>$where)
    {


      if(is_array($where))
      {
        if(count($where) == 2)
        { //we assume the user has put in the field and the value with an equal to
          $this->query.=$where[0]."  =  ".$where[1];
        }
        elseif (count($where) == 3) {

          $this->query.=$where[0]." ".$where[1]." ".$where[2];
        }
      }


      if($counter < count($this->where))
      {
        $this->query.=" AND ";
      }


      $counter++;

    }
    return $this;
  }





}



 ?>
