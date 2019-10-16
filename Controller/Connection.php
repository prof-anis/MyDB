<?php

namespace Controller;
use Exception;
/**
 *
 */
class Connection
{

  function __construct()
  {
    //load the config file
    $config = file_get_contents(dirname(dirname(__FILE__))."/config.json");

    $this->config=\json_decode($config);
    $this->connect();

    


  }

  function __get($variable)
  {
    return $this->config->{$variable};
  }

  protected function connect()
  {
    $conn=new \Mysqli($this->databaseHost,$this->databaseUsername,$this->databasePass,$this->databaseName);
    $this->connection=$conn;
  }

  public  function  query($sql)
  {

     
      $this->result =   $this->connection->query($sql);

      return $this;


  }



  public function get()
  {
   
    if($this->result == null)
    {
      return null;
    }
    $result=[];
    
    while ($row = $this->result->fetch_assoc()) {
      $result[]=$row;
    }

    return $result;
    dd($result);
  }

}





 ?>
