<?php
namespace Controller;

use Controller\DB;
use Controller\Proccessor\where;
/**
 *
 */
class Grammer
{
  public $query;

  function __construct()
  {
    $this->query=DB::getInstance();

    $this->grammer=[
      "select"=>Proccessor\Select::class,
      "where"=>Proccessor\Where::class,
      "orderBy"=>Proccessor\Order::class,
      "insert"=>Proccessor\Insert::class,


    ];

  //  return $this->process();
  }

    public function process()
  {

    $sql='';


    foreach ($this->grammer as $grammer=>$class)
    {

      $getClass=new $class($this->query->{$grammer},$this->query->table);



      $sql.=$getClass->query;


    }



    return $sql;

  }



}





 ?>
