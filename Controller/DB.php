<?php
namespace Controller;
use Controller\Grammer;
use Controller\Connection;
use Controller\Collection;
/**
 *
 */
class DB
{

  public $query;

  public static $getInstance;

  public  $table;

  public $where;

  public $select;

  public $orderBy;

  public $isInsert = null;

  public $isSelect = null;

  public $isUpdate = null;

  public $insert;

  public $limit;


  public $attributes;



  public static function getInstance()
  {

    if(isset(self::$getInstance))
    {
      return self::$getInstance;
    }

    else{

      self::$getInstance=new DB;

      return self::$getInstance;
    }

  }

  public function where($where,$value=null,$optional=null)
  {

    if($optional == null){
    $this->where[]=($value == null) ? $where : [$where,$value];
      }
      else{
        $this->where[]=[$where,$value,$optional];
      }

 


    return $this;
  }

  public function orderBy($field,$pattern='ASC')
  {
    $this->isSelect = true;
    $this->orderBy=[$field,$pattern];
    return $this;
  }

  /** return an array of the fields to select
  **
  **/
  public function select()
  {
    $this->select = func_get_args();
    $this->isSelect = true;

    return $this;

  }

  public function limit($limit=5)
  {
    $this->isSelect = true;
    $this->limit=$limit;

    return $this;

  }

  public function get()
  {
    $this->isSelect = true;
    $rr=new Connection;

    $rr=$rr->query($this->getQuery())->get();



    return $this->processResult($rr,$this->model);

  }

  public function first()
  {
    $rr=new Connection;

    $this->isSelect = true;

    $rr=$rr->query($this->getQuery())->get();

    return $this->processResult($rr[0]);

    
 
  }

  public function last()
  {
    $rr=new Connection;
    $this->isSelect = true;
    $rr=$rr->query($this->getQuery())->get();
    $rr=$rr[count($rr)-1];
    return $rr;
  }


  public function insert(array $insert)
  {

    $this->isInsert=true;
    $this->insert = $insert;
    $rr=new Connection();

    dd($rr->query($this->getQuery())->get());
  }


  public function update(array $update)
  {
    $this->isUpdate=true;
    $this->update=$update;
    $conn=new Connection();

   $conn->query($this->getQuery());

   return $conn->connection->affected_rows;

    

  }

  public function delete()
  {
    $this->isDelete = true;
    $conn=new Connection;
    $conn->query($this->getQuery());
    
    return $conn->connection->affected_rows;



  }

  public function processResult($value)
  {
    dd($value);

    if(isset($this->model))
    {
      $collection = new Collection($value,$this->model);
      
      return $collection;

    }
  }





  public function getQuery()
  {

    $sql=new Grammer();
    $sql=$sql->process();

    return $sql;
  }














}



 ?>
