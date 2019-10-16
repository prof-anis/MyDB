<?php

/**
 *
 */
 namespace Controller;

 use Controller\DB;
 use ArrayAccess;

class Model implements ArrayAccess
{
  public static $db;

  public static $my_table;

  protected  $table;

  public $attributes;

  function __construct()
  {


  }

  public static function __callStatic($method,$argument)
  {

      self::$db=DB::getInstance();

      self::$db->table=get_class_vars(get_class(new static))['table'];

      self::$db->model=static::class;

    return self::$db->{$method}(...$argument);
  }

  public  function __call($method,$argument)
  {

    self::$db=DB::getInstance();

    $model=new static;

     self::$db->model=static::class;

  self::$db->table=$model->getTableName();//get_class_vars(get_class(new static))['table'];

    return self::$db->{$method}(...$argument);
  }


  public static function table()
  
  {

    return self::$table;


  }

  public function __get($variable)
  {

    return (!isset($this->attributes[$variable])) ? null : $this->attributes[$variable];
    
  }

  public function getTableName()
  {
    return $this->table;
  }


  /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

       /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return ! is_null($this->attributes[$offset]);
    }

  /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        //$this->setAttribute($offset, $value);
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        //unset($this->attributes[$offset], $this->relations[$offset]);
    }     


  







}



 ?>
