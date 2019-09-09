<?php
namespace Controller;
use Controller\Grammer;
use Controller\Connection;
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

  public $isInsert = false;

  public $isSelect = false;

  public $insert;



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

  public function where($where,$value=null)
  {
    $this->where[]=($value == null) ? $where : [$where,$value];
    $this->table=DB::getInstance()->table;

    return $this;
  }

  public function orderBy($field,$pattern='ASC')
  {
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
    $this->limit=$limit;
    return $this;

  }

  public function get()
  {
    $this->isSelect = true;
    $rr=new Connection;

    $rr=$rr->query($this->getQuery())->get();
    return $rr;

  }

  public function first()
  {
    $rr=new Connection;
    $this->isSelect = true;
    $rr=$rr->query($this->getQuery())->get();

    
    return $rr[0];
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
    return $this->getQuery();
  }





  public function getQuery()
  {

    $sql=new Grammer();
    $sql=$sql->process();

    return $sql;
  }




  public function __get($variable)
  {


  }








}



 ?>
