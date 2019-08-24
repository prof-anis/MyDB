<?php

/**
 *
 */
 namespace Controller;

 use Controller\DB;

class Model
{
  public static $db;

  public static $my_table;

  protected  static $table;

  function __construct()
  {

  }

  public static function __callStatic($method,$argument)
  {

      self::$db=DB::getInstance();
      self::$db->table=self::table();

    return self::$db->{$method}(...$argument);
  }

  public  function __call($method,$argument)
  {

    self::$db=DB::getInstance();
      self::$db->$table=self::$my_table;


    return self::$db->{$method}(...$argument);
  }

public static function table()
  {
    return self::$table;


  }





}



 ?>
