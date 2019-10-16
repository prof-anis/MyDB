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

  public $clause = [
    "select"=>[
      "where",
      "orderBy",
      "limit",
      "select",

    ],
    "insert"=>[
      "insert"
    ],
    "update"=>[
      'update',
      'where'
    ],
    "delete"=>[
      "delete",
      "where"
    ]


  ];

  function __construct()
  {
    $this->db=DB::getInstance();

    $this->grammer=[
      
      "select"=>Proccessor\Select::class,
      "update"=>Proccessor\Update::class,
      "delete"=>Proccessor\Delete::class,
      "where"=>Proccessor\Where::class,
      "orderBy"=>Proccessor\Order::class,
      "insert"=>Proccessor\Insert::class,
      "limit"=>Proccessor\Limit::class,
  


    ];

  //  return $this->process();
  }

    public function process()
  {

    $sql='';


    foreach ($this->grammer as $grammer=>$class)
    {

      if(in_array($grammer, $this->clause($this->detectOperation())))
      {
     $getClass=new $class();



      $sql.=$getClass->query;
      }
 


    }



    return $sql;
   

  }

  public function detectOperation()
  {
    $operation='';
      
      if($this->db->isSelect == true)
      {
        $operation="select";
      }
      elseif ($this->db->isInsert == true) {
        $operation="insert";
      }
      elseif ($this->db->isUpdate == true) {
        $operation="update";
      }
      elseif ($this->db->isDelete == true) {
        $operation='delete';
      }



      return $operation;
  }

  public function clause($operation)
  {
    return $this->clause[$operation];
  }



}





 ?>
